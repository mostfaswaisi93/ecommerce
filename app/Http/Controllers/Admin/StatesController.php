<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_states'])->only('index');
        $this->middleware(['permission:create_states'])->only('create');
        $this->middleware(['permission:update_states'])->only('edit');
        $this->middleware(['permission:delete_states'])->only('destroy');
    }

    public function index()
    {
        $states = State::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($states)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_states', 'delete_states'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="states/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.states.index');
    }

    public function create()
    {
        return view('admin.states.create');
    }

    public function store(StatesRequest $request)
    {
        State::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.states.index');
    }

    public function edit(State $state)
    {
        return view('admin.states.edit')->with('state', $state);
    }

    public function update(StatesRequest $request, State $state)
    {
        $state->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.states.index');
    }

    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();
    }
}
