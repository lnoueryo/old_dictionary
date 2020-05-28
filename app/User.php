<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;
use Cache;


class User extends Authenticatable
{

    use Notifiable;

    use Sortable;
    public $sortable = ['id', 'name', 'gender', 'country', 'email', 'login_counter','last_sign_in_at','current_sign_in_at',];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token_activation', 'isVerified', 'provider', 'provider_id',
        'nickname', 'gender', 'age', 'birth_year', 'birth_month', 'birth_day', 'occupation', 'country', 'mail_magazine',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_admin() {
        if($this->admin) {
            return true;
        }
        return false;
    }

    public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}


}
