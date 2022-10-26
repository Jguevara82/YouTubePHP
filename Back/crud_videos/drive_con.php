<?php
include ("../api-drive/vendor/autoload.php");
putenv('GOOGLE_APPLICATION_CREDENTIALS=../api-drive/cuenta/youtubephp-363804-0326938af23d.json');
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope(["https://www.googleapis.com/auth/drive"]);
$service = new Google_Service_Drive($client);
?>