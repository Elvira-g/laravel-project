<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function show($id,$cat) {
        $news = News::where('id','=', $id)->get();
        return view('news.show',['news'=>$news]);
    }

    public function index(){
        $listNews = Category::all();
        return view('news.index',['listNews'=>$listNews]);
    }

    public function category($id){
        $listNews = News::where('category','=',$id)->get();
        return view('news.category',['listNews'=>$listNews]);
    }

    public function toOrder(){
        return view('news.order');
    }


}
