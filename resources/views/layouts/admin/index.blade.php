@include("layouts.admin.header")
<body>
<div id="wrapper">

    <!-- Navigation -->
@include("layouts.admin.navigation")

<!-- Page Content -->
@yield("content")
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@include("layouts.admin.footer")
@yield("script")
@yield("style")
<style>
    .notification {
        margin-top: 1vh;
    }
</style>
</body>

</html>
