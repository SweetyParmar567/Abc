<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddTask extends Model
{
    use HasFactory;

    protected $table = 'add_tasks';
    protected $primaryKey = 'id';
    public $fillable = [
        'e_id', 'e_name', 'e_email', 'manager_email', 't_mon','t_tue','t_wed','t_thu','t_fri'
    ];
}
