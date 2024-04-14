<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $services=Service::all();
        return view('order', compact('services'));
    }

    public function create(Request $request, order $order)
    {
        $request->validate([
            'name' => ['string', 'min:3', 'max:255', 'required'],
            'phone' => ['string', 'min:11', 'max:12', 'required'],
            'file' => ['image'],
        ]);
        $path = $request->file('file')->store('orders', 'public');
        $newOrder = [
            'name_user' => $request->name,
            'phone_user' => $request->phone,
            'photo' => $path,
            'message' => $request->message
        ];
        order::create($newOrder);
        $lastOrder = order::query()->max('id');
        return redirect(route('order'))->withErrors('Ваша заявка №'.$lastOrder.' обрабатывается');
    }
}
