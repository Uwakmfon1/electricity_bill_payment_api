<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function payment(Request $request)
    {
        $query = $request->validate([
           'provider_id'=>'required',
           'meter_number'=>'required|string|size:10',
           'amount'=>'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        //ensure only auth user can make payments
//        if(Auth::user()){
//        $query['user_id'] = 1;
//        $query['created_at']=NOW();
//        Transaction::create($query);

            Transaction::create([
                'user_id'=>1,
                'provider_id'=>$query['provider_id'],
                'meter_number'=>$query['meter_number'],
                'amount'=>$query['amount'],
                'created_at'=>NOW()
            ]);
        return response()->json(['message'=>'successfully made a payment'],200);
        }
//    }
}
