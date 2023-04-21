<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <style>
html,body{
    margin: 0;
    padding: 0;
    width:100%;
    box-sizing: border-box;
    display: flex;
    flex-wrap: wrap;

}
.pokemon{
  border: 1px solid black;
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



$sql = "SELECT * FROM product WHERE id = ". $_GET["id"] ;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    ?>
<div class="pokemon">
<?php
    echo "<a href='detail.php?id=".$row["id"]."'>id: " . $row["id"]. " - name: " . $row["name"]. "<img src='" . $row["picture"]. "'/></a>";
    echo("color: " . $row["color"] . "<br>");
    echo("price: " . $row["price"] . "<br>");
    echo("</div>");
}
} else {
  echo "0 results";
}
mysqli_close($conn);
?>
</body>
</html>