<?php

session_start();
require_once('twitteroauth/twitteroauth.php');

define('CONSUMER_KEY', '#CKLOE');
define('CONSUMER_SECRET', '#CSLOE');
define('access_token', '#ATLOE');
define('access_token_secret', '#ATSLOE');

$jumlah = "1";

function randomline( $target )
{
    $lines = file( $target );
    return $lines[array_rand( $lines )];
}
$target = randomline('target.txt');

$koneksi = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, access_token, access_token_secret);
$nasi = $koneksi->get('search/tweets', array('q' => $target,  'count' => $jumlah, 'result_type' => recent));
$statuses = $nasi->statuses;
foreach($statuses as $status)
{
$username = $status->user->screen_name;
$koneksi->post('friendships/create', array('screen_name' => $username));

if($eksekusi->errors) {
echo "<center>Gagal</center>";
}
else {
echo "<center>Berhasil. Follow $username </center>";
}
}
?>
