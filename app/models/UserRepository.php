<?php



/**
 * Class UserRepository
 *
 * This service abstracts some interactions that occurs between Confide and
 * the Database.
 */
class UserRepository
{
    /**
     * Signup a new account with the given parameters
     *
     * @param  array $input Array containing 'username', 'email' and 'password'.
     *
     * @return  User User object that may or may not be saved successfully. Check the id to make sure.
     */
    public function signup($input)
    {
        $user = new User;
        $user->username = array_get($input, 'username');
        $user->email    = array_get($input, 'email');
        $user->type_id = UserType::where('slug', 'customer')->first()->id;
        $user->photo = array_get($input, 'photo') ? array_get($input, 'photo') : '';
        $user->password = array_get($input, 'password');
        $user->password_confirmation = array_get($input, 'password_confirmation');
        $user->confirmation_code     = md5(uniqid(mt_rand(), true)); // Generate a random confirmation code
        $user->confirmed = 1; // forced confirm.

        // Save if valid. Password field will be hashed before save
        $this->save($user);

        if ($user->id) {
            // add a user profile
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->uid = array_get($input, 'uid') ? array_get($input, 'uid') : 0;
            $profile->first_name = array_get($input, 'first_name');
            $profile->last_name = array_get($input, 'last_name');
            $profile->access_token = array_get($input, 'access_token') ? array_get($input, 'access_token') : '';
            $profile->mobile_number = array_get($input, 'mobile_number') ? array_get($input, 'mobile_number') : 0;
            $profile->address = array_get($input, 'address') ? array_get($input, 'address') : '';
            $profile->save();
        }

        return $user;
    }

    /**
     * Attempts to login with the given credentials.
     *
     * @param  array $input Array containing the credentials (email/username and password)
     *
     * @return  boolean Success?
     */
    public function login($input)
    {
        if (! isset($input['password'])) {
            $input['password'] = null;
        }

        return Confide::logAttempt($input, Config::get('confide::signup_confirm'));
    }

    /**
     * Checks if the credentials has been throttled by too
     * much failed login attempts
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Is throttled
     */
    public function isThrottled($input)
    {
        return Confide::isThrottled($input);
    }

    /**
     * Checks if the given credentials correponds to a user that exists but
     * is not confirmed
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Exists and is not confirmed?
     */
    public function existsButNotConfirmed($input)
    {
        $user = Confide::getUserByEmailOrUsername($input);

        if ($user) {
            $correctPassword = Hash::check(
                isset($input['password']) ? $input['password'] : false,
                $user->password
            );

            return (! $user->confirmed && $correctPassword);
        }
    }

    /**
     * Resets a password of a user. The $input['token'] will tell which user.
     *
     * @param  array $input Array containing 'token', 'password' and 'password_confirmation' keys.
     *
     * @return  boolean Success
     */
    public function resetPassword($input)
    {
        $result = false;
        $user   = Confide::userByResetPasswordToken($input['token']);

        if ($user) {
            $user->password              = $input['password'];
            $user->password_confirmation = $input['password_confirmation'];
            $result = $this->save($user);
        }

        // If result is positive, destroy token
        if ($result) {
            Confide::destroyForgotPasswordToken($input['token']);
        }

        return $result;
    }

    /**
     * Simply saves the given instance
     *
     * @param  User $instance
     *
     * @return  boolean Success
     */
    public function save(User $instance)
    {
        return $instance->save();
    }
}
