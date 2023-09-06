<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['nomComplet', 'Email', 'telephone', 'salaire'];
    use HasFactory;
}
