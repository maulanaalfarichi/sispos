<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>SIKOBE</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="Sulaeman" name="author" />

        <link rel="shortcut icon" href="{{ url('/favicon.png') }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

        <!-- Styles -->
        {{ \App\Support\Asset::css('header.top.specific.css') }}
        <link rel="stylesheet" href="{{ elixir('assets/css/global-plugin.css') }}">
        <link rel="stylesheet" href="{{ elixir('assets/css/theme.css') }}">
        <link rel="stylesheet" href="{{ elixir('assets/css/front-layout.css') }}">
        {{ \App\Support\Asset::css('header.specific.css') }}

        {{ \App\Support\Asset::scripts('header.scripts') }}
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="javascript:;">
                        <img src="{{ url('assets/img/logo.png') }}" alt="logo" class="logo-default" />
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a href="{{ url('/') }}" class="dropdown-toggle">
                                <i class="icon-home"></i> <span class="hidden-xs">Beranda</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/informations') }}" class="dropdown-toggle">
                                <i class="icon-feed"></i> <span class="hidden-xs">Informasi</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/incidents') }}" class="dropdown-toggle">
                                <i class="icon-fire"></i> <span class="hidden-xs">Kejadian</span>
                            </a>
                        </li>
                        <!--<li class="dropdown">
                            <a href="{{ url('/needs') }}" class="dropdown-toggle">
                                <i class="icon-heart"></i> <span class="hidden-xs">Daftar Kebutuhan</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/new-incident') }}" class="dropdown-toggle">
                                <i class="icon-flag"></i> <span class="hidden-xs">Laporkan Kejadian</span>
                            </a>
                        </li>-->
                        <li class="dropdown">
                            <a href="{{ url('/contact') }}" class="dropdown-toggle">
                                <i class="icon-envelope"></i> <span class="hidden-xs">Kirim Pesan</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#support-modal" data-toggle="modal" class="dropdown-toggle">
                                <i class="icon-support"></i> <span class="hidden-xs">Mengenai SIKOBE</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->

        <!-- BEGIN CONTAINER -->
        <div class="page-container"></div>

        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->

        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; SIKOBE by <a href="https://github.com/feelinc/sikobe" class="font-white" target="_blank">RELAWAN TIK</a>.</div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->

        <!-- BEGIN SUPPORT MODAL -->
        <div id="support-modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Mengenai SIKOBE</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Sistem Informasi Korban Bencana</h4>
                        <p class="margin-top-20">
                            Aplikasi web ini awalnya di bangun untuk membantu para relawan memberikan informasi mengenai situasi dari semua area yang terdampak bencana banjir di Garut, sehingga publik dapat memantau perkembangannya dan dapat menyalurkan bantuan ke area yang membutuhkan.
                        </p>
                        <p class="margin-top-20">
                            Aplikasi ini di bangun pertama kali oleh para <a href="http://komtik-garut.blogspot.co.id/" target="_blank">Relawan TIK</a> - <a href="https://www.facebook.com/groups/petik.komtik.garut" target="_blank">Perhimpunan Pengembang Platform TIK</a> daerah Garut. Karena keterbatasan waktu para relawan yang mempunyai kemampuan web programming, maka awal belum semua fasilitas terimplementasi. Aplikasi ini akan terus di kembangkan dengan bantuan para kontributor yang mendukung aplikasi open source.
                        </p>
                        <p class="margin-top-20">Di dukung dan system requirement di rancang oleh <a href="http://rindacahyana.sttgarut.ac.id/" target="_blank">Rinda Cahyana</a>.</p>
                        </p>
                        <h3>Pengembang Awal</h3>
                        <p class="margin-top-20">Semua kontributor awal berasal dari Garut - Jawa Barat.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <ul class="list-unstyled margin-top-10 margin-bottom-10">
                                    <li>
                                        <i class="fa fa-check"></i> <a href="https://github.com/feelinc" target="_blank">Sulaeman</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> <a href="https://github.com/antoniosai" target="_blank">Antonio Saiful Islam</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-6">
                                <ul class="list-unstyled margin-top-10 margin-bottom-10">
                                    <li>
                                        <i class="fa fa-check"></i> <a href="https://github.com/iqbalhikmat" target="_blank">Ikbal Ikbal Mohamad Hikmat</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> <a href="https://github.com/saddamalmahali" target="_blank">Saddam Almahali</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h3><a href="https://github.com/feelinc/sikobe" target="_blank">Ikut Mengembangkan</a></h3>
                        <p class="margin-top-20">
                            Terima kasih untuk ikut membantu mengembangkan aplikasi web ini. Semoga menjadi lebih lengkap fasilitas nya untuk mempermudah melakukan bantuan pasca bencana, baik oleh para relawan maupun publik memantau situasi.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SUPPORT MODAL -->

        <!-- JavaScripts -->
        <!--[if lt IE 9]>
        <script src="{{ elixir('assets/js/ie.js') }}"></script>
        <![endif]-->

        <script src="{{ url('/assets/js/api.js') }}"></script>

        {{ \App\Support\Asset::scripts('footer.scripts') }}

        <script src="{{ elixir('assets/js/global-plugin.js') }}"></script>
        <script src="{{ url('/assets/js/app.min.js') }}"></script>
        <script src="{{ elixir('assets/js/ui.js') }}"></script>
        <script src="{{ elixir('assets/js/layout.js') }}"></script>

        {{ \App\Support\Asset::js('footer.specific.js') }}

        @if (! app()->environment('local') && env('GOOGLE_ANALYTIC_UA'))
        <!-- Google Analytic -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', '{{ env('GOOGLE_ANALYTIC_UA') }}', 'auto');
          ga('send', 'pageview');
        </script>
        @endif
    </body>
</html>
