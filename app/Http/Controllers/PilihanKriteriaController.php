<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePilihanKriteria;
use App\Models\Kriteria;
use App\Models\PilihanKriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PilihanKriteriaController extends Controller
{
    /**
     * @var Kriteria
     */
    protected $kriteria;

    public function __construct()
    {
        $this->forceRedirect();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = $this->getKriteria();
        $pilihan_kriterias = $kriteria['pilihan_kriteria'];
        return view('pilihan_kriteria.index', compact('pilihan_kriterias', 'kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = $this->getKriteria();
        return view('pilihan_kriteria.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePilihanKriteria  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePilihanKriteria $request)
    {
        $datas = $request->only('nama_pilihan', 'bobot');
        $datas['kriteria_id'] = @$this->getKriteria()['id'];
        PilihanKriteria::create($datas);
        return redirect()->route('pilihan.index', $this->getKriteria())
            ->withSuccess('Berhasil menambah pilihan kriteria');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $kriteria
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria, $id)
    {
        $pilihan_kriteria = PilihanKriteria::find($id);
        if (!$pilihan_kriteria) return redirect()->back()->withError('Pilihan Kriteria tidak ditemukan');

        return view('pilihan_kriteria.create', compact('kriteria', 'pilihan_kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePilihanKriteria $request, Kriteria $kriteria, $id)
    {
        $pilihan_kriteria = PilihanKriteria::find($id);
        if (!$pilihan_kriteria) return redirect()->back()->withError('Pilihan Kriteria tidak ditemukan');

        $datas = $request->only('nama_pilihan', 'bobot');
        $pilihan_kriteria->update($datas);

        return redirect()->back()
            ->withSuccess('Berhasil mengubah pilihan kriteria');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria, $id)
    {
        $pilihan_kriteria = PilihanKriteria::find($id);
        if (!$pilihan_kriteria) return redirect()->back()->withError('Pilihan Kriteria tidak ditemukan');

        $pilihan_kriteria->delete();

        return redirect()->back()
            ->withSuccess('Berhasil mengubah pilihan kriteria');
    }

    public function forceRedirect()
    {
        $kriteria_id = Route::current()->parameter('kriteria');
        $kriteria = Kriteria::find($kriteria_id);

        if (!$kriteria || !@$kriteria['id']) {
            echo redirect()->route('kriteria.index')->withError('Kriteria tidak valid');
        }
        $this->setKriteria($kriteria);
    }

    /**
     * @return Kriteria
     */
    public function getKriteria()
    {
        return $this->kriteria;
    }

    /**
     * @param Kriteria $kriteria
     */
    public function setKriteria($kriteria)
    {
        $this->kriteria = $kriteria;
    }


}
