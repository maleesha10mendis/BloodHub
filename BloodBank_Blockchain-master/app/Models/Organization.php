<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobile',
        'gender',
        'address',
        'userID',
        'registerDate',
        'account',
        'registerNumber'

];


protected $primaryKey = 'oid';


public function user()
{
    return $this->belongsTo(User::class, 'userID');
}
}
