<?php
$title = "Bäcker";
require 'partials/head.php';
require 'partials/header.php';

$statusMap = [
    0 => 'Bestellt',
    1 => 'Im Ofen',
    2 => 'Fertig',
];
?>

<main>
    <h2>Zu backende Pizzen</h2>

    <?php if (empty($data)): ?>
        <p>Keine offenen Bestellungen.</p>
    <?php else: ?>

        <?php foreach ($data as $row): ?>
            <article>
                <h3>Bestellung #<?= (int)$row['ordering_id'] ?></h3>
                <img src="assets/images/<?= htmlspecialchars($row['article_picture']) ?>"
                     width="150" height="150"
                     alt="<?= htmlspecialchars($row['article_name']) ?>"
                     title="<?= htmlspecialchars($row['article_name']) ?>">
                <p>
                    <strong>
                        <?= htmlspecialchars($row['article_name']) ?>
                        #<?= (int)$row['ordered_article_id'] ?>
                    </strong>
                </p>
            </article>

            <form action="<?= Router::generateUrl('baker') ?>" method="post">
                <input type="hidden" name="operation" value="update">
                <input type="hidden" name="ordered_article_id" value="<?= (int)$row['ordered_article_id'] ?>">

                <?php foreach ($statusMap as $value => $label): ?>
                    <label>
                        <input
                            type="radio"
                            name="new_status"
                            value="<?= $value ?>"
                            <?= (int)$row['status'] === $value ? 'checked' : '' ?>>
                        <?= $label ?>
                    </label><br>
                <?php endforeach; ?>

                <button type="submit">Bestätigen</button>
                <br><br>
            </form>
            <hr>
        <?php endforeach; ?>

    <?php endif; ?>

</main>

<?php require 'partials/footer.php'; ?>