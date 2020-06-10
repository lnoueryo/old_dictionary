<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $rules = [

            'birth_year' => 'required',
            'birth_month' => 'required',
            'birth_day' => 'required',
            'age' => 'required',
            'nickname' => 'required'
        ];
        
        $this->validate($request, $rules);
      $user = User::find($request->id);

        $user->update(
            $request->all()
        );

      return redirect('/');
    }
}
