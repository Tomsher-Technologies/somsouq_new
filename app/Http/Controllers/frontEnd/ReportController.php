<?php

namespace App\Http\Controllers\frontEnd;

use App\Enums\Front\ReportType;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

final class ReportController extends Controller
{
    public function reportSubmit(Request $request)
    {
        try {
            $report = new Report();
            $report->post_id = $request->get('post_id');
            $report->report_type_id = $request->get('report_type_id');
            $report->user_id = $request->get('user_id');
            $report->message = $request->get('message');
            $report->save();

            return response()->json([
                'status' => true,
                'message' => trans('messages.report_submit')
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => trans('messages.wrong')
            ]);
        }
    }
}
