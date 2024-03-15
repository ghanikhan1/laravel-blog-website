<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
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
<!-- services section start -->
    <x-home.service :$posts/>
<!-- services section end -->
<!-- about section start -->
    <x-home.about/>
<!-- about section end -->

<!-- footer section start -->
    <x-home.footer/>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html
                Templates</a></p>
    </div>
</div>
<!-- copyright section end -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript -->
<script src="js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
