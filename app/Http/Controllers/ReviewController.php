<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Review $review){
        $reviews = Review::all();
        $list = $reviews -> count();
        $reviews = Review::query()->orderByDesc('created_at')->paginate(10);
        $services=Service::all();
        return view('reviews', compact('reviews', 'list', 'services'));
    }

    public function create(Request $request){
        $request->validate([
            'message'=>['required', 'min:15', 'string', 'unique:reviews'],
            'rating' =>['required', 'integer', 'min:1', 'max:5']
        ]);
        $newReview = [
            'user_id' => auth()->user()->id,
            'message' => $request->message,
            'rating' => $request->rating
        ];
        Review::create($newReview);
        return redirect(route('reviews'))->withErrors('Вы оставили коментарий');
    }
}
