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


class PostController extends Controller
{
    protected $postRepository;

    protected $nbrPerPage = 4;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getPaginate($this->nbrPerPage);

        $links = $posts->render();

        return view('sdz.posts.liste', compact('posts','links'));
    }

    public function create()
    {
        return view('sdz.posts.add');
    }

    public function store(PostRequest $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);

        $this->postRepository->store($inputs);

        return redirect(route('sdz_post.index'));
    }


    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect()->back();
    }

}