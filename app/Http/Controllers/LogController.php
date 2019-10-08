<?php


namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;


class LogController extends Controller
{
    public function getAllLogs()
    {
        return response()->json(Log::all());
    }

    public function getProcessLogs($process_name)
    {
        return response()->json(Log::where('process_name', $process_name)->get());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'process_name' => 'required',
            'severity' => 'required',
            'additional_info' => 'required|array'
        ]);

        $log = Log::create([
            'process_name' => $request->input('process_name'),
            'severity'  => $request->input('severity'),
            'additional_info' => json_encode($request->input('additional_info'), true)
        ]);

        return response()->json($log,201);
    }
}
