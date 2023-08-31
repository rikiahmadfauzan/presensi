@extends('admin.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">DATA PEGAWAI</p>
                                <div class="table-responsive">
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
