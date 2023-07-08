<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\MasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends MasterRequest
{

    public function rules(): array
    {
        return [
            'name'     => 'required|min:4',
            'username' => 'required|min:4|unique:users,username',
            'email'    => 'nullable|min:4|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,user',
            'status'   => 'required|in:active,block',
            'depot_id' => 'required|exists:depositories,id',
        ];
    }
}
