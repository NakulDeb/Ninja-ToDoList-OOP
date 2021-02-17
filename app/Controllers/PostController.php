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

        $data = array();
        $data['body'] = self::sanitize($_POST['body']);

        $post = new Post();
        $post->create($data);

        self::back();
    }




    public function delete()
    {
        self::methodMustBe('POST');

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

        $post = new Post();
        $post->delete("id = $id ");

        self::back();
    }




    public function activeOrDactive()
    {
        self::methodMustBe('POST');

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT) ? 0 : 1;

        $post = new Post();
        $post->update("status = $status","id = $id");

        self::back();
    }




    public function update()
    {
        self::methodMustBe('POST');

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);;
        $body = self::sanitize($_POST['body']);

        $post = new Post();
        $post->update("body = '$body'","id = $id");

        self::back();
    }


    
    
    public function clearCompleted()
    {
        self::methodMustBe('POST');

        $post = new Post();
        $posts = $post->delete("status = false");

        self::back();
    }


}