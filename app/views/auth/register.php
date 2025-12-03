<h2>Register</h2>
<form method="post" action="<?= BASE_URL ?>/register">
    <div>
        <label>Name</label><br>
        <input type="text" name="name" required>
    </div>
    <div style="margin-top:10px;">
        <label>Email</label><br>
        <input type="email" name="email" required>
    </div>
    <div style="margin-top:10px;">
        <label>Password</label><br>
        <input type="password" name="password" required>
    </div>
    <div style="margin-top:10px;">
        <button class="btn btn-primary" type="submit">Register</button>
    </div>
</form>
<p>Already have an account? <a href="<?= BASE_URL ?>/login">Login</a></p>