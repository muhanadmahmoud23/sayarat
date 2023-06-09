<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tasks = Tasks::select('tasks.id','users.name','tasks.task','tasks.subject','tasks.status')
            ->where('tasks.manager_id',Auth::user()->id)
            ->join('users','users.id','tasks.user_id')
            ->get();

            return Datatables()->of($tasks)
                ->addIndexColumn()
                ->addColumn('action',  'tasks.datatable.actions')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('tasks.index');
    }

    public function create()
    {
        $employees = User::where('manager_id',Auth::user()->id)->pluck('name','id');
        return view('tasks.add',compact('employees'));
    }

    public function store(TasksRequest $request)
    {
        $data = [
            'subject' => $request->validated()['subject'],
            'task' => $request->validated()['task'],
            'status' => 'Pending',
            'user_id' => $request->validated()['user_id'],
            'manager_id' => Auth::user()->id,
        ];

        Tasks::create($data);
        return redirect()->route('task.index')->withSuccess('Task Created Succeffuly');
    }

}
