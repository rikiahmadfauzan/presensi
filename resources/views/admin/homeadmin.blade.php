@extends('admin.layouts')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="mb-2 align-items-center">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <img src="{{ asset('dashboard') }}/assets/images/bg.jpg" class="d-block w-100" alt="...">

                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div>
                    <!-- .row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <strong class="card-title">Data Pegawai</strong>
                                    <a class="float-right small text-muted" href="/pegawai">View all</a>
                                </div>
                                <div class="card-body my-n2">
                                    <table class="table table-borderless table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Nik</th>
                                                <th>Email</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    {{-- <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Remove</a>
                                        </div>
                                    </td> --}}
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div> <!-- Striped rows -->
                    </div> <!-- .row-->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div>
    </main>
@endsection
