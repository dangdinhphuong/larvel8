<?php

namespace App\Http\Controllers\Auth;

use App\Entities\PasswordReset;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Repositories\Interfaces\PasswordResetRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    protected $cmsAccountRepository;
    protected $passwordResetRepository;

    public function __construct(
        UserRepository          $cmsAccountRepository,
        PasswordResetRepository $passwordResetRepository)
    {
        $this->cmsAccountRepository = $cmsAccountRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function formResetPassword(Request $request)
    {
        $email = $this->passwordResetRepository
            ->findWhere(['token' => $request->token])
            ->first();

        if (is_null($email)) {
            return view('auth.message', [
                'message' => __('auth.invalid_link')
            ]);
        }
        return view('auth.reset-password', [
            'token' => $request->token,
        ]);
    }

    public function handleResetPasswordRequest(ResetPasswordRequest $request)
    {
        $passwordReset = $this->passwordResetRepository
            ->skipPresenter()
            ->findWhere(['token' => $request->token])
            ->first();
        if (is_null($passwordReset)) {
            return view('auth.message', [
                'message' => __('auth.invalid_link')
            ]);
        }

        $this->cmsAccountRepository
            ->updateOrCreate(
                ['email' => (string)$passwordReset->email],
                ['password' => bcrypt($request->password)]
            );
        PasswordReset::query()
            ->where('token', $request->token)
            ->delete();

        return view('auth.message', [
            'message' => __('auth.change_password_success')
        ]);
    }
}
