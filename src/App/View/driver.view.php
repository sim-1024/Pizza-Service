<?php
$title = "Fahrer";
require 'partials/head.php';
require 'partials/header.php';

$statusMap = [
    2 => 'Fertig',
    3 => 'Unterwegs',
    4 => 'Ausgeliefert',
];
?>

<main>
    <h2>Offene Lieferungen</h2>

    <?php if (empty($data)): ?>
        <p>Keine Bestellung vorhanden.</p>
    <?php else: ?>

        <?php foreach ($data as $order): ?>
            <article>
                <h3>Bestellung #<?= (int)$order['ordering_id'] ?></h3>
                <p><strong>Lieferadresse: </strong><?= htmlspecialchars($order['address']) ?></p>

                <?php foreach ($order['items'] as $item): ?>
                    <article>
                        <p><strong><?= htmlspecialchars($item['article_name']) ?></strong></p>
                        <img src="assets/images/<?= htmlspecialchars($item['article_picture']) ?>"
                             width="150" height="150"
                             alt="<?= htmlspecialchars($item['article_name']) ?>"
                             title="<?= htmlspecialchars($item['article_name']) ?>">
                        <p><?= (float)$item['article_price'] ?> €</p>
                    </article>
                <?php endforeach; ?>

                <h3>Zu bezahlen: <?= $order['total'] ?> €</h3>

                <form action="<?= Router::generateUrl('driver') ?>" method="post">
                    <input type="hidden" name="operation" value="update">
                    <input type="hidden" name="ordering_id" value="<?= (int)$order['ordering_id'] ?>">

                    <?php foreach ($statusMap as $value => $label): ?>
                        <label>
                            <input
                                type="radio"
                                name="new_status"
                                value="<?= $value ?>"
                                <?= (int)$order['status'] === $value ? 'checked' : '' ?>
                                <?= $value === 2 ? 'disabled' : '' ?>>
                            <?= $label ?>
                        </label><br>
                    <?php endforeach; ?>

                    <button type="submit">Übernehmen</button>
                </form>
            </article>
        <hr>
        <?php endforeach; ?>

    <?php endif; ?>
</main>

<?php require 'partials/footer.php'; ?>