<?php
session_start();
require_once 'classes/Appointment.php';

if (!isset($_SESSION['user_id'])) {
    exit("Benutzer nicht eingeloggt");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!isset($_POST['title']) || !isset($_POST['appointment_day']) || !isset($_POST['appointment_month']) || !isset($_POST['notify_before'])) {
        $error = "Bitte füllen Sie alle Felder aus!";
    } else {
        $appointment = new Appointment();
        $title = trim($_POST['title']);
        $day = $_POST['appointment_day'];
        $month = $_POST['appointment_month'];
        $notify_before = $_POST['notify_before'];
        $email = $_SESSION['email'];

        if ($appointment->addAppointment($_SESSION['user_id'], $title, $day, $month, $notify_before, $email)) {
            echo "Termin erfolgreich hinzugefügt";
            exit();
        } else {
            $error = "Termin kann nicht hinzugefügt werden!!";
        }
    }
}
?>
