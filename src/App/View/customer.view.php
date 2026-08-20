<?php
$title = "Kunde";
require 'partials/head.php';
require 'partials/header.php';

$statusMap = [
    0 => 'Bestellt',
    1 => 'Im Ofen',
    2 => 'Fertig',
    3 => 'Unterwegs',
];
?>

<main>
    <h2>Meine Bestellungen</h2>

    <?php if (empty($data)): ?>
        <p>Keine Bestellungen vorhanden.</p>
    <?php else: ?>
        <?php foreach ($data as $order): ?>
            <article>
                <h3>Bestellung #<?= (int)$order['ordering_id'] ?></h3>

                <?php foreach ($order['items'] as $item): ?>
                    <img src="assets/images/<?= htmlspecialchars($item['article_picture']) ?>"
                         width="150" height="150"
                         alt="<?= htmlspecialchars($item['article_name']) ?>"
                         title="<?= htmlspecialchars($item['article_name']) ?>">
                    <p><strong><?= htmlspecialchars($item['article_name']) ?></strong></p>
                    <p><?= (float)$item['article_price'] ?> €</p>
                    <p><?= htmlspecialchars($statusMap[$item['status']]) ?></p>
                    <br>
                <?php endforeach; ?>

                <h3>Zu zahlen: <?= (float)$order['total'] ?> €</h3>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<?php require 'partials/footer.php'; ?>