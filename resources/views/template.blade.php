<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
	<link rel="stylesheet" href="/css/all.css">
    
</head>
<body>
	@include('partials.nav')
	<div class="container-fluid">
		<div id="header">
		    @yield('header')
		</div>
		<div id="content">
		    @yield('content')		
		</div>
	</div>
	<script src="/js/all.js"></script>
	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>
	<div id="footer">
	    @yield('footer')
	</div>
</body>
</html>