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
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    private function queryWithUserAndTags()
    { 
        return $this->post->with('user','tags')
            ->orderBy('sdz_posts.created_at', 'desc');
    }

    public function getWithUserAndTagsPaginate($n)
    {
        return $this->queryWithUserAndTags()->paginate($n);
    }


    public function getWithUserAndTagsForTagPaginate($tag, $n)
    { 
        return $this->queryWithUserAndTags()
            ->whereHas('tags', function($q) use($tag)
                {
                    $q->where('sdz_tags.tag_url', $tag);
                }
            )->paginate($n); 

    }


    public function getPaginate($n)
    {
        return $this->post->with('user')
            ->orderBy('sdz_posts.created_at','desc')
            ->paginate($n);
    }


    public function store($inputs)
    {
        return $this->post->create($inputs);
    }

    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $post->tags()->detach();
        $post->delete();
    }

}