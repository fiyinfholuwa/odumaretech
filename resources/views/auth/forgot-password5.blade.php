<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Place your custom CSS styles here */
        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-600 {
            color: #6b7280;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .w-full {
            width: 100%;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .block {
            display: block;
        }

        /* Add your custom button styles here */
        .primary-button {
            background-color: #9333ea;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
        }
        .container{
            width:50%;
            margin:60px 25%;
        }
    </style>
</head>

<body>
<div style="padding:40px"  class="card container">
    <div class="text-center">
    <img style="object-fit:contain;" height="40px" width="120px"  src="{{asset('frontend/assets/images/synta_logo.png')}}" alt="">
        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <!-- Session Status -->
        <!-- Note: This part requires server-side rendering or AJAX to display session status -->

        <form method="POST" action="{{ route('password.email') }}">
            <!-- CSRF Token -->
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control mt-1" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <!-- Display error messages if any -->
                @if ($errors->has('email'))
                <div class="mt-2 text-danger">
                    @foreach ($errors->get('email') as $error)
                    <span>{{ $error }}</span><br>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="d-flex justify-end mt-4">
                <button type="submit" class="btn btn-info">Email Password Reset Link</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
