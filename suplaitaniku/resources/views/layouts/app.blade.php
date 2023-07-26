<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body class="stretched">
	<!-- Document Wrapper ============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header ============================================= -->
		@include('layouts.header')
        <!-- #header end -->

		<!-- Content ============================================= -->
        @yield('content')
        <!-- #content end -->
		<!-- Footer ============================================= -->
		@include('layouts.footer')
        <!-- #footer end -->
	</div>
    <!-- #wrapper end -->
	<!-- Go To Top ============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
	<!-- JavaScripts============================================= -->
	@include('layouts.script')
</body>
</html>
