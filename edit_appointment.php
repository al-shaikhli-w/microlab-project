<?php
session_start();
require_once 'classes/Appointment.php';

if (!isset($_SESSION['user_id'])) {
    exit("Benutzer nicht eingeloggt");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    if(!isset($_POST['title']) || !isset($_POST['appointment_day']) || !isset($_POST['appointment_month']) || !isset($_POST['notify_before'])) {
        $error = "Bitte füllen Sie alle Felder aus!";
        return;
    }
    $appointment = new Appointment();
    $updated = $appointment->updateAppointment(
        $_POST['id'],
        $_SESSION['user_id'],
        $_POST['title'],
        $_POST['appointment_day'],
        $_POST['appointment_month'],
        $_POST['notify_before']
    );

    echo $updated ? "Termin erfolgreich aktualisiert" : "Termin kann nicht aktualisiert werden";
}
?>
