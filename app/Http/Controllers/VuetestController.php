<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VuetestController extends Controller
{
    //
    public function index () 
    {
        $user = Auth::user();
        // dd($user);
        return view('vuetest', ['user' => $user]);
    }
    public function json () 
    {
        $tests = array(
            array('id' => 0, 'title' => 'blue'),
            array('id' => 15, 'title' => 'red'),
            array('id' => 2, 'title' => 'green'),
            array('id' => 3, 'title' => 'yellow')
        );
        
        return response()->json($tests);
        // return view('vuetest', ['tests' => $tests]);
    }
}
