<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_departments'])->only('index');
        $this->middleware(['permission:create_departments'])->only('create');
        $this->middleware(['permission:update_departments'])->only('edit');
        $this->middleware(['permission:delete_departments'])->only('destroy');
    }

    public function index()
    {
        $departments = Department::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($departments)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_departments', 'delete_departments'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="departments/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.departments.index');
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(DepartmentsRequest $request)
    {
        Department::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.departments.index');
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit')->with('department', $department);
    }

    public function update(DepartmentsRequest $request, Department $department)
    {
        $department->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.departments.index');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
    }
}
