<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function add(Request $request)
    {
//        Expense::Create($request->all());
        return Expense::updateOrCreate(['id'=> $request['id']],$request->all());
    }


    public function list(Request $request)
    {

        if (isset($request->currentData)){
            return Expense::with('category')
                ->whereMonth('spend_on', $request->currentData)
                ->get();
        }
        else if (isset($request->fromDate) && isset($request->toDate))
        {
            return Expense::with('category')
                ->whereDate('spend_on','>=', $request->fromDate)
                ->whereDate('spend_on','<=', $request->toDate)

                ->get();
        }
        else
        {
            return Expense::with('category')
                ->get();
        }



    }

    public  function get($id)
    {
        return Expense::find($id);
    }

    public  function update(Request $request){
//        Expense::updateOrCreate(['id',])
    }

    public  function delete($id)
    {
            Expense::find($id)->delete();
    }

    public function categoryAdd(Request $request)
    {

        Category::Create($request->all());
    }

    public function categoryList()
    {
        return Category::get();
    }
}
