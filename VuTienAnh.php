<?php
 
/* == ID tài khoản muốn tăng share == */
$user = 'shou.1807';
/* == Token tài khoản chứa page == */
$token = 'EAAAAAYsX7TsBANHumPxWquIiwK5qfTO0V49c3gSb7MLbeqOhHrUSH5Np09QKqxZBAF9pVuq46wShj1MFUCXfVSnLEC7o8ZBYYfDRaud9h6xi0Qmw1nc0yc8WQxIKGUngLjMV93eKScZAP7KzNDJZAOHtg8ZCQbg7xN7iW7fMUyy4n7ICZCoWFlQEiYl8eWoZA71v9Cb3ZBZBM5gZDZD';
$accounts = json_decode(cURL('https://graph.facebook.com/me/accounts?access_token=' . $token),true);
 
$feed = json_decode(cURL('https://graph.facebook.com/' . $user . '/feed?access_token='.$token.'&limit=1'),true);
 
foreach ($accounts['data'] as $data) {
    //echo $data['access_token'] . '<br/>';
    echo cURL('https://graph.facebook.com/' . $feed['data'][0]['id'] . '/sharedposts?method=post&access_token='.$data['access_token']) . '<br/><br/><br/>';
}
 
/* == Hàm get == */
function cURL ($url) {
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
}
 
?>
 
<meta http-equiv="refresh" content="0">
