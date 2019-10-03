<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserStatusRequest;
use App\Http\Requests\StoreUserStatusRequest;
use App\Http\Requests\UpdateUserStatusRequest;
use App\UserStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userStatuses = UserStatus::all();

        return view('admin.userStatuses.index', compact('userStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userStatuses.create');
    }

    public function store(StoreUserStatusRequest $request)
    {
        $userStatus = UserStatus::create($request->all());

        return redirect()->route('admin.user-statuses.index');
    }

    public function edit(UserStatus $userStatus)
    {
        abort_if(Gate::denies('user_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userStatuses.edit', compact('userStatus'));
    }

    public function update(UpdateUserStatusRequest $request, UserStatus $userStatus)
    {
        $userStatus->update($request->all());

        return redirect()->route('admin.user-statuses.index');
    }

    public function show(UserStatus $userStatus)
    {
        abort_if(Gate::denies('user_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userStatuses.show', compact('userStatus'));
    }

    public function destroy(UserStatus $userStatus)
    {
        abort_if(Gate::denies('user_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserStatusRequest $request)
    {
        UserStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
