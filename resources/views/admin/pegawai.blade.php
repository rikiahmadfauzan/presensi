@extends('admin.layouts')
@section('content')
    <div class="wrapper">
        <main role="main" class="main-content py-0 mt-0 pt-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center my-4">
                            <div class="col">
                                <h2 class="h4 mb-0 page-title">Pegawai</h2>
                            </div>
                            <div class="col-auto">
                                {{-- <button type="button" class="btn btn-secondary" id="delete_all"><span
                                        class="fe fe-trash fe-12 mr-2"></span>Delete</button> --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#eventModal"><span
                                        class="fe fe-plus-circle fe-12 mr-2"></span>Create</button>
                            </div>
                        </div>
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
                        <!--  modal -->
                        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog"
                            aria-labelledby="eventModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="varyModalLabel">Tambah Pegawai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form action="/create/register" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="eventNote" class="col-form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="eventTitle"
                                                    placeholder="Masukan Nama Lengkap" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="eventTitle" class="col-form-label">NIK</label>
                                                <input type="number" class="form-control" id="eventTitle" placeholder="Masukan NIK"
                                                    name="nik">
                                            </div>
                                            <div class="form-group">
                                                <label for="eventNote" class="col-form-label">Email</label>
                                                <input type="email" class="form-control" id="eventTitle"
                                                    placeholder="Masukan Email" name="email">
                                            </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="submit" class="btn mb-2 btn-primary col-12">Create</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!--  modal -->

                        <!-- table -->
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table table-borderless" id="example">
                                    <thead>
                                        <tr>
                                            {{-- <th>
                                                <input type="checkbox" name="" id="select_all_id">
                                            </th> --}}
                                            <th>Nama</th>
                                            <th>Nik</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            <tr id="employe_id{{ $item->id }}">
                                                {{-- <td>
                                                    <input type="checkbox" name="id" id="" class="checkbox_id"
                                                        value="{{ $item->id }}">
                                                </td> --}}

                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nik }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="" data-toggle="modal"
                                                            data-target="#edit{{ $item->id }}">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="/admin/hapus/{{ $item->id }}">Remove</a>
                                                    </div>
                                                </td>

                                                <!--  modal -->
                                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="eventModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Edit Pegawai
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <form action="/update/pegawai/{{ $item->id }}" method="post"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="eventNote" class="col-form-label">Nama
                                                                            Lengkap</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Nama Lengkap"
                                                                            name="name" value="{{ $item->name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="eventTitle"
                                                                            class="col-form-label">NIK</label>
                                                                        <input type="number" class="form-control"
                                                                            placeholder="NIK"
                                                                            name="nik" value="{{ $item->nik }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="eventNote"
                                                                            class="col-form-label">Email</label>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Email"
                                                                            name="email" value="{{ $item->email }}">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-between">
                                                                <button type="submit"
                                                                    class="btn mb-2 btn-primary col-12">Update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> <!--  modal -->
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div>
@endsection
