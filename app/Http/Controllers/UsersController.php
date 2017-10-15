<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        //dd($id);     //2
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        $count_microposts = $user->microposts()->count();
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function followings($id)
    {
        //dd($id);    //2
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        //dd($id);       //2
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
    
    
    
    public function oki_followings($id)
    {
        //dd($id);          //"1"
        $user = User::find($id);
        //dd($user);  
        //$oki_followings = $user->oki_followings();
        //$oki_followings = $user->microposts()->oki_followings()->get();
        //$oki_followings = $user->oki_followings()->microposts();
        $oki_followings = $user->oki_followings()->paginate(10);
        //dd($oki_followings);
        $count_oki_followings = $user->oki_followings()->count();
        //dd($count_oki_followings);  //3
        
        
        $data = [
            'user' => $user,
            'microposts' => $oki_followings,
        ];
        //  dd($oki_followings);
         //dd($data->toArray());
         
        //$data += $this->counts($oki_followings);
        //dd($data);
        return view('users.oki_followings', $data);
    }
    
    
    
    /*
    public function oki_followers($id)
    {
        $user = User::find($id);
        $oki_followers = $user->oki_followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $oki_followers,
        ];
        
        $data += $this->counts($user);
        
        return view('users.oki_followers', $data);
    }
    */
}