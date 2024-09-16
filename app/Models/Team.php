<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'top_skills' => 'object',
    ];

    public function teamDetails()
    {
        return $this->hasOne(TeamDetails::class,);
    }
}
