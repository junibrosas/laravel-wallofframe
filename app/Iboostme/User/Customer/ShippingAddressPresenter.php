<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/22/2014
 * Time: 4:17 PM
 */

namespace Iboostme\User\Customer;

use Laracasts\Presenter\Presenter;
class ShippingAddressPresenter extends Presenter {
    public function name(){
        return $this->entity->first_name . ' ' . $this->entity->last_name;
    }
    public function mobile(){
        return $this->entity->mobile_number;
    }
    public function address(){
        return $this->entity->address;
    }
    public function landmark(){
        if($this->entity->landmark){
            return 'Landmark: ' . $this->entity->landmark;
        }

        return '';
    }

    public function details(){
        return $this->name() . ', '.$this->mobile().', '.$this->address().', '.$this->landmark();
    }
} 