<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
	public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('goals.index',compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    protected function create(array $data)
    {

        

        foreach ($goals as $rule => $value) {
            
        }


        return Goals::create([
            'name' => $data['name'],
            'idRuleToAchieve' => $data['idRuleToAchieve'],
            'idRuleToRestrixct' => $data['idRuleToRestrict'], 
            'idRuleToAward'=> $data['idRuleToAward'],
        ]);

        
    }
}
