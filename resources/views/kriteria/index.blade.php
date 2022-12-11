@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Data Kriteria</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{route('kriteria.create')}}" class="btn btn-primary btn-sm" style="background-color: #5D5FEF !important;">
                            Tambah Kriteria
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered datatable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Jenis</th>
                            <th>Bobot</th>
                            <th>Tipe Data</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(@$kriterias && $kriterias->count())
                            @foreach($kriterias as $key => $kriteria)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$kriteria['kode_kriteria']}}</td>
                                    <td>{{$kriteria['nama_kriteria']}}</td>
                                    <td>{{$kriteria['jenis_plain']}}</td>
                                    <td>{{$kriteria['bobot']}}</td>
                                    <td>
                                        {{$kriteria['tipe_kriteria_plain']}}
                                        @if($kriteria['tipe_kriteria']=='pilihan')
                                            <br>
                                            <a href="{{route('pilihan.index', $kriteria)}}" style="color: #5D5FEF !important;">
                                                <small>Lihat Pilihan</small>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('kriteria.edit', $kriteria)}}" class="btn btn-success btn-sm">
                                            Ubah
                                        </a>
                                        <a href="{{route('kriteria.destroy', $kriteria)}}" class="btn btn-danger btn-sm" onclick="anchorDeleteWithConfirmation(event, this)">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        $(".datatable").DataTable();
    </script>
@endpush
