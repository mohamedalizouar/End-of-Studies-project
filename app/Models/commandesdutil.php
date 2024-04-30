<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class commandesdutil extends Model
{
    protected $table = 'commandesdutil'; 
    use HasFactory;

    protected $guarded = []; 
    

    public function items()
    {
        return $this->belongsTo(Commande::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');

    }
    public function Commande()
    {
        return $this->belongsTo(Commande::class, 'cammandes_id');
    }



}
