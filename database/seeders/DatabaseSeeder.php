<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Dish;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
         DB::table('users')->insert([
            [
            'UserName' => 'lamiaben',
            'email' => 'lamiabenlamia528@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('lamia2002'),
            'phone' => '0623229216',
            'adress' => 'agadir morocco',
            'role' => 'admin',
            'image' => 'C:\Users\Lamia\Pictures\Camera Roll\me.jpg',
            ],
            [
                'UserName' => 'ihssan',
                'email' => 'ihssan@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('lamia2002'),
                'phone' => '0623229216',
                'adress' => 'agadir morocco',
                'role' => 'admin',
                'image' => 'C:\Users\Lamia\Pictures\Camera Roll\l.jpg',
             ]
        ]);
        User::factory(1)->create();
        $this->call(RestaurantSeeder::class);
        $this->call(CategorieSeeder::class);
        $this->call(DishSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(BlogPostSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
