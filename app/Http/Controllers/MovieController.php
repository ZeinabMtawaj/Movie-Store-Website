<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use App\Models\Vote;
use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Imports\MoviesImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function import(){
        return view('import',[
            'thing' => 'movie'
        ]);
    }
    public function upload(Request $request){
        Excel::import(new MoviesImport,$request->file);
        return redirect('/')->with('message','new movies');       
    }
    public function index(){
        #here
        $movie_ids =[];
        $movie_posters = [];

        if (auth()->user()){
        $user = User::find(auth()->user()->id);
        // dd($user);
        $recommendations = json_decode($user->recommended);
        if($recommendations){
        shuffle($recommendations);
        $i=0;
        foreach($recommendations as $recommendation){
            $movie = Movie::find($recommendation);
            $movie_ids[] = $movie->id;
            $movie_posters[] = $movie->poster_path;
            // if ($i==10)
            // break;
            $i = $i+1;
        }
    }
    }
        $voted = Vote::where('user_id', '=', auth()->id());
        $votes = $voted->get();
        $movies_vote = [];
        foreach($votes as $vote){
            $movies_vote[] = $vote->movie_id;
        }

        return view('movies.index',[
            // 'movie' =>movie::latest()->filter(request(['tag','search']))->get()
            'movie' =>Movie::latest()->filter(request(['genre','search']))->paginate(24),
            'paginate' =>true,
            'movies_vote' => $movies_vote,
            'movie_ids'=>$movie_ids,
            'movie_posters' => $movie_posters
        ]);
       }
       public function similar_content(Movie $movie){
           //vote
        $voted = Vote::where('user_id', '=', auth()->id());
        $votes = $voted->get();
        $movies_vote = [];
        foreach($votes as $vote){
            $movies_vote[] = $vote->movie_id;
        }

        ////recommendation user_depends
        $movie_ids = [];
        $movie_posters = [];


        /////similar
        $similar_movies = [];
        $similars = json_decode($movie->similar_content);
        // var_dump($similars);
           foreach($similars as $sim){
            $similar_movies[] =Movie::where('id', '=', $sim)->first();
           }
        return view('movies.index',[
            'movie' =>$similar_movies,
            'paginate' => false,
            'movies_vote' => $movies_vote,
            'movie_ids'=>$movie_ids,
            'movie_posters' => $movie_posters
        ]);
       }


       //single movie
       public function show($id){
        $movie = Movie::find($id);
        // $movie_rating = Rating::where('movie_id','=',$id)->get();
        $user_rating = Rating::where('user_id', '=', auth()->id())
        ->where('movie_id', '=',$id )
        ->first();
        $isRated = -1;
        $btn = 'Post';
        $path = $movie->id;
        if ($user_rating){
        $isRated = $user_rating->rating;
        $btn = 'Edit';
        $path = $user_rating->id;
        }
        if ($movie){
        return view('movies.show',[
            'movie' => $movie,
            'rating' => $isRated,
            'btn' => $btn,
            'path' =>$path,

        ]);
        }
        else{
            abort('404');
        }
    
       }


       public function create(){
           return view('movies.create',[
               'genres' =>['Action', 'Adventure','Comedy', 'Fantasy', 'Science Fiction', 'Drama', 'Romance', 'Horror']
           ]);
       }
    
       public function store(Request $request){
           $formFields = $request->validate([
               'original_title' => 'required',
               'overview' => 'required'
           ]);
           $formFields['vote_count'] = 0;
           $has_genres =false;
           foreach($request->genres as $genre)
           {
               $p['name']= $genre;
               $genres_film[]=$p;
               $has_genres=true;

           }
           if ($has_genres==true)
           $formFields['genres'] = json_encode($genres_film);

           if ($request->hasFile('logo')){
            $formFields['poster_path']= $request->file('logo')->store('logos','public');
           }
           $genress = json_decode($formFields['genres']);
           $z ="";
           foreach ($genress as $genre){
            $z =$z.$genre->name." ";
           }
           $z=rtrim($z," ");
           
        Movie::create($formFields);
        $last = DB::table('movies')->latest()->first();
        File::put('c:/Users/SONY/Desktop/my_model/movie.txt',  $formFields['overview']."\n".$z."\n".$formFields['original_title']."\n". $last->id);
        $output_data=exec('python c:/Users/SONY/Desktop/my_model/tfidf.py');
        $recommend['similar_content'] = $output_data;
        // var_dump($recommend);
        $movie=Movie::find($last->id);
        $movie->update($recommend);
        // var_dump($movie['similar_content']);
        return redirect('/')->with('message','movie created successfully');
       }
    
       public function edit(Movie $movie){
           return view('movies.edit',[
               'movie' => $movie,
               'genres' =>['Action', 'Adventure','Comedy', 'Fantasy', 'Science Fiction', 'Drama', 'Romance', 'Horror']

           ]);
    
       }
    
       public function update(Request $request, Movie $movie){
        $formFields = $request->validate([
            'original_title' => 'required',
            'overview' => 'required'   
            
    
        ]);
        if ($request->hasFile('logo')){
         $formFields['logo']= $request->file('logo')->store('logos','public');
        }
        // $formFields['vote_count'] = $movie['vote_count'];
        $movie->update($formFields);
        return back()->with('message','movie updated successfully');
    }
        public function destroy(Movie $movie){
            $movie->delete();
            return back()->with('message','movie deleted successfully');
        }

        public function manage(){
            return view('movies.manage',[
                'movies' => Movie::latest()->paginate(10)
            ]);
        }


        // public function manage(){
        //     return view('movies.manage',[
        //         'movies' => auth()->user()->movies->get()
        //     ]);
        // }

        public function ratings(){
            return $this->hasMany(Rating::class, 'user_id');
        }

        public function download($id)
    {
    $movie = Movie::where('id', $id)->firstOrFail();
    $pathToFile = storage_path('app/movies/' . $movie->id.'.mp4');
    // return response()->download($pathToFile);

    // Session::flash('download.in.the.next.request', $pathToFile);
    // return  back()->with('message','downloading....');


    // $file = Storage::disk('public')->get($pathToFile);
    return response()->download($pathToFile);


    // return Storage::download($pathToFile);


    // back()->with('message','downloading....');

    }
    public function vote(Movie $movie){
        $voted = Vote::where('user_id', '=', auth()->id())
        ->where('movie_id', '=',$movie->id )
        ->first();
        if ($voted)
        {
        $vote = $movie->vote_count;
        $formFields['vote_count'] = $vote-1;
        $movie->update($formFields);
        $voted->delete();
        }
        else
        {

            $vote = $movie->vote_count;
        $formFields['vote_count'] = $vote+1;
        $movie->update($formFields);
            $forms['user_id']=auth()->id();
            $forms['movie_id'] =$movie->id;
        Vote::create($forms);

        }

        return back();
        
    }
}
