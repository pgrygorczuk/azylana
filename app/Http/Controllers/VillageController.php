<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VillageController extends Controller
{
    public function index(Village $village=NULL)
    {
        $user = Auth::user();
        if( ! Village::where('user_id', $user->id)->exists() )
        {
            $village = Village::createFirst($user);
        }
        else if( ! $village )
        {
            $village = Village::where('user_id', $user->id)->first();
        }

        $villages = Village::where('user_id', $user->id)->get();
        return view('village.index')
            ->with('village', $village)
            ->with('villages', $villages)
            ->with('user', $user);
    }

    public function village(Village $village)
    {
        $user = Auth::user();
        $villages = Village::where('user_id', $user->id)->get();
        return view('village.index')
            ->with('village', $village);
    }

    public function test()
    {
        return 'test';
    }
}
