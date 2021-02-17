<?php


namespace App\Controllers;

use App\Models\Post;

class HomeController extends Controller
{


    public function all()
    {
        $post  = new Post();
        $posts = $post->get();
        $total_completed_post = $post->rowCount("COUNT(id)", "status = false");
        $item  = count($posts) - $total_completed_post;
        return $this->View('pages/home', ['posts' => $posts, 'item' => $item, 'total_post'=> count($posts), 'total_completed_post' => $total_completed_post]);
    }




    public function active()
    {
        $post  = new Post();
        $posts = $post->get("*", "status = true");
        $item  = count($posts); 
        $total_post = $post->rowCount("COUNT(id)");
        $total_completed_post = $total_post - $item;

        return $this->View('pages/home', ['posts' => $posts,'item' => $item, 'total_post' => $total_post, 'total_completed_post' => $total_completed_post]);
    }


    

    public function completed()
    {
        $post  = new Post();
        $posts = $post->get("*", "status = false");
        $item  = $post->rowCount("COUNT(id)", "status = true");
        $total_completed_post = count($posts);
        $total_post = $total_completed_post + $item;

        return $this->View('pages/home', ['posts' => $posts, 'item' => $item, 'total_post' => $total_post, 'total_completed_post' => $total_completed_post]);
    }
}