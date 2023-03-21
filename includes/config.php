<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'newsportal');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($con, "SELECT name,logo_url FROM logo");
while ($row = mysqli_fetch_array($query)) {
    $company_name = $row['name'];
    $company_logo = $row['logo_url'];
}
