<h2>Login</h2>
<form method="post" action="<?= BASE_URL ?>/login">
    <p>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
<p>Don't have an account? <a href="<?= BASE_URL ?>/register">Register</a></p>
