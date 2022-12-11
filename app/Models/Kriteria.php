<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table='kriteria';

    protected $fillable = [
        'kode_kriteria',
        'nama_kriteria',
        'bobot',
        'jenis',
        'tipe_kriteria',
    ];

    public function bobot_alternatif_kriteria()
    {
        return $this->hasMany(BobotAlternatifKriteria::class);
    }

    public function alternatif()
    {
        return $this->belongsToMany(Alternatif::class, 'bobot_alternatif_kriteria', 'kriteria_id', 'alternatif_id');
    }

    public function pilihan_kriteria()
    {
        return $this->hasMany(PilihanKriteria::class);
    }

    public function getJenisPlainAttribute()
    {
        $columns = array(
            'keuntungan' => 'Keuntungan',
            'biaya' => 'Biaya'
        );
        return $columns[$this['jenis']];
    }

    public function getTipeKriteriaPlainAttribute()
    {
        $columns = array(
            "integer" => "Bilangan Bulat",
            "float" => "Bilangan Desimal",
            "pilihan" => "Pilihan",
        );
        return $columns[$this['tipe_kriteria']];
    }
}
