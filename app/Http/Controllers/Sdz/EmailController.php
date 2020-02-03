<?php

namespace App\Http\Controllers\Sdz;

use App\Models\Sdz\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sdz\EmailRequest;
use App\Repositories\Sdz\EmailRepository;
use App\Repositories\Sdz\EmailRepositoryInterface;

class EmailController extends Controller
{
    public function getForm()
    {
        return view('sdz\email');
    }

    public function postForm(EmailRequest $request, EmailRepositoryInterface $emailRepository)
    {
        // $email->email = $request->input('email');
        $emailRepository->save($request->input('email'));

        return view('sdz\email_ok');
    }
}
