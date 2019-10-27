<?php

namespace App\Http\Controllers\Admin;

use App\BankAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\ProjectStatus;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $statuses = ProjectStatus::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank_accounts = BankAccount::all()->pluck('account_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact('users', 'statuses', 'bank_accounts'));
    }

    public function store(StoreProjectRequest $request)
    {
//        dd($request->all());
        $project = Project::create($request->all());
        $project->users()->sync($request->input('users', []));

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $statuses = ProjectStatus::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank_accounts = BankAccount::all()->pluck('account_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('users', 'status', 'bank_account');

        return view('admin.projects.edit', compact('users', 'statuses', 'bank_accounts', 'project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $project->users()->sync($request->input('users', []));

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('users', 'status', 'bank_account');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
