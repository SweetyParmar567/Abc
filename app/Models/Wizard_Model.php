<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wizard_Model extends Model
{
    use HasFactory;
    protected $table = 'wizard_tbl';
    protected $primaryKey = 'id ';
    public $fillable = [
        'code', 'name', 'email', 'type'
    ];
}
