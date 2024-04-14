<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $photos = Photo::all();
        $services=Service::query()
            ->orderBy('updated_at')
            ->paginate(6);
        return view('home', compact('services', 'photos'));
    }

    public function view(){
        $services=Service::all();
        return view('services', compact('services'));
    }

    public function serviceView($id){
        $services=Service::all();
        $service = Service::all()->where('id', $id);
        return view('service', compact('id', 'service', 'services'));
    }
}
