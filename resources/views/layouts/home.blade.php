<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>STNEWS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
    <meta content="Bootstrap News Template - Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('logo/favicon.jpg')}}" type="image/gif" sizes="16x16">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('/css/user/slick.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/user/slick-theme.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{asset('/css/user/style.css')}}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/css/user/easing.min.js')}}"></script>
    <script src="{{asset('/css/user/slick.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/css/user/main.js')}}"></script>
</head>



    <title>Newspaper</title>
</head>
<body>
    @include('parts.nav')
    @include('post.message') 
    @yield('content')

    @include('parts.footer')  
    
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>
  var ckview = document.getElementById("ckview");
   CKEDITOR.replace(ckview,{
     language:'en-gb'
   });
</script>
  
</body>
</html>