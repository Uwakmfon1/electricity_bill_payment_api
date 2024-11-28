<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function getProviders()
    {
        $query = Provider::all();

        return response()->json([
            'message'=>'Success',
            'providers'=>$query
        ],200);
    }
}
