<?php
use Iboostme\Facebook\FacebookRepository;
class FacebookController extends \BaseController {

	protected $repo;

	public function __construct(FacebookRepository $repo){
		$this->repo = $repo;
	}

	public function login()
	{
		$params = array(
			'redirect_uri' => route('fb.login.callback'),
			'scope' => ['email', 'user_birthday', 'user_location'],
		);
		return Redirect::to($this->repo->getLoginUrl($params));
	}

	public function signup(){
		$params = array(
			'redirect_uri' => route('fb.signup.callback'),
			'scope' => ['email'],
		);
		return Redirect::to($this->repo->getLoginUrl($params));
	}

	public function signupCallback( ){
		$code = Input::get('code');
		if (strlen($code) == 0) return Redirect::to('/')->with('error', 'There was an error communicating with Facebook');

		$me = $this->repo->getFacebookUser( $code );

		$user = new User();
		$profile = new Profile();
		$user->email = isset($me['email']) ? $me['email'] : '';
		$user->profile = $profile;
		$user->profile->first_name = $me['first_name'];
		$user->profile->last_name = $me['last_name'];

		$this->data['user'] = $user;
		return View::make('home.signup', $this->data);
	}

	public function loginCallback()
	{
		$code = Input::get('code');
		if (strlen($code) == 0) return Redirect::to('/')->with('error', 'There was an error communicating with Facebook');



		$me = $this->repo->getFacebookUser( $code );
		$uid = $this->repo->getFacebookId();


		if(!isset($me['email'])) return Redirect::route('login')->with('error', 'Oppss! Seems like we cannot retrieve your email on facebook. Try using a working facebook email address.');


		$profile = Profile::whereUid($uid)->first();

		$user = new User();
		if (empty($profile)) {
			$random_password = str_random(8);
			$input = array(
				'email' => $me['email'],
				'photo' => 'https://graph.facebook.com/'.$uid.'/picture?type=large',
				'username' => $me['first_name'].'_'.$me['last_name'],
				'password' => $random_password,
				'password_confirmation' => $random_password,
				'uid' => $uid,
				'first_name' => $me['first_name'],
				'last_name' => $me['last_name'],
				'access_token' => $this->repo->getAccessToken(),
			);

			$repo = App::make('UserRepository');

			$user = $repo->signup( $input );

			$profile = $user->profile;
		}
		trace($user);
		die();
		if(!$user->id){
			return Redirect::route('login')->with('error', USER_CANNOT_ADD);
		}

		$user = $profile->user;

		Auth::login($user);

		return Redirect::to('/')->with('success', 'Successfully logged in with Facebook');
	}
}