@extends('layouts.app') <!-- Extend your app's main layout -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Feedbacks</h1>
            </div>
            <div class="col-4 text-right">
                <a class="btn btn-primary" href="/feedback/create">Add Feedback</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
        <table class="table">
            <thead class="blue-bg">
                <tr>
                    <th>User</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Votes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbackSubmissions as $submission)
                    <tr>
                        <td>{{ $submission->user->name }}</td>
                        <td>{{ $submission->title }}</td>
                        <td>{{ $submission->description }}</td>
                        <td>{{ $submission->category }}</td>
                        <td>{{ $submission->votes }}</td>
                        <td>
                            <div class="d-flex">
                        <form method="post" action="{{ route('feedback.upvote', $submission) }}">
                            @csrf
                            <button type="submit" class="btn d-flex mr-3 btn-primary btn-info"><span class="mr-3" id="icon"><i class="far fa-thumbs-up"></i></span>
                            <span id="count">{{ $submission->votes }}</span></button>
                        </form>
                        <button type="button" class="btn d-flex mr-3 btn-primary btn-info" data-toggle="modal" data-target="#dynamicModal" data-id="{{ $submission->id }}"><span class="mr-2" id="icon"><i class="fa-solid fa-comment"></i></span>
                        <span id="count">{{ $submission->comments->count() }}</span></button>
                        </div>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        </div>
        </div>
        <div class="row">
            <div class="col-6">
            {{ $feedbackSubmissions->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- In your main view or page -->

<div class="modal fade" id="dynamicModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- Content will be dynamically replaced here -->
        <div class="modal-content"></div>
    </div>
</div>
<!-- In your main view or page, add this script at the end -->

<script>
    $('#dynamicModal').on('show.bs.modal', function (event) {
        console.log('Show data')
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);

        // Fetch data using Ajax and update the modal content
        $.ajax({
            url: '/show-modal/' + id,
            method: 'GET',
            success: function(data) {
                modal.find('.modal-content').html(data);
            },
            error: function(error) {
                console.error(error);
            }
        });   
    });
</script>

@endsection
