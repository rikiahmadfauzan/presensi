<?php

namespace App\Exports;

use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class Data implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function query()
    {
        // $nik = Auth::user()->nik;
        // $data =  Presensi::query()->where('nik', $nik);
        return Presensi::query();
    }
    public function map($presensi): array{
        return [
            $presensi->name,
            $presensi->nik,
            $presensi->tgl,
            $presensi->jam_in,
            $presensi->jam_out,
            $presensi->lokasi_in,
            $presensi->lokasi_out,
            $presensi->foto_in,
            $presensi->foto_out,
        ];
    }
    public function headings(): array
    {
        return [
            'NAMA',
            'NIK',
            'TANGGAL',
            'JAM MASUK',
            'JAM KELUAR',
            'LOKASI MASUK',
            'LOKASI KELUAR',
            'FOTO MASUK',
            'FOTO KELUAR',
        ];
    }
}
