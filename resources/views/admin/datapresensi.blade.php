{{-- @extends('admin.layouts')
@section('content')
    <div class="wrapper">
        <main role="main" class="main-content py-0 mt-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row">
                            <!-- Small table -->
                            <div class="col-md-12 my-4">
                                <h2 class="h4 mb-1">Presence</h2>
                                <div class="card shadow">
                                    <div class="card-body">

                                        <!-- table -->
                                        <table class="table table-borderless table-hover" id="example">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="all">
                                                            <label class="custom-control-label" for="all"></label>
                                                        </div>
                                                    </th>
                                                    <th>NAMA</th>
                                                    <th>NIK</th>
                                                    <th>TANGGAL</th>
                                                    <th>MASUK</th>
                                                    <th>KELUAR</th>
                                                    <th>FOTO IN</th>
                                                    <th>FOTO OUT</th>
                                                    <th>LOKASI</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($presensi as $item)
                                                    @php
                                                        $foto_in = Storage::url('uploads/evidence/' . $item->foto_in);
                                                        $foto_out = Storage::url('uploads/evidence/' . $item->foto_out);
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="2474">
                                                                <label class="custom-control-label" for="2474"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->nik }}</td>
                                                        <td>{{ $item->tgl }}</td>
                                                        <td>{{ $item->jam_in }}</td>
                                                        <td>{!! $item->jam_out != null ? $item->jam_out : '<span class="badge badge-danger">Belum Absen</span>' !!}</td>
                                                        <td><img class="avatar rounded-circle" src="{{ url($foto_in) }}" width="50"
                                                                height="50" /></td>
                                                        <td>
                                                            @if ($item->jam_out != null)
                                                                <img class="avatar rounded-circle" src="{{ url($foto_out) }}"
                                                                    width="50" height="50" />
                                                            @else
                                                                <span class="badge badge-danger">Belum Absen</span>
                                                            @endif
                                                        </td>
                                                        <td><a id="{{ $item->id }}" class="showmap">
                                                                <center>
                                                                    <i class="fe fe-map"></i>
                                                                </center>
                                                            </a></td>
                                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Remove</a>
                                                                <a class="dropdown-item" href="#">Assign</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--  modal -->
                                            <div class="modal fade" id="modal-showmap" tabindex="-1" role="dialog"
                                                aria-labelledby="eventModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="varyModalLabel">Lokasi Presensi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-4" id="loadmap">

                                                        </div>
                                                    </div>
                                                </div>
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
@endsection --}}
@extends('admin.layouts')
@section('content')
    <div class="wrapper">
        <main role="main" class="main-content py-0 mt-0 pt-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center my-4">
                            <div class="col">
                                <h2 class="h3 mb-0 page-title">Presence</h2>
                            </div>
                            <div class="col-auto">
                                {{-- <button type="button" class="btn btn-secondary" id="delete_all_data"><span
                                        class="fe fe-trash fe-12 mr-2"></span>Delete</button> --}}
                                <button type="button" class="btn btn-success"><span
                                        class="fe fe-download fe-12 mr-2"></span>Excel</button>
                            </div>
                            <!-- Small table -->
                            <div class="col-md-12 my-4">
                                @if (Session::get('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                <div class="card shadow">
                                    <div class="card-body">

                                        <!-- table -->
                                        <table class="table table-borderless table-hover" id="example">
                                            <thead>
                                                <tr>
                                                    {{-- <th>
                                                        <input type="checkbox" name="" id="select_all_id_data">
                                                    </th> --}}
                                                    <th>NAMA</th>
                                                    <th>NIK</th>
                                                    <th>TANGGAL</th>
                                                    <th>MASUK</th>
                                                    <th>KELUAR</th>
                                                    <th>FOTO IN</th>
                                                    <th>FOTO OUT</th>
                                                    <th>LOKASI</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($presensi as $item)
                                                    @php
                                                        $foto_in = Storage::url('uploads/evidence/' . $item->foto_in);
                                                        $foto_out = Storage::url('uploads/evidence/' . $item->foto_out);
                                                    @endphp
                                                    <tr>
                                                        {{-- <td>
                                                            <input type="checkbox" name="id_data" id="" class="checkbox_id_data"
                                                                value="{{ $item->id }}">
                                                        </td> --}}
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->nik }}</td>
                                                        <td>{{ $item->tgl }}</td>
                                                        <td>{{ $item->jam_in }}</td>
                                                        <td>{!! $item->jam_out != null ? $item->jam_out : '<span class="badge badge-danger">Belum Absen</span>' !!}</td>
                                                        <td><img class="avatar rounded-circle" src="{{ url($foto_in) }}"
                                                                width="50" height="50" /></td>
                                                        <td>
                                                            @if ($item->jam_out != null)
                                                                <img class="avatar rounded-circle"
                                                                    src="{{ url($foto_out) }}" width="50"
                                                                    height="50" />
                                                            @else
                                                                <span class="badge badge-danger">Belum Absen</span>
                                                            @endif
                                                        </td>
                                                        <td><a id="{{ $item->id }}" class="showmap">
                                                                <center>
                                                                    <i class="fe fe-map"></i>
                                                                </center>
                                                            </a>
                                                        </td>
                                                        <td><a href="/data/hapus/{{ $item->id }}" class="">
                                                                <center>
                                                                    <button class="btn btn-danger btn-sm">
                                                                        <i class="fe fe-trash fe-16"></i>
                                                                    </button>
                                                                </center>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--  modal -->
                                            <div class="modal fade" id="modal-showmap" tabindex="-1" role="dialog"
                                                aria-labelledby="eventModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="varyModalLabel">Lokasi Presensi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-4" id="loadmap">

                                                        </div>
                                                    </div>
                                                </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div>
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
