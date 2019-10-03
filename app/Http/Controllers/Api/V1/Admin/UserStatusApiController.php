<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserStatusRequest;
use App\Http\Requests\UpdateUserStatusRequest;
use App\Http\Resources\Admin\UserStatusResource;
use App\UserStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserStatusResource(UserStatus::all());
    }

    public function store(StoreUserStatusRequest $request)
    {
        $userStatus = UserStatus::create($request->all());

        return (new UserStatusResource($userStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserStatus $userStatus)
    {
        abort_if(Gate::denies('user_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserStatusResource($userStatus);
    }

    public function update(UpdateUserStatusRequest $request, UserStatus $userStatus)
    {
        $userStatus->update($request->all());

        return (new UserStatusResource($userStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserStatus $userStatus)
    {
        abort_if(Gate::denies('user_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
