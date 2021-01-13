<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SizesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_sizes'])->only('index');
        $this->middleware(['permission:create_sizes'])->only('create');
        $this->middleware(['permission:update_sizes'])->only('edit');
        $this->middleware(['permission:delete_sizes'])->only('destroy');
    }

    public function index()
    {
        $sizes = Size::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($sizes)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_sizes', 'delete_sizes'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="sizes/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.sizes.index');
    }

    public function create()
    {
        return view('admin.sizes.create');
    }

    public function store(SizesRequest $request)
    {
        Size::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.sizes.index');
    }

    public function edit(Size $size)
    {
        return view('admin.sizes.edit')->with('size', $size);
    }

    public function update(SizesRequest $request, Size $size)
    {
        $size->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.sizes.index');
    }

    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
    }
}
