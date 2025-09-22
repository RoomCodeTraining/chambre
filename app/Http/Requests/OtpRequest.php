<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OtpRequest extends FormRequest
{
    /**
     * The user attempting the one time password challenge.
     *
     * @var mixed
     */
    protected $challengedUser;

    /**
     * Indicates if the user wished to be remembered after login.
     *
     * @var bool
     */
    protected $remember;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code' => ['nullable', 'string'],
        ];
    }

    /**
     * Determine if there is a challenged user in the current session.
     *
     * @return bool
     */
    public function hasChallengedUser()
    {
        if ($this->challengedUser) {
            return true;
        }

        $model = app(StatefulGuard::class)->getProvider()->getModel();

        return $this->session()->has('login.id') && $model::findByHashId($this->session()->get('login.id'));
    }

    /**
     * Get the user that is attempting the two factor challenge.
     *
     * @return mixed
     */
    public function challengedUser()
    {
        if ($this->challengedUser) {
            return $this->challengedUser;
        }

        $model = app(StatefulGuard::class)->getProvider()->getModel();

        if (! $this->session()->has('login.id') ||
            ! $user = $model::findByHashId($this->session()->get('login.id'))) {
            throw new HttpResponseException(response()->json(['error' => 'invalid_request'], 400));
        }

        return $this->challengedUser = $user;
    }

    /**
     * Determine if the user wanted to be remembered after login.
     *
     * @return bool
     */
    public function remember()
    {
        if (! $this->remember) {
            $this->remember = $this->session()->pull('login.remember', false);
        }

        return $this->remember;
    }
}
