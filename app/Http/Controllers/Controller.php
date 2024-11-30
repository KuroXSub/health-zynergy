<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\HealthTracker;
use App\Models\UserPersonalization;
use Illuminate\Support\Facades\Request;
use inertia\inertia;

abstract class Controller
{
    public function store(Request $request)
    {
    $userPersonalization = UserPersonalization::create($request->except(['disease_ids', 'interest_ids', 'allergy_ids']));
    
    if ($request->has('disease_ids')) {
        $userPersonalization->diseases()->sync($request->input('disease_ids'));
    }

    if ($request->has('interest_ids')) {
        $userPersonalization->interests()->sync($request->input('interest_ids'));
    }

    if ($request->has('allergy_ids')) {
        $userPersonalization->allergy()->sync($request->input('allergy_ids'));
    }

    $articleUser = Article::create($request->except(['interest_ids']));
    
    if ($request->has('interest_ids')) {
        $articleUser->interests()->sync($request->input('interest_ids'));
    }

    return redirect()->route('admin');
}
}

