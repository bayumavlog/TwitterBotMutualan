<?php

require_once('twitteroauth/twitteroauth.php');

$consumer_key = '#CKLOE';
$consumer_secret = '#CSLOE';
$oauth_token = '#ATLOE';
$oauth_token_secret = '#ATSLOE';
        $connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);
	        $followers = $connection->get("followers/ids.json?cursor=-1&");
	         $friends = $connection->get("friends/ids.json?cursor=-1&");
	          $fullfriend=batim($friends);
                   $fullfollower=batim($followers); 
 $index = 1;
    $unfollow_total=0;

$all_friends = $fullfriend['ids'];
$all_followers = $fullfollower['ids'];
foreach( $all_friends as $iFollow )
    {
    $isFollowing = in_array( $iFollow, $all_followers );
	           echo "$iFollow: ".( $isFollowing ? 'OK' : '!!!' )."<br/>";
    $index++;
     if( !$isFollowing )
        {
        $parameters = array( 'user_id' => $iFollow );
        $status = $connection->post('friendships/destroy', $parameters);
        $unfollow_total++;
        } if ($unfollow_total === 999) break;
    }
                    function batim($d) {
		   if (is_object($d)) {
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {

			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
