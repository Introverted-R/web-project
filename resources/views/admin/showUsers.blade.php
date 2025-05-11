<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')

        <div class="page-content">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session()->get('message') }}
            </div>
            @endif
            <h1>All Users</h1>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Status</th>
                        <th>Activate/Deactivate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            @if ($user->status == 'deactive')
                            <a href="{{ route('admin.activateRole', $user->id) }}" class="btn btn-success">Activate</a>
                            @else
                            <a href="{{ route('admin.deactivateRole', $user->id) }}" class="btn btn-danger" onclick="confirmation(event)">Deactivate</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.footer')

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure?",
                text: "You will not be able to revert this action!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
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
</body>
</html>
