<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 31/01/2020
 * Time: 09:03
 **/

namespace App\Http\Controllers\Sdz;

use App\Http\Controllers\Controller;
use App\Models\Sdz\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Sdz\PostRequest;
use App\Repositories\Sdz\PostRepository;
use App\Repositories\Sdz\TagRepository;


class PostController extends Controller
{
    protected $postRepository;

    protected $nbrPerPage = 4;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => 'index', 'indexTag']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        // $posts = $this->postRepository->getPaginate($this->nbrPerPage);
        $posts = $this->postRepository->getWithUserAndTagsPaginate($this->nbrPerPage);

        $links = $posts->render();

        return view('sdz.posts.liste', compact('posts','links'));
    }

    public function create()
    {
        return view('sdz.posts.add');
    }

    public function store(PostRequest $request, TagRepository $tagRepository)
    { 
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $post = $this->postRepository->store($inputs);

        // Vérifier s'il y a des Tags saisis :
        if(isset($inputs['tags']))
        {
            $tagRepository->store($post, $inputs['tags']);
        }

        return redirect(route('sdz_post.index'));
    }


    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->back();
    }

    public function indexTag($tag)
    {
        $posts = $this->postRepository->getWithUserAndTagsForTagPaginate($tag, $this->nbrPerPage);
        $links = $posts->render();

        return view('sdz.posts.liste', compact('posts','links'))
            ->with('info', 'Résultats pour la recherche du mot-clé : ' . $tag);
    }

}