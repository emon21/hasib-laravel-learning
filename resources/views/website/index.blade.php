@extends('website.layouts.master')
@section('styles')
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&amp;family=Open+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/theam.css') }}" />
<title>Echo &mdash; Free Bootstrap 5 Website Template by Colorlib</title>
@endsection

@section('content')
rfrfrr
@endsection

@section('script')
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/tiny-slider.js') }}"></script>
<script src="{{ asset('frontend/aos.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"70267b8c8ef754ff","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
@endsection
