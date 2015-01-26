<?php
namespace Iboostme\Facebook;
use Facebook;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class FacebookRepository {
    protected $uid;
    protected $facebook;

    public function __construct(){
        $facebook = new Facebook(Config::get('facebook'));
        $this->facebook = $facebook;
    }

    public function getFacebookUser( $code ){
        $code = $code;

        $this->uid = $this->facebook->getUser();

        if ($this->uid == 0) return Redirect::to('/')->with('error', 'There was an error');

        return $this->facebook->api('/me');
    }

    public function getFacebookId(){
        return $this->uid;
    }

    public function getAccessToken(){
        return $this->facebook->getAccessToken();
    }

    public function getLoginUrl($params){
        return $this->facebook->getLoginUrl($params);
    }


} 