<?php


namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;


class ProcessController extends Controller
{
    public function getAllProcesses()
    {
        return response()->json(Process::all());
    }

    public function getProcess($processId)
    {
        return response()->json(Process::find($processId));
    }

    public function createProcess(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        return response()->json(Process::create($request->all()),201);
    }

    public function updateProcess(Request $request, $processId)
    {
        $process = Process::findOrFail($processId);
        $process->update($request->all());

        return response()->json($process, 200);
    }

    public function deleteProcess($processId)
    {
        Process::findOrFail($processId)->delete();
        return response()->json('', 204);
    }
}
