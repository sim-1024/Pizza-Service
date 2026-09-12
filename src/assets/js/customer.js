const customer = document.getElementById("customer");
const orderingId = customer.dataset.orderingId;

async function requestData() {
    try {
        const response = await fetch("api/ordering/" + orderingId);

        if (!response.ok) {
            throw new Error("Fehler: " + response.status);
        }

        const data = await response.json();
        process(data);
    } catch (error) {
        console.error("Übertragung fehlgeschlagen:", error);
    }
}

function process(data) {
    const container = document.getElementById("order");
    container.replaceChildren();

    const statusMap = [
        "Bestellt",
        "Im Ofen",
        "Fertig",
        "Unterwegs"
    ];

    if (Object.keys(data).length === 0) {
        const p = document.createElement("p");
        p.textContent = "Keine Bestellungen vorhanden.";
        container.appendChild(p);
        return;
    }

    for (const order of Object.values(data)) {
        const article = document.createElement("article");

        const title = document.createElement("h3");
        title.textContent = "Bestellung #" + order.ordering_id;
        article.appendChild(title);

        for (const item of order.items) {
            const img = document.createElement("img");
            img.src = "assets/images/" + item.article_picture;
            img.width = 150;
            img.height = 150;
            img.alt = item.article_name;
            img.title = item.article_name;

            const name = document.createElement("p");
            const strong = document.createElement("strong");
            strong.textContent = item.article_name;
            name.appendChild(strong);

            const price = document.createElement("p");
            price.textContent = item.article_price + " €";

            const status = document.createElement("p");
            status.textContent = statusMap[item.status];

            article.appendChild(img);
            article.appendChild(name);
            article.appendChild(price);
            article.appendChild(status);
            article.appendChild(document.createElement("br"));
        }

        const total = document.createElement("h3");
        total.textContent = "Zu zahlen: " + order.total.toFixed(2) + " €";
        article.appendChild(total);

        container.appendChild(article);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    requestData();
    setInterval(requestData, 2000);
});