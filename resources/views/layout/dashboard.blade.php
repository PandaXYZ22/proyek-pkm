    <!--

    =========================================================
    * Now UI Dashboard - v1.5.0
    =========================================================

    * Product Page: https://www.creative-tim.com/product/now-ui-dashboard
    * Copyright 2019 Creative Tim (http://www.creative-tim.com)

    * Designed by www.invisionapp.com Coded by www.creative-tim.com

    =========================================================

    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

    -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="https://drive.google.com/uc?export=view&id=1O_cdN2kyuG_JgyldWFrWXKPTpdywY7Zr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Dashboard - {{$title}}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Files -->
    <link href="/dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/dashboard/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/dashboard/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/trix.css">
    <script type="text/javascript" src="/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display : none
        }
    </style>
    </head>

    <body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="blue">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
        <div class="logo bg-light text-center">
            <a class="navbar-brand" href="/">
                <img src="https://drive.google.com/uc?export=view&id=1tOpOiuy-Y06a3W37FZ0Zj1DUDTmigCqR" alt="" style="height: 30px" >
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
            <li class="@if($title == "Kelas") active @endif">
                <a href="/kelas">
                <i class="now-ui-icons design_app"></i>
                <p>Kelas</p>
                </a>
            </li>
            <li class="@if($title == "Platinum") active @endif">
                <a href="/platinum">
                <i class="now-ui-icons education_atom"></i>
                <p>Platinum</p>
                </a>
            </li>
            <li class="@if($title == "Mentor") active @endif">
                <a href="/mentor">
                    <i class="now-ui-icons users_single-02"></i>
                <p>Mentor</p>
                </a>
            </li>
            <li class="@if($title == "Pertanyaan") active @endif">
                <a href="/pertanyaan">
                <i class="now-ui-icons ui-1_bell-53"></i>
                <p>Pertanyaan</p>
                </a>
            </li>
            <li class="@if($title == "Fasilitas") active @endif">
                <a href="/fasilitas">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <p>Fasilitas</p>
                </a>
            </li>
            <li class="@if($title == "Pembelajaran") active @endif">
                <a href="/pembelajaran">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>Pembelajaran</p>
                </a>
            </li>
            <li class="@if($title == "Event") active @endif">
                <a href="/event">
                    <i class="fa-solid fa-calendar-check"></i>
                    <p>Event</p>
                </a>
            </li>
            </ul>
        </div>
        </div>
        <div class="main-panel" id="main-panel">
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm" style="background: linear-gradient(to right, #b8b8b8 0%, #666666 100%)!important">
        </div>
        <div class="content">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @yield("main")
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/dashboard/js/core/jquery.min.js"></script>
    <script src="/dashboard/js/core/popper.min.js"></script>
    <script src="/dashboard/js/core/bootstrap.min.js"></script>
    <script src="/dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="/dashboard/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/dashboard/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/dashboard/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="/dashboard/demo/demo.js"></script>
    <script>
        $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initGoogleMaps();
        });
    </script>
    </body>

    </html>