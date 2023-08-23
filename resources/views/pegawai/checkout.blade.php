@extends('pegawai.layouts')
@section('content')
<section>
    <main id="main">
        <div class="container py-lg-5 col-4">
            <div class="text-center">
                <h3 class="bg-danger">Check Out</h3>
            </div>
            <form class="forms-sample" action="/createPegawai" method="post" enctype="multipart/form-data">
                @csrf
                <div class="text-center">
                </div>
                <div class="form-group py-2">
                    {{-- <label>Nama</label> --}}
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama">
                </div>
                <div class="form-group py-2">
                    {{-- <label>Nik</label> --}}
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan Nik">
                </div>
                <div class="form-group py-2">
                    {{-- <label>Lokasi</label> --}}
                    <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukan Lokasi">
                </div>
                {{-- <div class="form-group py-2">

                    <input type="date" class="form-control" name="lokasi" id="lokasi" placeholder="Masukan Lokasi">
                </div> --}}
                <div class="form-group py-2">
                    {{-- <label">Evidence</label> --}}
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Evidence">
                            <span class="input-group-append">
                                <input type="file" name="evidence" id="evidence" width="" height=""
                                    class="form-control bg-danger">
                            </span>
                        </div>
                </div>
                <br>
                <button type="submit" class="btn btn-danger form-control">Submit</button>
            </form>
        </div>
    </main>
</section>
@endsection
