<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    
    public function checklistItem()
    {
        return $this->hasMany(ChecklistItem::class);
    }
}
