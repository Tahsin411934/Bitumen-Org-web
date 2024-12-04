<x-app-layout>
    <div class="w-[90%] mx-auto mt-12">
        <div class="text-center text-2xl pb-2 font-bold">
            <h1>Make a Challan(Direct)</h1>
        </div>
        <form action="{{ route('delivery.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 mt-5 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <div class="w-full">
                        <label for="order_no" class="block text-sm font-semibold text-gray-700">Date: </label>


                        <input id="datepicker" type="text" placeholder="Select Date" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                            name="datetime" required />


                        <script>
                        // Initialize flatpickr with dd/mm/yy format
                        flatpickr("#datepicker", {
                            dateFormat: "d/m/y", // Display format as d/m/yy (e.g., 23/12/24)
                            altInput: true, // User-friendly format
                            altFormat: "d/m/y", // Optional: shows the same user-friendly format
                            onChange: function(selectedDates, dateStr, instance) {
                                // You can use the formatted date (d/m/y) for submission directly
                                const formattedDate = dateStr; // e.g., "23/12/24"

                                // If you need to ensure the correct format before submission, you can adjust here
                                document.querySelector('input[name="datetime"]').value = formattedDate;
                            }
                        });
                        </script>

                    </div>


                </div>


                <div>
                    <label for="client_name" class="block text-sm font-medium text-gray-700 mb-1">Customer:</label>
                    <select name="customerID"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm">
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->customerID }}">{{ $customer->customerID }} -
                            {{ $customer->customername }}</option>
                        @endforeach
                    </select>

                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address:</label>
                    <input type="text" name="address"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                        placeholder="Delivery Address" required />
                </div>
            </div>

            <!-- Truck and Driver Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="w-full">
                    <label for="truck_no" class="block text-sm font-semibold text-gray-700">Truck No (Lorry No)</label>
                    <select name="Truck" id="truck_no" onchange="loadDriverInfo(this.value)" required
                        class="w-full p-3 border border-gray-300 rounded-md bg-gray-50">
                        <option value="">Select Truck</option>
                        @foreach ($trucks as $truck)
                        <option value="{{ $truck->truck_id }}">{{ $truck->truck_id }} - {{ $truck->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="stock_source" class="block text-sm font-medium text-gray-700 mb-1">Stock Source:</label>
                    <select name="stock_source"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                        required>
                        <option value="">Select Stock Source</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->supplied_id }}">{{ $supplier->supplied_id }} -
                            {{ $supplier->suppliername }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label for="driver_name" class="block text-sm font-medium text-gray-700 mb-1">Driver Name:</label>
                    <input type="text" name="driver" id="driver_name" readonly
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm bg-gray-50 text-gray-500" />
                </div>

                <div>
                    <label for="license" class="block text-sm font-medium text-gray-700 mb-1">License No/Mobile
                        No:</label>
                    <input type="text" name="License"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                        placeholder="License Number" required />
                </div>
            </div>
            <div>
                <label for="driver" class="block text-sm font-medium text-gray-700 mb-1">Lock Number (Comma
                    Separate):</label>
                <input type="text" name="Lock_number"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                    placeholder="Lock number" required />
            </div>
            <!-- Order Details -->
            <div class="my-6">
                <table class="w-full border-collapse table-auto text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="border px-3 py-2 text-gray-700">Product Description</th>
                            <th class="border px-3 py-2 text-gray-700">UOM</th>
                            <th class="border px-3 py-2 text-gray-700">Gross Weight</th>
                            <th class="border px-3 py-2 text-gray-700">Empty Weight</th>
                            <th class="border px-3 py-2 text-gray-700">Net Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-3 py-2">
                                <select name="itemcode[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm product-select"
                                    required>
                                    <option value="">Select Product</option>
                                    @foreach ($products as $index => $product)
                                    <option value="{{ $product->itemcode }}" data-uom="{{ $product->uom }}">
                                        {{ $product->itemcode }} - {{ $product->itemname }}</option>
                                    @endforeach
                                </select>
                            </td>
                            
                            <td class="border px-3 py-2">
                                <input type="text" name="uom[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                                    placeholder="UOM" readonly />
                            </td>
                            <td class="border px-3 py-2">
                                <input type="number" name="gross_weight[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                                    placeholder="Gross Weight" oninput="updateNetWeight(this)" required step="any" />
                            </td>

                            <td class="border px-3 py-2">
                                <input type="number" name="empty_weight[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                                    placeholder="Empty Weight" oninput="updateNetWeight(this)" required step="any" />
                            </td>
                            <td class="border px-3 py-2">
                                <input type="number" name="net_weight[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 focus:outline-none text-sm"
                                    readonly />
                                <p id="negativeWarning_{{ $index }}" class="text-red-500 text-sm hidden">
                                    Net weight cannot be negative. Please check your input values.
                                </p>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="w-full text-white py-3 bg-gradient-to-r from-green-500 to-teal-500 hover:bg-teal-600 font-semibold rounded-lg">
                    Make Challan
                </button>
            </div>
        </form>
    </div>

    <script>
    // Function to update the UOM field when selecting a product
    document.querySelectorAll('.product-select').forEach(select => {
        select.addEventListener('change', function() {
            const uomInput = this.closest('tr').querySelector('[name="uom[]"]');
            const selectedOption = this.options[this.selectedIndex];
            const uom = selectedOption.getAttribute('data-uom');
            uomInput.value = uom || ''; // Update the UOM input field
        });
    });

    function updateNetWeight(input) {
        // Get the closest row containing the inputs
        const row = input.closest('tr');

        // Find the required input fields in the same row
        const grossWeight = row.querySelector('[name="gross_weight[]"]');
        const emptyWeight = row.querySelector('[name="empty_weight[]"]');
        const netWeight = row.querySelector('[name="net_weight[]"]');
        const quantityInput = row.querySelector('[name="quantity[]"]');

        // Parse the gross and empty weights
        const grossValue = parseFloat(grossWeight.value) || 0;
        const emptyValue = parseFloat(emptyWeight.value) || 0;

        // Calculate the net weight
        const netValue = (grossValue - emptyValue).toFixed(3);

        // Update the net weight field
        netWeight.value = netValue > 0 ? netValue : 0;

        // Sync net weight with quantity
        quantityInput.value = netWeight.value;

        // Find the warning message
        const warningMessage = row.querySelector(`[id^="negativeWarning_"]`);

        // Show or hide the warning message
        if (grossValue - emptyValue < 0) {
            warningMessage.classList.remove('hidden'); // Show the warning if net weight is negative
        } else {
            warningMessage.classList.add('hidden'); // Hide the warning if net weight is non-negative
        }
    }

    function loadDriverInfo(truckId) {
        if (!truckId) return;

        const drivers = @json($drivers);
        const selectedDriver = drivers.find(driver => driver.truck_id == truckId);

        if (selectedDriver) {
            document.getElementById('driver_name').value = selectedDriver.name;
            document.getElementById('license_no').value = selectedDriver.license_no;
        } else {
            document.getElementById('driver_name').value = '';
            document.getElementById('license_no').value = '';
        }
    }
    </script>



</x-app-layout>