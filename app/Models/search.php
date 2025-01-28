<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search extends Model
{
    protected $table = "searches" ;
    protected $fillable = [
        'searchresult',
        'user_id',
        
    ];
 

    public function search()
    {
        
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
