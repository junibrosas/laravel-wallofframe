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

		$profile = Profile::whereUid($uid)->first();
		if (empty($profile)) {
			$random_password = str_random(8);
			$user = new User;
			$user->type_id = UserType::where('slug','customer')->first()->id;
			$user->email = isset($me['email']) ? $me['email'] : '';
			$user->photo = 'https://graph.facebook.com/'.$uid.'/picture?type=large';
			$user->username = $me['first_name'].'_'.$me['last_name'];
			$user->password = $random_password;
			$user->password_confirmation = $random_password;
			$user->confirmation_code = md5(uniqid(mt_rand(), true));
			$user->confirmed = 1;

			$user->save();

			$profile = new Profile();
			$profile->uid = $uid;
			$profile->user_id = $user->id;
			$profile->first_name = $me['first_name'];
			$profile->last_name = $me['last_name'];
		}

		$profile->access_token = $this->repo->getAccessToken();
		$profile->save();

		$user = $profile->user;

		Auth::login($user);

		return Redirect::to('/')->with('success', 'Successfully logged in with Facebook');
	}
}