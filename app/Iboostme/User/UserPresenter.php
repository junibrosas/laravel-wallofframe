<?php
namespace Iboostme\User;

use Laracasts\Presenter\Presenter;
class UserPresenter extends Presenter{
    public function name(){
        return ucwords($this->entity->profile->first_name . ' ' . $this->entity->profile->last_name);
    }
    public function birthday(){
        return 'August 16, 1992';
    }
    public function email(){
        return $this->entity->email;
    }
    public function avatar(){
        return $this->entity->photo;
    }
    public function mobileNumber(){
        return $this->entity->profile->mobile_number;
    }
    // Shipping addresses of a user
    public function addresses(){
        return $this->entity->shippingAddresses;
    }
}