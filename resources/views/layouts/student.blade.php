@props([
    'title' => '',
    'image' => '',
    'description' => '',
    'url' => ''
    
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('tcw/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('tcw/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('tcw/images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('tcw/images/site.webmanifest')}}">
    <title>{{ $title ?? 'The Connect Wave' }}</title>
    <!-- Meta Tags -->
    <meta property="og:title" content="{{$title}}">
    <meta property="og:description" content="{{$description}}">
    <meta property="og:image" content="{{$image}}">
    <meta property="og:url" content="{{$url}}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="theconnectwave.com">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('tcw/css/student/style.css')}}">
</head>
<body>
<main id="profileLayout">
{{$slot}}
</main>

<!-- Bootstrap JS and dependencies -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="{{asset('tcw/js/profile/script.js')}}"></script>
@stack('scripts')
</body>
</html>
