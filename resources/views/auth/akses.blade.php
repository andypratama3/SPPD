<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menunggu Akses Dari Admin</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class=" text-center">
                <div class="card mt-5">
                    <h5 class="card-header">Menunggu Akses Dari Admin</h5>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center w-100">
                            <a href="{{ route('dashboard') }}"
                            class="btn btn-primary btn-sm mx-3 my-2 d-flex align-items-center justify-content-center w-25">Refresh</a>
                        <form action="{{ route('logout') }}" method="POST" class="w-100 d-flex justify-content-center"> 
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();"
                            class="btn btn-danger btn-sm mx-3 my-2 d-flex align-items-center justify-content-center w-25">Logout</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 -->
    <script src="{{ asset('bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>