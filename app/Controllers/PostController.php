<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {

    }




    public function store()
    {
        self::methodMustBe('POST');

        $post = new Post();
        $post->create([
            'body' => self::string_sanitize($_POST['body']),
            'status' => true
        ]);

        self::back();
    }




    public function delete()
    {
        self::methodMustBe('POST');

        $post = new Post();
        $post->delete(['id' => self::id_sanitize($_POST['id'])]);

        self::back();
    }




    public function activeOrDactive()
    {
        self::methodMustBe('POST');

        $post = new Post();
        $post->update(
            ['id' => self::id_sanitize($_POST['id'])],
            ['status' => isset($_POST['status']) ? 0 : 1]
        );

        self::back();
    }




    public function update()
    {
        self::methodMustBe('POST');

        $post = new Post();
        $post->update(
            ['id' => self::id_sanitize($_POST['id'])],
            ['body' => self::string_sanitize($_POST['body'])]
        );

        self::back();
    }


    
    
    public function clearCompleted()
    {
        self::methodMustBe('POST');

        $post = new Post();
        $posts = $post->delete(['status' => false]);

        self::back();
    }


}