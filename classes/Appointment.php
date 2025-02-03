<?php
require_once 'config/Database.php';

class Appointment {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function addAppointment($user_id, $title, $day, $month, $notify_before, $email) {
        
        $title = trim($title);
        $day = filter_var($day, FILTER_VALIDATE_INT);
        $month = filter_var($month, FILTER_VALIDATE_INT);
        $notify_before = filter_var($notify_before, FILTER_VALIDATE_INT);

        $query = "INSERT INTO appointment (user_id, title, appointment_day, appointment_month, notify_before, email) 
                  VALUES (:user_id, :title, :day, :month, :notify_before, :email)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':user_id' => $user_id,
            ':title' => $title,
            ':day' => $day,
            ':month' => $month,
            ':notify_before' => $notify_before,
            ':email' => $email
        ]);
    }

    public function getAppointments($user_id) {
        $query = "SELECT * FROM appointment WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll();
    }

    public function deleteAppointment($appointment_id, $user_id) {
        $query = "DELETE FROM appointment WHERE id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':id' => $appointment_id,
            ':user_id' => $user_id
        ]);
    }

    public function updateAppointment($appointment_id, $user_id, $title, $day, $month, $notify_before) {
        $title = trim($title);
        $day = filter_var($day, FILTER_VALIDATE_INT);
        $month = filter_var($month, FILTER_VALIDATE_INT);
        $notify_before = filter_var($notify_before, FILTER_VALIDATE_INT);
        
        $query = "UPDATE appointment 
                        SET title = :title, 
                        appointment_day = :day, 
                        appointment_month = :month, 
                        notify_before = :notify_before
                    WHERE id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':id' => $appointment_id,
            ':user_id' => $user_id,
            ':title' => $title,
            ':day' => $day,
            ':month' => $month,
            ':notify_before' => $notify_before
        ]);
    }
}
?>
