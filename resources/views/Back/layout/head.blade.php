<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ App::getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="{{ Auth::user()->name }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>{{ config('app.name') }}</title>

  <link rel="apple-touch-icon" href="{{ asset('Back/base/assets/images/apple-touch-icon.png') }}">
  <link rel="shortcut icon" href="{{ asset('Back/base/assets/images/favicon.ico') }}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('Back/global/css/bootstrap.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/global/css/bootstrap-extend.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/base/assets/css/site.min599c.css') }}">

  <!-- Skin tools (demo site only) -->
  <link rel="stylesheet" href="{{ asset('Back/global/css/skintools.min599c.css') }}">
  <script src="{{ asset('Back/base/assets/js/Plugin/skintools.min599c.js') }}"></script>

  <!-- Plugins -->
  <link rel="stylesheet" href="{{ asset('Back/global/vendor/animsition/animsition.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/global/vendor/asscrollable/asScrollable.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/global/vendor/switchery/switchery.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/global/vendor/intro-js/introjs.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/global/vendor/slidepanel/slidePanel.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/global/vendor/flag-icon-css/flag-icon.min599c.css') }}">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('Back/global/fonts/web-icons/web-icons.min599c.css') }}">
  <link rel="stylesheet" href="{{ asset('Back/global/fonts/brand-icons/brand-icons.min599c.css') }}">
  <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--    Data table--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


    <!-- Scripts -->
  <script src="{{ asset('Back/global/vendor/breakpoints/breakpoints.min599c.js') }}"></script>
    {{--Ckeditor--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '.mytextarea'
     
      });
    </script>

    <script>
    Breakpoints();
  </script>
</head>
