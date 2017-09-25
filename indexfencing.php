<?php require_once("fencing.php"); ?>

<!DOCTYPE html>
<html>
<body>
<div>
    <form action = "fencing.php" method = "post">
        How long do you want the fence to be: <input name = "fenceLength" type = "number" min = "1" required><br>
        OR How many railings do you want: <input name = "numberRailings" type = "number" min="1" required><br>
        <input type="submit" name="Login">
    </form>
</div>
</body>
</html>

<?php runProg(); ?>

