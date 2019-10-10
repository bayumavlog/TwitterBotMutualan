<?php

session_start();
require_once('twitteroauth/twitteroauth.php');

define('CONSUMER_KEY', '#CKLOE');
define('CONSUMER_SECRET', '#CSLOE');
define('access_token', '#ATLOE');
define('access_token_secret', '#ATSLOE');

$jumlah = "1";
$keyword ="Target Loe"; #example askmenfess DMenfess dll
$type = "live";

$koneksi = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, access_token, access_token_secret);
$crot = $koneksi->get('search/tweets', array('q' => $keyword, 'count' => $jumlah));
$statuses = $crot->statuses;
foreach($statuses as $status)
{
$username = $status->user->screen_name;
$text = $status->text;
$idstr = $status->id_str;
$eksekusi = $koneksi->post('friendships/create', array('screen_name' => $username));

if($eksekusi->errors) {
echo "<center>Gagal</center>";
}
else {
echo "<center>Berhasil. Follow $username </center>";
}
}
?>
