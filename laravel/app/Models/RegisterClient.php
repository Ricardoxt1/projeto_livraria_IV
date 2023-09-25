<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterClient extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'email', 'password'];

    public function rules(){
        return [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'email' => 'O campo :attribute deve ser um e-mail válido',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
        ];
    }
}
