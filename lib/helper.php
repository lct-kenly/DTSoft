<?php
    function get_all_db($conn, $table) {
        $sql = "SELECT * FROM $table WHERE 1";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
?>