<?php

namespace app\Http\Controllers;

use App\RulesToAwards;
use Illuminate\Http\Request;

class RulesToAwardsController extends Controller
{
	//index
	protected function index(array $data)
    {
    	return RulesToAwards::index([
	        $data = RulesToAwards::latest()->paginate(5);
	        return view('rulesToAwards.index',compact('articles'));
	    ]);
	}
	//create
    protected function create()
    {
        return view('RulesToAwards.create');
    }
    //store
    protected function store(Request $request)
    {
    	return RulesToAwards::store([
	        request()->validate([
	            'name' => $data['name'],
            	'idTypeAward' => $data['idTypeAward'],
            	'amount' => $data['amount'],
	        ]);
	        RulesToAwards::create($request->all());
	        return redirect()->route('rulesToAwards.index')
	                        ->with('success','rulesToAwards created successfully');
	    ]);
	}
    //show
    protected function show($id)
    {
        $article = RulesToAwards::find($id);
        return view('rulesToAwards.show',compact('article'));
    }
    //edit
    public function edit($id)
    {
        $article = Article::find($id);
        return view('rulesToAwards.edit',compact('article'));
    }
    //update
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => $data['name'],
            'idTypeAward' => $data['idTypeAward'],
            'amount' => $data['amount'],
        ]);
        RulesToAwards::find($id)->update($request->all());
        return redirect()->route('rulesToAwards.index')
                        ->with('success','rulesToAwards updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
    	return RulesToAwards::destroy([
	        RulesToAwards::find($id)->delete();
	        return redirect()->route('rulesToAwards.index')
	                        ->with('success','rulesToAwards deleted successfully');
        ]);
    }


}
