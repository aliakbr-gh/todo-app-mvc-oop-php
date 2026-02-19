<h2>Register</h2>
<form method="post" action="<?= BASE_URL ?>/register">
    <p>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required>
    </p>
    <p>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </p>
    <p>
        <button type="submit">Register</button>
    </p>
</form>
<p>Already have an account? <a href="<?= BASE_URL ?>/login">Login</a></p>
