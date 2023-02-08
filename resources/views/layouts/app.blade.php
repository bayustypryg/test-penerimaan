<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Tamu - {{$title}}</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    @include('layouts.navbar')
    @yield('content')

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if(session()->has('error'))
      <script>
        swal({
          title: "Error!",
          text: "{{ session()->get('error') }}",
          icon: "error",
          button: "OK!",
        });
      </script>

      @elseif (session()->has('success'))
        <script>
            swal({
              title: "Success!",
              text: "{{ session()->get('success') }}",
              icon: "success",
              button: "OK!",
            });
        </script>
    @endif
</body>
</html>