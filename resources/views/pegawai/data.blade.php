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
                                                <th>Jam In</th>
                                                <th>Jam Out</th>
                                                <th>Lokasi In</th>
                                                <th>Lokasi Out</th>
                                                <th>Foto In</th>
                                                <th>Foto Out</th>
                                            </tr>
                                        </thead>
                                        @foreach ($presensi as $item)
                                        @php
                                            $foto_in = Storage::url('uploads/evidence/' .$item->foto_in);
                                            $foto_out = Storage::url('uploads/evidence/' .$item->foto_out);
                                        @endphp
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->tgl }}</td>
                                                    <td>{{ $item->jam_in }}</td>
                                                    <td>{{ $item->jam_out }}</td>
                                                    <td>{{ $item->lokasi_in }}</td>
                                                    <td>{{ $item->lokasi_out }}</td>
                                                    <td><img class="avatar" src="{{ url($foto_in) }}"/></td>
                                                    <td><img class="avatar" src="{{ url($foto_out) }}"/></td>
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
