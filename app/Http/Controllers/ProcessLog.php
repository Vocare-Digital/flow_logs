<?php


namespace App\Http\Controllers;

use App\Models\ProcessLog as ProcessLogModel;
use Illuminate\Http\Request;

class ProcessLog extends Controller
{

    public function getProcessLogs($processId)
    {
        return response()->json(ProcessLogModel::where('process_id', $processId)->get()->paginate(25));
    }

    public function getProcessLog($processId, $processLogId)
    {
        return response()->json(ProcessLogModel::findOrFail($processLogId));
    }

    public function createProcessLog(Request $request)
    {
        $this->validate($request, [
                'process_id' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'runtime' => 'required',
                'state' => 'required',
                'rows_processed' => 'required'
            ]);

        $process_log = ProcessLogModel::create($request->all());

        return response()->json($process_log,201);

    }

    public function deleteProcessLog($processLogId)
    {
        ProcessLogModel::findOrFail($processLogId)->delete();

        return response()->json('','204');
    }

}
