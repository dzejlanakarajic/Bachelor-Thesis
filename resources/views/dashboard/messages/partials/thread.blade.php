<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>
<div class="row">
    <div class="col-md-8">
            <h4 class="media-heading">
                    Subject: <a href="{{ route('messages.show', $thread->id) }}"> {{ $thread->subject }}</a>
                    ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
                <p>
                    <small><strong>From:</strong> {{ $thread->creator()->name }}</small>
                </p>
                
    </div>
</div>