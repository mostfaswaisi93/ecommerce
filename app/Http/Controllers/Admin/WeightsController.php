<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Weight;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class WeightsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_weights'])->only('index');
        $this->middleware(['permission:create_weights'])->only('create');
        $this->middleware(['permission:update_weights'])->only('edit');
        $this->middleware(['permission:delete_weights'])->only('destroy');
    }

    public function index()
    {
        $weights = Weight::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($weights)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_weights', 'delete_weights'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="weights/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.weights.index');
    }

    public function create()
    {
        return view('admin.weights.create');
    }

    public function store(WeightsRequest $request)
    {
        Weight::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.weights.index');
    }

    public function edit(Weight $weight)
    {
        return view('admin.weights.edit')->with('weight', $weight);
    }

    public function update(WeightsRequest $request, Weight $weight)
    {
        $weight->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.weights.index');
    }

    public function destroy($id)
    {
        $weight = Weight::findOrFail($id);
        $weight->delete();
    }
}
