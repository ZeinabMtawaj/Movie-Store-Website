<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Imports\MoviesImport;
use App\Imports\RatingsImport;
use Maatwebsite\Excel\Facades\Excel;

class RatingController extends Controller
{
    public function store(Request $request, Movie $movie){
        $formFields = $request->validate([
            'rating' =>'numeric|min:1|max:5|required'
        ]);
        $formFields['user_id'] = auth()->id();
        $formFields['movie_id'] = $movie->id;
         Rating::create($formFields);
        return back()->with('message','rating created successfully');
    }

    public function update(Request $request, $rating_id){
        $formFields = $request->validate([
            'rating' =>'numeric|min:1|max:5|required'
        ]);
        $formFields['user_id'] = auth()->id();
        
        $rating = Rating::find($rating_id);
        $formFields['movie_id'] = $rating->movie_id;
        $rating->update($formFields);
        return back()->with('message','rating updated successfully');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function destroy($rating_id){
        $rating = Rating::find($rating_id);
        $rating->delete();
        return back()->with('message','rating deleted successfully');
    }

    public function import(){
        return view('import',[
            'thing' => 'rating'
        ]);
    }

    public function upload(Request $request){
        Excel::import(new RatingsImport,$request->file);
        return redirect('/')->with('message','new movies');       
    }
}
