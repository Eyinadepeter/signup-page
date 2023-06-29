<?php
include_once "header.php"

?>

<body>
    <section class="sign_up">
        <h2>Sign up</h2>
        <div class="signup">
            <form action="controller/sign_up.php" method="post">
                <input type="text" name="name" placeholder="enter your full name">
                <input type="email" name="email" placeholder="enter a valid email">
                <input type="text" name="FullName" placeholder="username">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="pwdrepeat" placeholder="repeat password">
                <button type="submit" name="submit">Sign up</button>
            </form>
        </div>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p> Oga fill form for me,U dey ment<?p>";
            } elseif ($_GET["error"] == "invaliduid") {
                echo "<p> u no sabi your username again ni abi you just finish smoking<?p>";
            } elseif ($_GET["error"] == "passworddontmatch") {
                echo "<p>you don smoke na different password you dey send, e no match<?p>";
            } elseif ($_GET["error"] == "usernametaken") {
                echo "<p> u wan thief another person username ole , create your own<?p>";
            }
        }
        ?>
    </section>


</body>

</html>