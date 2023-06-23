<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(9)->create();
        Post::factory(20)->create();
        User::create([
            'name' => 'okta daffa ramadani',
            'username' => 'okta',
            'email' => 'oktadafasampang@gmail.com',
            'password' => bcrypt(12345)
        ]);

        Category::create([
            'nama' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'nama' => 'Web Developer',
            'slug' => 'web-developer'
        ]);

        Category::create([
            'nama' => 'Personal',
            'slug' => 'personal'
        ]);

        // Post::create([
        //     'category_id' => 1,
        //     'penulis_id' => 1,
        //     'judul' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit.",
        //     'isi' => '<p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos earum repudiandae harum evepniet sequi quaerat corporis magnam nemo iste, ex quos blanditiis veritatis, ab est pariatur accusantium expedita reiciendis aperiam neque cum quidem qui cupiditate voluptatibus suscipit? Eius vitae ad sint a nisi non neque quaerat consequuntur dolorem. Mollitia voluptatem vel quo. Temporibus pariatur officiis dignissimos</p> <p> libero excepturi fuga, ad, quisquam exercitationem obcaecati asperiores iure rerum atque dicta soluta consectetur nihil maxime quidem quae ratione impedit nemo expedita porro. Necessitatibus quasi libero quisquam reprehenderit, expedita quidem? Dolores harum maxime dolorem, commodi dolore earum autem vel totam placeat, accusamus velit nam.</p>

        //      <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos earum repudiandae harum eveniet sequi quaerat corporis magnam nemo iste, ex quos blanditiis veritatis, ab est pariatur accusantium expedita reiciendis aperiam neque cum quidem qui cupiditate voluptatibus suscipit? Eius vitae ad sint a nisi non neque quaerat consequuntur dolorem. Mollitia voluptatem vel quo. Temporibus pariatur officiis dignissimos</p> <p> libero excepturi fuga, ad, quisquam exercitationem obcaecati asperiores iure rerum atque dicta soluta consectetur nihil maxime quidem quae ratione impedit nemo expedita porro. Necessitatibus quasi libero quisquam reprehenderit, expedita quidem? Dolores harum maxime dolorem, commodi dolore earum autem vel totam placeat, accusamus velit nam.</p>'
        // ]);

    }
}
