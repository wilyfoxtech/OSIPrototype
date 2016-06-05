<html>
<head>

<title>Php data fetch from mysql</title>
</head>
<body>
    <p>Data fetch from mysql</p>
    <?php

    //phpinfo();
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    $mysqli = new \mysqli("localhost", "root", "Change12!", "fostercare") or die(mysqli_error());

    /* check connection */
    if (mysqli_connect_errno($mysqli))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return false;
    }

    /* return name of current default database */
    if ($result = $mysqli->query("SELECT DATABASE()")) {
        $row = $result->fetch_row();
        printf("Default database is %s.\n<br>", $row[0]);
        $result->close();
    }

    $query = "SELECT firstname, lastname FROM fosterparent ";

    if ($result = $mysqli->query($query)) {

        /* fetch object array */
        while ($row = $result->fetch_row()) {
            printf ("%s (%s) <BR>", $row[0], $row[1]);
        }

        /* free result set */
        $result->close();
    }

    /* close connection */
    $mysqli->close();
    ?>
</body>
</html>

