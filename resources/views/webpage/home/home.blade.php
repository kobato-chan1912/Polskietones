<!DOCTYPE html>
<html lang="es">

@include('webpage.layouts.head', [
    'title' => 'Dzwonki Na Telefon '.\Carbon\Carbon::now()->year.' - Najnowsze Pobierz dzwonki MP3',
    'og_des' =>
        'Pobierz darmowe dzwonki 2023. Syntezuj dźwięki, najnowsze dzwonki mp3 na telefony za darmo na Dzwonkitones.com',
    'og_title' => 'DeDzwonki na telefon 2022 | Pobierz Dzwonek na Telefon darmowe - ' . env('WEB_NAME'),
])

<body>
    @include('webpage.layouts.header')
    <section class="body">
        <div class="banner">
            <div class="container">
                @include('layouts.search_box')
                <br>
                <div style="clear:both;"></div>
                {{-- <span --}}
                {{-- style="display:block; text-align:center;border-bottom:1px solid #ededed;margin-bottom:5px;">Advertisement</span> --}}

                <!-- yo-h -->
                <div style="clear:both;"></div>
                <br>
            </div>

        </div>
        <div class="container b_margin" style="margin-top: 0;">
            <!-- <div class="container">-->
            <div class="col-md-12 vtn-home">
                <div class="box gt-box">
                    <br>
                    <div id="container-cfq">
                        <div class="page-description summary">
                            <h1 class="gt-title page-title"><i class="fa fa-bullhorn" aria-hidden="true">
                                    Dzwonki na telefon <script>document.write(new Date().getFullYear())</script> | Pobierz najlepsze dźwięki telefonów za darmo dla Polaków
                                </i></h1>
                            <div class="entry-content">
                                @php echo $post @endphp
                            </div>
                            <div class="button">
                                <button type="button" id="btnViewMore">Czytaj więcej</button>
                            </div>
                        </div>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                    </div>

                    <div class="gt-container" style="display:none;">
                        <!--//chen thong bao cho trang chu o day-->
                        Download free ringtone for all mobile devices with more than 95.000 ringtones such as <a
                            href="https://bestringtonesfree.net/funny-ringtones/">funny ringtone</a>, animal ringtone,
                        <a href="https://bestringtonesfree.net/bollywood/">Bollywood ringtone</a>, etc


                    </div>
                </div>
            </div>


            <script>
                $(document).ready(function() {
                    $("#btnViewMore").on("click", function(e) {
                        e.preventDefault();
                        $(".page-description").toggleClass("summary");
                        if ($(this).text() == "Czytaj więcej") {
                            $(this).text("Zwiń zawartość");
                        } else {
                            $(this).text("Czytaj więcej");
                        };
                    });
                });

                // jQuery(document).ready(function($){
                // 	$("#btnViewMore").on("click", function(e) {
                // 		e.preventDefault();
                // 		$(".page-description").toggleClass("summary");
                // 		if ($(this).text() == "Lee mas") {
                // 			$(this).text("Esconder");
                // 		} else {
                // 			$(this).text("Lee mas");
                // 		};
                // 	});
                // });
            </script>
            <div class="col-md-9">
                <div class="box column-3">
                    <a href="/najnowsze-dzwonki">
                        <h1 class="title"><i class="fa fa-music" aria-hidden="true"></i> Najnowszy </h1>
                    </a>


                    <ul class="list_apps">

                        @foreach ($newestSongs as $song)
                            <li class="app_item">
                                <script type="text/javascript" defer>
                                    var jQInit = jQInit || [];
                                    jQInit.push(['myModule{{ $song->id }}', function($) {
                                        jQuery(window).on('load', function($) {
                                            iniPlayer('{{ $song->id }}', "{{ $song->url }}");
                                        });
                                    }]);
                                </script>
                                <div class="app_thumb">
                                    <div id="jquery_jplayer_{{ $song->id }}" class="cp-jplayer"></div>
                                    <div id="cp_container_{{ $song->id }}" class="cp-container">
                                        <div class="cp-buffer-holder">
                                            <!-- .cp-gt50 only needed when buffer is > than 50% -->
                                            <div class="cp-buffer-1"></div>
                                            <div class="cp-buffer-2"></div>
                                        </div>
                                        <div class="cp-progress-holder">
                                            <!-- .cp-gt50 only needed when progress is > than 50% -->
                                            <div class="cp-progress-1"></div>
                                            <div class="cp-progress-2"></div>
                                        </div>
                                        <div class="cp-circle-control"></div>
                                        <ul class="cp-controls">
                                            <li><a href="#" class="cp-play cp-play-{{ $song->id }}"
                                                    tabindex="1">play</a></li>
                                            <li><a href="#" class="cp-pause cp-pause-{{ $song->id }}"
                                                    style="display:none;" tabindex="1">pause</a></li>
                                            <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
                                        </ul>
                                    </div>
                                </div>
                                <a href="/{{ $song->slug }}" class="app_name" title="">{{ $song->title }}</a>
                                <div class="starsx">
                                    <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $song->listeners }}</span>
                                    <span><i class="fa fa-download" aria-hidden="true"></i>
                                        {{ $song->downloads }}</span>
                                    <span><i class="fa fa-file-audio-o" aria-hidden="true"></i>
                                        {{ $song->size }}</span>
                                </div>
                                {{-- <div class="developer"><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</div> --}}
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="wp-pagenavi box" role="navigation">
                    <span class="pages">Página @if (request()->has('page'))
                            {{ $page }}
                        @else
                            1
                        @endif de {{ $newestSongs->lastPage() }}</span>
                    @if ($page == 1 || !isset($page))
                        @if ($newestSongs->lastPage() == 1)

                            <a class="page smaller current" title="Page 1" href="{{ $url }}1">1</a>
                        @else
                            {{-- In first page --}}

                            <a class="page smaller current" title="Page 1" href="{{ $url }}1">1</a>
                            <a class="page smaller" title="Page 2" href="{{ $url }}2">2</a>
                            @if ($newestSongs->lastPage() >= 3)
                                <a class="page smaller" title="Page 3" href="{{ $url }}3">3</a>
                            @endif
                            <a class="last" href="{{ $url }}2">Next »</a>
                        @endif
                    @elseif($page != 1 && $page != $newestSongs->lastPage())
                        <a class="first" href="{{ $url }}{{ $page - 1 }}">« Back</a>
                        <a class="page smaller" href="{{ $url }}{{ $page - 1 }}">{{ $page - 1 }}</a>
                        <a class="page smaller current"
                            href="{{ $url }}{{ $page }}">{{ $page }}</a>
                        <a class="page smaller" href="{{ $url }}{{ $page + 1 }}">{{ $page + 1 }}</a>
                        <a class="last" href="{{ $url }}{{ $page + 1 }}">Next »</a>
                    @else
                        <a class="first" href="{{ $url }}{{ $page - 1 }}">« Back</a>
                        <a class="page smaller" href="{{ $url }}{{ $page - 1 }}">{{ $page - 1 }}</a>
                        <a class="page smaller current"
                            href="{{ $url }}{{ $page }}">{{ $page }}</a>
                    @endif
                </div>
                @if ($agent->isPhone())
                    <div class="ads-mobile-only" style="padding-bottom: 30px;">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5750925066811073"
                            crossorigin="anonymous"></script>
                        <!-- Ads 1 - Below Search -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5750925066811073"
                            data-adtest="{{ env('ADSENSE_TEST') }}" data-ad-slot="9219752340"
                            data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                @endif
                <div class="box column-3">
                    <a href="/najlepsze-dzwonki">
                        <h1 class="title"><i class="fa fa-music" aria-hidden="true"></i> Najlepsze Dzwonki </h1>
                    </a>

                    <ul class="list_apps">
                        @php
                            $populars = \App\Models\Song::orderBy('downloads', 'desc')
                                ->where('display', 1)
                                ->limit(10)
                                ->get();
                        @endphp
                        @foreach ($populars as $song)
                            <li class="app_item">
                                <script type="text/javascript" defer>
                                    var jQInit = jQInit || [];
                                    jQInit.push(['myModule{{ $song->id }}', function($) {
                                        jQuery(window).on('load', function($) {
                                            iniPlayer('{{ $song->id }}', "{{ $song->url }}");
                                        });
                                    }]);
                                </script>
                                <div class="app_thumb">
                                    <div id="jquery_jplayer_{{ $song->id }}" class="cp-jplayer"></div>
                                    <div id="cp_container_{{ $song->id }}" class="cp-container">
                                        <div class="cp-buffer-holder">
                                            <!-- .cp-gt50 only needed when buffer is > than 50% -->
                                            <div class="cp-buffer-1"></div>
                                            <div class="cp-buffer-2"></div>
                                        </div>
                                        <div class="cp-progress-holder">
                                            <!-- .cp-gt50 only needed when progress is > than 50% -->
                                            <div class="cp-progress-1"></div>
                                            <div class="cp-progress-2"></div>
                                        </div>
                                        <div class="cp-circle-control"></div>
                                        <ul class="cp-controls">
                                            <li><a href="#" class="cp-play cp-play-{{ $song->id }}"
                                                    tabindex="1">play</a></li>
                                            <li><a href="#" class="cp-pause cp-pause-{{ $song->id }}"
                                                    style="display:none;" tabindex="1">pause</a></li>
                                            <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
                                        </ul>
                                    </div>
                                </div>
                                <a href="/{{ $song->slug }}" class="app_name"
                                    title="">{{ $song->title }}</a>
                                <div class="starsx">
                                    <span><i class="fa fa-eye" aria-hidden="true"></i>
                                        {{ $song->listeners }}</span>
                                    <span><i class="fa fa-download" aria-hidden="true"></i>
                                        {{ $song->downloads }}</span>
                                    <span><i class="fa fa-file-audio-o" aria-hidden="true"></i>
                                        {{ $song->size }}</span>
                                </div>
                                {{-- <div class="developer"><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</div> --}}
                            </li>
                        @endforeach

                    </ul>
                </div>


                @if ($agent->isDesktop())
                    <div class="ads-pc-only" style="height: 20px;">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5750925066811073"
                            crossorigin="anonymous"></script>
                        <!-- Ads 1 - Below Search -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5750925066811073"
                            data-adtest="{{ env('ADSENSE_TEST') }}" data-ad-slot="9219752340"
                            data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <div class="ads-pc-only" style="height: 20px; padding-top: 30px; padding-bottom: 30px;">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5750925066811073"
                            crossorigin="anonymous"></script>
                        <!-- Ads 1 - Below Search -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5750925066811073"
                            data-ad-slot="9219752340" data-ad-format="auto"
                            data-adtest="{{ env('ADSENSE_TEST') }}" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
            </div>
            @endif
            <div class="col-md-6">
                <div class="box">
                    &nbsp; &nbsp;<a href="/najlepsze-dzwonki" title="Tonos de llamada populares">
                        <h2 class="title"><i class="fa fa-music" aria-hidden="true"></i> Najlepsze Dzwonki</h2>
                    </a>
                    <ul class="list_apps">


                        @foreach ($hotSongs as $song)
                            <li class="app_item">
                                <script type="text/javascript" defer>
                                    var jQInit = jQInit || [];
                                    jQInit.push(['myModule{{ $song->id }}', function($) {
                                        jQuery(window).on('load', function($) {
                                            iniPlayer('{{ $song->id }}', "{{ $song->url }}");
                                        });
                                    }]);
                                </script>
                                <div class="app_thumb">
                                    <div id="jquery_jplayer_{{ $song->id }}" class="cp-jplayer"></div>
                                    <div id="cp_container_{{ $song->id }}" class="cp-container">
                                        <div class="cp-buffer-holder">
                                            <!-- .cp-gt50 only needed when buffer is > than 50% -->
                                            <div class="cp-buffer-1"></div>
                                            <div class="cp-buffer-2"></div>
                                        </div>
                                        <div class="cp-progress-holder">
                                            <!-- .cp-gt50 only needed when progress is > than 50% -->
                                            <div class="cp-progress-1"></div>
                                            <div class="cp-progress-2"></div>
                                        </div>
                                        <div class="cp-circle-control"></div>
                                        <ul class="cp-controls">
                                            <li><a href="#" class="cp-play cp-play-{{ $song->id }}"
                                                    tabindex="1">play</a></li>
                                            <li><a href="#" class="cp-pause cp-pause-{{ $song->id }}"
                                                    style="display:none;" tabindex="1">pause</a></li>
                                            <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
                                        </ul>
                                    </div>
                                </div>
                                <a href="/{{ $song->slug }}" class="app_name"
                                    title="">{{ $song->title }}</a>
                                <div class="starsx">
                                    <span><i class="fa fa-eye" aria-hidden="true"></i>
                                        {{ $song->listeners }}</span>
                                    <span><i class="fa fa-download" aria-hidden="true"></i>
                                        {{ $song->downloads }}</span>
                                    <span><i class="fa fa-file-audio-o" aria-hidden="true"></i>
                                        {{ $song->size }}</span>
                                </div>
                                {{-- <div class="developer"></div> --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if ($agent->isPhone())
                <div class="ads-mobile-only" style="padding-bottom: 30px;">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5750925066811073"
                        crossorigin="anonymous"></script>
                    <!-- Ads 1 - Below Search -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5750925066811073"
                        data-adtest="{{ env('ADSENSE_TEST') }}" data-ad-slot="9219752340" data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            @endif
            <div class="col-md-6">
                <div class="box">
                    &nbsp; &nbsp;
                    <h2 class="title"><i class="fa fa-music" aria-hidden="true"></i> Kategoria
                    </h2>

                    <ul class="list_apps">


                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <a href="/{{ $category->category_slug }}">{{ $category->category_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



            {{-- <span --}}
            {{-- style="display:block; text-align:center;border-bottom:1px solid #ededed;margin-bottom:5px;">Advertisement</span> --}}

            <!-- yo-s -->
            <br>

        </div>
    </section>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62cdbc0252235356"></script>

    @include('webpage.layouts.footer')

</body>

</html>
