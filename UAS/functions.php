<?php
function getGroups($conn) {
    $sql = "SELECT * FROM grup";
    $result = $conn->query($sql);
    return $result;
}

function getCountries($conn) {
    $sql = "SELECT * FROM countries";
    $result = $conn->query($sql);
    return $result;
}
?>


<!-- DIHAPUS KEMUNGKINAN -->