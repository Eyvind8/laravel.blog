<?php

$redis = new Redis();
$redis->connect('redis', 6379);
echo "Connection to server sucessfully <br>";
$redis->set("tutorial-name", "Redis tutorial");
echo "Stored string in redis:: " . $redis->get("tutorial-name") . '<br>';

$server = 'mysql';
$username = 'root';
$password = 'root';

$mysql = new MySQLi($server, $username, $password, 'blog');
if ($mysql->connect_errno) {
    echo "Errno: " . $mysql->connect_errno . "<br>";
}
$result = $mysql -> query("SELECT * FROM test");
print_r($result);




