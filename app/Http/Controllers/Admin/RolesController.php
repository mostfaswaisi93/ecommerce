<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_roles'])->only('index');
        $this->middleware(['permission:create_roles'])->only('create');
        $this->middleware(['permission:update_roles'])->only('edit');
        $this->middleware(['permission:delete_roles'])->only('destroy');
    }

    public function index()
    {
        $roles = Role::OrderBy('created_at', 'desc')->get();
        if (request()->ajax()) {
            return datatables()->of($roles)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can(['update_roles', 'delete_roles'])) {
                        $button = '<a type="button" title="' . trans("admin.edit") . '" name="edit" href="roles/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="fa fa-edit"></i></a>';
                        $button .= '&nbsp;';
                        $button .= '<a type="button" title="' . trans("admin.delete") . '" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:roles',
            'email' => 'required|unique:roles',
            'image' => 'image',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1',
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('images/roles/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.roles.index');
    }

    public function edit(User $user)
    {
        return view('admin.roles.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('roles')->ignore($user->id)],
            'email' => ['required', Rule::unique('roles')->ignore($user->id)],
            'image' => 'image',
            'permissions' => 'required|min:1',
        ]);

        $request_data = $request->except(['permissions', 'image']);
        if ($request->image) {
            if ($user->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/images/' . $user->image);
            }

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('images/roles/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/images/' . $user->image);
        }
        $user->delete();
    }
}
