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
    Hier komen de pokemons:
    <?php
include("connection.inc.php");


$sql = "SELECT name, id, name FROM product order by name ASC";
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
?>

<?php
mysqli_close($conn);
?>
</body>
</html>