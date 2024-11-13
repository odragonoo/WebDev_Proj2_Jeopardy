<html>
    <head>
        <title>Start</title>
        <link rel="stylesheet" href="jeopardy.css">
    </head>
    <body>
        <?php
            session_start();
            $score = isset($_COOKIE['score']) ? $_COOKIE['score'] : 0;
            $ques = array(
                array ("What is the marker in the center of the screen called?", "crosshair", "0", "100"),
                array ("What is the most played RPG?", "dota 2", "0", "100"),
                array ("What is the most popular TCG?", "pokemon", "0", "100"),
                array ("What Nintendo game features zelda and link?", "the legend of zelda", "0", "100"),
                array ("What is the optic on a sniper rifle called?", "scope", "0", "200"),
                array ("What year was League of Legends officially released?", "2009", "0", "200"),
                array ("What card in Yu-Gi-Oh is most known for its eye color?", "blue eyes white dragon", "0", "200"),
                array ("What handheld console introduced Tetris?", "gameboy", "0", "200"),
                array ("What FPS game got shut down 2 weeks after release?", "concorde", "0", "300"),
                array ("Who owns the rights to all Megaman games?", "capcom", "0", "300"),
                array ("In Magic the Gathering, what color is associated with lifegain and damage prevention?", "white", "0", "300"),
                array ("What was the most sold console?", "playstation 2", "0", "300"),
                array ("What FPS game is most known for toxicity?", "cs2", "0", "400"),
                array ("What is the main character called most often in Elden Ring?", "tarnished", "0", "400"),
                array ("What was the most expensive card sold?", "baseball card", "0", "400"),
                array ("What is the latest and last Atari console?", "jaguar", "0", "400"),
                array ("Who is the character with a skull mask called?", "ghost", "0", "500"),
                array ("What is the main base in Monster Hunter: World called?", "astera", "0", "500"),
                array ("How many cards are in a standard deck for Magic: the Gathering?", "60", "0", "500"),
                array ("What was the first console that supported online gaming?", "sega dreamcast", "0", "500")
            );
            $GLOBALS['ques'];
            $i = $_GET['qno'];
            $getQues = $ques[$i][0];
            $curLink = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
        <div id="qBody">
            <?php
                if ($ques[$i][2] == 0) {
                    echo "
                        <div id='question'>
                            
                            "; echo $getQues; echo"
                            
                        </div>
                        <div id='answer'>
                            <form action=".$curLink." method='post'>
                                <label for='userAnswer'>Answer:<br>
                                <input type='text' name='userAnswer' required>
                                <button type='submit' name='subAns'>Submit</button>
                            </form>
                        </div>
                    ";
                } else if ($ques[$i][2] == 1) {
                    echo "
                        <div>
                            You have already seen this question. Please pick another one.<br>
                        </div>
                        <div>
                            <a href='gameboard.php'>Back</a>
                        </div>
                    ";
                }
            ?>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $userAnswer = $_POST["userAnswer"];
                $ans = $ques[$i][1];
                if ($userAnswer == $ans) {
                    echo "<div>Correct!<br></div>";
                    echo "<div><a href='gameboard.php'>Back</a></div>";
                    $ques[$i][2] = 1;
                    $score += $ques[$i][3];
                    $_COOKIE['score'] += $ques[$i][3];
                    setcookie('score', $score, time() + (86400 * 30), "/");
                } else {
                    echo "<div>Incorrect! Try again or go back:<br></div>";
                    echo "<div><a href='gameboard.php'>Back</a></div>";
                    $ques[$i][2] = 1;
                }
            }
            echo "
                <div id='score'>
                    Score: ".$_COOKIE['score']."
                </div>
            ";
        ?>
    </body>
</html>