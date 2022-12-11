@extends('adminlte::page')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{@$alternatif ? 'Edit' : 'Tambah'}} Alternatif</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{route(@$alternatif ? 'alternatif.update' : 'alternatif.store', @$alternatif ?? '')}}">
                    @csrf
                    @if(@$alternatif)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="kode_alternatif" class="col-sm-2 col-form-label" style="text-align: right">Kode Alternatif</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('kode_alternatif') is-invalid @enderror" id="kode_alternatif" name="kode_alternatif"
                                       placeholder="misal, R1, R2, dll." value="{{old('kode_alternatif') ?? @$alternatif['kode_alternatif']}}"
                                >
                                @error('kode_alternatif')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_alternatif" class="col-sm-2 col-form-label" style="text-align: right">Nama Alternatif</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror" id="nama_alternatif" name="nama_alternatif"
                                       placeholder="Leo, Aby, Ifent."  value="{{old('nama_alternatif') ?? @$alternatif['nama_alternatif']}}"
                                >
                                @error('nama_alternatif')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" class="btn btn-primary"  style="background-color: #5D5FEF !important;">Simpan</button>
                            <a class="btn btn-default" href="{{route('alternatif.index')}}">Batal</a>
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
    </script>
@endpush
