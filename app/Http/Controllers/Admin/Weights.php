<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Weight;
use Illuminate\Validation\Rule;

class Weights extends Controller
{
    public function index(Request $request)
    {
        $weights = Weight::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');
        })->latest()->paginate(5);

        return view('admin.weights.index')->with('weights', $weights);
    }

    public function create()
    {
        return view('admin.weights.create');
    }

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', Rule::unique('weight_translations', 'name')]];
        }

        $request->validate($rules);

        Weight::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.weights.index');
    }

    public function edit(Weight $weight)
    {
        return view('admin.weights.edit', compact('weight'));
    }

    public function update(Request $request, Weight $weight)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('weight_translations', 'name')->ignore($weight->id, 'weight_id')]];
        }

        $request->validate($rules);

        $weight->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.weights.index');
    }

    public function destroy(Weight $weight)
    {
        $weight->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.weights.index');
    }
}
