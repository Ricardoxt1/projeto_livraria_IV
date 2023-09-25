<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['library_id', 'name', 'pis', 'office', 'departament'];

    /**
     * This function returns the validation rules for the form.
     * @return array The validation rules.
     */
    public function rules()
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
    public function feedback()
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
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
