@extends('admin.layouts')
@section('content')
        <section>
            <main id="main">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">REKAPAN</p>
                                    <a href="/presensi/export">
                                        <button class="btn btn-sm mb-3 btn-success">Export Excel</button>
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
                                                    <th>Foto In</th>
                                                    <th>Foto Out</th>
                                                </tr>
                                            </thead>

                                            @foreach ($presensi as $item)
                                                <tbody>
                                                    {{-- @php
                                                        $foto_in = Storage::url('evidence/' . $item->foto_in);
                                                        $foto_out = Storage::url('evidence/' . $item->foto_out);
                                                    @endphp --}}
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        {{-- <td>{{ $item->nik }}</td>
                                                        <td>{{ $item->tgl }}</td>
                                                        <td>{{ $item->jam_in }}</td>
                                                        <td>{{ $item->jam_out }}</td>
                                                        <td>{{ $item->lokasi_in }}</td>
                                                        <td>{{ $item->lokasi_out }}</td> --}}
                                                        <td><img class="avatar" src="/storage/{{ $item->foto_in }}" /></td>
                                                        {{-- <td><img class="avatar" src="{{ url($foto_out) }}" /></td> --}}
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                            {{-- <script>
                                                $(function() {
                                                    $(".showMap").click(function(e) {
                                                        $("#modal-showMap").modal("show");
                                                    });
                                                });
                                            </script> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" tabindex="-1" id="modal-showMap" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="loadmap">
                                <p>Modal body text goes here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </section>
@endsection
