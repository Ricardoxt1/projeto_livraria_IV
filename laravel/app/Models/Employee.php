<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['library_id', 'name', 'pis', 'office', 'departament'];

    /**
     * This function returns the validation rules for the form.
     * @return array The validation rules.
     */
    public function rules(): array
    {
        return [
            'library_id' => 'required|exists:library,id',
            'name' => 'required|min:3',
            'pis' => 'required|max:14',
            'office' => 'required',
            'departament' => 'required'
        ];
    }

    /**
     * Returns an array of feedback messages.
     * @return array
     */
    public function feedback(): array
    {
        return [
            'required' =>  'O campo :attribute é obrigatório',
            'library_id.exists' => 'A biblioteca informada não existe',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'pis.max' => 'O campo pis deve ter no máximo 14 caracteres',
        ];
    }

    /**
     * Retrieve the library where this employee is located.
     * @return BelongsTo
     */
    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    /**
     * A description of the entire PHP function.
     * @return HasMany
     */
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
