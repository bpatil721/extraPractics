<?php
namespace App\Repositories;
use App\Models\Post;
class PostRepository{
    public function getPostData($perPage){
       return Post::latest()->paginate($perPage);
    }
}
?>