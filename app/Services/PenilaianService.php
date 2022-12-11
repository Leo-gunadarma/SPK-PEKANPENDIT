<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 05/12/19
 * Time: 14.24
 */

namespace App\Services;


use App\Models\Alternatif;
use App\Models\BobotAlternatifKriteria;
use App\Models\Kriteria;
use App\Models\PilihanKriteria;
use Illuminate\Database\Eloquent\Collection;

class PenilaianService
{
    /**
     * @var Collection
     */
    protected $alternatifs;

    /**
     * @var Collection
     */
    protected $kriterias;

    /**
     * @var Collection
     */
    protected $bobot_alternatif_kriterias;


    /**
     * @var boolean
     */
    protected $valid;

    protected $error_message;
    protected $kriteria_id_error;
    protected $alternatif_id_error;

    /**
     * @var array
     */
    protected $nice_view_list;

    /**
     * @var array
     */
    protected $angka_view_list;

    /**
     * @var array
     */
    protected $w_list;


    /**
     * @var array
     */
    protected $unnormalized_w_list;

    /**
     * @var array
     */
    protected $normalized_w_list;

    /**
     * @var array
     */
    protected $s_list;


    /**
     * @var array
     */
    protected $normalized_s_list;

    /**
     * @var array
     */
    protected $normalized_v_list;


    public function __construct()
    {
        $this->setupData();
        $this->checkValiditasData();

    }

    public function setupData()
    {
        $this->setAlternatifs(Alternatif::all());
        $this->setKriterias(Kriteria::all());
        $this->setBobotAlternatifKriterias(BobotAlternatifKriteria::all());
    }

    public function checkValiditasData()
    {
        $valid = true;
        $alternatifs = $this->getAlternatifs();
        $kriterias = $this->getKriterias();
        $bobots = $this->getBobotAlternatifKriterias();
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                $bobot = $bobots
                    ->where('kriteria_id', $kriteria['id'])
                    ->where('alternatif_id', $alternatif['id'])
                    ->first();
                if (!$bobot || !$bobot['nilai']) {
                    $valid = false;
                    $this->setErrorMessage(
                        "Alternatif ".$alternatif['kode_alternatif']
                        ." pada Kriteria ".$kriteria['nama_kriteria']." belum diisi"
                    );
                    $this->setAlternatifIdError($alternatif['id']);
                    $this->setKriteriaIdError($kriteria['id']);
                    break;
                }
            }
        }
        $this->setValid($valid);
    }


    // cari
    public function hitungWp()
    {
        $w_list = $this->getKriterias()->reduce(function ($current, $kriteria) {
            $current[$kriteria['id']] = $kriteria['bobot'];
            return $current;
        }, []);
        $this->setWList($w_list);

        $sum_w = array_sum($w_list);
        $unnormalized_w_list = array_map(function ($w) use ($sum_w) {
            return $w/$sum_w;
        }, $w_list);
        $this->setUnnormalizedWList($unnormalized_w_list);

        $normalized_w_list = $this->getKriterias()->reduce(function ($current, $kriteria) use($unnormalized_w_list) {
            $current[$kriteria['id']] =
                ($kriteria['jenis']=='keuntungan'?1:-1)
                * $unnormalized_w_list[$kriteria['id']];
            return $current;
        }, []);
        $this->setNormalizedWList($normalized_w_list);

        $s_list = $this->getBobotAlternatifKriterias()->reduce(function ($current, $bobot) use($normalized_w_list) {
            if (!isset($current[$bobot['alternatif_id']]))
                $current[$bobot['alternatif_id']] = array();
            if (!isset($current[$bobot['alternatif_id']][$bobot['kriteria_id']]))
                $current[$bobot['alternatif_id']][$bobot['kriteria_id']] = array();
            $current[$bobot['alternatif_id']][$bobot['kriteria_id']] = array(
                $bobot['nilai'], $normalized_w_list[$bobot['kriteria_id']],
                pow($bobot['nilai'],$normalized_w_list[$bobot['kriteria_id']])
            );
            return $current;
        }, []);

        $this->setSList($s_list);

        $normalized_s_list = array_map(function ($s) {
            $res = array_column($s, 2);
            return array_product($res);
        }, $s_list);
        $this->setNormalizedSList($normalized_s_list);

        $sum_s = array_sum($normalized_s_list);
        $normalized_v_list = array_map(function ($s) use ($sum_s) {
            return $s/$sum_s;
        }, $normalized_s_list);
        $this->setNormalizedVList($normalized_v_list);

    }

    public function setNiceView()
    {
        $datas = array();
        $datas2 = array();
        foreach ($this->getAlternatifs() as $alternatif) {

            foreach ($this->getKriterias() as $kriteria) {

                $tipe_kriteria = $kriteria['tipe_kriteria'];
                $penilaian = @$this->getBobotAlternatifKriterias()
                    ->where('kriteria_id', @$kriteria['id'])
                    ->where('alternatif_id', @$alternatif['id'])
                    ->first();
                $nilai = @$penilaian['nilai'];

                if ($tipe_kriteria == 'pilihan') {
                    $pilihan_kriteria = PilihanKriteria::find($nilai);
                    $view_value = $pilihan_kriteria['nama_pilihan'];
                    $value = $pilihan_kriteria['bobot'];
                } else {
                    $view_value = $nilai;
                    $value = $nilai;
                }

                if (!isset($datas[$alternatif['id']])) $datas[$alternatif['id']] = array();
                $datas[$alternatif['id']][$kriteria['id']] = $view_value;

                if (!isset($datas2[$alternatif['id']])) $datas2[$alternatif['id']] = array();
                $datas2[$alternatif['id']][$kriteria['id']] = $value;
            }
        }

        $this->setNiceViewList($datas);
        $this->setAngkaViewList($datas2);

    }

    public function getKriteria($id)
    {
        static $datas;
        if ($datas == null) $datas = array();

        if (!array_key_exists($id, $datas)) {
            $kriteria = $this->getKriterias()->where('id', $id)->first();
            $datas[$id] = $kriteria;
        }

        return $datas[$id];
    }

    public function getAlternatif($id)
    {
        static $datas;
        if ($datas == null) $datas = array();

        if (!array_key_exists($id, $datas)) {
            $alternatif = $this->getAlternatifs()->where('id', $id)->first();
            $datas[$id] = $alternatif;
        }

        return $datas[$id];
    }

    /**
     * @return Collection
     */
    public function getAlternatifs()
    {
        return $this->alternatifs;
    }

    /**
     * @param Collection $alternatifs
     */
    public function setAlternatifs(Collection $alternatifs)
    {
        $this->alternatifs = $alternatifs;
    }

    /**
     * @return Collection
     */
    public function getKriterias()
    {
        return $this->kriterias;
    }

    /**
     * @param Collection $kriterias
     */
    public function setKriterias(Collection $kriterias)
    {
        $this->kriterias = $kriterias;
    }

    /**
     * @return Collection
     */
    public function getBobotAlternatifKriterias()
    {
        return $this->bobot_alternatif_kriterias;
    }

    /**
     * @param Collection $bobot_alternatif_kriterias
     */
    public function setBobotAlternatifKriterias(Collection $bobot_alternatif_kriterias)
    {
        $this->bobot_alternatif_kriterias = $bobot_alternatif_kriterias;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * @param mixed $error_message
     */
    public function setErrorMessage($error_message): void
    {
        $this->error_message = $error_message;
    }

    /**
     * @return mixed
     */
    public function getKriteriaIdError()
    {
        return $this->kriteria_id_error;
    }

    /**
     * @param mixed $kriteria_id_error
     */
    public function setKriteriaIdError($kriteria_id_error): void
    {
        $this->kriteria_id_error = $kriteria_id_error;
    }

    /**
     * @return mixed
     */
    public function getAlternatifIdError()
    {
        return $this->alternatif_id_error;
    }

    /**
     * @param mixed $alternatif_id_error
     */
    public function setAlternatifIdError($alternatif_id_error): void
    {
        $this->alternatif_id_error = $alternatif_id_error;
    }

    /**
     * @return array
     */
    public function getNiceViewList(): array
    {
        return $this->nice_view_list;
    }

    /**
     * @param array $nice_view_list
     */
    public function setNiceViewList(array $nice_view_list): void
    {
        $this->nice_view_list = $nice_view_list;
    }

    /**
     * @return array
     */
    public function getAngkaViewList(): array
    {
        return $this->angka_view_list;
    }

    /**
     * @param array $angka_view_list
     */
    public function setAngkaViewList(array $angka_view_list): void
    {
        $this->angka_view_list = $angka_view_list;
    }

    /**
     * @return array
     */
    public function getWList(): array
    {
        return $this->w_list;
    }

    /**
     * @param array $w_list
     */
    public function setWList(array $w_list): void
    {
        $this->w_list = $w_list;
    }

    /**
     * @return array
     */
    public function getUnnormalizedWList(): array
    {
        return $this->unnormalized_w_list;
    }

    /**
     * @param array $unnormalized_w_list
     */
    public function setUnnormalizedWList(array $unnormalized_w_list): void
    {
        $this->unnormalized_w_list = $unnormalized_w_list;
    }

    /**
     * @return array
     */
    public function getNormalizedWList(): array
    {
        return $this->normalized_w_list;
    }

    /**
     * @param array $normalized_w_list
     */
    public function setNormalizedWList(array $normalized_w_list): void
    {
        $this->normalized_w_list = $normalized_w_list;
    }


    /**
     * @return array
     */
    public function getSList(): array
    {
        return $this->s_list;
    }

    /**
     * @param array $s_list
     */
    public function setSList(array $s_list): void
    {
        $this->s_list = $s_list;
    }

    /**
     * @return array
     */
    public function getNormalizedSList(): array
    {
        return $this->normalized_s_list;
    }

    /**
     * @param array $normalized_s_list
     */
    public function setNormalizedSList(array $normalized_s_list): void
    {
        $this->normalized_s_list = $normalized_s_list;
    }

    /**
     * @return array
     */
    public function getNormalizedVList(): array
    {
        return $this->normalized_v_list;
    }

    /**
     * @param array $normalized_v_list
     */
    public function setNormalizedVList(array $normalized_v_list): void
    {
        $this->normalized_v_list = $normalized_v_list;
    }



}
