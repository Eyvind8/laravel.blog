<form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <label for="email">Email</label>
    <input id="email" type="email" name="email" required autofocus>

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required>

    <button type="submit">Login</button>
</form>

