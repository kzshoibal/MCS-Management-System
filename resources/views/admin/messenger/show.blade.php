@extends('admin.messenger.template')

@section('title', $topic->subject)

@section('messenger-content')
<div class="row">
    <p>
        @if($topic->receiverOrCreator() !== null && !$topic->receiverOrCreator()->trashed())
            <a href="{{ route('admin.messenger.reply', [$topic->id]) }}" class="btn btn-primary">
                {{ trans('global.reply') }}
            </a>
        @endif
    </p>
    <div class="col-md-12">
        <div class="list-group">
            @foreach($topic->messages as $message)
                <div class="row list-group-item">
                    <div class="row">
                        <div class="col col-xs-10">
                            <strong>{{ $message->sender->email }}</strong>
                        </div>
                        <div class="col col-xs-2">
                            {{ $message->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="row">
                        <div class="col col-xs-12">
                            {{ $message->content }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection