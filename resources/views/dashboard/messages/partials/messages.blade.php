<div class="media">
    <div class="media-body">
        <h5 class="media-heading">From: {{ $message->user->name }}</h5>
        <div class="card">
                <p>{{ $message->body }}</p>
        </div>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>