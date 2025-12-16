<?php
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=connect_flow;charset=utf8',
    'root',
    ''
);
try {
    echo "Connect succesful";
} catch (PDOException $e) {
    echo "Connect faild",$e->getMessage();
}
?>
