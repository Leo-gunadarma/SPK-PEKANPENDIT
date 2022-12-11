@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-danger">
                    Error
                </div>
                <div class="card-body">
                    <p class="mb-0">
                        Silahkan lengkapi penilaian kriteria untuk setiap alternatif.
                    </p>
                    <p class="mb-0 text-danger">
                        {{app(\App\Services\PenilaianService::class)->getErrorMessage()}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
