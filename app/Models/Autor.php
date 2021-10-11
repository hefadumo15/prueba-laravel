<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['created_at','updated_at'];
    
    /**
     * Get the books for the Autor.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
        
    }
}
