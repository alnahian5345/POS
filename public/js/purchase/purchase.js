
let productOption = '';

$(document).ready(function () {

    loadSupplierList();
    loadProductList();

    // ================= Add Product Row =================
    $('#addRow').on('click', function () {

        let row = `
                <tr>

                    <td>
                        <select class="form-select product_id" name="product_id[]">
                            ${productOption}
                        </select>
                    </td>

                    <td>
                        <input type="number"
                               class="form-control qty"
                               name="qty[]">
                    </td>

                    <td>
                        <input type="number"
                               class="form-control price"
                               name="price[]">
                    </td>

                    <td>
                        <input type="text"
                               class="form-control amount"
                               readonly>
                    </td>

                    <td class="text-center">
                        <button type="button"
                                class="btn btn-danger btn-sm removeRow">
                            Remove
                        </button>
                    </td>

                </tr>
            `;

        $('#productTable').append(row);

        // Initialize Select2 for new row
        $('#productTable tr:last .product_id').select2({
            placeholder: "Select Product",
            allowClear: true,
            width: "100%"
        });
        calculateTotal();
    });

    // ================= Remove Row =================
    $(document).on('click', '.removeRow', function () {

        if ($('#productTable tr').length > 1) {
            $(this).closest('tr').remove();
        } else {
            alert('At least one product is required.');
        }
        calculateTotal();
    });

});

// ================= Supplier =================
function loadSupplierList() {

    $.ajax({
        url: supplierUrl,
        type: "GET",
        dataType: "json",

        success: function (response) {

            let option = '<option value="">Select Supplier</option>';

            $.each(response, function (i, sup) {

                option += `
                        <option value="${sup.supplier_id}">
                            ${sup.supplier_name}
                        </option>
                    `;

            });

            $('#supplier_id').html(option);

            $('#supplier_id').select2({
                placeholder: "Select Supplier",
                allowClear: true,
                width: "100%"
            });

        },

        error: function (xhr) {
            console.log(xhr.responseText);
        }

    });

}

// ================= Product =================
function loadProductList() {

    $.ajax({

        url: productUrl,
        type: "GET",
        dataType: "json",

        success: function (response) {

            productOption = '<option value="">Select Product</option>';

            $.each(response, function (i, prod) {

                productOption += `
                        <option value="${prod.product_id}">
                            ${prod.product_name}
                        </option>
                    `;

            });

            // First Row
            $('.product_id').html(productOption);

            $('.product_id').select2({
                placeholder: "Select Product",
                allowClear: true,
                width: "100%"
            });

        },

        error: function (xhr) {
            console.log(xhr.responseText);
        }

    });

}


//-------------------------------------------------------------------- Qty অথবা Price পরিবর্তন হলে
$(document).on('input', '.qty, .price', function () {

    calculateTotalRowAmount($(this).closest('tr'));
    calculateTotal();

});

// Discount পরিবর্তন হলে
$(document).on('blur', '#discount', function () {

    let discount = parseFloat($(this).val()) || 0;

    $(this).val(discount.toFixed(2));

    calculateTotal();

});


function calculateTotalRowAmount(row) {
    let qty= row.find('.qty').val();
    let price= row.find('.price').val();

    let amount = qty * price;

    row.find('.amount').val(amount.toFixed(2));
}

function calculateTotal()
{
    let subtotal = 0;

    $('.amount').each(function () {
        subtotal += parseFloat($(this).val()) || 0;
    });

    // Subtotal Show
    $('#subtotal').val(subtotal.toFixed(2));

    // Discount %
    let discountPercent = parseFloat($('#discount').val()) || 0.00;

    // Discount Amount
    let discountAmount = (subtotal * discountPercent) / 100;

    // Grand Total
    let grandTotal = subtotal - discountAmount;

    if (grandTotal < 0) {
        grandTotal = 0;
    }

    $('#grand_total').val(grandTotal.toFixed(2));
}
