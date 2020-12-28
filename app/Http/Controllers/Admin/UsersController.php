<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');
    }

    public function index()
    {
        $users = User::OrderBy('created_at', 'desc')->whereRoleIs('admin');
        if (request()->ajax()) {
            return datatables()->of($users)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can('update_users')) {
                        $button = '<a type="button" title="{{ trans("admin.edit") }}" name="edit" href="users/' . $data->id . '/edit" class="edit btn btn-sm btn-icon"><i class="fa fa-edit"></i></a>';
                    } else {
                        $button = '<a type="button" title="{{ trans("admin.edit") }}" name="edit" id="' . $data->id . '" class="edit btn btn-sm btn-icon disabled"><i class="fa fa-edit"></i></a>';
                    }
                    $button .= '&nbsp;&nbsp;';
                    if (auth()->user()->can('delete_users')) {
                        $button .= '<a type="button" title="{{ trans("admin.delete") }}" name="delete" id="' . $data->id . '"  class="delete btn btn-sm btn-icon"><i class="fa fa-trash"></i></a>';
                    } else {
                        $button .= '<a type="button" title="{{ trans("admin.delete") }}" name="delete" id="' . $data->id . '" class="delete btn btn-sm btn-icon disabled"><i class="fa fa-trash"></i></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
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
                ->save(public_path('uploads/images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        Toastr::success(__('admin.added_successfully'));
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
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
                ->save(public_path('uploads/images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        Toastr::success(__('admin.updated_successfully'));
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/images/' . $user->image);
        }
        $user->delete();
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::find($id);
        $active = $request->get('active');
        $user->active = $active;
        $user = $user->save();

        if ($user) {
            return response(['success' => true, "message" => 'Done']);
        }
    }
}
