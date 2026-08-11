<?php
$title = "Bäcker";
require 'partials/head.php';
require 'partials/header.php';
?>

<main>
    <h2>Zu backende Pizzen</h2>

    <article>
        <h3><span>#1</span> Vegetarier</h3>
        <img src="images/vegetarier.png" width="200" height="200" alt="Pizza Vegetarier">

        <form action="https://echo.hofmann-thomas.de" method="post">

            <p>Status:</p>

            <label>
                <input type="radio" name="status" value="bestellt" checked>
                bestellt
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="im_ofen">
                im Ofen
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="fertig">
                fertig
            </label>
            <br><br>

            <button type="submit">Status speichern</button>
        </form>
    </article>
    <br>

    <article>
        <h3><span>#2</span> Salami</h3>
        <img src="images/salami.png" width="200" height="200" alt="Pizza Salami">

        <form action="https://echo.hofmann-thomas.de" method="post">
            <p>Status:</p>

            <label>
                <input type="radio" name="status" value="bestellt">
                bestellt
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="im_ofen" checked>
                im Ofen
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="fertig">
                fertig
            </label>
            <br><br>

            <button type="submit">Status speichern</button>
        </form>
    </article>
    <br>

    <article>
        <h3><span>#3</span> Schinken</h3>
        <img src="images/schinken.png" width="200" height="200" alt="Pizza Schinken">

        <form action="https://echo.hofmann-thomas.de" method="post">
            <p>Status:</p>

            <label>
                <input type="radio" name="status" value="bestellt">
                bestellt
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="im_ofen">
                im Ofen
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="fertig" checked>
                fertig
            </label>
            <br><br>

            <button type="submit">Status speichern</button>
        </form>
    </article>
    <br>

    <article>
        <h3><span>#4</span> Salami</h3>
        <img src="images/salami.png" width="200" height="200" alt="Pizza Salami">

        <form action="https://echo.hofmann-thomas.de" method="post">
            <p>Status:</p>

            <label>
                <input type="radio" name="status" value="bestellt" checked>
                bestellt
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="im_ofen">
                im Ofen
            </label>
            <br>

            <label>
                <input type="radio" name="status" value="fertig">
                fertig
            </label>
            <br><br>

            <button type="submit">Status speichern</button>
        </form>
    </article>
</main>

<?php require 'partials/footer.php'; ?>