<?php 

$ch = require "config/curl_handler.php";

curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/repos");

$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response,true);

//var_dump($data);

?>

<?php require "templates/header.html" ?>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Visibility</th>
                </tr>
            </thead>

            <tbody>
                <?php  foreach($data as $repo) { ?>
                <tr>
                    <td> <a href="pages/show.php?full_name=<?= $repo['full_name']; ?>">
                        <?= $repo["name"]; ?>
                    </a>
                    </td>
                    <td><?= $repo["description"] ;?></td>
                    <td>
                        <a href='<?= $repo["html_url"]; ?>' target="_blank">
                            <?= $repo["name"]; ?>
                        </a>
                    </td>
                    <td><?= $repo["visibility"];?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="pages/new.php" role="button">Add a new Repository</a> 
 <?php require "templates/footer.html" ?>
