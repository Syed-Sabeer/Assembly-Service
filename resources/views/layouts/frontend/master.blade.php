<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.frontend.meta')
    @include('layouts.frontend.css')
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="page-wrapper">
    @include('layouts.frontend.preheader')
    @include('layouts.frontend.header')

    @yield('content')
    
    @include('layouts.frontend.footer')
    @include('layouts.frontend.script')
    @yield('script')

    </div>

	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>



</body>

</html>
