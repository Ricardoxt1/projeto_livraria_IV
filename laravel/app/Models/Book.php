<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['author_id', 'publisher_id', 'library_id', 'titule', 'page', 'realese_date', 'image'];

    public function rules(){
        return [
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'library_id' => 'required|exists:library,id',
            'titule' => 'required|min:3',
            'page' => 'required|integer',
            'realese_date' => 'required|digits:4',
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ];
    }

    public function feedback(){
        return [
            'required' =>  'O campo :attribute é obrigatório',
            'author_id.exists' => 'O autor informado não existe',
            'publisher_id.exists' => 'O editora informada não existe',
            'library_id.exists' => 'A biblioteca informada não existe',
            'titule.min' => 'O campo título deve ter no mínimo 3 caracteres',
            'page.integer' => 'O campo página deve ser um número inteiro',
            'realese_date.digits' => 'O campo data de publicação deve ser um ano válido',
            'image.image' => 'O campo imagem deve ser uma imagem'
        ];
    }

    /**
     * Retrieve the author of this book.
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Retrieve the publisher of this book.
     * @return BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Retrieve the library where this book is located.
     * @return BelongsTo
     */
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function rentals(){
        return $this->hasMany(Rental::class);
    }
}
