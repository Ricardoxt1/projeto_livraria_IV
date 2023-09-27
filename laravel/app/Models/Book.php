<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['author_id', 'publisher_id', 'library_id', 'titule', 'page', 'realese_date', 'image'];

    /**
     * Generate the function comment for the given function body in a markdown code block with the correct language syntax.
     * @return array
     */
    public function rules(): array
    {
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

    /**
     * Retrieves the feedback messages for validation errors.
     * @return array The array of feedback messages.
     */
    public function feedback(): array
    {
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
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Retrieve the publisher of this book.
     * @return BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Retrieve the library where this book is located.
     * @return BelongsTo
     */
    public function library(): BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    /**
     * A function that returns the rentals associated with this object.
     * @return HasMany The rentals associated with this object.
     */
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}
