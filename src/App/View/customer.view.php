<?php
$title = "Kunde";
$script = "assets/js/customer.js";
require 'partials/head.php';
require 'partials/header.php';
?>

<main>
    <h2>Meine Bestellungen</h2>

    <div id="customer" data-ordering-id="<?= (int)($_SESSION['ordering_id'] ?? 0) ?>"></div>
    <div id="order"></div>
</main>

<?php require 'partials/footer.php'; ?>