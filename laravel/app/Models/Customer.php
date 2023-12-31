<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['cpf', 'name', 'phone_number', 'address', 'email'];

    /**
     * Generate the validation rules for the form.
     * @return array
     */
    public function rules(): array
    {
        return [
            'cpf' => 'required|min:11|max:11',
            'name' => 'required|min:3',
            'phone_number' => 'required|digits_between:11,14',
            'address' => 'required|min:3',
            'email' => 'required|email'
        ];
    }

    /**
     * Returns an array of feedback messages for form validation errors.
     * @return array An array of feedback messages.
     */
    public function feedback(): array
    {
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

    /**
     * Returns the rentals associated with this object.
     * @return HasMany
     */
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
