</div>
<?php
if (!isset($_SESSION["validUserData"]) && !strpos($_SERVER['SCRIPT_FILENAME'], 'index.php')) {
    ani_redirect('./');
}

?>

<footer class=" position-fixed w-100 bottom-0  d-flex justify-content-center align-items-center bg-success">
    <p class="m-0">&copy; <?= date('Y') ?> - All rights reserved to Zoo-Animal.com</p>
</footer>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="./assets/app.js"></script>
</body>

</html>