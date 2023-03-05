<?php 
$name = $_GET['full_name'];

$ch = require "../config/curl_handler.php";

curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/$name");

$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response,true);

?>

<?php require "../templates/header.html" ?>

<form action="update.php" method = "POST">

<input type="hidden" name="full_name" value="<?= $data['full_name'] ?>"/>

    <label for="name">Name</label>
    <input type="text" value="<?= $data['name'] ?>" name="name" placeholder="Repository Name"/>

    <label for="description">Description</label>
    <textarea name="description"> htmlspecialchars(<?= $data['description'] ?>)</textarea>
<fieldset>
    <p>Do you want to change it's  visibility? Currently it's <?= $data['visibility'] ?></p>
    <label for="private">
    <input type="radio" name="private" value="<?= $data['private'] ? 'false' : 'true' ?>"/>
     Yes
    </label>
</fieldset>
    <input type="submit" value="Add"/>
</form>

<?php  require "../templates/footer.html"?>

