<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * CRUD
     * Laravel - JQuery - Ajax
     */
    public function index()
    {
        return view('show');
    }

    public function getMembers()
    {
        $members = Member::all();

        return view('memberslist', compact('members'));
    }

    public function save(Request $request)
    {
        if($request->ajax()) {
            // created new member
            $member = new Member();
            $member->firstname = $request->input('firstname');
            $member->lastname = $request->input('lastname');
            // saved member
            $member->save();

            return response($member);
        }
    }

    public function delete(Request $request){
        if ($request->ajax()){
            Member::destroy($request->id);
        }
    }

    public function update(Request $request){
        if ($request->ajax()){
            $member = Member::find($request->id);
            $member->firstname = $request->input('firstname');
            $member->lastname = $request->input('lastname');

            $member->update();
            return response($member);
        }
    }
}
