<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }


    public function store(Request $request){
        $formFields = $request->validate([
               'name' => ['required', 'min:3'],
               'email' => ['required','email',Rule::unique('users','email')],
               'password' =>['required', 'confirmed','min:6'],
               'age' =>'numeric|min:3|max:150',
               'gender' => 'required'
           ]);

           $formFields['password'] = bcrypt($formFields['password']);
           if ($formFields['gender'] == 'Male')
                $formFields['gender'] = 'M';
            else
                $formFields['gender'] = 'F';
            $formFields['role_id'] =2;
            // weigthed mean rating
            // $formFields['recommended'] =json_encode([318,858,527,912,2019,2959,296,593,260,1252,913,1213,4226,903,608,1262,923,1267,745,1250]);
           $user = User::create($formFields);
            auth()->login($user);
           return redirect('/')->with('message','user created and logged in');
       }

       public function logout(Request $request){
           auth()->logout();//remove authentication session
           $request->session()->invalidate();
           $request->session()->regenerateToken();
           return redirect('/')->with('message','you have been logged out');

       }
       public function login(){
        return view('users.login');

       }
       public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' =>'required'   
        ]);

        if (auth()->attempt($formFields)){
          $request->session()->regenerate();
          return redirect('/')->with('message','You are logged in');
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials' 
        ])->onlyInput('email');
    }

    public function import(){
        return view('import',[
            'thing' => 'user'
        ]);
    }
    public function upload(Request $request){
        Excel::import(new UsersImport,$request->file);
        return redirect('/')->with('message','new users');       
    }

    
    public function manage(){
        return view('users.manage',[
           'users' =>User::latest()->paginate(6) 
        ]);
    }






       //single movie
       public function show($id){
        $user = User::find($id);
        if ($user){
        return view('users.show',[
            'user' =>$user
        ]);
        }
        else{
            abort('404');
        }
    
       }

    
       public function edit(User $user){
           return view('users.edit',[
               'user' => $user
           ]);
    
       }
    
       public function update(Request $request, User $user){
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => 'required','email',
                // 'password' =>['required', 'confirmed','min:6'],
                'age' =>'numeric|min:3|max:150',
                'gender' => 'required'
            ]);
 
            // $formFields['password'] = bcrypt($formFields['password']);
            if ($formFields['gender'] == 'Male')
                 $formFields['gender'] = 'M';
             else
                 $formFields['gender'] = 'F';
             $formFields['role_id'] = 2;
        $user->update($formFields);
        return back()->with('message','user updated successfully');
    }
        public function destroy(User $user){
            $user->delete();
            return back()->with('message','user deleted successfully');
        }

        public function getRatings(User $user){
            // $r= User::with('ratings')->get();
            $ratings =$user->ratings;
            $movies_ids =[];
            $movies_titles =[];
            foreach($ratings as $rating){
                $id = $rating->movie_id;
                $movies_ids[] = $id;
                $movie = Movie::find($id);
                $movies_titles[] = $movie->original_title;

            }
            return view('users.ratings',[
                'ratings' => $ratings,
                'movies_ids' => $movies_ids,
                'movies_titles' => $movies_titles

            ]);

        }
        public function updateRecommendation(Request $request, User $user){
            $formFields=  $request->validate([
                'recommended'=>'required'
            ]);
                // dd($formFields);
            $user->update($formFields);
        return back();

        }

        public function edit_role( User $user){
            return view('users.editrole',[
                'user' => $user
            ]);
     


        }
        public function update_role(Request $request, User $user){

            $formFields=  $request->validate([
                'role_id'=>'required'
            ]);

            $user->update($formFields);
            return redirect('http://127.0.0.1:8000/users/manage')->with('message','user updated successfully');
   

        }

}
