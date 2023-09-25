<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $table = 'library';
    protected $fillable = [
        'name',
    ];

    /**
     * Defines the validation rules for the form data.
     * @return array The validation rules.
     */
    public function rules(){
        return [
            'name' => 'required|min:3'
        ];
    }

    /**
     * Generates an array containing feedback messages for invalid input fields.
     * @return array
     */
    public function feedback(){
        return [
            'name.required' => 'O campo nome é obrigatório', 
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres' 
        ];
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
    
}
