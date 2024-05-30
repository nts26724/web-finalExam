function quantity_plus(id) {
    var input_qty = document.getElementById(id);
    input_qty.value = parseInt(input_qty.value) + 1;
}

function quantity_minus(id) {
    var input_qty = document.getElementById(id);
    input_qty.value = parseInt(input_qty.value) - 1;
}

function updateQuantity(id_form) {
    document.getElementById(id_form).onsubmit;
}

function deleteItem(id_form) {
    document.getElementById(id_form).onsubmit;
}