@extends('adminlte::page')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{@$kriteria ? 'Edit' : 'Tambah'}} Kriteria</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{route(@$kriteria ? 'kriteria.update' : 'kriteria.store', @$kriteria ?? '')}}">
                    @csrf
                    @if(@$kriteria)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="kode_kriteria" class="col-sm-2 col-form-label" style="text-align: right">Kode Kriteria</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('kode_kriteria') is-invalid @enderror" id="kode_kriteria" name="kode_kriteria"
                                       placeholder="misal, C1, C2, dll." value="{{old('kode_kriteria') ?? @$kriteria['kode_kriteria']}}"
                                >
                                @error('kode_kriteria')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_kriteria" class="col-sm-2 col-form-label" style="text-align: right">Nama Kriteria</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" name="nama_kriteria"
                                       placeholder="Jabatan, Lama kerja, Penghasilan, dll."  value="{{old('nama_kriteria') ?? @$kriteria['nama_kriteria']}}"
                                >
                                @error('nama_kriteria')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis" class="col-sm-2 col-form-label" style="text-align: right">Jenis Kriteria</label>
                            <div class="col-sm-4">
                                <select name="jenis" id="jenis" class="form-control select2 @error('jenis') is-invalid @enderror" autocomplete="off">
                                    <option value="">Pilih</option>
                                    <option value="keuntungan" {!! (old('jenis') ?? @$kriteria['jenis'])=='keuntungan' ? 'selected="selected" ' : ''  !!} >Keuntungan</option>
                                    <option value="biaya"  {!! (old('jenis') ?? @$kriteria['jenis'])=='biaya' ? 'selected="selected" ' : ''  !!}>Biaya</option>
                                </select>
                                @error('jenis')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bobot" class="col-sm-2 col-form-label" style="text-align: right">Bobot</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot"
                                       placeholder="isi dengan angka bebas" min="0" step="1"
                                       value="{{old('bobot') ?? @$kriteria['bobot']}}"
                                >
                                @error('bobot')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipe_kriteria" class="col-sm-2 col-form-label" style="text-align: right">Tipe Data Kriteria</label>
                            <div class="col-sm-4">
                                <select name="tipe_kriteria" id="tipe_kriteria" class="form-control select2 @error('tipe_kriteria') is-invalid @enderror" autocomplete="off">
                                    <option value="">Pilih</option>
                                    <option value="integer"  {!! (old('tipe_kriteria') ?? @$kriteria['tipe_kriteria'])=='integer' ? 'selected="selected" ' : ''  !!}>Bilangan Bulat</option>
                                    <option value="float"  {!! (old('tipe_kriteria') ?? @$kriteria['tipe_kriteria'])=='float' ? 'selected="selected" ' : ''  !!}>Bilangan Desimal</option>
                                    <option value="pilihan"  {!! (old('tipe_kriteria') ?? @$kriteria['tipe_kriteria'])=='pilihan' ? 'selected="selected" ' : ''  !!}>Pilihan</option>
                                </select>
                                @error('tipe_kriteria')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary" style="background-color: #5D5FEF !important;">Simpan</button>
                            <a class="btn btn-default" href="{{route('kriteria.index')}}">Batal</a>
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        $(".datatable").DataTable();
        $(".select2").select2();
    </script>
@endpush
