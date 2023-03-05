<?php 

$name = $_GET['full_name'];

$ch = require "../config/curl_handler.php";

curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/$name");

$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response,true);


?>

<?php require "../templates/header.html" ?>

        <h1>Repository info:  <?= $name; ?></h1>

        <dl>
            <dt>Name</dt>
            <dd> <?= $data['name']; ?> </dd>
            <dt>Description</dt>
            <dd> <?= htmlspecialchars($data['description']); ?> </dd>
            <dt>URL</dt>
            <dd> <?= $data['html_url']; ?> </dd>
            <dt>Visibility</dt>
            <dd> <?= $data['visibility']; ?> </dd>
        </dl>

        <a href="edit.php?full_name=<?= $data['full_name'] ?>">Edit</a>

        <form id="delete-form" action="delete.php" method="POST">
            <input type="hidden" name="full_name" value="<?= $data['full_name'] ?>"/>
            <button type="submit" role="button" class="db" onclick = "return checkDeletion();">Delete</button>
        </form>
 
        <script>
            function checkDeletion(){
                if(confirm("Are you sure to delete this repository?")){
                    event.preventDefault();
                   document.getElementById('delete-form').submit();
                }
            }
        </script>
        <?php require "../templates/footer.html" ?>