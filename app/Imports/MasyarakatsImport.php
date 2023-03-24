<?php

namespace App\Imports;

use App\Models\Masyarakat;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;

class MasyarakatsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
            '*.no_kk' => 'required',
            '*.nik' => 'required',
            '*.nama' => 'required',
            '*.tempat_lahir' => 'required',
            '*.tanggal_lahir' => 'required',
            '*.jenis_kelamin' => 'required',
            '*.jalan_desa' => 'required',
            '*.rt' => 'required',
            '*.rw' => 'required',
            '*.disanilitas' => 'required',
            '*.keterangan' => 'required',
        ])->validate();
        // dd($row[10]);
        return new Masyarakat([
            'no_kk'     => $row[1],
            'nik'       => $row[2],
            'nama'      => $row[3],
            'tempat_lahir'  => $row[4],
            'tangal_lahir'  => $row[5],
            'jenis_kelamin'  => $row[6],
            'jalan/desa'    => $row[7],
            'rt'      => $row[8],
            'rw'      => $row[9],
            'disabilitas'      => $row[10],
            'keterangan' => $row[11],
        ]);
    }
}
