<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function payment(Request $request)
    {
        $query = $request->validate([
           'provider_id'=>'required|',
           'meter_number'=>'required|string|size:10|unique:meters',
           'amount'=>'required|'
        ]);
    }
}
