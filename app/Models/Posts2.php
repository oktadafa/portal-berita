<?php

namespace App\Models;


class Posts
{
    private static $blog_posts = [
        [
            'judul' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'penulis' => 'Okta Daffa Ramadani',
            'isi' => 'orem ipsum dolor sit amet consectetur adipisicing elit. Eius, saepe consequuntur dignissimos corporis iure repellat nobis modi molestias, impedit sunt illo. Natus tenetur cum quaerat voluptatum cupiditate excepturi ex, nesciunt iure temporibus ad tempora necessitatibus beatae similique facere explicabo, optio alias blanditiis eos, animi nulla voluptas consequatur reprehenderit? Consequuntur adipisci earum, modi distinctio vero molestias eveniet eaque unde ratione numquam nulla, aspernatur omnis mollitia voluptatem voluptatum neque, impedit officiis libero!'
        ],
        [
            'judul' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'penulis' => 'tegar amal nurrochman',
            'isi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, aspernatur soluta, consequuntur molestias illo fugiat, dolorum animi aperiam eligendi repudiandae tenetur molestiae provident sunt similique doloremque sapiente explicabo alias. Minus eum vero, unde exercitationem excepturi optio expedita adipisci eligendi dolor, distinctio recusandae nulla ea ad aut! In minus saepe voluptatibus laboriosam est, veniam nesciunt ipsa quaerat praesentium possimus cum quisquam deleniti numquam veritatis soluta nemo mollitia earum repellat tenetur ex! Hic voluptas facere enim quia nisi maiores dolorem accusantium commodi pariatur doloremque, quae quos quo incidunt. Omnis nihil molestias provident!'
        ]
        ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $post = static::all();
        return $post->firstWhere('slug', $slug);
    }

}
