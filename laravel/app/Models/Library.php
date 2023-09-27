<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Library extends Model
{
    protected $table = 'library';
    protected $fillable = [
        'name',
    ];

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
     * Get the books associated with this model.
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
