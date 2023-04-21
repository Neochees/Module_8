<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht</title>
    <style>
html,body{
    margin: 0;
    padding: 0;
    width:100%;
    box-sizing: border-box;

}
.pokemon{
  border: 1px solid black;
  display:inline-block;
  width:200px;
}
.pokemon img{
    max-width: 100px;
    max-height: 100px;
}
        </style>
</head>
<body>
    <?php
include("connection.inc.php");


$sql = "SELECT name, id, picture FROM product order by name ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  
  
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    ?>
  <div class="pokemon">
  <a href='detail.php?id=<?php echo($row["id"]);?>'>
    <?php echo($row["name"]);?>
    <img src='<?php echo($row["picture"]);?>'/>
  </a>
  </div>
  <?php
  }


} else {
  echo "0 results";
}

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Price</th><th>Color</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, price, color FROM product");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
</body>
</html>