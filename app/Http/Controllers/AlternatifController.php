<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlternatif;
use App\Http\Requests\UpdateAlternatif;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        return view('alternatif.index', compact('alternatifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlternatif $request)
    {
        $request->validate([
            'nama_alternatif' => 'required|alpha',
        ]);

        $datas = $request->only([
            'kode_alternatif',
            'nama_alternatif',
        ]);
        $alternatif = Alternatif::create($datas);
        return redirect()->route('alternatif.index')->withSuccess('Berhasil menambah data');
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
        $alternatif = Alternatif::find($id);
        return view('alternatif.create', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlternatif $request, $id)
    {
        $alternatif = Alternatif::find($id);
        if ($alternatif) {
            $datas = $request->only([
                'kode_alternatif',
                'nama_alternatif'
            ]);
            $alternatif->update($datas);
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
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        return redirect()->route('alternatif.index')->withSuccess('Berhasil menghapus data');
    }

    public function isi($id)
    {
        $kriterias = Kriteria::all();
        $alternatif = Alternatif::find($id);
        if (!$alternatif) redirect()->back->withError('Alternatif tidak ditemukan');

        return view('alternatif.isi', compact('kriterias', 'alternatif'));
    }
    public function saveIsi(Request $request, $id)
    {
        $alternatif = Alternatif::find($id);
        $datas = $request->input('kriteria');
        $datas = array_map(function ($value) {
            return ['nilai' => $value];
        }, $datas);
        $alternatif->kriteria()->sync($datas);
        return redirect()->back()->withSuccess('Berhasil menyimpan isian');
    }
}
