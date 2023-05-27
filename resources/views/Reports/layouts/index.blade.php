<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Reports</title>


    <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/css/adminlte.min.css')}}">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/summernote/summernote-bs4.css')}}">
  <!-- select2 -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/select2/css/select2.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/sweetalert2/sweetalert2.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/toastr/toastr.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.css')}}">
  <!-- Css for tree view -->
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/plugins/jstree/style.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">

  <style type="text/css">
    .nav-tabs .nav-item {
      margin-bottom: 0px;
    }
    input[type="file"]{
      padding: 0.175rem 0.75rem;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
      background-color: #17a2b8 !important;
      border-color: #17a2b8 !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
      color: #000 !important;
    }
    .bg-gradient-success{
      background: #17a2b8 !important;
      border-color: #17a2b8 !important;
    }

      .content-wrapper{
      margin-left: 50px;
       margin-right: 50px;

    }

    div {
    word-wrap: break-word;
       word-break: break-all;
      white-space: normal;
}

   
  </style>

    <!-- For Image Upload -->

  <!-- jQuery -->
  <script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
   




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

  
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- Bootstrap -->

  <script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- overlayScrollbars -->
  <script src="{{asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

  <!-- DataTables -->
  <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.js')}}"></script>

  <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- AdminLTE App -->
  <script src="{{asset('public/backend/js/adminlte.js')}}"></script>

  <!-- Jquery validation -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>

  {{-- CK-Editor --}}
  <script type="text/javascript" src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>

  <!-- Handle bar -->
  <script src="{{asset('public/backend/js/handlebars-v4.0.12.js')}}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{asset('public/backend/js/demo.js')}}"></script>

  <script src="{{ asset('public/backend') }}/plugins/moment/moment.min.js"></script>

  <script src="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>

  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->

  <script src="{{asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- select2 -->
  <script src="{{asset('public/backend/plugins/select2/js/select2.min.js')}}"></script>

  <!-- SweetAlert2 -->
  <script src="{{asset('public/backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <!-- Js for tree view -->
  <script src="{{asset('public/backend/plugins/jstree/jstree.js')}}"></script>
  <!-- Validate js -->
  <script src="{{ asset('public/backend/js/validate.min.js') }}"></script>
  <script src="{{ asset('public/backend/js/additional-methods.js') }}"></script>
  <!-- Toastr -->
  <script src="{{asset('public/backend/plugins/toastr/toastr.min.js')}}"></script>
  <!-- Notifyjs -->
  <script src="{{asset('public/backend/js/notify.js')}}"></script>
  <script src="{{asset('public/backend/js/nestable.js')}}"></script>

 

@yield('script')

@stack('page_scripts')


</body>

</html>


