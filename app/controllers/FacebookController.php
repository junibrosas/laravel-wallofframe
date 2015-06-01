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
		$replacementEmail = Input::get('replacement_email');

		if (strlen($code) == 0){
			return Redirect::to('/')->with('error', 'There was an error communicating with Facebook');
		}

		$me = $this->repo->getFacebookUser( $code );
		$uid = $this->repo->getFacebookId();

		$profile = Profile::whereUid($uid)->first();

		if (empty($profile)) {

			// if facebook email is not working or does not exists, replace it with
			// an email specified by the user.
			if($replacementEmail) {
				$me['email'] = $replacementEmail;
			}

			if(!isset($me['email'])) {
				$this->data['code'] = $code;
				Session::flash('error', 'Opps! Seems like we cannot retrieve your email on facebook. Try using a working email address.');

				return View::make('home.sign-email', $this->data);
			}

			$random_password = str_random(8);
			$username = preg_replace('/\s+/', '', $me['first_name'].$me['last_name']);
			$username = strtolower($username);
			$input = array(
					'email' => $me['email'],
				'photo' => 'https://graph.facebook.com/'.$uid.'/picture?type=large',
				'username' => $username,
				'password' => $random_password,
				'password_confirmation' => $random_password,
				'uid' => $uid,
				'first_name' => $me['first_name'],
				'last_name' => $me['last_name'],
				'access_token' => $this->repo->getAccessToken(),
			);

			$repo = App::make('UserRepository');

			// sign up a new user
			$user = $repo->signup( $input );

			if($user->errors){
				return Redirect::route('login')->withErrors($user->errors);
			}

			// sending email about new user
			$emailRepo = new \Iboostme\Email\EmailRepository();
			$emailRepo->newUser($user);

			$profile = $user->profile;
		}

		$user = $profile->user;

		Auth::login($user);

		// get a redirection url after login is successful.
		if( Session::has('redirectAfterLogin') ){
			$redirect = Session::get('redirectAfterLogin');

			//remove session
			Session::forget('redirectAfterLogin');

			//return Redirect::to($redirect)->with('success', FACEBOOK_SUCCESS_LOGIN);;
		}

		return Redirect::to('/')->with('success', FACEBOOK_SUCCESS_LOGIN);
	}
}