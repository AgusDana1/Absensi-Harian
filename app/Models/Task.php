<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'attedance_id',
        'title',
        'is_done',
    ];

    protected $casts = [
        'is_done' => 'boolean'
    ];

    public function attedance()
    {
        return $this->belongsTo(Attedance::class);
    }
}
