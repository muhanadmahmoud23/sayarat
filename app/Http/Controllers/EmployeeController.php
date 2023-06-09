<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $employee = User::select('users.id', 'users.name', 'users.salary','users.image', 'users.last_name', 'manager.name as manager_name', DB::raw('CONCAT(users.name," ",users.last_name) AS full_name'))
                ->whereNotNull('users.manager_id')
                ->join('users as manager', 'manager.id', '=', 'users.manager_id')
                ->get();

            return Datatables()->of($employee)
                ->addIndexColumn()
                ->addColumn('action',  'users.datatable.actions')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.index');
    }

    public function create()
    {
        $managers = User::whereNull('manager_id')->pluck('name', 'id');
        $departments = Department::pluck('name', 'id');
        return view('users.add', compact('managers', 'departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $data = [
            'name' => $request->validated()['name'],
            'last_name' => $request->validated()['last_name'],
            'salary' => $request->validated()['salary'],
            'email' => $request->validated()['email'],
            'password' => Hash::make($request->validated()['password']),
            'manager_id' => $request->validated()['manager_id'],
            'department_id' => $request->validated()['department_id'],
        ];

        $user = User::create($data);

        if ($request->hasfile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            Storage::putFileAs('public/images/employee', $request->file('file'),$name);
            User::where('id', $user->id)->update(['image' => $name]);
        }

        return redirect()->route('employee.index')->withSuccess('Employee Created Succeffuly');
    }

    public function edit(string $id)
    {
        $employee = User::find($id);
        $managers = User::whereNull('manager_id')->pluck('name', 'id');
        $departments = Department::pluck('name', 'id');

        return view('users.edit', [
            'employee'   => $employee,
            'managers' => $managers,
            'department' => $departments
        ]);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->validated());

        if ($request->hasfile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            Storage::delete('public/images/employee/' .'/'.$user->image);
            Storage::putFileAs('public/images/employee', $request->file('file'),$name);
            User::where('id', $user->id)->update(['image' => $name]);
        }

        return redirect()->route('employee.index')->withSuccess('User Updated Succefully');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        Storage::delete('public/images/employee/' .'/'.$user->image);
        $user->delete();
        return redirect()->back()->withSuccess('User Deleted Succefully');
    }
}
