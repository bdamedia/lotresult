<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
			@include('frontend.includes.header')

			@yield('headerCSS')
	</head>
	<body>

		@yield('content')

		@include('frontend.includes.footer')

		@yield('footerJS')
	
	</body>
</html>