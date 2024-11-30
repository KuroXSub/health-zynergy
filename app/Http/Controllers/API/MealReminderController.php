<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MealReminder;
use Illuminate\Http\Request;

class MealReminderController extends Controller
{
    public function index()
    {
        $mealReminders = MealReminder::all();
        return response()->json($mealReminders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'meal_time' => 'required|string',
            'menu_suggestion' => 'required|string',
            'food_restriction' => 'nullable|string',
        ]);

        $mealReminder = MealReminder::create([
            'user_id' => auth()->id(),
            'meal_time' => $validated['meal_time'],
            'menu_suggestion' => $validated['menu_suggestion'],
            'food_restriction' => $validated['food_restriction'] ?? '',
        ]);

        return response()->json($mealReminder, 201);
    }

    public function show($id)
    {
        $mealReminder = MealReminder::findOrFail($id);
        return response()->json($mealReminder);
    }

    public function update(Request $request, $id)
    {
        $mealReminder = MealReminder::findOrFail($id);

        $mealReminder->update($request->only([
            'meal_time',
            'menu_suggestion',
            'food_restriction',
        ]));

        return response()->json($mealReminder);
    }

    public function destroy($id)
    {
        MealReminder::destroy($id);
        return response()->json(['message' => 'Reminder deleted']);
    }
}
