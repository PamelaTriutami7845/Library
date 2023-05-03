<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function api()
    {
        $Member = Member::all();
        $datatables = dataTables()
            ->of($Member)
            ->addIndexColumn();

        return $datatables->make(true);
    }
    public function store(Request $request)
    {
        //

        Member::create($request->all())->get();

        return redirect('member');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $Member = Member::find($id);
        $Member->name = $request->name;
        $Member->gender = $request->gender;
        $Member->phone_number = $request->phone_number;
        $Member->address = $request->address;
        $Member->email = $request->email;
        $Member->save();
        return redirect('member');
    }

    public function destroy($id)
    {
        //

        $member = Member::find($id);
        $member->delete();
        return redirect('member');
    }
}
