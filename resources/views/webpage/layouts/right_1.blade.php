<ul class="list_apps">
    <li style="max-height:400px;">

    </li>
</ul>
<div class="box"><a href="/najlepsze-dzwonki"><h2 class="title"><i class="fa fa-music" aria-hidden="true"></i> Najlepsze Dzwonki <i class="fa fa-angle-right"></i></h2></a>
    <ul class="list_apps">

        @php $songs = \App\Models\Song::where('display',1)->orderBy("downloads", "desc")->limit(5)->get() @endphp
        @foreach($songs as $key => $song)
            <li class="app_item">

                <div class="app_thumb">
                    <span class="order order-1">{{$key+1}}</span>

                </div>
                <a href="/{{$song->slug}}" class="app_name" title="">{{$song->title}}</a>
                <div class="starsx">
                    <span><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</span>
                    <span><i class="fa fa-download" aria-hidden="true"></i> {{$song->downloads}}</span>
                    <span><i class="fa fa-file-audio-o" aria-hidden="true"></i> {{$song->size}}</span>
                </div>
{{--                <div class="developer"><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</div>--}}

            </li>
        @endforeach
        <li class="app_item_more">
            <a href="/najlepsze-dzwonki">Zobacz więcej</a>
        </li>
    </ul>
</div>

<br>
<div style="clear:both;"></div>
<span style="display:block; text-align:center;border-bottom:1px solid #ededed;margin-bottom:5px;">Advertisement</span>


<div style="clear:both;"></div>
<br>
<div class="box">
    &nbsp; &nbsp;<a href="/popularny"><h2 class="title"><i class="fa fa-music" aria-hidden="true"></i> Popularny <i class="fa fa-angle-right"></i></h2></a>
    <ul class="list_apps">

        @php $songs = \App\Models\Song::where('display',1)->orderBy("listeners", "desc")->limit(5)->get() @endphp
        @foreach($songs as $key => $song)
            <li class="app_item">

                <div class="app_thumb">
                    <span class="order order-1">{{$key+1}}</span>

                </div>
                <a href="/{{$song->slug}}" class="app_name" title="">{{$song->title}}</a>
                <div class="starsx">
                    <span><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</span>
                    <span><i class="fa fa-download" aria-hidden="true"></i> {{$song->downloads}}</span>
                    <span><i class="fa fa-file-audio-o" aria-hidden="true"></i> {{$song->size}}</span>
                </div>
{{--                <div class="developer"><i class="fa fa-eye" aria-hidden="true"></i> {{$song->listeners}}</div>--}}

            </li>
        @endforeach

        <li class="app_item_more">
            <a href="/popularny/">Zobacz więcej</a>
        </li>
    </ul>
</div>
