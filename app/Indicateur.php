<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Indicateur extends Model
{
    use SoftDeletes;

    public $table = 'indicateurs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code_indicateur',
        'description',
        'probleme_central_id',
        'extrant_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function indicateurParametres()
    {
        return $this->hasMany(Parametre::class, 'indicateur_id', 'id');
    }

    public function probleme_central()
    {
        return $this->belongsTo(ProblemeCentral::class, 'probleme_central_id');
    }

    public function extrant()
    {
        return $this->belongsTo(Extrant::class, 'extrant_id');
    }

    public function organisations()
    {
        return $this->belongsToMany(Organisation::class);
    }
}
