<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Allergy;
use App\Models\Disease;
use App\Models\Interest;
use App\Models\UserPersonalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalizationController extends Controller
{

    public function index()
    {
        $personalizations = UserPersonalization::where('user_id', Auth::id())->get();
        return view('personalization.index', compact('personalizations'));

        $personalizations = UserPersonalization::with('interests', 'diseases', 'allergies')
        ->where('user_id', Auth::id())
        ->get();
        return view('personalization.index', compact('personalizations'));
    }

    public function editPersonalization(UserPersonalization $personalization)
    {
        $allInterests = Interest::all();
        $allDiseases = Disease::all();
        $allAllergies = Allergy::all();

        return view('personalization.edit', compact('personalization', 'allInterests', 'allDiseases', 'allAllergies'));
        
    }

    public function updatePersonalization(Request $request, UserPersonalization $personalization)
    {
        $personalization->update([
            // Update other fields as needed
        ]);

        $personalization->interests()->sync($request->interests);
        $personalization->diseases()->sync($request->diseases);
        $personalization->allergies()->sync($request->allergies);

        return redirect()->route('personalization.index')->with('success', 'Personalization updated successfully');
    }

    public function destroyPersonalization(UserPersonalization $personalization)
    {
        $personalization->delete();
        return redirect()->route('personalization.index')->with('success', 'Personalization deleted successfully');
    }
}
