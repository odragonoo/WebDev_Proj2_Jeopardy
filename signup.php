<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="jeopardy.css">
    </head>
    <body>
        <?php
            session_start();
        ?>
        <h1>Please signup!</h1>
        <div id="mainHomeBody">
            <div id="register">
                <form action="signup.php" method="POST">
                    <label for="username"><b>Username:</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required><br>
                    <label for="password"><b>Password:</b></label>
                    <input type="text" placeholder="Enter Password" name="password" required><br>
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
        <?php
            $file_path = 'users.json';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $users = [];
                if (isset($users[$username])) {
                    echo "Username has been taken";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $users[$username] = $hashed_password;
                    file_put_contents($file_path, json_encode($users, JSON_PRETTY_PRINT));
                    header("Location: index.php");
                }
            }
        ?>
    </body>
</html>