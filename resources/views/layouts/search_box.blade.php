<div class="search_box">
    <input id="search" type="text" placeholder="Szukaj...">
    <button type="submit" onclick="searching($('#search').val())"><i class="fa fa-search"></i></button>
</div>

<div class='ads' style='padding-top: 150px;''>
    <script>
        let ads = $(".google-auto-placed")[0];
        $('.ads').append(ads);
        // ads.remove()
    </script>
</div>