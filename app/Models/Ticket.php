<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['titre', 'description', 'statut', 'priorite', 'id_employe', 'id_technicien'];

    public function employe()
    {
        return $this->belongsTo(User::class, 'id_employe');
    }

    public function technicien()
    {
        return $this->belongsTo(User::class, 'id_technicien');
    }
}
