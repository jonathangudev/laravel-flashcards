<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyRecord extends Model
{
    use HasFactory;

    public function flashcard() {
        return $this->belongsTo(Flashcard::class);
    }
}
