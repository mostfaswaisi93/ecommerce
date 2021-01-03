<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::with(['country'])->get();
        if (request()->ajax()) {
            return datatables()->of($cities)
                ->addColumn('country', function ($data) {
                    return $data->country->name;
                })
                ->addColumn('action', function ($data) {
                    if (auth()->user()->hasPermission('update_cities')) {
                        $button = '<a type="button" title="Edit" name="edit" href="cities/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="fa fa-edit"></i></a>';
                    } else {
                        $button = '<a type="button" title="Edit" name="edit" id="' . $data->id . '" class="edit btn btn-sm btn-icon disabled"><i class="fa fa-edit"></i></a>';
                    }
                    $button .= '&nbsp;&nbsp;';
                    if (auth()->user()->hasPermission('delete_cities')) {
                        $button .= '<a type="button" title="Delete" name="delete" id="' . $data->id . '" class="delete btn btn-sm btn-icon"><i class="fa fa-trash"></i></a>';
                    } else {
                        $button .= '<a type="button" title="Delete" name="delete" id="' . $data->id . '" class="delete btn btn-sm btn-icon disabled"><i class="fa fa-trash"></i></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.cities.index');
    }

    public function create()
    {
        $countries = Country::active()->get();
        return view('admin.cities.create')->with('countries', $countries);
    }

    public function store(Request $request)
    {
        $rules = [
            'country_id'   => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name'        => 'required|unique:city_translations,name'];
        }

        $request->validate($rules);
        $request_data = $request->all();
        City::create($request_data);

        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.cities.index');
    }

    public function edit(City $city)
    {
        $countries = Country::active()->get();
        return view('admin.cities.edit', compact('countries', 'city'));
    }

    public function update(Request $request, City $city)
    {
        $rules = [
            'country_id'   => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name'        => ['required', Rule::unique('city_translations', 'name')->ignore($city->id, 'city_id')]];
        }

        $request->validate($rules);
        $city->update($request->all());
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.cities.index');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
    }

    public function updateStatus(Request $request, $id)
    {
        $city           = City::find($id);
        $active         = $request->get('active');
        $city->active   = $active;
        $city           = $city->save();

        if ($city) {
            return response(['success' => TRUE, "message" => 'Done']);
        }
    }
}
