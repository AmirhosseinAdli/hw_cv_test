<?php

//function connect_to_db($servername, $username, $password, $databasename)
//{
//    // Create connection
//    $conn = new mysqli($servername, $username, $password, $databasename);
//
//// Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
////    echo "Connected successfully";
//
//    return $conn;
//}
//
//function select_from($conn, $sql): array
//{
//    $result = $conn->query($sql);
//
//    // Fetch all
//    $ret = $result->fetch_all(MYSQLI_ASSOC);
//
//// Free result set
//    $result->free_result();
//
////    $conn->close();
//    return $ret;
//}
//
//function insert_into($conn, $sql): ?int
//{
//    if ($conn->query($sql) === TRUE) {
//        return $conn->insert_id;
//
//    }
//    echo "Error: " . $sql . "<br>" . $conn->error;
//    return false;
//}
//
//
function mysql_connect($user, $pass, $dbname, $host = 'localhost', $port = 3306)
{
    $conn = null;
    $conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//    try {
//        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
//        // set the PDO error mode to exception
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
////        echo "Connected successfully\n";
//    } catch (PDOException $e) {
//        echo "Connection failed: " . $e->getMessage() . "\n";
//    }
    return $conn;
}

function mysql_drop_table(object $conn, string $table): void
{
    $sql = "DROP TABLE IF EXISTS `$table`;";
    if($conn->query($sql) === TRUE){
        echo "Table $table dropped successfully\n";
    }
    else{
        die("Connection failed: " . $conn->error);
    }
//    $conn->exec($sql);
//    echo "Table $table dropped successfully\n";
}

function mysql_create_table(object $conn, string $table, array $fields): void
{
    $sql = "CREATE TABLE `$table`" .
        " (" . implode(',', $fields) . ");";
    if($conn->query($sql) === TRUE){
        echo "Table $table created successfully\n";
    }
    else{
        die("Create Table($table) failed: " . $conn->error);
    }
//    $conn->exec($sql);
//    echo "Table $table created successfully\n";
}


function mysql_insert(object $conn, string $table, array $fields, array $values): ?int
{
    $sql = "INSERT INTO `$table`" .
        " (`" . implode('`,`', $fields) . "`)" .
        " VALUES ('" . implode("', '", $values) . "');";
    if($conn->query($sql) === TRUE){
        return $conn->insert_id;
    }
    else{
        die("Insertion failed: " . $conn->error);
    }
//    $conn->exec($sql);
//    echo "one record created successfully\n";
}

function mysql_update(object $conn, string $table, array $fields, array $values, string $select)
{
    $data = array_combine($fields,$values);
    $content = [];
    foreach ($data as $key => $val) {
        $content[] = "`$key`='$val'";
    }
    $content = implode(',', $content);
    $sql = "UPDATE `$table`" .
        " SET $content" .
        " WHERE $select;";
    return $conn->query($sql) === TRUE;
//    $conn->exec($sql);
//    return true;
}

function mysql_select($conn, $sql)
{
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        yield $result->fetch_assoc();
    } else {
        return null;
    }
//    try {
//        $stmt = $conn->prepare($sql);
//        $stmt->execute();
//
//        // set the resulting array to associative
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        foreach (new RecursiveArrayIterator($stmt->fetchAll()) as $k => $v) {
//            yield $v;
//        }
//    } catch (PDOException $e) {
//        die("Error: " . $e->getMessage());
//    }
}

function mysql_select_one($conn, $sql)
{
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
//    try {
//        $stmt = $conn->prepare($sql);
//        $stmt->execute();
//
//        // set the resulting array to associative
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $ret = $stmt->fetch();
//    } catch (PDOException $e) {
//        die("Error: " . $e->getMessage());
//    }
//    return $ret;
}

function mysql_select_all($conn, $sql)
{
    $ret = null;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $ret = $result->fetch_all(MYSQLI_ASSOC);
    }

    return $ret;
//    $ret = null;
//    try {
//        $stmt = $conn->prepare($sql);
//        $stmt->execute();
//
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        $ret = $stmt->fetchAll();
//    } catch (PDOException $e) {
//        die("Error: " . $e->getMessage());
//    }
//    return $ret;
}

function env_parser(): array
{
    $ret = [];
    $env_file = '../.env';
    $env = file_get_contents($env_file);
    $env = explode("\n", $env);
    foreach ($env as $line) {
        $line = array_map('trim', explode('=', $line));
        $ret[$line[0]] = $line[1];
    }
    return $ret;
}

function base_dir(string $path = '')
{
    return __DIR__ . '/../' . $path;
}

function myhash(string $input):string
{
    return hash('sha1',(hash('md5', $input)));
}

function check_auth()
{
    if(!isset($_SESSION['auth']['user_id']['id']))
    {
        header('Location:/');
        die();
    }
    return $_SESSION['auth']['user_id']['id'];
}