<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Song;
use Illuminate\Http\Request;

class WebPageController extends Controller
{
    //
    public $page;
    public $url;
    public function __construct(Request $request)
    {
        $this->page = $request->get('page');
        $this->url = "?page=";
    }
    // public function indexHome()
    // {
    //     $page = $this->page;
    //     $url = "/pagination?page=";
    //     $post = file_get_contents(storage_path("app/public/post_outside.txt"));
    //     $newestSongs = Song::orderBy("id", "desc")->where("display",1)->paginate(10);
    //     $categories = Category::where("display",1)->get();
    //     $hotSongs = Song::orderBy("downloads", "desc")->where("display",1)->limit(5)->get();
    //     return view ("webpage.home.home",
    //         compact('post', 'newestSongs', 'categories', 'hotSongs', 'page', 'url'));
    // }
    public function indexHome()
    {
        $page = $this->page;
        $url = "/page/";
        $post = file_get_contents(storage_path("app/public/post_outside.txt"));
        $newestSongs = Song::orderBy("id", "desc")->where("display",1)->paginate(10);
        $categories = Category::where("display",1)->get();
        $hotSongs = Song::orderBy("downloads", "desc")->where("display",1)->limit(5)->get();
        return view ("webpage.home.home",
            compact('post', 'newestSongs', 'categories', 'hotSongs', 'page', 'url'));
    }

    public function download(Request $request, $id)
    {

        $song = Song::where("id", $id)->first();
        if ($song != null){
            $currentDownload = $song->downloads;
            Song::where("id", $id)->update(["downloads" => $currentDownload+1]);

            $similarSongs = Song::where("category_id", $song->category_id)
                ->where("display", 1)
                ->where("id", "!=", $song->id)
                ->limit(12)->get();
            return view("webpage.download.index", compact('song', 'similarSongs'));
        } else {
            abort("404");
        }

    }
    public function dlDownload(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        if ($request->has("id")){
            $id = $request->get("id");
            $song = Song::where('id', '=', $id)->firstOrFail();
            $pathToFile=public_path(). $song->url;
            return response()->download($pathToFile);
        } else {
            abort("404");
        }

    }

//    public function newest(Request $request){
//        $page = $request->page;
//        $url = "?page=";
//        $songs = Song::orderBy("id", "desc")->paginate(10);
//        return view("webpage.categories.index", compact('songs', 'page', 'url'));
//    }



}
