<?php

// get client ip
$_SERVER['REMOTE_ADDR'];

// get client os and all browesers
$_SERVER['HTTP_USER_AGENT'];

// get client request method
$_SERVER['REQUEST_METHOD'];

// what page the client want
$_SERVER['REQUEST_URI'];

// in what time the request sent (unix time)
$_SERVER['REQUEST_TIME'];

// get the query string from url address
$_SERVER['QUERY_STRING'];

// from where the client came from (what site)
if (isset($_SERVER['HTTP_REFERER'])) {

}