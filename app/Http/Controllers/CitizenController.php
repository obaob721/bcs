<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class CitizenController extends Controller
{
    public function getCitizens(){
        $citizens = Citizen::all();
        return response()->json(['citizens' => $citizens]);
    }

    public function addCitizen(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'between:0,120'],
            'phonenumber' => ['required', 'string', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $citizen = Citizen::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
        ]);

        return response()->json(['message' => 'Citizen successfully created!', 'citizen' => $citizen]);
    }

    public function editCitizen(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'between:0,120'],
            'phonenumber' => ['required', 'string', 'max:11'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $citizen = Citizen::find($id);

        if(!$citizen){
            return response()->json(['message' => 'Citizen not found!'], 404);
        }

        $citizen->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
        ]);

        return response()->json(['message' => 'Citizen successfully edited!', 'citizen' => $citizen]);
    }

    public function deleteCitizen($id){
        $citizen = Citizen::find($id);

        if(!$citizen){
            return response()->json(['message' => 'Citizen not found!'], 404);
        }

        $citizen->delete();

        return response()->json(['message' => 'Citizen successfully deleted!']);
    }
}
