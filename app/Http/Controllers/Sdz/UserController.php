<?php

namespace App\Http\Controllers\Sdz;

use App\Http\Requests\Sdz\UserCreateRequest;
use App\Http\Requests\Sdz\UserUpdateRequest;

use App\Repositories\Sdz\UserRepository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userRepository;

    protected $nbrPerPage = 4;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();

        return view('sdz\user\index', compact('users','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sdz\user\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(UserCreateRequest $request)
	{
        $this->setAdmin($request);
		$user = $this->userRepository->store($request->all());

		return redirect('sdz_user')->withOk("L'utilisateur " . $user->name . " a été créé.");
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);

        return view('sdz\user\show',  compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getById($id);

        return view('sdz\user\edit',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->setAdmin($request);
        $this->userRepository->update($id, $request->all());

        return redirect('sdz_user')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->destroy($id);

        return back();
    }

    private function setAdmin($request)
    {
        if(!$request->has('admin')) {
            $request->merge(['admin' => 0]);
        }
    }
}
