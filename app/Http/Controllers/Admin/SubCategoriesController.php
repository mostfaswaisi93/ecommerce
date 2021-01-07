<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_sub_categories'])->only('index');
        $this->middleware(['permission:create_sub_categories'])->only('create');
        $this->middleware(['permission:update_sub_categories'])->only('edit');
        $this->middleware(['permission:delete_sub_categories'])->only('destroy');
    }

    public function index()
    {
        $sub_categories = SubCategory::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($sub_categories)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_sub_categories', 'delete_sub_categories'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="sub_categories/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.sub_categories.index');
    }

    public function create()
    {
        return view('admin.sub_categories.create');
    }

    public function store(SubCategoriesRequest $request)
    {
        SubCategory::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.sub_categories.index');
    }

    public function edit(SubCategory $sub_category)
    {
        return view('admin.sub_categories.edit')->with('sub_category', $sub_category);
    }

    public function update(SubCategoriesRequest $request, SubCategory $sub_category)
    {
        $sub_category->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.sub_categories.index');
    }

    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->delete();
    }
}
