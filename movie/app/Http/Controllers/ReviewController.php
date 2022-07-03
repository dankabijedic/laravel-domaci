<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $reviews = Review::all();
       return  new ReviewCollection($reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating'=>'required|integer|max:10',
            'comment'=>'required|string|max:255',
            'movie_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $review = Review::create([
            'rating'=>$request->rating,
            'comment'=>$request->comment,
            'movie_id'=>$request->movie_id,
            'user_id'=>Auth::user()->id
        ]);

        return response()->json(['Review created successfully.', new ReviewResource($review)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
       return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $validator = Validator::make($request->all(), [
            'rating'=>'required|integer|max:10',
            'comment'=>'required|string|max:255',
            'movie_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->movie_id = $request->movie_id;
        $review->save();

        return response()->json(['Review updated successfully.', new ReviewResource($review)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json('Review deleted successfully.');
    }
}
