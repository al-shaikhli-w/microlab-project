<?php

require_once 'config/config.php';

class Database
{
    private $host = "localhost";
    private $db_name = "reminder_app";
    private $username = "root";
    private $password = "root";
    private $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            $this->pdo = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $error) {
            die("Database connection failed: " . $error->getMessage());
        }
    }
    public function getConnection()
    {
        if (!isset($this->conn)) {
            new Database();
        }
        return $this->conn;
    }
    public function sendReminder(){
        $today = date("d");
        $current_month = date("m");
        $stmt = $this->conn->prepare("SELECT * FROM appointment WHERE DAY(date) = :today AND MONTH(date) = :current_month");
        $stmt->execute(['today' => $today, 'current_month' => $current_month]);
        $appointments = $stmt->fetchAll();
        foreach ($appointments as $appointment) {
            $to = $row['email'];
            $subject = "Reminder: " . $row['title'];
            $message = "Don't forget: " . $row['title'];
            mail($to, $subject, $message);
        }
        echo "Reminder sent";
    }

}