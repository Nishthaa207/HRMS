<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidate';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'mobile','gender', 'address', 'status', 'sequence','created_by','updated_by'];
    use HasFactory;
}
