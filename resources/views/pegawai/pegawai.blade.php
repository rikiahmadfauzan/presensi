@extends('pegawai.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="container py-lg-5 col-4">
                <div class="text-center">
                    <h3><label for="" id="clock"></label></h3>
                    <a class="p-5" href="/cekin"><button class="btn btn-success">Check In</button></a>
                    <a class="p-5" href="/cekout"><button class="btn btn-warning">Check Out</button></a>
                    <a href="/logout"><button class="btn btn-sm btn-danger">Logout</button></a>

                </div>
            </div>
        </main>
    </section>
@endsection
