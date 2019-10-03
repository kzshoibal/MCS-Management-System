@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <p class="col-lg-12">
            @yield('title')
        </p>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <p>
                <a href="{{ route('admin.messenger.createTopic') }}" class="btn btn-primary btn-group-justified">
                    {{ trans('global.new_message') }}
                </a>
            </p>
            <div class="list-group">
                <a href="{{ route('admin.messenger.index') }}" class="list-group-item">
                    {{ trans('global.all_messages') }}
                </a>
                <a href="{{ route('admin.messenger.showInbox') }}" class="list-group-item">
                    @if($unreads['inbox'] > 0)
                        <strong>
                            {{ trans('global.inbox') }}
                            ({{ $unreads['inbox'] }})
                        </strong>
                    @else
                        {{ trans('global.inbox') }}
                    @endif
                </a>
                <a href="{{ route('admin.messenger.showOutbox') }}" class="list-group-item">
                    @if($unreads['outbox'] > 0)
                        <strong>
                            {{ trans('global.outbox') }}
                            ({{ $unreads['outbox'] }})
                        </strong>
                    @else
                        {{ trans('global.outbox') }}
                    @endif
                </a>
            </div>
        </div>
        <div class="col-xs-9">
            @yield('messenger-content')
        </div>
    </div>
</div>
@stop