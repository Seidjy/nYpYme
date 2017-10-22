<?php
namespace App\Http\Controllers;

use App\Deal;
use Illuminate\Http\Request;

//Transações

class DealsController extends Controller
{

    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('deals.index',compact('members'));
    }

    protected function create(array $data)
    {

        $deal = Deals::create([
            'idCustomer' => $data[''],
            'idTypeTransactions' => $data[''],
            'amount' => $data['amount'],
        ]);

        $customerGoals = DB::table('customer_goals')->get();

        foreach ($customerGoals as $customerGoal) {
            $goals = DB::table('goals')->get();
            foreach ($goals as $goal) {
                $idRuleToRestrict = $goal->idRuleToRestrict;
                $ruleToRestrict = DB::table('rules_to_restricts')->where('id', "$idRuleToRestrict");
                $lastDate = date_parse($customerGoal->updated_at);
                $todays = date_parse($_SERVER['REQUEST_TIME']);

                $restriction = $lastDate - $todays;
                
                if ($restriction >= $ruleToRestrict->amount) {

                    $idRuleToAchieve = $goal->idRule
                    $achieve = DB::table('rules_to_restricts')->where('id', "$idRuleToRestrict");
                }
            }

        }
        

    }

    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('goals.index',compact('members'));
    }
    //create
    protected function create()
    {
        return view('Goals.create');
    }
    //store
    protected function store(Request $request)
    {
            request()->validate([
                'name' => $data['name'],
                'idRuleToAchieve' => $data['idRuleToAchieve'],
                'idRuleToRestrict' => $data['idRuleToRestrict'], 
                'idRuleToAward'=> $data['idRuleToAward'],
                'amount' => $data['amount'],
            ]);
            Goals::create($request->all());
            return redirect()->route('goals.index')
                            ->with('success','goals created successfully');
        ]);
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
        request()->validate([
            'name' => $data['name'],
            'idRuleToAchieve' => $data['idRuleToAchieve'],
            'idRuleToRestrict' => $data['idRuleToRestrict'], 
            'idRuleToAward'=> $data['idRuleToAward'],
            'amount' => $data['amount'],
        ]);
        Goals::find($id)->update($request->all());
        return redirect()->route('goals.index')
                        ->with('success','goals updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        return Goals::destroy([
            Goals::find($id)->delete();
            return redirect()->route('goals.index')
                            ->with('success','goals deleted successfully');
        ]);
    }
}


 ?>