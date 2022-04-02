<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $table = 'refund';
    public $timestamps = false; 

    protected $fillable = ['id_transaction','command','created_date','updated_date'];

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'id_transaction');
    }
}
