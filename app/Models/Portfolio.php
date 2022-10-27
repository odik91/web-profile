<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Category;

class Portfolio extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function getCategory() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
