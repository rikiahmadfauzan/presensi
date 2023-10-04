@extends('pegawai.layouts')
@section('content')
<div class="wrapper">
    <main role="main" class="main-content py-0 mt-0">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <h2 class="h4 mb-0">Presence</h2>
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>NAMA</th>
                                                <th>NIK</th>
                                                <th>TANGGAL</th>
                                                <th>JAM MASUK</th>
                                                <th>JAM KELUAR</th>
                                                <th>FOTO MASUK</th>
                                                <th>FOTO KELUAR</th>
                                            </tr>
                                        </thead>
                                        @foreach ($presensi as $item)
                                            <tbody>
                                                @php
                                                    $foto_in = Storage::url('uploads/evidence/' . $item->foto_in);
                                                    $foto_out = Storage::url('uploads/evidence/' . $item->foto_out);
                                                @endphp
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->tgl }}</td>
                                                    <td>{{ $item->jam_in }}</td>
                                                    <td>{!! $item->jam_out != null ? $item->jam_out : '<span class="badge badge-danger">Belum Absen</span>' !!}</td>
                                                    <td><img class="avatar rounded-circle" src="{{ url($foto_in) }}" width="50" height="50" /></td>
                                                    <td>
                                                        @if ($item->jam_out != null)
                                                            <img class="avatar rounded-circle" src="{{ url($foto_out) }}" width="50" height="50"/>
                                                        @else
                                                            <span class="badge badge-danger">Belum Absen</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div> <!-- customized table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
</div>
@endsection
