@extends('admin.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('dashboard') }}/images/bg2.webp" class="d-block w-100"
                                                alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('dashboard') }}/images/bg.jpg" class="d-block w-100"
                                                alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('dashboard') }}/images/bg3.jpg" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
