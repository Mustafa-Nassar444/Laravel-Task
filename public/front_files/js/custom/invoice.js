function updateItemDetails(element) {
    var itemRow = element.closest('.item-row');
    var selectedOption = element.options[element.selectedIndex];
    var price = parseFloat(selectedOption.getAttribute('data-price')) || 0;

    itemRow.querySelector('.item-price').value = price.toFixed(2);
    updateTotalPrice(itemRow);
}

// Change the function called when changing the quantity
function updateTotalPrice(element) {
    var itemRow = element.closest('.item-row');
    var price = parseFloat(itemRow.querySelector('.item-price').value) || 0;
    var quantity = parseInt(itemRow.querySelector('.item-quantity').value) || 0;
    var totalPrice = price * quantity;

    itemRow.querySelector('.item-total-price').value = totalPrice.toFixed(2);
    updateTotalInvoicePrice();
}

function updateTotalInvoicePrice() {
    var totalInvoicePrice = 0;
    var itemRows = document.querySelectorAll('.item-row');

    itemRows.forEach(function (itemRow) {
        var totalPrice = parseFloat(itemRow.querySelector('.item-total-price').value) || 0;
        totalInvoicePrice += totalPrice;
    });

    document.getElementById('total-invoice-price').textContent = totalInvoicePrice.toFixed(2);
}

document.getElementById('add-item').addEventListener('click', function () {
    var itemsContainer = document.getElementById('items-container');
    var newItemRow = document.querySelector('.item-row').cloneNode(true);

    // Reset values in the new row
    newItemRow.querySelector('.item-select').selectedIndex = 0;
    newItemRow.querySelector('.item-price').value = '';
    newItemRow.querySelector('.item-quantity').value = 1;
    newItemRow.querySelector('.item-total-price').value = '';

    itemsContainer.appendChild(newItemRow);
});
