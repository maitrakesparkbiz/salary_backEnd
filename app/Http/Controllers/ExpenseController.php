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
        try{
//        Expense::Create($request->all());
          return Expense::updateOrCreate(['id'=> $request['id']],$request->all());
       }catch (\Exception $e){
        return false;
        }
    }


    public function list(Request $request)
    {

        if (isset($request->currentData)){
            return Expense::with('category')
                ->whereMonth('spend_on', $request->currentData)
                ->orderBy('spend_on')
                ->get();
        }
        else if (isset($request->fromDate) && isset($request->toDate))
        {
            return Expense::with('category')
                ->whereDate('spend_on','>=', $request->fromDate)
                ->whereDate('spend_on','<=', $request->toDate)
                ->orderBy('spend_on')
                ->get();
        }
        else
        {
            return Expense::with('category')
                ->orderBy('spend_on')
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
        try {
            Expense::find($id)->delete();
        }catch (\Exception $e){
            return false;
        }
    }

    public function categoryAdd(Request $request)
    {
        try {
            Category::Create($request->all());
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function categoryList($id)
    {
        return Category::where('parent_id',$id)->get();
    }
}
