<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_orders'])->only('index');
        $this->middleware(['permission:create_orders'])->only('create');
        $this->middleware(['permission:update_orders'])->only('edit');
        $this->middleware(['permission:delete_orders'])->only('destroy');
    }

    public function index()
    {
        $orders = Order::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($orders)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_orders', 'delete_orders'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="orders/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="feather icon-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="feather icon-trash-2"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.orders.index');
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(OrdersRequest $request)
    {
        Order::create([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit')->with('order', $order);
    }

    public function update(OrdersRequest $request, Order $order)
    {
        $order->update([
            'name' => $request->name
        ]);
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }
}
