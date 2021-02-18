<?php


namespace App\Controllers;

use App\Models\Post;

class HomeController extends Controller
{


    public function all()
    {
        $post  = new Post();
        $posts = $post->get();
        $total_completed_post = $post->get(['status' => false], [], true);
        $item  = count($posts) - $total_completed_post;

        return self::View('pages/home', ['posts' => $posts, 'item' => $item, 'total_post'=> count($posts), 'total_completed_post' => $total_completed_post]);
    }




    public function active()
    {
        $post  = new Post();
        $posts = $post->get(['status' => true]);
        $item  = count($posts); 
        $total_post = $post->get([], [], true);
        $total_completed_post = $total_post - $item;

        return self::View('pages/home', ['posts' => $posts,'item' => $item, 'total_post' => $total_post, 'total_completed_post' => $total_completed_post]);
    }


    

    public function completed()
    {
        $post  = new Post();
        $posts = $post->get(['status' => false]);
        $item  = $post->get(['status' => true], [], true);
        $total_completed_post = count($posts);
        $total_post = $total_completed_post + $item;

        return self::View('pages/home', ['posts' => $posts, 'item' => $item, 'total_post' => $total_post, 'total_completed_post' => $total_completed_post]);
    }
}