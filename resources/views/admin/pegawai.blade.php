@extends('admin.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="card-title">DATA PEGAWAI</p>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::get('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                <!-- Modal -->
                                <button type="button" class="btn btn-danger mt-2 btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Data
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="">Tambah Data Pegawai</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" action="/create/register" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="nik"
                                                            id="nik" placeholder="NIK">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name"
                                                            id="name" placeholder="Nama Lengkap">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email"
                                                            id="email" placeholder="Email">
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" placeholder="Password">
                                                    </div> --}}
                                                    <button type="submit"
                                                        class="btn btn-danger col-12 me-2">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive py-2">
                                    <table id="recent-purchases-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>NAMA</th>
                                                <th>NIK</th>
                                                <th>EMAIL</th>
                                            </tr>
                                        </thead>

                                        @foreach ($user as $item)
                                            <tbody>
                                                @php
                                                    $foto_in = Storage::url('uploads/evidence/' . $item->foto_in);
                                                    $foto_out = Storage::url('uploads/evidence/' . $item->foto_out);
                                                @endphp
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->email }}</td>
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
        </main>
    </section>
@endsection
