<?php 

$ch = require "../config/curl_handler.php";

curl_setopt($ch,CURLOPT_URL,"https://api.github.com/repos/{$_POST['full_name']}");

curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');


$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

$data = json_decode($response,true);


if($status_code != 204){
    echo "Unexpected code: $status_code";
    var_dump($data);
    exit;
}


?>

<?php require "../templates/header.html" ?>

 <h1> Delete Repository </h1>

 <h4><del>Repository deleted successfully.</del></h4>
 <a type="button" href="/" class="outline green">HOME</a>

<?php require "../templates/footer.html" ?>