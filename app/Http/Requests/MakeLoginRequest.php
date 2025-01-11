<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

/**
 * @property-read string $email
 * @property-read string $password
 */

class MakeLoginRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    public function attempt(): bool
    {
        $user = User::where('email', '=', $this->email)->first();

        if(!$user || !Hash::check($this->password, $user->password)) {
            return false;
        }

        auth()->login($user);

        return true;
    }
}
