<?php

require_once("Database.class.php");
try {
    $db = new Database();
} catch (PDOException $e) {
    echo "Connection failed: ";
}
$id = isset($_GET['id']) ? $_GET['id'] : null;
$leerling = $db->Select($id);

$naam = isset($_POST['naam']) ? $_POST['naam'] : $leerling['naam'];
$achternaam = isset($_POST['achternaam']) ? $_POST['achternaam'] : $leerling['achternaam'];
$email = isset($_POST['email']) ? $_POST['email'] : $leerling['email'];
$geboortedatum = isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : $leerling['geboorte_datum'];

if (isset($_POST['submit'])) {
    try {
        $db->Update($id, $naam, $achternaam, $email, $geboortedatum);
        header("Location: home.php");
    } catch (PDOException $e) {
        echo "Faild to add: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="op">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form method="post">
        <input type="text" name="naam" placeholder="Naam" >
        <input type="text" name="achternaam" placeholder="Achternaam">
        <input type="text" name="email" placeholder="Email" >
        <input type="date" name="geboortedatum" placeholder="Geboortedatum">
        <input type="submit" name="submit" value="Update">
    </form>
</body>

</html>