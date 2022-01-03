<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    public $timestamps = false; 

    protected $fillable = ['vin','email','phone','link_docs','status_payment','created_date','updated_date'];
}
