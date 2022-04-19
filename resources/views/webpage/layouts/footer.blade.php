<section class="footer">


    <div class="container cat">
        <div class="category-list-footer">
            <div class="footer-header">
                <h2 class="footer-title"><i class="fa fa-book" aria-hidden="true"></i> Posty </h2>
            </div>
            <ul class="cat-list">
                @php $posts = \App\Models\Post::where("display",1)->orderBy("id", "desc")->limit(5)->get(); @endphp
                @foreach($posts as $post)
                    <li class="cat-li col-md-3 col-xs-6 col-sm-4"><a href="/{{$post->slug}}"
                                                                     title="alarma ringtone collection"><i class="fa fa-book" aria-hidden="true"></i>
                            {{$post->title}}
                            </a> </li>
                @endforeach
{{--                @php $categories = \App\Models\Category::where("display",1)->get(); @endphp--}}
{{--                @foreach($categories as $category)--}}
{{--                    <li class="cat-li col-md-3 col-xs-6 col-sm-4 app_item">--}}
{{--                        <a href="tonos-de-llamada-alarma.html" title="alarma ringtone collection">--}}
{{--                            <div class="app_thumb">--}}
{{--                                <img width="20%" src="/wp-content/uploads/2020/07/logo.png" alt="">--}}
{{--                                <a href="soy-el-unico.html" class="app_name" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>--}}
{{--                            </div>--}}



{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
            </ul>
        </div>
    </div>

    <div class="about">
        <div class="container">
{{--            <div class="copyright">--}}
{{--                Derechos de autor 2022 <a href="/">Tonosmp3gratis.com</a>--}}
{{--            </div>--}}
            <div class="copyright">
                <p>Copyright © 2022 by <a href="/">{{env("WEB_NAME")}}</a></p>
            </div>


        </div>
    </div>

    <div class="footer-28-03-2022" style="display: none">
        <h3> <a href="http://istanbulescortiletisim.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortnil.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortpartner.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescorts.org" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortbayan.net" target="_blank">istanbul escort</a> <a
                href="http://vipistanbulescorts.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortagency.com" target="_blank">istanbul escort</a> <a
                href="http://istanbulescortbayan.com" target="_blank">istanbul escort</a> </h3>
    </div>
    <script type="text/javascript" src="/webpage/js/js-wp-embed.min.js"></script>
    @include("webpage.layouts.jsloading")
</section>
