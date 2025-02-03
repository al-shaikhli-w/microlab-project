<?php
session_start();
require_once 'classes/Appointment.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Benutzer nicht eingeloggt"]);
    exit();
}

$appointment = new Appointment();
$appointments = $appointment->getAppointments($_SESSION['user_id']);

echo json_encode($appointments);
?>
