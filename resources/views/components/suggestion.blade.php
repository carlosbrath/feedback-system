@foreach ($users as $user)
    <div class="my-2 shadow text-white bg-dark p-1" id="">
        <div class="d-flex justify-content-between">
            <table class="ms-1">
                <tr>
                    <td class="align-middle">{{$user->name}}</td>
                    <td class="align-middle"> - </td>
                    <td class="align-middle">{{$user->email}}</td>
                    <td class="align-middle"></td>
                </tr>
            </table>
            <div>
                <button id="create_request_btn_{{ $user->id }}" class="btn btn-primary me-1">Connect</button>
            </div>
        </div>
    </div>
@endforeach
