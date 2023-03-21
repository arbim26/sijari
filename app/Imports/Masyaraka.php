<?php

namespace App\Imports;

use App\Models\Masyarakat;
use Maatwebsite\Excel\Concerns\ToModel;

class Masyaraka implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Masyarakat([
            'no_kk'     => $row[1],
            'nik'       => $row[2],
            'nama'      => $row[3],
            'tempar_lahir'  => $row[4],
            'tangaal_lahir'  => $row[5],
            'jenis_kelamin'  => $row[6],
            'jalan/desa'    => $row[7],
            'rt'      => $row[8],
            'rw'      => $row[9],
        ]);
    }
}
