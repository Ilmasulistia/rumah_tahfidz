<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
 
    public function index()
    {
        $group = Group::all();

        return view('group.index', compact('group'));
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        Group::create([
            'group_id' => $request->group_id,
            'start_time' => $request->start_time,
            'end_time' =>$request->end_time,
            
        ]);
        return redirect()->route('group.index');
    }

    public function show(Group $group)
    {
        //
    }

    public function edit($group_id)
    {
        $group = Group::where('group_id', $group_id)->first();
        // dd($teacher);
        return view('group.edit',compact('group','group_id'));
    }

    public function update(Request $request, Group $group)
    {
        //
    }

    public function delete($group_id)
    {
        $group = Group::find($group_id)->delete();
        return redirect('/datakelompok')->with('sukses','Data Berhasil dihapus');
    }
}
