<?php

namespace App\Imports;

use App\Models\Movie;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MoviesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Movie([
            "vote_count" => $row["vote_count"],
            "original_title" => $row["original_title"],
            // "spoken_language" => $row["spoken_language"],
            "poster_path" => 'logos/'.$row["id"].'.jpg',
            "overview" => $row["overview"],
            "id" => $row["id"],
            "genres" => $row["genres"],
            "similar_content" =>$row["similar_content"]
        ]);
    }
}
