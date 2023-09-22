@extends('admin.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="row">
                <div class="col-6 py-1">
                    <a href="/presensi/export">
                        <button class="btn btn-sm mb-3 bg-success">Export Excel</button>
                    </a>
                </div>
                <div class="col-md-6">
                    <form action="/search">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-danger" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

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
                                <td><a id="{{ $item->id }}" class="showmap btn btn-danger btn-sm">Show
                                        Map</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                    <div class="modal modal-blur fade" id="modal-showmap" tabindex="-1" role="dialog" aria-hidden="true">
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
