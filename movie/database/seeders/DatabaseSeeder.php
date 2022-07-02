<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        Movie::truncate();
        Review::truncate();
        User::truncate();

        Review::factory(5)->create();

        // $user = User::factory()->create();

        // $movie1 = Movie::create([
        //     'title'=>"Title1",
        //     'description'=>"Description1",
        //     'director'=>"Director1"
        // ]);

        // $movie2 = Movie::create([
        //     'title'=>"Title2",
        //     'description'=>"Description2",
        //     'director'=>"Director2"
        // ]);

        // $movie3 = Movie::create([
        //     'title'=>"Title3",
        //     'description'=>"Description3",
        //     'director'=>"Director3"
        // ]);

        // $review1 = Review::create([
        //     'rating'=>"8",
        //     'comment'=>"Comment1",
        //     'user_id'=>$user->id,
        //     'movie_id'=>$movie1->id
        // ]);

        // $review2 = Review::create([
        //     'rating'=>"8",
        //     'comment'=>"Comment1",
        //     'user_id'=>$user->id,
        //     'movie_id'=>$movie2->id
        // ]);

        // $review3 = Review::create([
        //     'rating'=>"8",
        //     'comment'=>"Comment1",
        //     'user_id'=>$user->id,
        //     'movie_id'=>$movie3->id
        // ]);
        
    }
}
