<?php

namespace App\Imports;

use App\Hospital;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class HospitalsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Hospital([
            'name'=>$row[1],
            'province'=>$row[2],
            'district'=>$row[3],
            'division'=>$row[4],
            'location'=>$row[5],
            'sub_location'=>$row[6],
            'level'=>$row[7],
            'agency'=>$row[8],
            'latitude'=>$row[9],
            'longitude'=>$row[10],
        ]);
    }
}
