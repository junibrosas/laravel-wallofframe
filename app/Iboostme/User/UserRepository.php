<?php

namespace Iboostme\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use User;
class UserRepository {
    public function update($input){
        $data['email'] = array_get($input, 'email');

        DB::table('users')->where('id', Auth::id())->update($data);

        $profile = Auth::user()->profile;
        $profile->first_name    = array_get($input, 'first_name');
        $profile->last_name = array_get($input, 'last_name');
        $profile->save();
    }
}