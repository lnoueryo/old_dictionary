<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{

    use Sortable;
    public $sortable = ['id', 'name', 'phonetic_symbol','meaning',];

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'language' => 'required',
        'meaning' => 'required',
    );

    public function histories()
    {

      return $this->hasMany('App\History');

    }
}
