<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeTasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $employee = Tasks::where('user_id',Auth::user()->id)->get();

            return Datatables()->of($employee)
                ->addIndexColumn()
                ->addColumn('action',  'employee_task.datatable.actions')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('employee_task.index');
    }

    public function edit(string $id)
    {
        $employee_task = Tasks::find($id);

        return view('employee_task.edit', [
            'employee_task'   => $employee_task,
        ]);
    }

    public function update(TasksRequest $request, $id)
    {
        $task = Tasks::find($id);
        $task->update($request->validated());
        return redirect()->route('employee_task.index')->withSuccess('Task Updated Succefully');

    }

    public function updateStatus($id){
        $task = Tasks::find($id);
        $task->update(['status' => 'Completed']);
        return redirect()->back()->withSuccess('Task status changed Succefully');
    }
}
