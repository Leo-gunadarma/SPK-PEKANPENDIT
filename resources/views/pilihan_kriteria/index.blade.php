@extends('pilihan_kriteria.template')

@section('content_data')
    <div class="card">
        <div class="card-header">
            Pilihan Kriteria
            <div class="card-tools">
                <a href="{{route('pilihan.create', $kriteria)}}" class="btn btn-primary btn-sm" style="background-color: #5D5FEF !important;">
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered datatable">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pilihan</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @if(@$pilihan_kriterias && $pilihan_kriterias->count())
                    @foreach($pilihan_kriterias as $key => $pilihan_kriteria)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pilihan_kriteria['nama_pilihan']}}</td>
                            <td>{{$pilihan_kriteria['bobot']}}</td>
                            <td>
                                <a href="{{route('pilihan.edit', ['kriteria' => $kriteria, 'pilihan' => $pilihan_kriteria])}}" class="btn btn-success btn-sm">
                                    Ubah
                                </a>
                                <a href="{{route('pilihan.destroy', ['kriteria' => $kriteria, 'pilihan' => $pilihan_kriteria])}}" class="btn btn-danger btn-sm" onclick="anchorDeleteWithConfirmation(event, this)">
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
@stop

@push('js')
    <script>
        $(".datatable").DataTable();
    </script>
@endpush
