<html>
    <head>
        <title>Start</title>
        <link rel="stylesheet" href="jeopardy.css">
    </head>
    <body>
        <?php
            session_start();
            $score = 0;
            setcookie('score', $score, time() + (86400 * 30), "/");
        ?>
        <h1>Welcome to Jeopardy!</h1>
        <div id="startbody">
            <div>
                The genre of this game are games and will cover a range of topics from first-person shooters (FPS), role-playing games (RPG), consoles, and ,as a spin, tabletop card games (TCG). In this version of Jeopardy, you are NOT required to type "what is" before every answer. All you need to do is type in the answer without caps.<br>
            </div>
            <div id="start">
                <a href="gameboard.php">Start a new game</a>
                <button onclick="history.back()">Go back</button>
            </div>
        </div>
    </body>
</html>