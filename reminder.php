<?php
require_once 'views/header.php';
require_once 'config/Database.php';
?>

<div class="page">
  <main class="page__content wrapper">
    <div class="row">
      <div class="col">
        <nav class="navbar">
          <ul class="sidebar__list">
            <li class="sidebar__item"><a href="/programmieraufgabe/index.php" class="sidebar__link active">Home</a></li>
            <li class="sidebar__item"><a href="#" class="sidebar__link">Menüpunkt 1</a></li>
            <li class="sidebar__item"><a href="#" class="sidebar__link">Menüpunkt 2</a></li>
          </ul>
        </nav>
      </div>
      <div class="col content">
        <section class="forms">
          <form class="add-form" id="addForm" method="post">
            <div class="form-group">
              <label for="appointment_day">Datum (TT/MM)</label>
              <div class="field-group">
                <input type="number" id="appointment_day" name="appointment_day" min="1" max="31">
                <input type="number" id="appointment_month" name="appointment_month" min="1" max="12">
              </div>
            </div>
            <div class="form-group">
              <label for="title">Bezeichnung</label>
              <input type="text" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="notify_before">Erinnerung</label>
              <select id="notify_before" name="notify_before">
                <option disabled selected>--Bitte auswählen--</option>
                <option value="1">1 Tag</option>
                <option value="2">2 Tage</option>
                <option value="4">4 Tage</option>
                <option value="7">1 Woche</option>
                <option value="14">2 Wochen</option>
              </select>
            </div>
            <button type="submit" class="btn">Speichern</button>
          </form>
          <p class="formAddedError error-text" style="display:none"></p>
        </section>
        <table class="event-table">
          <thead>
            <tr>
              <th>Datum</th>
              <th>Bezeichnung</th>
              <th>Erinnerung</th>
              <th>Aktion</th>
            </tr>
          </thead>
          <tbody id="appointment-list">
          </tbody>
        </table>
        <section id="editModal" class="edit-section" style="display: none;">
          <form id="editForm" class="add-form">
            <input type="hidden" id="edit_id">
            <div class="form-group">
              <label for="edit_day">Datum (TT/MM)</label>
              <div class="field-group">
                <input type="number" id="edit_day" name="edit_day" min="1" max="31" required>
                <input type="number" id="edit_month" name="edit_month" min="1" max="12" required>
              </div>
            </div>
            <div class="form-group">
              <label for="edit_title">Bezeichnung</label>
              <input type="text" id="edit_title" name="title" required>
            </div>
            <div class="form-group">
              <label for="edit_notify_before">Erinnerung</label>
              <select id="edit_notify_before" name="edit_notify_before" required>
                <option disabled selected>--Bitte auswählen--</option>
                <option value="1">1 Tag</option>
                <option value="2">2 Tage</option>
                <option value="4">4 Tage</option>
                <option value="7">1 Woche</option>
                <option value="14">2 Wochen</option>
              </select>
            </div>
            <div class="btns">
              <button type="submit">Änderungen speichern</button>
              <button type="button" onclick="closeEditModal()">Abbrechen</button>
            </div>
          </form>
          <p class="formEditError error-text" style="display:none"></p>
        </section>
        <span class="corner corner-left"></span>
        <span class="corner corner-right"></span>
      </div>
      <div class="col"></div>
    </div>
  </main>
</div>

<?php require_once 'views/footer.php'; ?>
