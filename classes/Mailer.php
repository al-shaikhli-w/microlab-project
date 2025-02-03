<?php
require_once 'config/Database.php';

class Mailer {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function sendReminders() {
        $today = date("d"); 
        $current_month = date("m");

        $stmt = $this->conn->prepare("SELECT * FROM appointment WHERE appointment_day = :day AND appointment_month = :month");
        $stmt->execute([':day' => $today, ':month' => $current_month]);
        $appointments = $stmt->fetchAll();

        foreach ($appointments as $row) {
            $to = $row['email'];
            $subject = "Reminder: " . $row['title'];
            $message = "Don't forget: " . $row['title'];
            mail($to, $subject, $message);
        }

        echo "Reminders sent!";
    }
}
?>
