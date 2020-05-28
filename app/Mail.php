<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Mail extends Model
{
    use Sortable;
    public $sortable = ['sender', 'message', 'created_at', 'read', ];

    protected $guarded = array('id');

    public static $rules = array(
        'receiver' => 'required',
        'message' => 'required',
    );
}
