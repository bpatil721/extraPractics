<?php
namespace App\Services;
use App\Repositories\PostRepository;

class PostService {
    public function __construct(
        private PostRepository $postRepository
    ){}

    public function getPostData($perPage){
         return $this->postRepository->getPostData($perPage);
    }

}

?>