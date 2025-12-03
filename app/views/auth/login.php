<h2>Login</h2>
<form method="post" action="<?= BASE_URL ?>/login">
    <div>
        <label>Email</label><br>
        <input type="email" name="email" required>
    </div>
    <div style="margin-top:10px;">
        <label>Password</label><br>
        <input type="password" name="password" required>
    </div>
    <div style="margin-top:10px;">
        <button class="btn btn-primary" type="submit">Login</button>
    </div>
</form>
<p>Don't have an account? <a href="<?= BASE_URL ?>/register">Register</a></p>