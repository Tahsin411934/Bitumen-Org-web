<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Create Order</h2>

        <div class="p-6 bg-white rounded-lg shadow-md">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <!-- Existing Form Fields -->
                <div class="flex mb-4 space-x-4">
                    <div class="flex-1">
                        <select name="customerid" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            <option value="">Select Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->customerID }}" {{ old('customerID') == $customer->customerID ? 'selected' : '' }}>
                                    {{ $customer->customername }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="deliverylocation" value="{{ old('deliverylocation') }}" required placeholder="Delivery Location"
                               class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="address" value="{{ old('address') }}" required placeholder="Address"
                               class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                </div>
                
                <div class="flex mb-4 space-x-4">
                    <div class="flex-1">
                        <input type="text" name="contact_person" value="{{ old('contact_person') }}" required placeholder="Contact Person"
                               class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="contact_phone" value="{{ old('contact_phone') }}" required placeholder="Contact Phone"
                               class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                </div>
                
                

                <h3 class="text-xl font-medium text-gray-700 mt-8 mb-4">Order Details</h3>
                <div id="order-details-container">
                    <div class="order-detail flex mb-4">
                        <select name="order_details[0][itemcode]" id="itemcode-0" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            <option value="">Select Item</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->itemcode }}" data-uom="{{ $product->uom }}">
                                    {{ $product->itemcode }} - {{ $product->itemname }}
                                </option>
                            @endforeach
                        </select>
                        <input type="number" name="order_details[0][quantity]" id="quantity-0" placeholder="Quantity" required
                               class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="text" name="order_details[0][uom]" id="uom-0" placeholder="Unit of Measure" required readonly
                               class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="number" name="order_details[0][price]" id="price-0" placeholder="Price" required
                               class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="number" name="order_details[0][amount]" id="amount-0" placeholder="Amount" required readonly
                               class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <button type="button" class="remove-detail bg-red-500 text-white p-3 rounded-lg ml-4">Remove</button>
                    </div>
                </div>

                <button type="button" id="add-detail" class="mt-4 bg-green-500 text-white p-3 rounded-lg">Add More Item</button>

                <!-- Grand Total Display -->
                <div class="flex justify-end mt-6">
                    <label class="font-semibold text-lg mr-4">Grand Total:</label>
                    <input type="text" id="grand-total" name="grand_total" readonly
                           class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 bg-gray-100"
                           value="0.00">
                </div>

                <div class="flex gap-5 mt-6">
                    <button type="submit" name="save_and_print" class="w-full text-white py-3 bg-gradient-to-r from-green-500 to-teal-500 hover:bg-teal-600 font-semibold rounded-lg">
                        Save and Print Invoice
                    </button>
                    <button type="submit" name="save_and_challan" class="w-full text-white py-3 bg-gradient-to-r from-green-500 to-teal-500 hover:bg-teal-600 font-semibold rounded-lg">
                        Save and Create Challan
                    </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let orderDetailsCount = 1;

            function updateUOMAndAmount(selectElement, uomFieldId, amountFieldId, quantityFieldId, priceFieldId) {
                const uomField = document.getElementById(uomFieldId);
                const amountField = document.getElementById(amountFieldId);
                const quantityField = document.getElementById(quantityFieldId);
                const priceField = document.getElementById(priceFieldId);

                selectElement.addEventListener('change', function () {
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    uomField.value = selectedOption.dataset.uom || ''; // Auto-fill UOM
                    recalculateAmount();
                });

                function recalculateAmount() {
                    const quantity = parseFloat(quantityField.value) || 0;
                    const price = parseFloat(priceField.value) || 0;
                    amountField.value = (quantity * price).toFixed(2);
                    updateGrandTotal();
                }

                quantityField.addEventListener('input', recalculateAmount);
                priceField.addEventListener('input', recalculateAmount);
            }

            function updateGrandTotal() {
                const amountFields = document.querySelectorAll('[id^="amount-"]');
                let grandTotal = 0;

                amountFields.forEach(amountField => {
                    grandTotal += parseFloat(amountField.value) || 0;
                });

                document.getElementById('grand-total').value = grandTotal.toFixed(2);
            }

            document.getElementById('add-detail').addEventListener('click', function () {
                const orderDetailsContainer = document.getElementById('order-details-container');
                const newDetail = document.createElement('div');
                newDetail.classList.add('order-detail', 'flex', 'mb-4');
                newDetail.innerHTML = `
                    <select name="order_details[${orderDetailsCount}][itemcode]" id="itemcode-${orderDetailsCount}" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <option value="">Select Item</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->itemcode }}" data-uom="{{ $product->uom }}">
                                {{ $product->itemcode }} - {{ $product->itemname }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="order_details[${orderDetailsCount}][quantity]" id="quantity-${orderDetailsCount}" placeholder="Quantity" required
                           class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <input type="text" name="order_details[${orderDetailsCount}][uom]" id="uom-${orderDetailsCount}" placeholder="Unit of Measure" required readonly
                           class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <input type="number" name="order_details[${orderDetailsCount}][price]" id="price-${orderDetailsCount}" placeholder="Price" required
                           class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <input type="number" name="order_details[${orderDetailsCount}][amount]" id="amount-${orderDetailsCount}" placeholder="Amount" required readonly
                           class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <button type="button" class="remove-detail bg-red-500 text-white p-3 rounded-lg ml-4">Remove</button>
                `;
                orderDetailsContainer.appendChild(newDetail);

                const newSelect = newDetail.querySelector(`#itemcode-${orderDetailsCount}`);
                updateUOMAndAmount(newSelect, `uom-${orderDetailsCount}`, `amount-${orderDetailsCount}`, `quantity-${orderDetailsCount}`, `price-${orderDetailsCount}`);

                newDetail.querySelector('.remove-detail').addEventListener('click', function () {
                    newDetail.remove();
                    updateGrandTotal();
                });

                orderDetailsCount++;
            });

            const firstSelect = document.getElementById('itemcode-0');
            updateUOMAndAmount(firstSelect, 'uom-0', 'amount-0', 'quantity-0', 'price-0');
        });
    </script>
</x-app-layout>
<script>
    @if (session('success'))
      Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
      })
    @endif
  </script>