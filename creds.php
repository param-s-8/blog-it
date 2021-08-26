<?php
    /* $databaseName = "blogit";
    $username = "root";
    $password = "";
    $server = "localhost";
    $conn = mysqli_connect($server, $username, $password, $databaseName);
    $connect = mysqli_connect($server_name, $mysql_username, $mysql_password, $database_name);
    $db = mysqli_connect($server_name, $mysql_username, $mysql_password, $database_name); */
?>

<?php
    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>