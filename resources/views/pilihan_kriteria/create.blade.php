@extends('pilihan_kriteria.template')


@section('content_data')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{@$pilihan_kriteria ? 'Edit' : 'Tambah'}} Pilihan Kriteria</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{route(@$pilihan_kriteria ? 'pilihan.update' : 'pilihan.store', ['kriteria' => @$kriteria, 'pilihan' => @$pilihan_kriteria])}}">
            @csrf
            @if(@$pilihan_kriteria)
                @method('PUT')
            @endif
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama_pilihan" class="col-sm-3 col-form-label" style="text-align: right">Nama Pilihan Kriteria</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('nama_pilihan') is-invalid @enderror" id="nama_pilihan" name="nama_pilihan"
                               placeholder="misal, baik, sedang, jelek, dll." value="{{old('nama_pilihan') ?? @$pilihan_kriteria['nama_pilihan']}}"
                        >
                        @error('nama_pilihan')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bobot" class="col-sm-3 col-form-label" style="text-align: right">Bobot</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot"
                               placeholder="isi dengan angka bebas" step="1"
                               value="{{old('bobot') ?? @$pilihan_kriteria['bobot']}}"
                        >
                        @error('bobot')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="col-sm-6 offset-sm-2">
                    <button type="submit" class="btn btn-primary" style="background-color: #5D5FEF !important;">Simpan</button>
                    <a class="btn btn-default" href="{{route('pilihan.index', @$kriteria)}}">Batal</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@stop

@push('js')
    <script>
        $(".datatable").DataTable();
        $(".select2").select2();
    </script>
@endpush
