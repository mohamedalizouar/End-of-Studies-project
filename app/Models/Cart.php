<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use App\Models\Produit;

use App\Models\Product;



class Cart extends Model
{
    protected $fillable = ['id', 'produit_id', 'quantity','userid'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function usercart()
    {
        return $this->belongsTo(User::class);
    }
}

