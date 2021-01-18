<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TradeMarksRequest;
use App\Models\TradeMark;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class TradeMarksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_trade_marks'])->only('index');
        $this->middleware(['permission:create_trade_marks'])->only('create');
        $this->middleware(['permission:update_trade_marks'])->only('edit');
        $this->middleware(['permission:delete_trade_marks'])->only('destroy');
    }

    public function index()
    {
        $trade_marks = TradeMark::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($trade_marks)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_trade_marks', 'delete_trade_marks'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="trade_marks/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.trade_marks.index');
    }

    public function create()
    {
        return view('admin.trade_marks.create');
    }

    public function store(TradeMarksRequest $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {
            $rules += ['name.' . $locale => 'required'];
        }

        $request->validate($rules);

        TradeMark::create($request->all());

        if (app()->getLocale() == 'ar') {
            Toastr::success(__('admin.added_successfully'));
        } else {
            Toastr::success(__('admin.added_successfully'), '', ["positionClass" => "toast-bottom-left"]);
        }

        return redirect()->route('admin.trade_marks.index');
    }

    public function edit(TradeMark $trade_mark)
    {
        return view('admin.trade_marks.edit')->with('trade_mark', $trade_mark);
    }

    public function update(TradeMarksRequest $request, TradeMark $trade_mark)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {
            $rules += ['name.' . $locale => 'required'];
        }

        $request->validate($rules);

        $trade_mark->update($request->all());

        if (app()->getLocale() == 'ar') {
            Toastr::success(__('admin.updated_successfully'));
        } else {
            Toastr::success(__('admin.updated_successfully'), '', ["positionClass" => "toast-bottom-left"]);
        }

        return redirect()->route('admin.trade_marks.index');
    }

    public function destroy($id)
    {
        $trade_mark = TradeMark::findOrFail($id);
        $trade_mark->delete();
    }
}
