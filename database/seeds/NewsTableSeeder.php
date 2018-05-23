<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'title' => 'Article About PHP2',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 1,
            'slug' => 'article-about-php2',
        ]);
        News::create([
            'title' => 'Article About PHP3',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 1,
            'slug' => 'article-about-php3',
        ]);
        News::create([
            'title' => 'Article About PHP4',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 1,
            'slug' => 'article-about-php4',
        ]);
        News::create([
            'title' => 'Article About PHP5',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 1,
            'slug' => 'article-about-php5',
        ]);


        News::create([
            'title' => 'Article About PHP5',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 1,
            'slug' => 'article-about-php5',
        ]);
        
        News::create([
            'title' => 'Article About Laravel2',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 2,
            'slug' => 'article-about-laravel2',
        ]);
        News::create([
            'title' => 'Article About Laravel3',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 2,
            'slug' => 'article-about-laravel3',
        ]);
        News::create([
            'title' => 'Article About Laravel4',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 2,
            'slug' => 'article-about-laravel4',
        ]);
        News::create([
            'title' => 'Article About Laravel5',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 2,
            'slug' => 'article-about-laravel5',
        ]);


        News::create([
            'title' => 'Article About Java',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 3,
            'slug' => 'article-about-java2',
        ]);
        News::create([
            'title' => 'Article About Java',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 3,
            'slug' => 'article-about-java3',
        ]);
        News::create([
            'title' => 'Article About Java',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 3,
            'slug' => 'article-about-java4',
        ]);
        News::create([
            'title' => 'Article About Java',
            'article' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'admin_id' => 1,
            'news_category_id' => 3,
            'slug' => 'article-about-java5',
        ]);
    }
}
