<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReports(){
        $reports = Report::with('blotter','reportOffense')->get();

        return response()->json(['reports' => $reports]);
    }

    public function addReport(Request $request){
        $request->validate([
            'blotter_id' => ['required', 'exists:blotters,blotter_id'],
            'report_offense_id' => ['required', 'exists:reportOffenses,report_offense_id'],
        ]);

        $report = Report::create([
            'blotter_id' => $request->blotter_id,
            'report_offense_id' => $request->report_offense_id,
        ]);

        return response()->json(['message' => 'Report successfully created!', 'report' => $report]);
    }

    public function editReport(Request $request, $id){
        $request->validate([
            'blotter_id' => ['required', 'exists:blotters,blotter_id'],
            'report_offense_id' => ['required', 'exists:reportOffenses,report_offense_id'],
        ]);

        $report = Report::find($id);

        if(!$report){
            return response()->json(['message' => 'Report not found!'], 404);
        }

        $report->update([
            'blotter_id' => $request->blotter_id,
            'report_offense_id' => $request->report_offense_id,
        ]);

        return response()->json(['message' => 'Report successfully edited!', 'report' => $report]);
    }

    public function deleteReport($id){
        $report = Report::find($id);

        if(!$report){
            return response()->json(['message' => 'Report not found!'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Report successfully deleted!']);
    }


}
