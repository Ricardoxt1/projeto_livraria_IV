<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publishers';
    protected $fillable = ['name'];

    /**
     * Defines the validation rules for the form data.
     * @return array The validation rules.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3'
        ];
    }

    /**
     * Generates an array containing feedback messages for invalid input fields.
     * @return array
     */
    public function feedback(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres'
        ];
    }

    /**
     * Retrieve the books associated with the current object.
     *
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
