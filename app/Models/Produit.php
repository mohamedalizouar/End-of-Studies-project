<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Catch_;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits'; 
    public function Categori()
    {
        return $this->belongsTo(Categori::class,'categori_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

}
