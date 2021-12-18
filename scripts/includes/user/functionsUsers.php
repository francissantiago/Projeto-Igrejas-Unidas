<?php
function selectUsers(){
    $emailSession = $_SESSION['email'];
    $sql = mysqli_query(connectDB(), "SELECT * FROM users WHERE loginEmail = '$emailSession'") or die(mysqli_error(connectDB()));
    $results = array();
    while ($result = $sql->fetch_assoc()) {
        $results[] = $result;
    }
    return $results;
}
?>