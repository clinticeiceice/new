<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'position'
    ];

    protected static $positions =
    [
        'internal_auditor_i' => 'Internal Auditor I',
        'municipal_engineer' => 'Municipal Engineer'
    ];


    public static $INTERNAL_AUDITOR_I = 'internal_auditor_i';
    public static $MUNICIPAL_ENGINEER = 'municipal_engineer';

    public static function getPositions()
    {
        return self::$positions;
    }

    public static function isValidPosition($position)
    {
        return array_key_exists($position, self::$positions);
    }

    public function prettyPosition()
    {
        return self::$positions[$this->position];
    }
}
