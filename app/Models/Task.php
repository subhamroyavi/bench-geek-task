<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tasks';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'image',
        'is_completed',
        'due_date',
    ];
}
	// id	title	description	image	is_completed	due_date	
