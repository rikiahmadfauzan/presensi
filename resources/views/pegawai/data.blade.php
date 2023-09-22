@extends('pegawai.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="table-responsive shadow-sm">
                <table id="recent-purchases-listing" class="table">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>NIK</th>
                            <th>TANGGAL</th>
                            <th>JAM MASUK</th>
                            <th>JAM KELUAR</th>
                            <th>FOTO MASUK</th>
                            <th>FOTO KELUAR</th>
                        </tr>
                    </thead>
                    @foreach ($presensi as $item)
                        @php
                            $foto_in = Storage::url('uploads/evidence/' . $item->foto_in);
                            $foto_out = Storage::url('uploads/evidence/' . $item->foto_out);
                        @endphp
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->tgl }}</td>
                            <td>{{ $item->jam_in }}</td>
                            <td>{!! $item->jam_out != null ? $item->jam_out : '<span class="text-danger">Belum Absen</span>' !!}</td>
                            <td><img class="avatar" src="{{ url($foto_in) }}" /></td>
                            <td>
                                @if ($item->jam_out != null)
                                    <img class="avatar" src="{{ url($foto_out) }}" />
                                @else
                                    <span class="text-danger">Belum Foto</span>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </main>
    </section>
@endsection
