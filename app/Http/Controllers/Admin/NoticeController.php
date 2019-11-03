<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNoticeRequest;
use Gate;
use App\Notice;
use Symfony\Component\HttpFoundation\Response;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('notice_access'),Response::HTTP_FORBIDDEN,'403 Forbidden');

        $notices = Notice::all();
//        $users = User::all();
//        $projects = Project::all();

        return view("admin.notices.index", compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('notice_create'),Response::HTTP_FORBIDDEN,'403 Forbidden');
        return view('admin.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticeRequest $request)
    {
//        dd($request->all());
//        $notice = new Notice;
//
//        $notice->title = $request->title;
//        $notice->description = $request->description;
//        $notice->contents = $request->contents;
//
//        $notice->save();

//        return view('admin.notices.index');

        $notice = Notice::create($request->all());
        return redirect()->route('admin.notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        abort_if(Gate::denies('notice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

//        $project->load('users', 'status', 'bank_account');

        return view('admin.notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        abort_if(Gate::denies('notice_edit'),Response::HTTP_FORBIDDEN,'403 Forbidden');
        return view ('admin.notices.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
//        dd($request->all());
        $notice->update($request->all());
        return redirect()->route('admin.notice.index')->with('success', 'Notice updated successfully !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        abort_if(Gate::denies('notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notice->delete();

        return back()->with('success', 'Notice deleted successfully.');
    }

    public function massDestroy(MassDestroyNoticeRequest $request)
    {

//        dd($request->all());
        Notice::whereIn('id',request('ids'))->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
