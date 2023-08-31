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
                                                <th>NAMA</th>
                                                <th>NIK</th>
                                                <th>TANGGAL</th>
                                                <th>JAM MASUK</th>
                                                <th>JAM KELUAR</th>
                                                <th>FOTO MASUK</th>
                                                <th>FOTO KELUAR</th>
                                                <th>LOKASI</th>
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
                                                    <td>{!! $item->jam_out != null ? $item->jam_out : '<span class="text-danger">Belum Absen</span>' !!}</td>
                                                    <td><img class="avatar" src="{{ url($foto_in) }}" /></td>
                                                    <td>
                                                        @if ($item->jam_out != null)
                                                            <img class="avatar" src="{{ url($foto_out) }}" />
                                                        @else
                                                            <span class="text-danger">Belum Foto</span>
                                                        @endif
                                                    </td>
                                                    <td><a id="{{ $item->id }}" class="showmap">Show
                                                            Map</a></td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                        <div class="modal modal-blur fade" id="modal-showmap" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Lokasi Presensi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" id="loadmap">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

@push('script')
    <script>
        $(function() {
            $(".showmap").click(function(e) {
                var id = $(this).attr("id");
                $.ajax({
                    type: 'post',
                    url: '/showmap',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    cache: false,
                    success: function(respond) {
                        $("#loadmap").html(respond);
                    }
                });
                $("#modal-showmap").modal("show");
            });
        });
    </script>
@endpush
