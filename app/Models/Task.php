<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Protect data from malicious user input using protected
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'priority'
    ];

    /**
     * Users model method
     * Since one task belong to one user we name it singular
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}