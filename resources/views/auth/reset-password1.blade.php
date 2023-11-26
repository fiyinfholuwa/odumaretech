
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Place your custom CSS styles here */
        /* ... */
        .container{
            width:40%;
            margin:60px 30%;
        }
    </style>
</head>

<body>
<div style="padding:40px"  class="card container">
    <div class="text-center">
    <img style="object-fit:contain;" height="40px" width="120px"  src="{{asset('frontend/assets/images/synta_logo.png')}}" alt="">
        <form method="POST" action="{{ route('password.store') }}">
            <!-- CSRF Token -->
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input  id="email" class="form-control mt-1" type="hidden" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                <!-- Display error messages if any -->
                @if ($errors->has('email'))
                <div class="mt-2 text-danger">
                    @foreach ($errors->get('email') as $error)
                    <span>{{ $error }}</span><br>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control mt-1" type="password" name="password" required autocomplete="new-password">
                <!-- Display error messages if any -->
                @if ($errors->has('password'))
                <div class="mt-2 text-danger">
                    @foreach ($errors->get('password') as $error)
                    <span>{{ $error }}</span><br>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" class="form-control mt-1" type="password" name="password_confirmation" required autocomplete="new-password">
                <!-- Display error messages if any -->
                @if ($errors->has('password_confirmation'))
                <div class="mt-2 text-danger">
                    @foreach ($errors->get('password_confirmation') as $error)
                    <span>{{ $error }}</span><br>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
