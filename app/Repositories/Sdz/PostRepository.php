<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 31/01/2020
 * Time: 09:46
 **/

namespace App\Repositories\Sdz;

use App\Models\Sdz\Post;


class PostRepository
// class PostRepository extends ResourceRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        // $this->model = $post;
    }

    public function getPaginate($n)
    {
        // return $this->model->with('user')
        return $this->post->with('user')
            ->orderBy('sdz_posts.created_at','desc')
            ->paginate($n);
    }


    public function store($inputs)
    {
        $this->post->create($inputs);
    }

    public function destroy($id)
    {
        $this->post->findOrFail($id)->delete();
    }

}