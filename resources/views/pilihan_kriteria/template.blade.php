@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card card-primary">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{@$kriteria['kode_kriteria']}}</h3>

                    <p class="text-muted text-center">{{@$kriteria['nama_kriteria']}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Bobot</b> <a class="float-right">{{@$kriteria['bobot']}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jenis</b> <a class="float-right">{{@$kriteria['jenis']}}</a>
                        </li>
                    </ul>

                    <a href="{{route('kriteria.index')}}" class="btn btn-primary btn-block btn-sm" style="background-color: #5D5FEF !important;"><b>Kembali ke Kriteria</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-9">
            @yield('content_data')
        </div>
    </div>
@stop


