@include('includes/backend/header')
@include('includes/backend/left_side')

@yield('content')

@include('sweetalert::alert')
@include('includes/backend/footer')