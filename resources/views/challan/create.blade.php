<x-app-layout>
    <div class="w-[90%] mx-auto mt-12">
        <div class="text-center text-2xl pb-2 font-bold">
            <h1>Make a Challan</h1>
        </div>
        <form action="{{ route('delivery.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="order_no" class="block text-sm font-medium text-gray-700 mb-1">Date:</label>
                    <input type="date" name="datetime"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                        placeholder="Select Date" required />
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
                <div>
                    <label for="Truck" class="block text-sm font-medium text-gray-700 mb-1">Truck/Lorry No:</label>
                    <input type="text" name="Truck"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                        placeholder="Truck No" required />
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
                <div>
                    <label for="driver" class="block text-sm font-medium text-gray-700 mb-1">Driver Name:</label>
                    <input type="text" name="driver"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                        placeholder="Driver Name" required />
                </div>
                <div>
                    <label for="license" class="block text-sm font-medium text-gray-700 mb-1">License No:</label>
                    <input type="text" name="License"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                        placeholder="License Number" required />
                </div>
            </div>

            <!-- Order Details -->
            <div class="my-6">
                <table class="w-full border-collapse table-auto text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="border px-3 py-2 text-gray-700">Product Description</th>
                            <th class="border px-3 py-2 text-gray-700">Quantity</th>
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
                                    @foreach ($products as $product)
                                    <option value="{{ $product->itemcode }}" data-uom="{{ $product->uom }}">
                                        {{ $product->itemcode }} - {{ $product->itemname }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="border px-3 py-2">
                                <input type="number" name="quantity[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                                    placeholder="Quantity" required />
                            </td>
                            <td class="border px-3 py-2">
                                <input type="text" name="uom[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                                    placeholder="UOM" readonly />
                            </td>
                            <td class="border px-3 py-2">
                                <input type="number" name="gross_weight[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                                    placeholder="Gross Weight" oninput="updateNetWeight(this)" required />
                            </td>
                            <td class="border px-3 py-2">
                                <input type="number" name="empty_weight[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                                    placeholder="Empty Weight" oninput="updateNetWeight(this)" required />
                            </td>
                            <td class="border px-3 py-2">
                                <input type="number" name="net_weight[]"
                                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 focus:outline-none text-sm"
                                    readonly />
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

    // Function to calculate Net Weight
    function updateNetWeight(input) {
        const row = input.closest('tr');
        const grossWeight = row.querySelector('[name="gross_weight[]"]');
        const emptyWeight = row.querySelector('[name="empty_weight[]"]');
        const netWeight = row.querySelector('[name="net_weight[]"]');

        const grossValue = parseFloat(grossWeight.value) || 0;
        const emptyValue = parseFloat(emptyWeight.value) || 0;

        const netValue = grossValue - emptyValue;
        netWeight.value = netValue > 0 ? netValue : 0;
    }
    </script>
</x-app-layout>