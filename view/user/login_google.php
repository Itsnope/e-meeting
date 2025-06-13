<?php

// uncomment apabila mengakses file secara langsung
// require '../../config/google-config.php';

$auth_url = $client->createAuthUrl();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Google Login</title>
</head>
<body>
  <a href="<?= $auth_url ?>">Login dengan Google</a>
</body>
</html>