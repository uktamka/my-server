<? 
// var_dump($_SERVER);
 $servername = "172.20.0.5";
 $username = "root";
 $password = "test";
 $dbname = "test";
 $port = "3306";
 

 try{
    $conn = new PDO("mysql:host=$servername;",$username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected succesfully";
 } catch(PDOException $e){
    echo "Connection failed: " . $e -> getMessage();
 }