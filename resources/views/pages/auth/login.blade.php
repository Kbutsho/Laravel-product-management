<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- css --}}
    <link rel="stylesheet" href="css/login.css">
    {{-- Google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

    <title>Login</title>
    <style>
        strong {
            font-size: 12px;
            color: red;
        }
    </style>
</head>

<body>
    <div>
        <div class=" container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <div class="px-4 py-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; background: white">
                <h4 class="fw-bold text-primary">Login Here</h4>

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert"">
                    <span style=" color: blue; font-weight: bold">{{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif($message = Session::get('warning'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert"">
                    <span style=" color: red; font-weight: bold">{{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <span style="color: red; font-weight: bold">Please check the below errors</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form class="form" action="{{route('/login')}}" method="post">
                    {{csrf_field()}}
                    <input value="{{old('email')}}" type="text" name="email" placeholder="your email"
                        class="form-control mt-3">
                    @error('email')<strong>{{$message}}</strong>@enderror

                    <input value="{{old('password')}}" type="password" name="password" placeholder="your password"
                        class="form-control mt-3">
                    @error('password')<strong>{{$message}}</strong>@enderror

                    <input type="submit" value="Login" class="btn btn-sm btn-primary w-100 mt-3">

                </form>
                <div class="mt-3 d-flex justify-content-end">
                    <small class="fw-bold">
                        new user? <a href="/signup">REHISTER HERE!</a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>