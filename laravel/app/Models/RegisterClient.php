<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterClient extends Model
{
    protected $fillable = ['username', 'email', 'password'];

    /**
     * Returns an array of validation rules for the input fields.
     *
     * @return array An associative array of validation rules
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Returns an array of feedback messages.
     *
     * @return array
     */
    public function feedback(): array
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'email' => 'O campo :attribute deve ser um e-mail válido',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
        ];
    }
}
