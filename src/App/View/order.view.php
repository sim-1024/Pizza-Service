<?php
$title = "Bestellung";
$script = "assets/js/order.js";
require 'partials/head.php';
require 'partials/header.php';
?>

<main>

    <?php if (isset($_GET['message']) && $_GET['message'] === 'error'): ?>
        <p class="message error">Bitte Adresse eingeben und mindestens eine Pizza wählen.</p>
    <?php endif; ?>

    <section>
        <h2>Speisekarte</h2>

        <?php foreach ($data as $pizza): ?>
            <article>
                <h3>#<?= (int)$pizza['article_id'] ?>
                    <?= htmlspecialchars($pizza['name']) ?></h3>
                <button type="button">
                    <img src="assets/images/<?= htmlspecialchars($pizza['picture']) ?>"
                        width="150" height="150"
                        alt="<?= htmlspecialchars($pizza['name']) ?>"
                        title="<?= htmlspecialchars($pizza['name']) ?>"
                        class="pizza"
                        data-id="<?= (int)$pizza['article_id'] ?>"
                        data-price="<?= (float)$pizza['price'] ?>"
                    >
                </button>
                <p><?= (float)$pizza['price'] ?> €</p>
                <hr>
            </article>
        <?php endforeach; ?>
    </section>

    <form id="orderForm" action="<?= Router::generateUrl('order') ?>" method="post">
        <h2>Warenkorb</h2>

        <textarea id="adresse" name="adresse" placeholder="Lieferadresse eingeben" required></textarea>
        <br><br>

        <select id="warenkorb" name="warenkorb[]" multiple></select>

        <h3>Gesamtpreis: <span id="gesamtpreis">0.00</span> €</h3>

        <br>
        <button type="button" id="auswahlEntfernen">Auswahl löschen</button>
        <button type="reset" id="allesEntfernen">Alles löschen</button>
        <button type="submit" id="bestellen" disabled>Bestellen</button>
    </form>

</main>

<?php require 'partials/footer.php'; ?>