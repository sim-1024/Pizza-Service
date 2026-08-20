<?php
$title = "Bestellung";
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
                <img src="assets/images/<?= htmlspecialchars($pizza['picture']) ?>"
                     width="150" height="150"
                     alt="<?= htmlspecialchars($pizza['name']) ?>"
                     title="<?= htmlspecialchars($pizza['name']) ?>">
                <p><?= (float)$pizza['price'] ?> €</p>
                <br>
            </article>
        <?php endforeach; ?>
    </section>

    <form action="<?= Router::generateUrl('order') ?>" method="post">
        <h2>Warenkorb</h2>

        <textarea name="adresse" placeholder="Lieferadresse eingeben" required></textarea>
        <br><br>

        <select name="warenkorb[]" multiple required>
            <?php foreach ($data as $pizza): ?>
                <option value="<?= (int)$pizza['article_id'] ?>">
                    <?= htmlspecialchars($pizza['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <h3>Gesamtpreis: 10.99 €</h3>

        <br>
        <button type="button">Auswahl löschen</button>
        <button type="reset">Alles löschen</button>
        <button type="submit">Bestellen</button>
    </form>

</main>

<?php require 'partials/footer.php'; ?>