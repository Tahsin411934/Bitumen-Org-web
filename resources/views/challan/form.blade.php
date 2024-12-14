<x-app-layout>
    <div class="w-[90%] mx-auto mt-1 py-8 px-6 bg-white shadow-lg rounded-lg">
        {{-- @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif --}}




    <div class="text-center text-2xl font-bold">
        <h1>Make a Challan</h1>
    </div>
    <hr class="m-5">
    <form action="{{ route('delivery.store') }}" method="POST">
        @csrf

        <!-- Sales Order Information -->
        <div class="flex justify-center items-center gap-5">
            <div class="flex justify-center items-center gap-5">
                <label for="order_no" class="block text-sm font-semibold text-gray-700">Date: </label>

                <input id="datepicker" type="text" placeholder="Select Date"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                    name="datetime" required />
            </div>

            <div class="hidden justify-center items-center gap-5">
                <input type="text" name="orderno" value="{{ $salesOrder->order_no }}" readonly />
            </div>

            <div class="flex justify-center items-center gap-5">
                <label for="client_name" class="block text-sm font-semibold text-gray-700">Customer:</label>
                <input type="text" name="client_name" value="{{ $salesOrder->customer->customername }}" readonly
                    class="w-full p-3 border-none border-gray-300 rounded-md bg-gray-50 text-gray-500" />
            </div>

            <div class="flex justify-center items-center gap-5">
                <label for="address" class="block text-sm font-semibold text-gray-700">Address: </label>
                <input type="text" name="address" value="{{ $salesOrder->deliverylocation }}" readonly
                    class="w-full p-3 border-none border-gray-300 rounded-md bg-gray-50 text-gray-500" />
            </div>
        </div>

        <!-- Truck and Driver Information -->
        <div class="space-y-6">
            <div class="flex   gap-5">
                <div class="w-full">
                    <label for="truck_no" class="block text-sm font-semibold text-gray-700">Truck No (Lorry No)</label>
                    <select name="Truck" id="truck_no" onchange="loadDriverInfo(this.value)" required
                        class="w-full p-3 border border-gray-300 rounded-md bg-gray-50">
                        <option value="">Select Truck</option>
                        @foreach ($trucks as $truck)
                        <option value="{{ $truck->truck_id }}">{{ $truck->reg_no }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="truck_no" class="block text-sm font-semibold text-gray-700">Stock Source</label>
                    <select name="stock_source" id="truck_no" onchange="loadDriverInfo(this.value)" required
                        class="w-full p-3 border border-gray-300 rounded-md bg-gray-50">
                        <option value="">Select Stock Source</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->supplied_id }}">{{ $supplier->supplied_id }} -
                            {{ $supplier->suppliername }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="driver" class="block text-sm font-medium text-gray-700 mb-1">Lock Number (Comma
                    Separate):</label>
                <input type="text" name="Lock_number"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 text-sm"
                    placeholder="Lock number" required />
            </div>
            <div class="flex justify-start items-center gap-16">
                <div class="flex justify-center items-center gap-5">
                    <label for="driver_name" class="w-full block text-sm font-semibold text-gray-700">Driver
                        Name:</label>
                    <input type="text" name="driver" id="driver_name" readonly
                        class=" p-3 border-none border-gray-300 rounded-md bg-gray-50 text-gray-500" />
                </div>

                <div class="flex justify-center items-center gap-5">
                    <label for="license_no" class="block w-full text-sm font-semibold text-gray-700">License No:
                    </label>
                    <input type="text" name="License" id="license_no" readonly
                        class="-3 border-none border-gray-300 rounded-md bg-gray-50 text-gray-500" />
                </div>

            </div>

        </div>

        <!-- Order Details -->
        <div>
            <table class="w-full table-auto border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-700">Sl#</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-700">Product Description</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-700">Gross Weight</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-700">Empty Weight</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-700">Net Weight</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesOrder->orderDetails as $index => $detail)
                    <tr>
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>






                        <td class="px-4 py-2 border">

                            <input class="hidden" type="number" name="itemcode[]" id="itemcode"
                                value="{{ $detail->product->itemcode ?? 'N/A' }}" class="px-2 py-1 border rounded">
                            {{ $detail->product->itemname ?? 'N/A' }} - Quantity: {{ $detail->quantity }} - Price:
                            {{ number_format($detail->price, 2) }} tk
                        </td>




                        <td class="px-4 py-2 border">
                            <input type="number" name="gross_weight[]" oninput="calculateNetWeight({{ $index }})"
                                required step="any" class="w-full p-2 border border-gray-300 rounded-md" />
                        </td>
                        <td class="px-4 py-2 border">
                            <input type="number" name="empty_weight[]" oninput="calculateNetWeight({{ $index }})"
                                step="any" class="w-full p-2 border border-gray-300 rounded-md" />
                        </td>
                        <td class="px-4 py-2 border">
                            <input type="number" name="net_weight[]" readonly required step="any"
                                class="w-full p-2 border border-gray-300 rounded-md bg-gray-50 text-gray-500" />
                            <p id="negativeWarning_{{ $index }}" class="text-red-500 text-sm hidden">Net weight cannot
                                be negative. Please check your input values.</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="w-full px-6 py-3 bg-gradient-to-r from-green-500 to-teal-500 text-white rounded-lg font-semibold shadow-lg hover:from-blue-600 hover:to-teal-600">
                Save and Print Challan
            </button>
        </div>
    </form>
    </div>

    <script>
    function calculateNetWeight(index) {
        const grossWeight = parseFloat(document.getElementsByName('gross_weight[]')[index].value) || 0;
        const emptyWeight = parseFloat(document.getElementsByName('empty_weight[]')[index].value) || 0;
        const netWeight = (grossWeight - emptyWeight).toFixed(3);

        // Display result in the net weight field
        document.getElementsByName('net_weight[]')[index].value = netWeight;

        // Check if net weight is negative
        const warningMessage = document.getElementById(`negativeWarning_${index}`);
        if (netWeight < 0) {
            warningMessage.classList.remove('hidden'); // Show the warning message
        } else {
            warningMessage.classList.add('hidden'); // Hide the warning message if net weight is positive
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
<script>
@if(session('error'))
Swal.fire({
    title: 'Error!',
    text: 'Quantity Not Available Stock',
    icon: 'error',
    confirmButtonText: 'OK'
})
@endif
</script>

<script>
// Initialize flatpickr with dd/mm/yy format
flatpickr("#datepicker", {
    dateFormat: "d/m/y", // Set the format to dd/mm/yy (2-digit year)
    altInput: true, // Show a user-friendly format
    altFormat: "d/m/y" // Optional: user-friendly alternative format for display
});
</script>