<p>Hello, {{ $user->present()->name }}</p>

<p>Credentials:</p>

<ul>
    <li>Username: {{ $user->username }}</li>
    <li>Email: {{ $user->email }}</li>
    <li>Password: {{ $password }}</li>
</ul>