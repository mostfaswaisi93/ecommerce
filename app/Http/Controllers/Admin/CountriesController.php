<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        if (request()->ajax()) {
            return datatables()->of($countries)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->hasPermission('update_countries')) {
                        $button = '<a type="button" title="Edit" name="edit" href="countries/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="fa fa-edit"></i></a>';
                    } else {
                        $button = '<a type="button" title="Edit" name="edit" id="' . $data->id . '" class="edit btn btn-sm btn-icon disabled"><i class="fa fa-edit"></i></a>';
                    }
                    $button .= '&nbsp;&nbsp;';
                    if (auth()->user()->hasPermission('delete_countries')) {
                        $button .= '<a type="button" title="Delete" name="delete" id="' . $data->id . '" class="delete btn btn-sm btn-icon"><i class="fa fa-trash"></i></a>';
                    } else {
                        $button .= '<a type="button" title="Delete" name="delete" id="' . $data->id . '" class="delete btn btn-sm btn-icon disabled"><i class="fa fa-trash"></i></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.countries.index');
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'iso_code'      => 'required|max:3|unique:countries',
            'phone_code'    => 'required|unique:countries'
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name'        => 'required|unique:country_translations,name'];
            $rules += [$locale . '.currency'    => 'required|unique:country_translations,currency'];
        }

        $request->validate($rules);

        Country::create($request->all());
        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.countries.index');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $rules = [
            'iso_code'      => ['required', Rule::unique('countries')->ignore($country->id)],
            'phone_code'    => ['required', Rule::unique('countries')->ignore($country->id)],
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name'        => ['required', Rule::unique('country_translations', 'name')->ignore($country->id, 'country_id')]];
            $rules += [$locale . '.currency'    => ['required', Rule::unique('country_translations', 'currency')->ignore($country->id, 'country_id')]];
        }

        $request->validate($rules);
        $country->update($request->all());
        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.countries.index');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
    }

    public function updateStatus(Request $request, $id)
    {
        $country           = Country::find($id);
        $active            = $request->get('active');
        $country->active   = $active;
        $country           = $country->save();

        if ($country) {
            return response(['success' => TRUE, "message" => 'Done']);
        }
    }
}
