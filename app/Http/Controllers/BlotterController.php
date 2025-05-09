<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlotterController extends Controller
{
    public function getBlotters(){
        $blotters = Blotter::with('citizen','blotterStatus')->get();

        return response()->json(['blotters' => $blotters]);
    }

    public function addBlotter(Request $request){
        $request->validate([
            'citizen_id' => ['required', 'exists:citizens,citizen_id'],
            'complainant' => ['required', 'string', 'max:255'],
            'incident_type' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'incident_type' => ['required', 'string', 'max:255'],
            'witness_1' => ['required', 'string', 'max:255'],
            'witness_2' => ['required', 'string', 'max:255'],
        ]);

        $blotter = Blotter::create([
            'citizen_id' => $request->citizen_id,
            'complainant' => $request->complainant,
            'incident_type' => $request->incident_type,
            'location' => $request->location,
            'witness_1' => $request->witness_i,
            'witness_2' => $request->witness_2,
        ]);

        return response()->json(['message' => 'Blotter successfully created!', 'blotter' => $blotter]);
    }

    public function editBlotter(Request $request, $id){
        $request->validate([
            'citizen_id' => ['required', 'exists:citizens,citizen_id'],
            'complainant' => ['required', 'string', 'max:255'],
            'incident_type' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'incident_type' => ['required', 'string', 'max:255'],
            'witness_1' => ['required', 'string', 'max:255'],
            'witness_2' => ['required', 'string', 'max:255'],
        ]);

        $blotter = Blotter::find($id);

        if(!$blotter){
            return response()->json(['message' => 'Blotter not found!'], 404);
        }

        $blotter->update([
            'citizen_id' => $request->citizen_id,
            'complainant' => $request->complainant,
            'incident_type' => $request->incident_type,
            'location' => $request->location,
            'witness_1' => $request->witness_1,
            'witness_2' => $request->witness_2,
        ]);

        return response()->json(['message' => 'Blotter successfully edited!', 'blotter' => $blotter]);
    }

    public function deleteBlotter($id){
        $blotter = Blotter::find($id);

        if(!$blotter){
            return response()->json(['message' => 'Blotter not found!'], 404);
        }

        $blotter->delete();

        return response()->json(['message' => 'Blotter successfully deleted!']);
    }




}
