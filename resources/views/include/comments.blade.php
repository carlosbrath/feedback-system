<!-- resources/views/your/modal/view.blade.php -->

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">COMMENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- Display data from the controller -->
        @foreach($data as $comment)
        <div>
            <div class="comment-main">{{ $comment->content }}</div>			
			<div class="comment-main"><b>By <span>{{ $comment->user->name }}</span></b> <span><small>{{ date('Y-m-d h:m A',strtotime($comment->created_at)) }}</small></span></div>
            <hr>
            
        </div>
        @endforeach
        <div class="comment-form">
        <form method="post" action="{{ route('comments.store') }}">
        @csrf
            <input type="hidden" name="feedback_submission_id" value="{{ $feedback_id }}">
            <textarea name="content" rows="4" cols="50" placeholder="Add a comment"></textarea>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
        </div>
    </div>
</div>
