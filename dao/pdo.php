<?php
// require_once('../.php');
session_start();
function PDOconnect(){
    // $svname = 'localhost';
    $username = 'root';
    $DBname = 'dam';
    $pass = '';
    try {
        $conn = new PDO("mysql:dbname={$DBname}", $username, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query("SET GLOBAL FOREIGN_KEY_CHECKS=0;")->fetchAll(PDO::FETCH_ASSOC); 
        return $conn;
    } catch (PDOexception $e) {
        echo 'Error' . $e;
    }
}
/**
 * @param string $sql là lệnh sql
 * ```
 * ex: insert ?(?,?,?) value(?,?,?)
 * ```
 * các param sau $sql là các giá trị được thế vào ?
 */
function PDO_execute($sql){
    $sql_args = (count(func_get_args())>1)? func_get_args()[1]:null;
    try {
        $conn = PDOconnect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function PDO_query($sql){
    // $sql_args = func_get_args();
    // $sql_args = array_slice(func_get_args(), 1);
    $sql_args = (count(func_get_args())>1)? func_get_args()[1]:null;
    // var_dump($sql_args);
    // var_dump($a);

    try {
        $conn = PDOconnect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
