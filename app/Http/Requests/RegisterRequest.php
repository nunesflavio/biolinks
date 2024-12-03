<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

/**
 * Handle Register Request
 *
 * @property-read string $name
 * @property-read string $email
 * @property-read string $password
 */
class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'confirmed', 'unique:users'],
            'password' => ['required', \Illuminate\Validation\Rules\Password::default()
            /*min(8)
            ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),*/
            ],
        ];
    }

    public function tryToRegister() {

        Model::unguard(true);

        /*$user = new User;
        $user->name = $this->name;
        $user->password = $this->password;
        $user->email = $this->email;

        $user->save();*/

       $user = User::query()->create($this->validated());

        auth()->login($user);

        return true;

    }
}
