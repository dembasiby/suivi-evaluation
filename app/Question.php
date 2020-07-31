<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Question extends Model
{
    use SoftDeletes;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RECURRENCE_RADIO = [
        'unique'   => 'Unique',
        'continue' => 'Continue',
    ];

    protected $fillable = [
        'description',
        'parametre_id',
        'type_question_id',
        'recurrence',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function parametre()
    {
        return $this->belongsTo(Parametre::class, 'parametre_id');
    }

    public function type_question()
    {
        return $this->belongsTo(TypeQuestion::class, 'type_question_id');
    }
}
