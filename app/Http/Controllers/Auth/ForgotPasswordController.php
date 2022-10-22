<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessSendResetPasswordMail;
use App\Mail\Auth\ResetPassword;
use App\Repositories\Contracts\CmsAccountRepositoryInterface;
use App\Repositories\Contracts\PasswordResetRepositoryInterface;
use App\Repositories\Interfaces\PasswordResetRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    protected $cmsAccountRepository;
    protected $passwordResetRepository;

    public function __construct(
        UserRepository $cmsAccountRepository,
        PasswordResetRepository $passwordResetRepository
    )
    {
        $this->cmsAccountRepository = $cmsAccountRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function handleForgotPasswordRequest(Request $request)
    {
        $user = $this->cmsAccountRepository
            ->findWhere(['email' => $request->email])
        ->first();

        if (is_null($user)) {
            return view('auth.message', [
                'message' => __('auth.do_not_find_the_mail')
            ]);
        }
//        if ($user->status == 0) {
//            return view('auth.message', [
//                'message' => 'Tài khoản này đã bị khóa'
//            ]);
//        }

        $token = (string)Str::uuid();

        $attributes = [
            'token' => $token,
            'email' => $user->email
        ];

        $this->passwordResetRepository->create($attributes);

        ProcessSendResetPasswordMail::dispatch($token, $user->email);

        return view('auth.message', [
            'message' => __("auth.send_success_message")
        ]);
    }


}
