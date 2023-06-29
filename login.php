<?php
include_once "header.php"

?>
<link rel="stylesheet" href="./styles/style.css">

<body>
    <section class="sign_up">
        <h2>Log In</h2>
        <div class="signup">
            <form action="controller/log_in.php" method="post">

                <input type="text" name="uid " placeholder="username/email">
                <input type="password" name="pwd" placeholder="password">
                <button type="submit" name="submit">Log In</button>
            </form>
        </div>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p> Oga put something for login <?p>";
            } elseif ($_GET["error"] == "wronglogin") {
                echo "<p> incorrect login<?p>";
            }
        }
    
        ?>

    </section>

</body>

</html>