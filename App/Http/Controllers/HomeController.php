<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\User;
use App\Models\Transaction;
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
        // $members = Member::with('user')->get();
        // $books =::with('publisher')->get();
        // @publishers = publisher::all();

        // no 1
        $data = Member::select('*')
            ->join('users', 'users.member_id', '=', 'members.id')
            ->get();

        // no 2
        $data2 = Member::select('*')
            ->leftjoin('users', 'users.member_id', '=', 'members.id')
            ->where('users.id', null)
            ->get();

        // no 3
        $data3 = Transaction::select('members.id', 'members.name')
            ->rightjoin('members', 'members.id', '=', 'transactions.member_id')
            ->where('transactions.member_id', null)
            ->get();

        // no 4
        $data4 = Member::select(
            'members.id',
            'members.name',
            'members.phone_number'
        )
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->orderBy('members.id', 'asc')
            ->get();

        // no 5
        $data4 = Member::select(
            'members.id',
            'members.name',
            'members.phone_number'
        )
            ->Where('members.id', 'asc')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->orderBy('members.id', 'asc')
            ->get();

        // var_dump($data);
        return view('home');
    }
}
