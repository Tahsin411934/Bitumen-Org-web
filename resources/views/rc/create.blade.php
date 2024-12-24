<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Create RC Record</h1>

        <form action="{{ route('rc.store') }}" method="POST" id="rcForm">
            @csrf

            <!-- Row 1: Weight Type, Challan No, Material Description -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="WeightType" class="block text-sm font-medium text-gray-700">Weight Type</label>
                    <input type="text" name="WeightType" id="WeightType"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="Challan_no" class="block text-sm font-medium text-gray-700">Challan No</label>
                    <input type="text" name="Challan_no" id="Challan_no"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="MaterialDescription" class="block text-sm font-medium text-gray-700">Material
                        Description</label>
                    <textarea name="MaterialDescription" id="MaterialDescription" rows="1"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>

            <!-- Row 2: Seller Name, Seller Address, Quantity -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="SellerName" class="block text-sm font-medium text-gray-700">Seller Name</label>
                    <input type="text" name="SellerName" id="SellerName"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="SellerAddress" class="block text-sm font-medium text-gray-700">Seller Address</label>
                    <textarea name="SellerAddress" id="SellerAddress" rows="1"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div>
                    <label for="Quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="Quantity" id="Quantity" step="0.01"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
            </div>

            <!-- Row 3: Buyer Name, Buyer Address, Operator Name -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="BuyerName" class="block text-sm font-medium text-gray-700">Buyer Name</label>
                    <input type="text" name="BuyerName" id="BuyerName"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="BuyerAddress" class="block text-sm font-medium text-gray-700">Buyer Address</label>
                    <textarea name="BuyerAddress" id="BuyerAddress" rows="1"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div>
                    <label for="OperatorName" class="block text-sm font-medium text-gray-700">Operator Name</label>
                    <input type="text" name="OperatorName" id="OperatorName"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
            </div>

            <!-- Row 4: Driver Name, Truck Name, Gross Weight -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="DriverName" class="block text-sm font-medium text-gray-700">Driver Name</label>
                    <input type="text" name="DriverName" id="DriverName"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="TruckName" class="block text-sm font-medium text-gray-700">Truck Name</label>
                    <input type="text" name="TruckName" id="TruckName"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>


            </div>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="GrossWeight" class="block text-sm font-medium text-gray-700">Gross Weight</label>
                    <input type="number" name="GrossWeight" id="GrossWeight" step="0.01"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <!-- Gross Weight Date -->
                <div class="mb-4">
                    <label for="GrossWeightDate" class="block text-sm font-medium text-gray-700">Gross Weight
                        Date</label>
                    <input type="date" name="GrossWeightDate" id="GrossWeightDate"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Gross Weight Time -->
                <div class="mb-4">
                    <label for="GrossWeightTime" class="block text-sm font-medium text-gray-700">Gross Weight
                        Time</label>
                    <input type="time" name="GrossWeightTime" id="GrossWeightTime" step="2"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Row 5: Tare Weight, Net Weight, Submit -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="TareWeight" class="block text-sm font-medium text-gray-700">Tare Weight</label>
                    <input type="number" name="TareWeight" id="TareWeight" step="0.01"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <!-- Tare Weight Date -->
                <div class="mb-4">
                    <label for="TareWeightDate" class="block text-sm font-medium text-gray-700">Tare Weight Date</label>
                    <input type="date" name="TareWeightDate" id="TareWeightDate"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Tare Weight Time -->
                <div class="mb-4">
                    <label for="TareWeightTime" class="block text-sm font-medium text-gray-700">Tare Weight Time</label>
                    <input type="time" name="TareWeightTime" id="TareWeightTime" step="1"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>



            </div>
            <div>
                <label for="NetWeight" class="block text-sm font-medium text-gray-700">Net Weight</label>
                <input type="number" name="NetWeight" id="NetWeight" step="0.01"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div class="flex items-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-full">Submit</button>
            </div>
        </form>
    </div>
    <script>
    const tareWeightInput = document.getElementById('TareWeightTime');

    tareWeightInput.addEventListener('change', function() {
        const time = tareWeightInput.value; // Expected format: HH:MM:SS
        console.log(`Selected Time: ${time}`); // Ensure it logs HH:MM:SS
    });
    </script>

    <script>
    document.getElementById('GrossWeight').addEventListener('input', calculateNetWeight);
    document.getElementById('TareWeight').addEventListener('input', calculateNetWeight);

    function calculateNetWeight() {
        const grossWeight = parseFloat(document.getElementById('GrossWeight').value) || 0;
        const tareWeight = parseFloat(document.getElementById('TareWeight').value) || 0;
        const netWeight = grossWeight - tareWeight;
        document.getElementById('NetWeight').value = netWeight.toFixed(2);
    }
    </script>
</x-app-layout>