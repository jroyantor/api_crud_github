<?php 

$headers = [
    "User-Agent: YOUR_USER_AGENT",
  "Authorization: Bearer YOUR_API_TOKEN"
];

$ch = curl_init();

curl_setopt_array($ch,[ 
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true
]);

return $ch;