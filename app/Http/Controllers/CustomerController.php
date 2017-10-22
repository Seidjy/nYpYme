<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected function index()
    {
        $members = Customer::latest()->paginate(10);
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
        Customer::create($request->all());
        return redirect()->route('goals.index')
                ->with('success','goals created successfully');
    }
    //show
    protected function show($id)
    {
        $members = Customer::find($id);
        return view('goals.show',compact('members'));
    }
    //edit
    public function edit($id)
    {
        $members = Customer::find($id);
        return view('goals.edit',compact('members'));
    }
    //update
    public function update(Request $request, $id)
    {
        Customer::find($id)->update($request->all());
        return redirect()->route('goals.index')
                        ->with('success','goals updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->
        route('goals.index')->
        with('success','goals deleted successfully');
    }
}
