<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * create a new controller instance.
     *
     * @retrun void
     */
    public function function_construct()
    {
        $this->middleware('auth');
    }
    /**
     *show the application dashboard.
     *
     * @reaturn /illuminate\contracts\support\renderable
     */
    public function index()
    {
        // $members = Member::with('user')->get();

        // return $members;
        // return view('home');
    }
}
