<?php

namespace App\Http\Controllers;

use App\RulesToAchieve;
use Illuminate\Http\Request;

class RulesToAchievesController extends Controller
{
	//index
	protected function index(array $data)
    {
    	return RulesToAchieves::index([
	        $data = RulesToAchieves::latest()->paginate(5);
	        return view('rulesToAchieves.index',compact('articles'));
	    ]);
	}
	//create
    protected function create()
    {
        return view('RulesToAchieves.create');
    }
    //store
    protected function store(Request $request)
    {
        RulesToAchieves::create($request->all());
            return redirect()->route('rulesToAchieves.index')
	                        ->with('success','rulesToAchieves created successfully');

	}
    //show
    protected function show($id)
    {
        $article = RulesToAchieves::find($id);
        return view('rulesToAchieves.show',compact('article'));
    }
    //edit
    public function edit($id)
    {
        $article = RulesToAchieves::find($id);
        return view('rulesToAchieves.edit',compact('article'));
    }
    //update
    public function update(Request $request, $id)
    {
        RulesToAchieves::find($id)->update($request->all());
        return redirect()->route('rulesToAchieves.index')
                        ->with('success','rulesToAchieves updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        RulesToAchieves::find($id)->delete();
	        return redirect()->route('rulesToAchieves.index')
	        ->with('success','rulesToAchieves deleted successfully');

    }
}