<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\User;
use App\Models\UserPersonalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    public function index()
    {
        $interests = Interest::all(); // Mengambil semua data barang
        return view('interest.index', compact('interests'));
    }

    public function storePersonalization(Request $request) 
    { 
        $personalization = UserPersonalization::firstOrCreate([ 
            'user_id' => Auth::id(), 
        ]); 
        
        $personalization->interests()->sync($request->interests); 
        return redirect()->back()->with('success', 'Interest berhasil disimpan');
    }

}
