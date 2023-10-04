@extends('pegawai.layouts')
@section('content')
    <div class="wrapper">
        <main role="main" class="main-content py-0 mt-0 pt-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="h4 mb-0 page-title">Profile</h2>
                            </div>

                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col col-lg-6 mb-4 mb-lg-0">
                                        @if (Session::get('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @endif
                                        @if (Session::get('error'))
                                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                        @endif
                                        <div class="card mb-3 shadow" style="border-radius: .5rem;">
                                            <div class="row g-0">
                                                <div class="col-md-4 gradient-custom text-center text-white"
                                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                    @if (!empty(Auth::user()->foto_profile))
                                                        @php
                                                            $path = Storage::url('uploads/foto_profile/' . Auth::user()->foto_profile);
                                                        @endphp
                                                        <img src="{{ url($path) }}"
                                                            alt="Avatar" class="img-fluid my-5 rounded-circle"
                                                            style="width: 70%; height:45%;" /><br />
                                                    @else
                                                        <img src="{{ asset('dashboard') }}/assets/images/profil.png"
                                                            alt="Avatar" class="img-fluid my-5"
                                                            style="width: 80px;" /><br />
                                                    @endif

                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#eventModal"><span
                                                            class="fe fe-edit fe-12 mr-2"></span>Edit</button>
                                                    <!--  modal -->
                                                    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog"
                                                        aria-labelledby="eventModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Edit Profile
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body p-4">
                                                                    <form action="/user/update/{{ Auth::user()->id }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                id="eventTitle"
                                                                                value="{{ Auth::user()->name }}"
                                                                                name="name">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="number" class="form-control"
                                                                                id="eventTitle"
                                                                                value="{{ Auth::user()->nik }}"
                                                                                name="nik" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="email" class="form-control"
                                                                                id="eventTitle"
                                                                                value="{{ Auth::user()->email }}"
                                                                                name="email" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="password" class="form-control"
                                                                                id="eventTitle"
                                                                                placeholder="Masukan password baru"
                                                                                name="password"
                                                                                {{-- value="{{ Auth::user()->password }}" --}}
                                                                                >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label">Upload Menu</label>
                                                                                <div class="input-group col-xs-12">
                                                                                    <input type="text"
                                                                                        class="form-control file-upload-info"
                                                                                        disabled placeholder="Upload Image">
                                                                                    <span class="input-group-append">
                                                                                        <input type="file"
                                                                                            name="foto_profile" id="foto_profile"
                                                                                            width="" height=""
                                                                                            class="form-control">
                                                                                    </span>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-between">
                                                                    <button type="submit"
                                                                        class="btn mb-2 btn-primary col-12">Simpan</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> <!--  modal -->
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-4">
                                                        <h6>Information Profile</h6>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-6 mb-3">
                                                                <h6>Nama</h6>
                                                                <p class="text-muted">{{ Auth::user()->name }}</p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Nik</h6>
                                                                <p class="text-muted">{{ Auth::user()->nik }}</p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>Email</h6>
                                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div </div> <!-- .col-12 -->
                        </div> <!-- .row -->
                    </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div>
@endsection
