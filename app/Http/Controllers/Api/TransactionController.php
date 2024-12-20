<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function makePayment(Request $request)
    {
        $query = $request->validate([
           'provider_id'=>'required',
           'meter_number'=>'required|string|size:10',
           'amount'=>'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

            $transaction = Transaction::create([
                'user_id'=>Auth::id(),
                'provider_id'=>$query['provider_id'],
                'meter_number'=>$query['meter_number'],
                'amount'=>$query['amount'],
                'created_at'=>NOW()
            ]);
        return response()->json([
            'message'=>'successfully made a payment',
            'details'=>$transaction],
            200);
        }


    public function getPayments(Request $request)
    {
        try{
            $transaction = Transaction::select(['user_id','provider_id','meter_number','amount'])
                ->where('user_id',Auth::id())
                ->paginate(10);
            return response()->json([
                'message'=>'success',
                'transaction'=>$transaction
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error'=>$e->getMessage()
            ],400);
        }

    }
}
