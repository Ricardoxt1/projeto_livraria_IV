<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rentals';
    protected $fillable = ['customer_id', 'book_id', 'employee_id', 'rental', 'delivery'];

    /**
     * Defines the validation rules for the form data.
     * @return array The validation rules.
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'book_id' => 'required|exists:books,id',
            'employee_id' => 'required|exists:employees,id',
            'rental' => 'required|date',
            'delivery' => 'required|date'
        ];
    }

    /**
     * Generates an array containing feedback messages for invalid input fields.
     * @return array
     */
    public function feedback()
    {
        return [
            'required' =>  'O campo :attribute é obrigatório',
            'customer_id.exists' => 'O cliente informado não existe',
            'book_id.exists' => 'O livro informado não existe',
            'employee_id.exists' => 'O funcionário informado não existe',
            'rental.date' => 'O campo data de devolução deve ser uma data válida',
            'delivery.date' => 'O campo data de entrega deve ser uma data válida'
        ];
    }

    /**
     * Get the associated customer for this instance.
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the associated book for this instance.
     * @return BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the associated employee for this instance.
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
