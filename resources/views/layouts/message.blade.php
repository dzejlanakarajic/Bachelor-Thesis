<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IBU SDP - Messages</title>

    <!-- Bootstrap -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html {
            font-size: 14px;
        }

        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }
    </style>
    @yield('styles')
</head>
<body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
                <h5 class="my-0 mr-md-auto font-weight-normal">IBU SDP</h5>
                <nav class="my-2 my-md-0 mr-md-3">
                  <a class="p-2 text-dark" href="{{route('messages')}}">Messages
                        <span class="badge badge-danger">@include('dashboard.messages.unread-count')</span></a>
                  <a class="p-2 text-dark" href="{{route('messages.create')}}">Create New</a>
                </nav>
                <a class="btn btn-outline-primary" href="{{route('home')}}">Back to Dashboard</a>
              </div>

<div class="container">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>