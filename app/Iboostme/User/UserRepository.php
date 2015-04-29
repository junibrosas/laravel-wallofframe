<?php

namespace Iboostme\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use User;
use UserType;

class UserRepository {

    // retrieve customer names with id key
    public function customerNames( $withFiller = false ){
        $users = $this->getCustomers();
        if($withFiller) { $names[-1] = 'Select A Buyer'; } else { $names = array(); }

        if($users){
            foreach($users as $user){
                $names[ $user->id ] = $user->present()->name;
            }
        }

        return $names;
    }

    // retrieve all customers
    public function getCustomers(){
        return $this->users()->with('profile')->orderBy('created_at', 'desc')->get();
    }

    public function update($input){
        $data['email'] = array_get($input, 'email');

        DB::table('users')->where('id', Auth::id())->update($data);

        $profile = Auth::user()->profile;
        $profile->first_name    = array_get($input, 'first_name');
        $profile->last_name = array_get($input, 'last_name');
        $profile->save();
    }

    public function users(){
        $type = UserType::where('slug', 'customer')->first();

        return User::where('type_id', $type->id);
    }
}