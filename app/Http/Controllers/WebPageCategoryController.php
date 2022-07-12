<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Song;
use Illuminate\Http\Request;

class WebPageCategoryController extends Controller
{
    //
    public $page;
    public $url;
    public function __construct(Request $request)
    {
        $this->page = $request->get('page');
        $this->url = "?page=";
    }

    public function loadView($songs, $title, $ogTitle, $ogDes){
        return view("webpage.categories.index",
            ["songs" => $songs, "page" => $this->page, "url" => $this->url,
                "og_title" => $ogTitle, "og_des" => $ogDes, "title" => $title]);
    }

    public function newestSongs()
    {
        $songs = Song::orderBy("id", "desc")->where("display", 1)->paginate(10);
        return $this->loadView($songs,
            "Najnowsze Dzwonki",
            "Najnowsze Dzwonki - Pobierz w 100% darmowe Dzwonki | ". env("WEB_NAME"),
            "Pobierz 10.000 Najnowsze Dzwonki w formacie mp3 na wszystkie urządzenia mobilne. Pobierz najnowsze dzwonki 2021 za darmo.");
    }
    public function popularSongs()
    {
        $songs = Song::orderBy("listeners", "desc")->where("display", 1)->paginate(10);
        return $this->loadView($songs, "Popularny",
            "Top Dzwonki Najnowsze Dzwonki - Pobierz w 100% darmowe Dzwonki | ". env("WEB_NAME"),
            "Pobierz 10.000 Top Dzwonki w formacie mp3 na wszystkie urządzenia mobilne. Pobierz najnowsze dzwonki 2021 za darmo.",
        );
    }

    public function categorySongs($slug){
        // Slug Solve //
        $category = Category::where("category_slug", $slug)->where("display",1)->first();
        $song = Song::where("slug", $slug)->where("display",1)->first();
        $post = Post::where("slug", $slug)->where("display",1)->first();

        if ($category != null){ // has category

            $songs = Song::where("category_id", $category->id)->where("display", 1)->paginate(10);
            $title = "Kolekcja Dzwonków " . $category->category_name;
            return $this->loadView($songs, $title, $category->meta_title, $category->meta_description);

            // return view
        } elseif ($song!= null){ // has Song

            $similarSongs = Song::where("category_id", $song->category_id)
                ->where("display", 1)
                ->where("id", "!=", $song->id)
                ->limit(12)->get();
            $currentListener = $song->listeners;
            Song::where("id", $song->id)->update(["listeners" => $currentListener+1]);
            return view("webpage.song.index",
                ["song" => $song, "similarSongs" => $similarSongs, "og_title" => $song->meta_title,
                    "og_des" => $song->meta_description]);

        } elseif ($post != null){ // has Post

            return view("webpage.post.index", ["post" => $post]);
        }
        else {
            return abort('404');
        }
    }

    public function losMejores(){
        $songs  = Song::orderBy("downloads", "desc")->where("display", 1)->paginate(10);
        return $this->loadView($songs, "Najlepsze Dzwonki",
            "Najnowsze Dzwonki - Pobierz w 100% darmowe Dzwonki | ". env("WEB_NAME"),
        "Pobierz 10.000 Najnowsze Dzwonki w formacie mp3 na wszystkie urządzenia mobilne. Pobierz najnowsze dzwonki 2021 za darmo.");
    }
    public function search(Request $request, $search){
        $songs = Song::where('title', 'LIKE', "%$search%")->paginate(10);
        return $this->loadView($songs, "Search Results: $search", "You searched for $search - ". env("WEB_NAME"),
        "");
    }
}
