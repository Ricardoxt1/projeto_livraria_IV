<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['cpf', 'name', 'phone_number', 'address', 'email'];

    public function rules(){
        return [
            'cpf' => 'required|min:11|max:11',
            'name' => 'required|min:3',
            'phone_number' => 'required|digits_between:11,14',
            'address' => 'required|min:3',
            'email' => 'required|email'
        ];
    }

    public function feedback(){
        return [
            'required' =>  'O campo :attribute é obrigatório',
            'cpf.min' => 'O campo cpf deve ter no mínimo 11 caracteres',
            'cpf.max' => 'O campo cpf deve ter no máximo 11 caracteres',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'phone_number.min' => 'O campo telefone deve ter no mínimo 10 caracteres',
            'phone_number.max' => 'O campo telefone deve ter no máximo 14 caracteres',
            'address.min' => 'O campo endereço deve ter no mínimo 3 caracteres',
            'email.email' => 'O campo email deve ser um email válido'
        ];
    }

    public function rentals(){
        return $this->hasMany(Rental::class);
    }
    
}
