<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PhotoForNews;
use App\Models\Service;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::query()->orderByDesc('created_at')->paginate('10');
        $services=Service::all();
        return view('news', compact('news', 'services'));
    }

    public function viewNew($id){
        $new = News::all()->where('id', $id);
        $photosForNew= PhotoForNews::all()->where('news_id', $id);
        $services=Service::all();
        return view('new', compact('new', 'services', 'photosForNew'));
    }
}
