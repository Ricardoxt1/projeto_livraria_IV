<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name'];

    /**
     * This function returns the validation rules for the form.
     * @return array The validation rules.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3'
        ];
    }


    /**
     * Returns an array of feedback messages.
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
     * Get the books associated with this object.
     *
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
