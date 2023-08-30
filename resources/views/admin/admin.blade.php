@extends('admin.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h3>Selamat Datang Diahaman Admin</h3>
                                <form action="/admin/create" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="nama" id="nama">
                                    <input type="file" name="foto_in" id="foto_in"><br>
                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
