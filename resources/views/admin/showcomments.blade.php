@extends('admin.adminhome')

@section('content')
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <h1>All Comments</h1>

        <table class="styled-table">
            <thead>

                <tr>
                    <th>Comments</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->content }}</td>
                        <td>
                            <a href="{{ route('admin.deleteComment', $comment->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to Delete this comment?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    <script>
        $(document).ready(function(){
            $(".alert .close").click(function(){
                $(this).parent().fadeOut(200);
            });
        });
        </script>
@endsection
