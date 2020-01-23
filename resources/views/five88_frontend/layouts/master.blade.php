<!DOCTYPE html>
<html lang="en" class="no-js">
	@yield('title')
	@include('five88_frontend.includes.header')

	@yield('headerCSS')
<body>

	@yield('content')

	@include('five88_frontend.includes.footer')

	@yield('footerJS')

</body>
</html>
