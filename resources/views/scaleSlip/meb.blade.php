<x-app-layout>

<div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-8">MEB Industrial Complex Ltd</h1>

        <form action="{{ route('meb.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Row 1 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <input type="text" name="no" placeholder="No" class="border border-gray-300 rounded-lg p-2 w-full">
                <input type="datetime-local" name="date" placeholder="Date & Time" class="border border-gray-300 rounded-lg p-2 w-full">
                <input type="text" name="customer_name" placeholder="Customer Name" class="border border-gray-300 rounded-lg p-2 w-full">
            </div>

            <!-- Row 2 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <input type="text" name="goods" placeholder="Goods" class="border border-gray-300 rounded-lg p-2 w-full">
                <div class="flex gap-2 items-center">
                    <input type="time" name="gross_weight_time" placeholder="Time" class="border border-gray-300 rounded-lg p-2 w-full">
                    <input type="number" step="0.001" name="gross_weight_amount" placeholder="Amount" class="border border-gray-300 rounded-lg p-2 w-full">
                    <input type="text" name="gross_weight_uom" placeholder="UOM" class="border border-gray-300 rounded-lg p-2 w-full">
                </div>
                <div class="flex gap-2 items-center">
                    <input type="time" name="tare_weight_time" placeholder="Time" class="border border-gray-300 rounded-lg p-2 w-full">
                    <input type="number" step="0.001" name="tare_weight_amount" placeholder="Amount" class="border border-gray-300 rounded-lg p-2 w-full">
                    <input type="text" name="tare_weight_uom" placeholder="UOM" class="border border-gray-300 rounded-lg p-2 w-full">
                </div>
            </div>

            <!-- Row 3 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <input type="number" step="0.001" name="net_weight" placeholder="Net Weight (Auto-Calculated)" class="border border-gray-300 rounded-lg p-2 w-full" readonly>
                <input type="text" name="price" placeholder="Price (Optional)" class="border border-gray-300 rounded-lg p-2 w-full">
                <input type="text" name="total_price" placeholder="Total Price (Optional)" class="border border-gray-300 rounded-lg p-2 w-full">
            </div>

            <!-- Row 4 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <input type="text" name="company" placeholder="Company" class="border border-gray-300 rounded-lg p-2 w-full">
                <input type="text" name="address" placeholder="Address" class="border border-gray-300 rounded-lg p-2 w-full">
                <input type="text" name="holder" placeholder="Holder" class="border border-gray-300 rounded-lg p-2 w-full">
            </div>

            <!-- Row 5 -->
             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div >
                <input type="number" name="phone" placeholder="Phone Number" class="border border-gray-300 rounded-lg p-2 w-full">
            </div>
            <div >
                <input type="text" name="do_no" placeholder="DO No" class="border border-gray-300 rounded-lg p-2 w-full">
            </div>
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Submit</button>
            </div>
        </form>
        
    </div>

    <script>
        // JavaScript to calculate Net Weight dynamically
        document.addEventListener('input', () => {
            const grossAmount = parseFloat(document.querySelector('input[name="gross_weight_amount"]').value) || 0;
            const tareAmount = parseFloat(document.querySelector('input[name="tare_weight_amount"]').value) || 0;
            const netWeightField = document.querySelector('input[name="net_weight"]');

            netWeightField.value = (grossAmount - tareAmount).toFixed(3);
        });
    </script>
</x-app-layout>