@extends('pegawai.layouts')
@section('content')
    <section>
        <main id="main">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card shadow-sm">
                            <div class="card-body dashboard-tabs p-0">
                                <div class="container">
                                    <div class="text-center py-2">
                                        <h3><label for="" id="clock"></label></h3>
                                    </div>
                                    <div class="mt-0 py-0">
                                        <a href="/absen">
                                            <button class="btn btn-sm mb-3 btn-danger col col-12">Absen</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive shadow-sm">
                    <table id="recent-purchases-listing" class="table">
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
                            @php
                                $foto_in = Storage::url('uploads/evidence/' . $item->foto_in);
                                $foto_out = Storage::url('uploads/evidence/' . $item->foto_out);
                            @endphp
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->tgl }}</td>
                                <td>{{ $item->jam_in }}</td>
                                <td>{!! $item->jam_out != null ? $item->jam_out : '<span class="text-danger">Belum Absen</span>' !!}</td>
                                <td><img class="avatar" src="{{ url($foto_in) }}" /></td>
                                <td>
                                    @if ($item->jam_out != null)
                                        <img class="avatar" src="{{ url($foto_out) }}" />
                                    @else
                                        <span class="text-danger">Belum Foto</span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
        </main>
    </section>
@endsection
