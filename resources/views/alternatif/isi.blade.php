@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-body box-profile">

                    <h3 class="profile-username text-center">{{@$alternatif['kode_alternatif']}}</h3>

                    <p class="text-muted text-center">{{@$alternatif['nama_alternatif']}}</p>

                    <button href="" class="btn btn-primary btn-block btn-sm" onclick="submitForm(event)" style="background-color: #5D5FEF !important;"><b>Simpan</b></button>

                    <a href="{{route('alternatif.index')}}" class="btn btn-default btn-block btn-sm"><b>Kembali ke Alternatif</b></a>


                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body ">
                    <form action="{{route('alternatif.save_isi', $alternatif)}}" method="post" id="form-isi">
                        @csrf
                        <table class="table table-hover table-bordered datatable table-responsive">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(@$kriterias && $kriterias->count())
                            @foreach($kriterias as $key => $kriteria)
                                @php
                                    $pilihan = $alternatif->bobot_alternatif_kriteria()->where('kriteria_id', $kriteria['id'])->first();
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$kriteria['kode_kriteria']}} - {{$kriteria['nama_kriteria']}}</td>
                                    <td>
                                        @if($kriteria['tipe_kriteria']=='integer')
                                            <input type="number" class="form-control" name="kriteria[{{$kriteria['id']}}]"
                                                   {{-- placeholder="Isi dengan bilangan bulat" step="1" autocomplete="off" --}}
                                                   @if (isset($pilihan->nilai))
                                                    placeholder="Isi dengan bilangan bulat" step="1" autocomplete="off" value="{{$pilihan['nilai']}}"
                                                   @else
                                                    placeholder="Isi dengan bilangan bulat" step="1" autocomplete="off"
                                                   @endif
                                                   
                                            >
                                        @elseif($kriteria['tipe_kriteria']=='float')
                                            <input type="number" class="form-control" name="kriteria[{{$kriteria['id']}}]"
                                                @if (isset($pilihan->nilai))
                                                    placeholder="Isi dengan bilangan desimal" step="0.01" autocomplete="off" value="{{$pilihan['nilai']}}"
                                                @else
                                                    placeholder="Isi dengan bilangan desimal" step="0.01" autocomplete="off"
                                                @endif
                                                   
                                            >
                                        @elseif($kriteria['tipe_kriteria']=='pilihan')
                                            <select name="kriteria[{{$kriteria['id']}}]" class="form-control select2-kriteria" autocomplete="off">
                                                <option value="">Pilih</option>
                                                @foreach($kriteria['pilihan_kriteria'] as $pilihan_kriteria)
                                                    @if (isset($pilihan->nilai))
                                                    <option value="{{$pilihan_kriteria['id']}}" {!! $pilihan_kriteria['id']== $pilihan['nilai'] ? 'selected="selected" ' : ''!!}}>
                                                        {{$pilihan_kriteria['nama_pilihan']}}
                                                    </option>
                                                    
                                                    @else
                                                    <option value="{{$pilihan_kriteria['id']}}">
                                                            {{$pilihan_kriteria['nama_pilihan']}}
                                                    </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')
    <script>
        $(".select2-kriteria").select2();
        function submitForm(event) {
            event.preventDefault();
            $("#form-isi").submit();
        }
    </script>
@endpush

