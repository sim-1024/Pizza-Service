<?php
$title = "Fahrer";
require 'partials/head.php';
require 'partials/header.php';
?>

<main>
    <h2>Offene Lieferungen</h2>

    <section>
        <h3>Bestellung <span>#1</span></h3>
        <p><strong>Lieferadresse:</strong> Musterstraße 1</p>

        <article>
            <h4><span>#1</span> Vegetarier</h4>
            <img src="images/vegetarier.png" width="200" height="200" alt="Pizza Vegetarier">
            <p>12,50 €</p>
        </article>

        <article>
            <h4><span>#2</span> Salami</h4>
            <img src="images/salami.png" width="200" height="200" alt="Pizza Salami">
            <p> 8,57 €</p>
        </article>

        <article>
            <h4><span>#3</span> Schinken</h4>
            <img src="images/schinken.png" width="200" height="200" alt="Pizza Schinken">
            <p>11,99 €</p>
        </article>

        <article>
            <h4><span>#4</span> Salami</h4>
            <img src="images/salami.png" width="200" height="200" alt="Pizza Salami">
            <p> 8,57 €</p>
        </article>

        <h3>Zu bezahlen: 41,63 €</h3>

        <form action="https://echo.hofmann-thomas.de" method="post">
            <p>Status:</p>
            <label>
                <input type="radio" name="status" value="fertig">
                fertig
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="unterwegs" checked>
                unterwegs
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="ausgeliefert">
                geliefert
            </label>
            <br><br>

            <button type="submit">Status speichern</button>
        </form>
    </section>
</main>

<?php require 'partials/footer.php'; ?>
