<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <base href="/public">
    <x-home.homecss/>
</head>
<body>
<!-- header section start -->
<div class="header_section">
    <x-home.header/>
    <!-- banner section start -->
    <x-home.banner/>
    <!-- banner section end -->
</div>
<!-- header section end -->

{{ $slot}}

<!-- footer section start -->
<x-home.footer/>
<!-- footer section end -->
<!-- copyright section start -->
<x-home.copy/>
<!-- copyright section end -->
<!-- Javascript files-->
<x-home.js-files/>
</body>
</html>
