<?php

namespace Modules\ToDoList\Entities;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $table = 'to_do_list';
    protected $fillable = ['content'];
}
