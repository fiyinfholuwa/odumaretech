<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
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

        .font-medium {
            font-weight: 500;
        }

        .text-green-600 {
            color: #10b981;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .underline {
            text-decoration: underline;
        }

        .text-gray-900 {
            color: #111827;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .container{
            width:70%;
            margin:60px 15%;
        }
    </style>
</head>

<body>
    <div style="padding:40px"  class="card container">
    <div class="text-center">
    <img style="object-fit:contain;" height="40px" width="120px"  src="{{asset('frontend/img/img/logo.png')}}" alt="">
    </div>
        <div class="mb-4 text-sm text-gray-600">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <!-- Check if the verification link has been sent -->
        <?php if (session('status') == 'verification-link-sent') : ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        <?php endif; ?>

        <div class="mt-4 d-flex justify-content-between">

            <form method="POST" action="{{ route('verification.send') }}">
                <!-- CSRF Token -->
                <?php echo csrf_field(); ?>

                <button type="submit" class="btn btn-info">
                    Resend Verification Email
                </button>
            </form>

            <form method="GET" action="{{ route('logout') }}">
                <!-- CSRF Token -->
                <?php echo csrf_field(); ?>

                <button type="submit" class="btn btn-link text-sm text-gray-600">
                    Log Out
                </button>
            </form>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your custom JavaScript code here, if needed -->
    <script>
        // Place your custom JavaScript code here
    </script>
</body>

</html>
