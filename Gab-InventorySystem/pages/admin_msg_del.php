<?php
// Assuming you have a database connection established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include "../includes/db_connection.php";

    // Retrieve the notification ID from the form
    $notifId = $_POST['notif-id-del'];

    // Perform the deletion query
    $sql = "DELETE FROM admin_notification WHERE notification_id = :notifId";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the parameter
    $stmt->bindParam(':notifId', $notifId, PDO::PARAM_INT);

    // Execute the query
    if ($stmt->execute()) {
        // Deletion successful
        header("Location: admin_message.php?status=Delete Success");
        exit();
    } else {
        // Deletion failed
        echo "Error deleting entry.";
    }
}
?>
