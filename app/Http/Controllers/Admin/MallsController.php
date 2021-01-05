<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mall;
use Illuminate\Http\Request;

class MallsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_malls'])->only('index');
        $this->middleware(['permission:create_malls'])->only('create');
        $this->middleware(['permission:update_malls'])->only('edit');
        $this->middleware(['permission:delete_malls'])->only('destroy');
    }

    public function index()
    {
        $malls = Mall::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($malls)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_malls', 'delete_malls'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="malls/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.malls.index');
    }

    public function create()
    {
        return view('admin.malls.create');
    }

    public function store(mallsRequest $request)
    {
        Mall::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.malls.index');
    }

    public function edit(Mall $mall)
    {
        return view('admin.malls.edit')->with('mall', $mall);
    }

    public function update(mallsRequest $request, Mall $mall)
    {
        $mall->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.malls.index');
    }

    public function destroy($id)
    {
        $mall = Mall::findOrFail($id);
        $mall->delete();
    }
}
