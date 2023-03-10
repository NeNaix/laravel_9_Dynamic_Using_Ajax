<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class CustomerImporter implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new User([
            'fname' => $row['first_name'],
            'lname' => $row['last_name'],
            'addr' => $row['address'],
            'img' => 'storage/images/tao.png',
            'role' => 'customer',
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }
}
