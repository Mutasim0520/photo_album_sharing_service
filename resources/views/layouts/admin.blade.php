<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="/css/admin/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/js/admin/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/css/admin/animate.css" rel="stylesheet">
    <link href="/css/admin/style.css" rel="stylesheet">

    <!--- editor -->
    <link href="/css/admin/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/css/admin/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="/css/admin/animate.css" rel="stylesheet">
    <!-- Mainly scripts -->
    <script src="/js/admin/jquery-3.1.1.min.js"></script>
    <script src="/js/admin/bootstrap.min.js"></script>
    <script src="/js/admin/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/admin/inspinia.js"></script>

    <!-- jQuery UI -->
    <script src="/js/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

</head>

<body>
<div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    @if(Auth::user())

                        <li>
                            <a href="{{Route('user.show.album.add.form')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Add Album</span></a>
                        </li>
                    @endif
                        <li>
                            <a href="{{Route('user.album.credential')}}"><i class="fa fa-diamond"></i> <span class="nav-label">View Album</span></a>
                        </li>
                </ul>

            </div>
        </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.7.1/search_results.html">
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    @if(Auth::user())
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i><span class="">Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @else
                        <li>
                            <a href="{{Route('login')}}">Log In</a>
                        </li>
                        <li>
                            <a href="{{Route('register')}}">Register</a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            @yield('content')
           @include('partials._messages')

        </div>
        <div class="footer">
            <div class="pull-right">
            </div>
            <div>
                <strong>Copyright</strong> Mutasim &copy; 2018
            </div>
        </div>

    </div>
</div>


<script>
    @if(Session::has('album_credentials_missmatch'))
        $('#album_credentials_missmatch').modal('show');
        console.log("1");
    @elseif(Session::has('album_unauthorized'))
        $('#album_unauthorized').modal('show');
    console.log("1");
    @endif
</script>
@yield('script')
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jan 2018 10:55:25 GMT -->
</html>