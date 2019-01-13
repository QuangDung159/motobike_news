<!DOCTYPE html>
<html lang="en">

@include("layouts.client.header")

<body>

<!-- Navigation -->
@include("layouts.client.navigation")
<!-- Page Content -->
<div class="container">
    <!-- slider -->
@include("layouts.client.slider")
<!-- end slide -->
    <div class="space20"></div>
    <div class="row main-left">
        @include("layouts.client.menu")

        @yield("content")
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->

<!-- Footer -->
@include("layouts.client.footer")
</body>

</html>
