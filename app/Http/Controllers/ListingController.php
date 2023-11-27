<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{//all movies
    public function index(){
        return view('listings.index',[
            // 'listing' =>Listing::latest()->filter(request(['tag','search']))->get()
            'listing' =>Listing::all()
        ]);
       }
       //single movie
       public function show($id){
        $listing = Listing::find($id);
        if ($listing){
        return view('listings.show',[
            'movie' =>$listing
        ]);
        }
        else{
            abort('404');
        }
    
       }
       public function create(){
           return view('listings.create');
       }
    
       public function store(Request $request){
           $formFields = $request->validate([
            //    'title' => ['required', Rule::unique('listings','company')],
            //    'email' => ['required','email'],
               'company' =>'required'
    
               
    
           ]);
        //    $formFields['user_id'] = auth()->id();
           if ($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
           }
        //    Listing::create($formFields);
           return redirect('/')->with('message','listing created successfully');
       }
    
       public function edit(Listing $listing){
           return view('listings.edit',[
               'listing' => $listing
           ]);
    
       }
    
       public function update(Request $request, Listing $listing){
           if ($listing->user_id != auth()->id()){
                abort('403','Unauthorized Action');
           }
        $formFields = $request->validate([
         //    'title' => ['required', Rule::unique('listings','company')],
         //    'email' => ['required','email'],
            'company' =>'required'
    
            
    
        ]);
        if ($request->hasFile('logo')){
         $formFields['logo']= $request->file('logo')->store('logos','public');
        }
     //    $listing->update($formFields);
        return back()->with('message','listing updated successfully');
    }
        public function destroy(Listing $listing){
            if ($listing->user_id != auth()->id()){
                abort('403','Unauthorized Action');
           }
            // $listing->delete();
            return redirect('/')->with('message','listing deleted successfully');
        }

        public function manage(){
            return view('listings.manage',[
                'listings' => auth()->user()->listings->get()
            ]);
        }
}
