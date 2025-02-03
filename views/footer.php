<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./assets/js/main.js"></script>

<?php if (isset($_SESSION['email'])): ?>
    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
<?php endif; ?>

</body>
</html>
