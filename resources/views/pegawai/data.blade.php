@extends('pegawai.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <a href="/presensi/export">
                                    <button class="btn btn-sm mb-3 btn-success">
                                        <i class="mdi mdi-file-excel menu-icon"></i>Export Excel
                                    </button>
                                </a>
                                <div class="table-responsive">
                                    <table id="recent-purchases-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Nik</th>
                                                <th>Tanggal</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Lokasi In</th>
                                                <th>Lokasi Out</th>
                                            </tr>
                                        </thead>
                                        @foreach ($presensi as $item)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->tgl }}</td>
                                                    <td>{{ $item->jam_in }}</td>
                                                    <td>{{ $item->jam_out }}</td>
                                                    <td>{{ $item->lokasi_in }}</td>
                                                    <td>{{ $item->lokasi_out }}</td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection