<?php

namespace App\Imports;

use App\Models\Rating;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class RatingsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            return new Rating([
                "user_id" => $row['user'],
                "movie_id" => $row['movie'],
                // "spoken_language" => $row["spoken_language"],
                "rating" => $row['rating']
        
            ]);
      
    }
}
