<?php
include('conn.php');

if (isset($_GET['e_id'])) {
    $e_id = $_GET['e_id'];

    $delete = mysqli_query($conn, "DELETE FROM employees WHERE e_id='$e_id'");

    if ($delete) {
        echo "
        <script>
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = 'select.php';
            } else {
                window.history.back();
            }
        </script>";
    } else {
        echo "Failed to delete the record.";
    }
} else {
    echo "No ID provided.";
}
?>
