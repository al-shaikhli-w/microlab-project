<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit();
}


require_once 'views/header.php'; ?>
<div class="page">
  <main class="page__content wrapper">
    <div class="row">
      <div class="col">
        <nav class="navbar">
          <ul class="sidebar__list">
            <li class="sidebar__item"><a href="/programmieraufgabe/reminder.php" class="sidebar__link active">Remeinder</a></li>
            <li class="sidebar__item"><a href="#" class="sidebar__link">Menüpunkt 1</a></li>
            <li class="sidebar__item"><a href="#" class="sidebar__link">Menüpunkt 2</a></li>
          </ul>
        </nav>
      </div>
      <div class="col content">
          <img src="./assets/images/woman.png" alt="Woman on phone" class="page__image" width="300">
          <h2 class="heading">Lorem ipsum dolor sit amet</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis doloremque est ipsum possimus. Eaque maiores quaerat quis repudiandae velit! Architecto commodi culpa et exercitationem hic illo inventore libero mollitia neque, officia quae, quibusdam recusandae rem repudiandae sapiente, suscipit velit veniam. Beatae cupiditate error ipsa! Autem facilis, ratione.</p>
          <p>Accusamus blanditiis eius, libero quam quis sed? Aliquam architecto aspernatur dicta eligendi enim excepturi id maxime minus nisi, non omnis optio qui repudiandae soluta sunt totam veritatis voluptates.<br>Alias eos libero maxime nihil nisi numquam quaerat totam, ut? At harum illo labore nostrum omnis porro reprehenderit vero. A aliquid aperiam aspernatur assumenda commodi consequuntur corporis cum dolore ducimus eaque eius enim est excepturi harum id ipsa laboriosam minima minus molestiae molestias nulla numquam odio possimus praesentium quas quo ratione, reprehenderit sed similique sit soluta totam vel, voluptate?<br></p>
          <p>Aliquam, enim iure labore numquam quae rerum veniam? Beatae consequatur cupiditate debitis dolor dolore dolorem enim explicabo, fugiat fugit, ipsam ipsum iste minima molestiae non numquam obcaecati officia perferendis porro praesentium quidem, quis quisquam quod ratione reiciendis sed sit tempora tempore vel voluptas voluptates! Corporis explicabo facilis possimus praesentium voluptatum? A cumque deserunt fugit illum in, quaerat quisquam quos reiciendis, rem sint tempore tenetur totam unde!</p>
          <p>Aliquam, enim iure labore numquam quae rerum veniam? Beatae consequatur cupiditate debitis dolor dolore dolorem enim explicabo, fugiat fugit, ipsam ipsum iste minima molestiae non numquam obcaecati officia perferendis porro praesentium quidem, quis quisquam quod ratione reiciendis sed sit tempora tempore vel voluptas voluptates! Corporis explicabo facilis possimus praesentium voluptatum? A cumque deserunt fugit illum in, quaerat quisquam quos reiciendis, rem sint tempore tenetur totam unde!</p>
          <p>Aliquam, enim iure labore numquam quae rerum veniam? Beatae consequatur cupiditate debitis dolor dolore dolorem enim explicabo, fugiat fugit, ipsam ipsum iste minima molestiae non numquam obcaecati officia perferendis porro praesentium quidem, quis quisquam quod ratione reiciendis sed sit tempora tempore vel voluptas voluptates! Corporis explicabo facilis possimus praesentium voluptatum? A cumque deserunt fugit illum in, quaerat quisquam quos reiciendis, rem sint tempore tenetur totam unde!</p>
      </div>

      <div class="col"></div>
    </div>
  </main>
</div>
<?php require_once 'views/footer.php'; ?>



