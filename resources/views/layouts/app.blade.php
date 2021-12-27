<!DOCTYPE html>
<html>
    <head>
        <title>{{ env('APP_PAGETITLE') ?? 'Casino' }}</title>
        <link rel="preload" href="//cloud.typenetwork.com/projectLicenseWeb/30902/fontfile/woff2/?af47772613a89645788565556fc92ac5b5e40c5b" as="font" type="font/woff2" crossorigin>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, height=device-height, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="//cloud.typenetwork.com/projects/6217/fontface.css/" rel="stylesheet" type="text/css">
        <link rel="icon" href="{{ asset(env('MIX_APP_FAVICON')) ?? asset('/img/misc/favicon.png') }}">

        @if(config('app.debug'))
            <meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
            <meta http-equiv="Pragma" content="no-cache">
        @endif
        <script type="text/javascript">
            window.Layout = {
                Frontend: '{!! base64_encode(file_get_contents(public_path('css/app.css'))) !!}'
            }
        </script>

        <link rel="manifest" href="/manifest.json">
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-HD823C6YCY"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'G-HD823C6YCY');
		</script>

        <meta property="og:title" content="{{ env('APP_PAGETITLE') ?? 'Casino' }}" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{ env('MIX_APP_OGIMAGE') ?? 'Casino' }}" />
        <meta property="og:image:width" content="1200"/>
        <meta property="og:image:height" content="630"/>
        <meta property="og:image:secure_url" content="{{ env('MIX_APP_OGIMAGE') ?? 'Casino' }}" />
        <meta name="description" content="{{ env('MIX_APP_DESC') ?? 'Casino' }}"/>
        <meta property="og:image:type" content="image/svg+xml" />

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/loadingio/loading.css@v2.0.0/dist/loading.min.css"/>

        <script src="https://kit.fontawesome.com/23f13eab24.js" crossorigin="anonymous"></script>

        
        <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at 110% 70%,#1a1e20,#101112 45%);
            transition: all 0.2s ease-in-out;
        }

        </style>

    </head>

    <body>

        <div id="app">
        <div class="preloader">
            <img class="ld ld-bounce" style="height: 60px; position: absolute; top: 0; bottom: 0; margin: auto; left: 0; right: 0;" src="{{ asset(env('MIX_APP_BIG_PRELOADER')) ?? "https://games.cdn4.dk/loading.gif" }}">
        </div>
            <layout></layout>
        </div>

        <script src="{{ asset(mix('/js/app.js')) }}"></script>

        @if(config('app.debug'))
            <script src="http://localhost:8098"></script>
        @endif

    @if(env('APP_CRISPCHATKEY') !== 'off')
        <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="{{env('APP_CRISPCHATKEY')}}";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
    </script>
    @auth

    <?php
    $deposits = (\App\Invoice::where('user', auth()->user()->_id)->where('status', 1)->where('ledger', '!=','Offerwall Credit')->count());
    $registercount = (\App\User::where('register_multiaccount_hash', auth()->user()->register_multiaccount_hash)->count());
    $logincount = (\App\User::where('login_multiaccount_hash', auth()->user()->login_multiaccount_hash)->count());
    $registeripcount = (\App\User::where('register_ip', auth()->user()->register_ip)->count());
    $loginipcount = (\App\User::where('login_ip', auth()->user()->login_ip)->count());

    ?>


    <script>
        $crisp.push(["set", "user:nickname", ["{{ auth()->user()->name }}"]])
        $crisp.push(["set", "user:email", ["{{ auth()->user()->email }}"]])
        $crisp.push(["set", "session:data", [[["uid", "{{ auth()->user()->id }}" ], ["vipLevel", "{{ auth()->user()->vipLevel() }}"], ["deposits", "{{ $deposits }}"],   ["freespins", "{{ auth()->user()->freespins }}"], ["created", "{{ auth()->user()->created_at }}"], ["register_ip", "{{ auth()->user()->register_ip }}"], ["login_ip", "{{ auth()->user()->login_ip }}"], ["accounts_loginhash", "{{ $logincount }}"], ["accounts_registerhash", "{{ $registercount }}"], ["accounts_registerip", "{{ $registeripcount }}"], ["accounts_loginip", "{{ $loginipcount }}"],  ]]])

    </script>
    @endauth
    @endif

    </body>           

</html>
