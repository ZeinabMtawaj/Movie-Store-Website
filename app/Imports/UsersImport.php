<?php

namespace App\Imports;

use App\Models\User;
// use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker\Factory as Faker;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $f = Faker::create();
        // dd($f);
        return new User([
            "id" => $row['id'],
            "role_id" =>2,
            "name" =>  $f->userName,
            "password" => Hash::make('password'), 
            // 'email' => preg_replace('/@example\..*/', '@domain.com', $f->unique()->safeEmail),
            'email' => $row['id'].'@example.com',
            'age' =>rand(3,150),
            'gender' => $f->randomElement(['M','F'])
            //
        ]);
    }
}
