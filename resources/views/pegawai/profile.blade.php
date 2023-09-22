@extends('pegawai.layouts')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3 shadow-sm" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ asset('dashboard') }}/images/profil.png" alt="Avatar" class="img-fluid my-5"
                                    style="width: 80px;" />
                                <i class="far fa-edit mb-5"></i><br>
                                <button type="button" class="btn btn-danger mt-2 btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Edit profile
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-black">Edit Profile</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="forms-sample" action="/user/update/{{ Auth::user()->id }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name"
                                                            id="name" value="{{ Auth::user()->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email"
                                                            id="email" value="{{ Auth::user()->email }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" placeholder="Password">
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-danger col-12 me-2">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
        </div>
    </section>
@endsection
