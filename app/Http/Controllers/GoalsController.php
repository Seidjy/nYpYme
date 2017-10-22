<?php

namespace App\Http\Controllers;

use App\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    //index
    protected function index()
    {
        $members = Goals::latest()->paginate(10);
        return view('goals.index',compact('members'));
    }
    //create
    protected function create()
    {
        return view('goals.create');
    }
     //store
    protected function store(Request $request)
    {
        Goals::create($request->all());
        return redirect()->route('goals.index')
                ->with('success','goals created successfully');
    }
    //show
    protected function show($id)
    {
        $members = Goals::find($id);
        return view('goals.show',compact('members'));
    }
    //edit
    public function edit($id)
    {
        $members = Article::find($id);
        return view('goals.edit',compact('members'));
    }
    //update
    public function update(Request $request, $id)
    {
        Goals::find($id)->update($request->all());
        return redirect()->route('goals.index')
                        ->with('success','goals updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        Goals::find($id)->delete();
        return redirect()->
        route('goals.index')->
        with('success','goals deleted successfully');
    }
}
