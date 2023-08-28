<?php

namespace App\Exports;

use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class Data implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $nik = Auth::user()->nik;
        return  Presensi::all()->where('nik', $nik);
    }
}
