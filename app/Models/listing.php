<?php

namespace App\Models;

class Listing {
    // protected $fillable = ['',''];
    public static function all(){
        return [
                [
                    'id' => 1,
                    'title' =>'rere'
                ],[
                    'id' => 2,
                    'title' => 'pp'
                ]
                ];
    }
    public static function find($id) {
        $listings = self::all();
        foreach ($listings as $s) {
            if ($s['id'] == $id)
                return $s;
        }
    }
    public function scopeFilter($query, array $filters){
        if ($filters['tag'] ?? false){
            $query->where('title', 'like', '%'.request('tag').'%');


        }
        if ($filters['search'] ?? false){
            $query->where('title','like','%'.request('tag').'%')
            ->orWhere('description','like','%'.request('search').'%');
        }

    }
    // public function user(){
    //     return $this->belongsTo(User::class,'user_id');
    // }
}