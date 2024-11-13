<html>
    <head>
        <title>Jeopardy Homepage</title>
        <link rel="stylesheet" href="jeopardy.css">
    </head>
    <body>
        <?php
            session_start();
        ?>
        <h1>Welcome to Jeopardy!</h1>
        <div id="mainHomeBody">
            <div>
                Please sign in:
            </div>
            <div id="login">
                <form action="index.php" method="POST">
                    <label for="username"><b>Username:</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required><br>
                    <label for="password"><b>Password:</b></label>
                    <input type="text" placeholder="Enter Password" name="password" required><br>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>
            <div>
                <a href="signup.php">or you can sign up here</a>
            </div>
        </div>
        <?php
            $file_path = 'users.json';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $users = json_decode(file_get_contents($file_path), true);
                if (isset($users[$username])) {
                    if (password_verify($password, $users[$username])){
                        $_SESSION['username'] = $username;
                        header("Location: start.php");
                    }
                } else {
                    echo "Incorrect username or password";
                }
            }
        ?>
    </body>
</html>