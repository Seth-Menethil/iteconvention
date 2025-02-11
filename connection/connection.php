<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect('localhost', 'u619216262_iteconve_db', 'Iteconve_db2025', 'u619216262_iteconve_db');
if (!$con) {
    echo 'please check your Database connection';
}
// else{
//     echo "Connection Successfull";
// }

?>