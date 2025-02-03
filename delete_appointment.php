<?php
session_start();
require_once 'classes/Appointment.php';

if (!isset($_SESSION['user_id'])) {
    exit("Benutzer nicht eingeloggt");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $appointment = new Appointment();
    $deleted = $appointment->deleteAppointment($_POST['id'], $_SESSION['user_id']);

    echo $deleted ? "Termin erfolgreich gelöscht" : "Termin konnte nicht gelöscht werden";
}
?>