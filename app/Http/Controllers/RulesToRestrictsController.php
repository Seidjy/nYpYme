<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RulesToRestrictsController extends Controller
{
    //index
	protected function index(array $data)
    {
        $data = RulesToRestricts::latest()->paginate(5);
        return view('rulesToRestricts.index',compact('articles'));
	}
	//create
    protected function create()
    {
        return view('RulesToRestricts.create');
    }
    //store
    protected function store(Request $request)
    {
	        RulesToRestricts::create($request->all());
	        return redirect()->route('rulesToRestricts.index')
	                        ->with('success','rulesToRestricts created successfully');

	}
    //show
    protected function show($id)
    {
        $article = RulesToRestricts::find($id);
        return view('rulesToRestricts.show',compact('article'));
    }
    //edit
    public function edit($id)
    {
        $article = RulesToRestricts::find($id);
        return view('rulesToRestricts.edit',compact('article'));
    }
    //update
    public function update(Request $request, $id)
    {
        RulesToRestricts::find($id)->update($request->all());
        return redirect()->route('rulesToRestricts.index')
                        ->with('success','rulesToRestricts updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
    	return RulesToRestricts::destroy([
	        RulesToRestricts::find($id)->delete();
	        return redirect()->route('rulesToRestricts.index')
	                        ->with('success','rulesToRestricts deleted successfully');
        ]);
    }
}
