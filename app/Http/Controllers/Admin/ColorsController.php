<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_colors'])->only('index');
        $this->middleware(['permission:create_colors'])->only('create');
        $this->middleware(['permission:update_colors'])->only('edit');
        $this->middleware(['permission:delete_colors'])->only('destroy');
    }

    public function index()
    {
        $colors = Color::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($colors)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_colors', 'delete_colors'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="colors/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.colors.index');
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorsRequest $request)
    {
        Color::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.colors.index');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit')->with('color', $color);
    }

    public function update(ColorsRequest $request, Color $color)
    {
        $color->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.colors.index');
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
    }
}
