<p>
    {{ __('auth.mail_follow_link') }}
    <br>
    {{ __('auth.mail_expire_warn') }}
    <br>
    {{ __('auth.mail_skip_if_dont_send') }}
</p>
<a  href="{{ route('reset_password', ['token' => $token]) }}">
    {{ __('auth.mail_change_btn') }}
</a>
