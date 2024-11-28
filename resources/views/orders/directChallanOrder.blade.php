<x-app-layout>
    <div class="w-[95%] mx-auto p-6">
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl text-center font-semibold text-gray-900 mb-6">Create Order</h2>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <!-- Customer Information -->
                <div class="flex mb-4 space-x-4">
                    <div class="flex-1">
                        <label for="customerID" class="block text-gray-700 font-semibold mb-2">Customer Name</label>
                        <input type="hidden" name="customerid" value="{{ $ledger->customer->customerID }}">
                        <input type="text" id="customerID" value="{{ $ledger->customer->customername }}" readonly
                            placeholder="{{ $ledger->customer->customername }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-blue-50 text-gray-700">
                    </div>

                    <div class="hidden">
                        <input type="number" name="trxid" value={{ $trxID }}>
                    </div>
                    <div class="flex-1">
                        <label for="deliverylocation" class="block text-gray-700 font-semibold mb-2">Delivery Location</label>
                        <input type="text" name="deliverylocation" value="{{ old('deliverylocation') }}" required
                            placeholder="Delivery Location"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <div class="flex-1">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" required placeholder="Address"
                            id="address"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="flex mb-4 space-x-4">
                    <div class="flex-1">
                        <input type="text" name="contact_person" value="{{ old('contact_person') }}" required
                            placeholder="Contact Person"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="contact_phone" value="{{ old('contact_phone') }}" required
                            placeholder="Contact Phone"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                </div>

                <!-- Order Details -->
                <h3 class="text-xl font-medium text-gray-700 mt-8 mb-4">Order Details</h3>
                <div id="order-details-container">
                    <div class="order-detail flex mb-4">
                        <input type="hidden" name="order_details[0][itemcode]" value="{{ $ledger->products->itemcode }}">
                        <input type="text" value="{{ $ledger->products->itemname }}" readonly
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-blue-50 text-gray-700">
                        <input type="number" name="order_details[0][quantity]" id="quantity-0"  placeholder="Quantity" value="{{ $ledger->quantity }}"
                            required class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="text" name="order_details[0][uom]" id="uom-0" placeholder="Unit of Measure" value="{{ $ledger->uom }}"
                            required readonly class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="number" name="order_details[0][price]" id="price-0" placeholder="Price" required
                            class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="number" name="order_details[0][amount]" id="amount-0" placeholder="Amount" required readonly
                            class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <button type="button" class="remove-detail bg-red-500 text-white p-3 rounded-lg ml-4">Remove</button>
                    </div>
                </div>

                <button type="button" id="add-detail" class="mt-4 bg-green-500 text-white p-3 rounded-lg">Add More Item</button>

                <!-- Grand Total -->
                <div class="flex justify-end mt-6">
                    <label class="font-semibold text-lg mr-4">Grand Total:</label>
                    <input type="text" id="grand-total" name="grand_total" readonly
                        class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 bg-gray-100" value="0.00">
                </div>

                <!-- Submit Button -->
                <div class="flex gap-5 mt-6">
                    <button type="submit" name="challan-order"
                        class="w-full text-white py-3 bg-gradient-to-r from-green-500 to-teal-500 hover:bg-teal-600 font-semibold rounded-lg">
                        Order Now
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const orderContainer = document.getElementById('order-details-container');
            const addDetailButton = document.getElementById('add-detail');
            const grandTotalInput = document.getElementById('grand-total');

            function updateGrandTotal() {
                let total = 0;
                document.querySelectorAll('.order-detail').forEach((detail, index) => {
                    const amountInput = detail.querySelector(`#amount-${index}`);
                    const amount = parseFloat(amountInput.value) || 0;
                    total += amount;
                });
                grandTotalInput.value = total.toFixed(2);
            }

            function updateAmount(index) {
                const detail = document.querySelector(`.order-detail:nth-child(${index + 1})`);
                const quantity = parseFloat(detail.querySelector(`#quantity-${index}`).value) || 0;
                const price = parseFloat(detail.querySelector(`#price-${index}`).value) || 0;
                const amountInput = detail.querySelector(`#amount-${index}`);
                amountInput.value = (quantity * price).toFixed(2);
                updateGrandTotal();
            }

            addDetailButton.addEventListener('click', function () {
                const newIndex = document.querySelectorAll('.order-detail').length;
                const template = `
                    <div class="order-detail flex mb-4">
                        <input type="text" name="order_details[${newIndex}][itemcode]" placeholder="Item Code" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <input type="number" name="order_details[${newIndex}][quantity]" id="quantity-${newIndex}" placeholder="Quantity" required class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="text" name="order_details[${newIndex}][uom]" id="uom-${newIndex}" placeholder="Unit of Measure" required class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="number" name="order_details[${newIndex}][price]" id="price-${newIndex}" placeholder="Price" required class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <input type="number" name="order_details[${newIndex}][amount]" id="amount-${newIndex}" placeholder="Amount" readonly class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <button type="button" class="remove-detail bg-red-500 text-white p-3 rounded-lg ml-4">Remove</button>
                    </div>`;
                orderContainer.insertAdjacentHTML('beforeend', template);
                updateGrandTotal();
            });

            orderContainer.addEventListener('input', function (e) {
                const detailIndex = Array.from(orderContainer.children).indexOf(e.target.closest('.order-detail'));
                if (e.target.matches(`#quantity-${detailIndex}`) || e.target.matches(`#price-${detailIndex}`)) {
                    updateAmount(detailIndex);
                }
            });

            orderContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-detail')) {
                    e.target.closest('.order-detail').remove();
                    updateGrandTotal();
                }
            });
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