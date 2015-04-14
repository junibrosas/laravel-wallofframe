<?php
namespace Iboostme\User\Customer;
use Iboostme\Email\EmailRepository;
use Illuminate\Support\Facades\Auth;
use ShippingAddress;
use User;
use Profile;
use UserType;

class ShippingAddressRepository {
    // max number of addresses
    private $max = 3;

    public function add( $inputs ){
        $inputs['user_id'] = isset( $inputs['user_id'] ) ? $inputs['user_id'] : Auth::id();
        ShippingAddress::create( $inputs );
    }

    public function addUser( $input ){
        $username = explode('@', $input['email']); // generated username
        $input['password'] = $input['email']; // generated password

        $user = new User;
        $user->username = $username[0];
        $user->email = $input['email'];
        $user->type_id = UserType::where('slug', 'customer')->first()->id;
        $user->password = $input['password'];
        $user->password_confirmation = $input['password'];
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;

        $user->save();

        $input['user_id'] = $user->id;
        Profile::create( $input );
        ShippingAddress::create( $input );

        // email a new user
        $emailRepo = new EmailRepository();
        $emailRepo->newUserWithPassword( $user, $input['password'] );

        return $user;
    }

    public function isMax( User $user ){
        $addresses = ShippingAddress::where('user_id', $user->id)->get();
        if($addresses->count() >= $this->max){
            return true;
        }
        return false;
    }

    public function hasAddresses( User $user ){
        $addresses = ShippingAddress::where('user_id', $user->id)->get();
        if($addresses->count() > 0){
            return true;
        }
        return false;
    }
} 