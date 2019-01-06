@include("layouts.admin.header")
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        @include("layouts.admin.navigation")
        @include("layouts.admin.menu")
    </nav>

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

    .preview-img {
        width: 200px;
        margin-top: 1vh;
        margin-bottom: 1vh;
    }
</style>
</body>

</html>
