<?php

namespace App\Http\Controllers;
use Auth;

use App\Models\Workshop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $workshops = Workshop::where([
            ['status_id', '=', '1'],
            ['user_id', '=', $user_id],
        ])->get();
        return view('home',['workshops'=>$workshops]);
    }
}
