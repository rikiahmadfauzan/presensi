@extends('pegawai.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="container-scroller">
                <div class="container-fluid page-body-wrapper full-page-wrapper">
                    <div class="content-wrapper d-flex align-items-center auth px-0">
                        <div class="row w-100 mx-0">
                            <div class="col-lg-4 mx-auto">
                                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                    <div class="brand-logo">
                                        {{-- <img src="{{ asset('dashboard') }}/images/logo.svg" alt="logo"> --}}
                                    </div>
                                    <div class="mt-2">
                                        <a href="cekin">
                                            <button class="btn btn-sm mb-3 btn-primary col col-12">Absen</button>
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <a href="/logout">
                                            <button class="btn btn-sm mb-3 btn-primary col col-12">Logout</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
