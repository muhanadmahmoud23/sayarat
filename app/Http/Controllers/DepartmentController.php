<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
    }

    public function index(Request $request)
    {
        $department = Department::select(DB::raw('sum(users.id) AS sum_users') , DB::raw('sum(users.salary) AS sum_salary')  ,'departments.id','departments.name')
        ->join('users','users.department_id','departments.id')
        ->groupBy('departments.id','departments.name')
        ->get();

        if ($request->ajax()) {
            return Datatables()->of($department)
                ->addIndexColumn()
                ->addColumn('action',  'department.datatable.actions')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('department.index');
    }

    public function create()
    {
        return view('department.add');
    }

    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('department.index')->withSuccess('Department Created Succeffuly');
    }


    public function edit(string $id)
    {
        $department = Department::find($id);

        return view('department.edit', [
            'department'   => $department,
        ]);
    }


    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::find($id);
        $department->update($request->validated());
        return redirect()->route('department.index')->withSuccess('Department Updated Succefully');
    }

    public function destroy(string $id)
    {
        $check = User::where('department_id', $id)->exists();
        if ($check == true)
            return redirect()->back()->withError('Canot Delete A Department Which Has Employees');

        $department = Department::find($id);
        $department->delete();
        return redirect()->back()->withSuccess('Department Deleted Succefully');
    }
}
