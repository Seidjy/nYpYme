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

    protected function store(array $data)
    {

        //PRECISA PERMITIR COMPLETAR VÁRIAS VEZES A MESMA META

        $deal = Deals::create([
            'idCustomer' => $data['idCustomer'],
            'idTypeTransactions' => $data['idTypeTransactions'],
            'amount' => $data['amount'],
        ]);

        $customerGoals = DB::table('customer_goals')->where('id', "$data['idCustomer']")->get();

        foreach ($customerGoals as $customerGoal) {
            $customerGoalsAmountRestrict;
            $goals = DB::table('goals')->get();
            foreach ($goals as $goal) {
                $idRuleToRestrict = $goal->idRuleToRestrict;
                $ruleToRestrict = DB::table('rules_to_restricts')->where('id', "$idRuleToRestrict")->first();
                $lastDate = date_parse($customerGoal->updated_at);
                $todays = date_parse($_SERVER['REQUEST_TIME']);

                $restriction = $lastDate - $todays;

                if ($restriction >= $ruleToRestrict->amount) {

                    $idRuleToAchieve = $goal->idRuleToAchieve;
                    $achieve = DB::table('rules_to_achieves')->where('id', "$idRuleToAchieve")first();

                    if ($achieve->gather) {
                        if ($data['amount'] + $customerGoal->amountStored >= $achieve->amount) {
                            $customerGoalsAmountRestrict = $customerGoal->amountRestrict + 1;
                        }else{
                            $customerGoalsAmountStored = $data['amount'];
                        }
                        DB::table('customer_goals')
                            ->where('id', "$customerGoal->id")
                            ->update(['amountRestrict' => "$customerGoalsAmountRestrict",
                                    'amountStored' => "$customerGoalsAmountStored"
                            ]);
                    }else{
                        if ($data['amount'] >= $achieve->amount) {
                            $customerGoalsAmountRestrict = $customerGoal->amountRestrict + 1;
                            DB::table('customer_goals')
                            ->where('id', "$customerGoal->id")
                            ->update(['amountRestrict' => $customerGoalsAmountRestrict,
                            ]);
                        }
                    }
                }
            }           
        }
        return redirect()->route('deals.index')
                            ->with('success','deals created successfully');
    }

    public function index()
    {
        $members = Deal::latest()->paginate(10);
        return view('deals.index',compact('members'));
    }

    //create
    protected function create()
    {
        return view('deals.create');
    }

    //show
    protected function show($id)
    {
        $members = Deal::find($id);
        return view('deals.show',compact('members'));
    }
    //edit
    public function edit($id)
    {
        $members = Deal::find($id);
        return view('deals.edit',compact('members'));
    }
    //update
    public function update(Request $request, $id)
    {
        Deal::find($id)->update($request->all());
        return redirect()->route('deals.index')
                        ->with('success','deals updated successfully');
    }
    //destroy
    protected function destroy($id)
    {
        return Deal::destroy([
            Deal::find($id)->delete();
            return redirect()->route('deals.index')
                            ->with('success','deals deleted successfully');
        ]);
    }
}


 ?>