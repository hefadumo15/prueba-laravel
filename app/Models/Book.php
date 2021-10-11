<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name','autor_id'];

    protected $hidden = ['created_at','updated_at','autor_id'];
    
    /**
     * Get the autor for the Book.
     */
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
