<?php 

$ch = require "../config/curl_handler.php";

curl_setopt($ch,CURLOPT_URL,"https://api.github.com/repos/{$_POST['full_name']}");
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PATCH');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

$data = json_decode($response,true);

if($status_code == 422){
    echo "Invalid form data ";
    print_r($data["errors"]);
    exit;
}

if($status_code != 200){
    echo "Unexpected code: $status_code";
    var_dump($data);
    exit;
}


?>

<?php require "../templates/header.html" ?>

 <h1> Update Repository </h1>

 <h4><ins>Repository updated successfully.</ins></h4>
 <a type="button" href="../pages/show.php?full_name=<?= $data['full_name'] ?>" class="outline green">View</a>

<?php require "../templates/footer.html" ?>