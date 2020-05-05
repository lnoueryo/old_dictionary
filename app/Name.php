<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'language' => 'required',
        'phonetic_symbol' => 'required',
        'parts_of_speech' => 'required',
        'meaning' => 'required',
    );

    public function histories()
    {
      return $this->hasMany('App\History');

    }
}
