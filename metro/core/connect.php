<?php

//db connection class using singleton pattern
class dbConn{

//variable to hold connection object.
protected static $db_conn;

//private construct - class cannot be instatiated externally.
private function __construct() {

try {
// assign PDO object to db variable
self::$db_conn = new PDO( 'mysql:host=localhost;dbname=database_name', 'username', 'password' );
self::$db_conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $e) {
//Output error - would normally log this to error file rather than output to user.
//echo "Connection Error: " . $e->getMessage();
}

}

// get connection function. Static method - accessible without instantiation
public static function getConnection() {

//Guarantees single instance, if no connection object exists then create one.
if (!self::$db_conn) {
//new connection object.
new dbConn();
}

//return connection.
return self::$db_conn;
}

}//end class

?>