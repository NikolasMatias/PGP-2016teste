<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $term
 * @property string $name
 * @property string $teacher
 */
class Subject extends Model
{
    protected $table = 'subjects';

    protected $primaryKey = 'id';
}
