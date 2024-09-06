<?php

namespace App\Http\Controllers;

use App\Models\ChecklistItem;
use App\Models\Checklist;

use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    public function index($id)
    {
        $checklists = ChecklistItem::where('checklist_id', $id)->get();
        
        return response()->json($checklists);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'itemName' => 'required|string|max:255',
        ]);

        $checklist = ChecklistItem::create([
            'checklist_id' => $id,
            'itemName' => $request->itemName,
        ]);

        return response()->json($checklist, 201);
    }

    public function show($checklist_id, $checklistItem_id)
    {
        $checklist = ChecklistItem::where('checklist_id', $checklist_id)->where('id', $checklistItem_id)->first();

        if (!$checklist) {
            return response()->json(['error' => 'Checklist Item not found'], 404);
        }

        return response()->json($checklist);
    }

    public function update(Request $request, $checklist_id, $checklistItem_id)
    {
        $request->validate([
            'itemName' => 'required|string|max:255',
        ]);

        
        $checklistItemName = ChecklistItem::where('checklist_id', $checklist_id)->where('id', $checklistItem_id)->first();

        if (!$checklistItemName) {
            return response()->json(['error' => 'Checklist Item Name not found'], 404);
        }

        $checklistItemName->update([
            'itemName' => $request->itemName,
        ]);

        return response()->json($checklistItemName);
    }

    public function destroy($checklist_id, $checklistItem_id)
    {
        $checklistItem = ChecklistItem::where('checklist_id', $checklist_id)->where('id', $checklistItem_id)->first();

        if (!$checklistItem) {
            return response()->json(['error' => 'checklist Item not found'], 404);
        }

        $checklistItem->delete();

        return response()->json(['message' => 'checklist Item deleted successfully']);
    }
}
