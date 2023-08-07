<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'long_description']; //these can be mass assigned
    // protected $guarded = ['password']; do not use

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('completed', true);
    }
}
