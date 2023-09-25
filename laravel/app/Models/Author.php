<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = ['name'];

    /**
     * This function returns the validation rules for the form.
     * @return array The validation rules.
     */
    public function rules(){
        return [
            'name' => 'required|min:3'
        ];
    }


   /**
    * Returns an array of feedback messages.
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
