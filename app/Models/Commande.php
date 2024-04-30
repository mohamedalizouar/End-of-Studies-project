<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $guarded = [];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(commandesdutil::class, 'cammandes_id');
    }
    // Commande.php

    public function commandesdutils()
    {
        return $this->hasMany(Commandesdutil::class, 'cammandes_id');
    }
}
