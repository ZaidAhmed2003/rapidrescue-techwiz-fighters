<form id="loginForm" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Login</button>
</form>

<form id="loginForm" action="process-login.php" method="post">
    <input type="hidden" name="role" value="<?= htmlspecialchars($role) ?>">

    <!-- Other login fields (username, password) -->
    <label for="username">Email:</label>
    <input type="text" name="username" id="username" placeholder="Enter your email address..." required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" required>

    <button type="submit">Login</button>
</form>