<?php

include_once "aiven_config.php";

$uri = "mysql://{$aiven_username}:{$aiven_password}@mysql-issue-tracker-dc87b75-issue-tracking-app.h.aivencloud.com:13387/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];
$conn .= ";dbname=QUANLYSACH";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
  $db = new PDO($conn, $fields["user"], $fields["pass"]);
} catch (Exception $e) {
  echo "Error: " . get_class($e) . "<br>Message: " . $e->getMessage() . "<br>Stack: " . str_replace('#', "\n", $e->getTraceAsString());
  exit;
}