<?php
$title = "Kunde";
require 'partials/head.php';
require 'partials/header.php';
?>

<main>
    <h2>Meine Bestellung</h2>
    <section>
        <article>
            <h3><span>#1</span> Vegetarier</h3>
            <img src="images/vegetarier.png" width="200" height="200" alt="Pizza Vegetarier">
            <p>12,50 €</p>
            <p><strong>bestellt</strong></p>
        </article>
        <br>

        <article>
            <h3><span>#2</span> Salami</h3>
            <img src="images/salami.png" width="200" height="200" alt="Pizza Salami">
            <p>8,57 €</p>
            <p><strong>im Ofen</strong></p>
        </article>
        <br>

        <article>
            <h3><span>#3</span> Schinken</h3>
            <img src="images/schinken.png" width="200" height="200" alt="Pizza Schinken">
            <p>11,99 €</p>
            <button><strong>fertig</strong></button>
        </article>
        <br>

        <article>
            <h3><span>#4</span> Salami</h3>
            <img src="images/salami.png" width="200" height="200" alt="Pizza Salami">
            <p>8,57 €</p>
            <p><strong>bestellt</strong></p>
        </article>
        <br>
    </section>

    <h3>Zu bezahlen: 41,63 €</h3>

</main>

<?php require 'partials/footer.php'; ?>