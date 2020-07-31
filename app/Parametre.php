<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Parametre extends Model
{
    use SoftDeletes;

    public $table = 'parametres';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'description',
        'indicateur_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function parametreQuestions()
    {
        return $this->hasMany(Question::class, 'parametre_id', 'id');
    }

    public function indicateur()
    {
        return $this->belongsTo(Indicateur::class, 'indicateur_id');
    }
}
