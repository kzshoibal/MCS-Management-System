<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Profile;
use App\ProjectStatus;
use App\Role;
use App\User;
use App\UserStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

//        $user_statuses = UserStatus::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $profile = Profile::create([
            'user_id' => $user->id,
            'profile_image' => "/bower_components/AdminLTE/dist/img/avatar5.png"
        ]);

        $user->roles()->sync($request->input('roles', []));

//        if ($request->input('image', false)) {
//            $user->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
//        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        if ($request->input('image', false)) {
            if (!$user->image || $request->input('image') !== $user->image->file_name) {
                $user->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($user->image) {
            $user->image->delete();
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');
//        dd($user->profile());

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
        $user->profile->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function banUser(Request $request){

        abort_if(Gate::denies('update_user_status'),Response::HTTP_FORBIDDEN,'403 Forbidden');

        $status = $request->status;
        $userID = $request->userID;

        $update_status = DB::table('users')
            ->where('id', $userID)
            ->update([
                'status' => $status
            ]);
        if($update_status){
            echo "status updated successfully";
        }
    }
}
