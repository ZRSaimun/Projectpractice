<?php

namespace App\Http\Controllers\retailseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\sellerModel;

class profileController extends Controller
{
    public function index(Request $request)
    {
        $user = sellerModel::where('user_id', $request->session()->get('user'))->first();
        //return view('retailseller.index')->with('user', $user);
        return view('retailseller.index', $user);
    }
}