<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $table='cms_adminaccount';
    protected $primaryKey = 'uid';
    public $timestamps = false;
    public $fillable = ['username', 'email', 'password'];
}
