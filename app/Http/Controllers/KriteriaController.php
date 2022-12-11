<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKriteria;
use App\Http\Requests\UpdateKriteria;
use App\Models\Kriteria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreKriteria  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKriteria $request)
    {
        $datas = $request->only([
            'kode_kriteria',
            'nama_kriteria',
            'bobot',
            'jenis',
            'tipe_kriteria'
        ]);
        $kriteria = Kriteria::create($datas);
        return redirect()->route('kriteria.index')->withSuccess('Berhasil menambah data');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.create', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateKriteria  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKriteria $request, $id)
    {
        $kriteria = Kriteria::find($id);
        if ($kriteria) {
            $datas = $request->only([
                'kode_kriteria',
                'nama_kriteria',
                'bobot',
                'jenis',
                'tipe_kriteria'
            ]);
            $kriteria->update($datas);
        }
        return redirect()->back()->withSuccess('Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->route('kriteria.index')->withSuccess('Berhasil menghapus data');
    }
}
