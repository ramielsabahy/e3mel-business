<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @yield('css')
    <link rel="stylesheet" href="{{asset('assets/css')}}/toast.min.css ">
</head>

<body id="app-container" class="menu-default show-spinner">
    @include('layouts.partials.nav')
    @include('layouts.partials.sidebar')

    @yield('content')

    @include('layouts.partials.footer')

    <script src="{{asset('assets')}}/js/vendor/jquery-3.3.1.min.js"></script>
    @yield('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js')}}/toast.js"></script>
    <script>
        $.toastDefaults.position = 'top-right';
        $.toastDefaults.dismissible = true;
        $.toastDefaults.stackable = true;
        $.toastDefaults.pauseDelayOnHover = true;
        @if(session()->has('error'))
            $.toast({
                title: 'Error',
                subtitle: '',
                content: "{{session()->get('error')}}",
                type: 'error',
                delay: 5000
            });
        @endif

        @if(session()->has('success'))
        $.toast({
            title: 'Success',
            subtitle: '',
            content: "{{session()->get('success')}}",
            type: 'success',
            delay: 5000
        });
        @endif
    </script>
</body>

</html>
