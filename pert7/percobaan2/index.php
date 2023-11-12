<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Percobaan 2</title>
</head>
<body>
    <?php
    echo "<h2>Username session: </h2>";
    echo $_SESSION['username'];
    echo "<br><br>";
    ?>
    <a href="set.php"><button>Set Session</button></a>
    <a href="destroy.php"><button>Destroy Session</button></a>
</body>
</html>