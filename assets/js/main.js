$(document).ready(function() {
    loadAppointments();

    $("#addForm").submit(handleAddFormSubmit);
    $("#editForm").submit(handleEditFormSubmit);
});

function loadAppointments() {
    $.ajax({
        url: "fetch_appointments.php",
        method: "GET",
        dataType: "json",
        success: renderAppointments
    });
}

function renderAppointments(response) {
    const html = response.length > 0 ? response.map(appointment => `
        <tr>
            <td>${String(appointment.appointment_day).padStart(2, '0')}.${String(appointment.appointment_month).padStart(2, '0')}</td>
            <td>${appointment.title}</td>
            <td>${appointment.notify_before} days</td>
            <td>
                <button onclick="editAppointment(${appointment.id}, '${appointment.title}', ${appointment.appointment_day}, ${appointment.appointment_month}, ${appointment.notify_before})">Bearbeiten</button>
                <button onclick="deleteAppointment(${appointment.id})">Löschen</button>
            </td>
        </tr>
    `).join('') : "<tr><td colspan='5'>Keine Termine gefunden.</td></tr>";
    $("#appointment-list").html(html);
}

function deleteAppointment(id) {
    if (confirm("Sind Sie sicher, dass Sie diesen Termin löschen möchten?")) {
        $.post("delete_appointment.php", { id: id }, function(response) {
            alert(response);
            loadAppointments();
        });
    }
}

function editAppointment(id, title, day, month, notify_before) {
    $("#edit_id").val(id);
    $("#edit_title").val(title);
    $("#edit_day").val(day);
    $("#edit_month").val(month);
    $("#edit_notify_before").val(notify_before);
    $("#editModal").show();
}

function closeEditModal() {
    $("#editModal").hide();
}

function handleAddFormSubmit(e) {
    e.preventDefault();
    if (!$("#title").val() || !$("#appointment_day").val() || !$("#appointment_month").val() || !$("#notify_before").val()) {
        $(".formAddedError").show().text("Bitte füllen Sie alle Felder aus.");
        setTimeout(function() {
            $(".formAddedError").hide();
        }, 3000);
        return;
    }
    if($("#appointment_day").val() < 1 || $("#appointment_day").val() > 31) {
        $(".formAddedError").show().text("Bitte geben Sie einen gültigen Tag ein.");
        return;
    }
    $.ajax({
        url: "add_appointment.php",
        method: "POST",
        data: {
            title: $("#title").val(),
            appointment_day: $("#appointment_day").val(),
            appointment_month: $("#appointment_month").val(),
            notify_before: $("#notify_before").val()
        },
        success: function(response) {
            alert(response);
            $("#addForm")[0].reset();
            loadAppointments();
        }
    });
}

function handleEditFormSubmit(e) {
    e.preventDefault();
    if (!$("#edit_title").val() || !$("#edit_day").val() || !$("#edit_month").val() || !$("#edit_notify_before").val()) {
        $(".formEditError").show().text("Bitte füllen Sie alle Felder aus.");
        setTimeout(function() {
            $(".formEditError").hide();
        }, 3000);
        return;
    }
    $.ajax({
        url: "edit_appointment.php",
        method: "POST",
        data: {
            id: $("#edit_id").val(),
            title: $("#edit_title").val(),
            appointment_day: $("#edit_day").val(),
            appointment_month: $("#edit_month").val(),
            notify_before: $("#edit_notify_before").val()
        },
        success: function(response) {
            alert(response);
            closeEditModal();
            loadAppointments();
        }
    });
}
