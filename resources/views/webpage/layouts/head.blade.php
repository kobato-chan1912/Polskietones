<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/webpage/favicons/fav.ico">
    <title>{{ $title }}</title>
    <meta property="og:locale" content="fi">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta property="title" content="{{ $og_title }}">
    <meta property="description" content="{{ $og_des }}">
    <meta name="description" content="{{ $og_des }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $og_title }}">
    <meta property="og:description" content="{{ $og_des }}">
    <meta property="og:url" content="{{ URL::current() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/webpage/js/js-jqinit.js" async></script>
    <script>
        var jQInit = jQInit || [];
        jQInit.push(["myModule", function($) {
            ["/webpage/js/modernizr.min.js", "/webpage/js/jquery.grab.js", "/webpage/js/jquery.jplayer.min.js",
                "/webpage/js/circle.player.js", "/webpage/js/custom.js", "/webpage/js/bootstrap.min.js",
            ].forEach(function(b) {
                var a = document.createElement("script");
                a.src = b, a.async = !1, document.head.appendChild(a)
            })
        }])
    </script>

    <link rel="dns-prefetch" href="//s.w.org">
    <link rel="stylesheet" href="https://use.typekit.net/nii3adk.css">
    <link rel="stylesheet" id="wp-block-library-css" href="/webpage/css/block-library-style.min.css" type="text/css"
        media="all">
    <link rel="stylesheet" id="wp-pagenavi-css" href="/webpage/css/wp-pagenavi-pagenavi-css.css" type="text/css"
        media="all">
    <link rel="stylesheet" id="main-style-css" href="/webpage/css/main-style.css" type="text/css" media="all">
    <link rel="stylesheet" id="bootstrap-css-css" href="/webpage/css/css-bootstrap.css" type="text/css" media="all">
    <link rel="stylesheet" id="fontawesome-css-css" href="/webpage/css/css-font-awesome.min.css" type="text/css"
        media="all">
    <link rel="stylesheet" id="style-css-css" href="/webpage/css/css-style.css" type="text/css" media="all">
    <link rel="stylesheet" id="circle-player-style-css" href="/webpage/css/circle.skin-circle.player.css"
        type="text/css" media="all">
    <link rel="stylesheet" id="circle-monday-style-css" href="/webpage/css/css-jplayer.blue.monday.min.css"
        type="text/css" media="all">
    <style type="text/css" id="wp-custom-css">
        .navbar-nav li a {
            color: #000 !important
        }

        .navbar-default .navbar-nav>.active>a {
            background-color: #5e88f6 !important
        }

        #breadcrumbs a {
            color: #a739c6 !important
        }

        .wp-pagenavi .current {
            background-color: #65b0f4 !important;
            color: #fff
        }

        .wp-pagenavi a {
            color: #000
        }

        .entry-content {
            margin-bottom: 20px
        }

        .page-description {
            padding: 20px 20px 50px;
            background-color: #f7f7f7;
            border: 2px solid #454545;
            border-radius: 10px;
            margin-bottom: 50px;
            position: relative
        }

        .page-description .button {
            position: absolute;
            bottom: 15px;
            left: 0;
            width: 100%;
            z-index: 2;
            text-align: center
        }

        .page-description .button button {
            background: #65b0f4;
            cursor: pointer;
            color: #fff;
            border: none;
            padding: 8px 15px;
            min-width: 180px;
            font-size: 18px;
            transition: background .2s linear
        }

        .page-description.summary .entry-content {
            height: 110px;
            overflow: hidden;
            position: relative
        }

        .entry-contentp {
            line-height: 1.5;
            margin: 0 0 20px
        }

        .page-description .button button:hover {
            background: #ee493f
        }
    </style>

    {{-- css load blocking resources --}}


    {{-- <link rel="preload" href="/webpage/css/block-library-style.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="/webpage/css/block-library-style.min.css">
    </noscript>
    <link rel="preload" href="/webpage/css/wp-pagenavi-pagenavi-css.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="/webpage/css/wp-pagenavi-pagenavi-css.css">
    </noscript> --}}
    @php
        $content = file_get_contents(storage_path('app/public/head.txt'));
        echo $content;
    @endphp

</head>
