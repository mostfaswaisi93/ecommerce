<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_manufacturers'])->only('index');
        $this->middleware(['permission:create_manufacturers'])->only('create');
        $this->middleware(['permission:update_manufacturers'])->only('edit');
        $this->middleware(['permission:delete_manufacturers'])->only('destroy');
    }

    public function index()
    {
        $manufacturers = Manufacturer::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($manufacturers)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_manufacturers', 'delete_manufacturers'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="manufacturers/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.manufacturers.index');
    }

    public function create()
    {
        return view('admin.manufacturers.create');
    }

    public function store(ManufacturersRequest $request)
    {
        Manufacturer::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.manufacturers.index');
    }

    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturers.edit')->with('manufacturer', $manufacturer);
    }

    public function update(ManufacturersRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.manufacturers.index');
    }

    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();
    }
}
