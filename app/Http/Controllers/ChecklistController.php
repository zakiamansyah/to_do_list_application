<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = Checklist::all();
        return response()->json($checklists);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $checklist = Checklist::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
        ]);

        return response()->json($checklist, 201);
    }

    public function show($id)
    {
        $checklist = Checklist::find($id);

        if (!$checklist) {
            return response()->json(['error' => 'Checklist not found'], 404);
        }

        return response()->json($checklist);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $checklist = Checklist::find($id);

        if (!$checklist) {
            return response()->json(['error' => 'Checklist not found'], 404);
        }

        $checklist->update([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
        ]);

        return response()->json($checklist);
    }

    public function destroy($id)
    {
        $checklist = Checklist::find($id);

        if (!$checklist) {
            return response()->json(['error' => 'Checklist not found'], 404);
        }

        $checklist->delete();

        return response()->json(['message' => 'Checklist deleted successfully']);
    }
}



