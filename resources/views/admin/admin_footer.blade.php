<script type="text/javascript" src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/main.js') }}"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

@yield('footer')
