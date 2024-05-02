<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    // $table->id();
    //         $table->string('ip')->nullable(false);
    //         $table->string('page');
    //         $table->dateTime('visited-at');
    public $timestamps = false;

    protected $fillable = [
        'ip',
        'page',
        'visited_at'
    ];
    use HasFactory;
}
