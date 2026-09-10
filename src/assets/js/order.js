const pizzas = document.querySelectorAll('.pizza');
const orderForm = document.getElementById('orderForm');
const adresse = document.querySelector('textarea[name="adresse"]');
const warenkorb = document.getElementById('warenkorb');
const bestellenButton = document.getElementById("bestellen");
const auswahlEntfernenButton = document.getElementById('auswahlEntfernen');
const allesEntfernenButton = document.getElementById('allesEntfernen');
const gesamtpreis = document.getElementById('gesamtpreis');

pizzas.forEach(pizza => {
    pizza.addEventListener('click', () => {
        const option = document.createElement('option');
        option.value = pizza.dataset.id;
        option.textContent = pizza.title;
        option.dataset.price = pizza.dataset.price;

        warenkorb.appendChild(option);

        updatePrice();
        updateSubmitButton();
    });
});

adresse.addEventListener('input', updateSubmitButton);

auswahlEntfernenButton.addEventListener('click', () => {
    [...warenkorb.selectedOptions].forEach(option => option.remove());

    updatePrice();
    updateSubmitButton();
});


allesEntfernenButton.addEventListener('click', () => {
    warenkorb.replaceChildren();

    updatePrice();
    updateSubmitButton();
});


orderForm.addEventListener("submit", () => {
    [...warenkorb.options].forEach(option => {
        option.selected = true;
    });
});


function updatePrice() {
    let sum = 0;

    [...warenkorb.options].forEach(option => {
        sum += parseFloat(option.dataset.price);
    });

    gesamtpreis.textContent = sum.toFixed(2);
}


function updateSubmitButton() {
    bestellenButton.disabled =
        !adresse.value.trim() ||
        warenkorb.options.length === 0;
}