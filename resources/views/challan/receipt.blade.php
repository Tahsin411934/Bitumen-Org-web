<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Challan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto px-4 py-1 relative">
        
        <!-- Print Icon Button -->
        <div class="absolute top-4 right-4">
            <button onclick="printChallan()" class="text-gray-500 hover:text-blue-600 pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 6H6a2 2 0 00-2 2v4a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-2M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M8 6h8M16 18v2a2 2 0 01-2 2H10a2 2 0 01-2-2v-2M5 10h14M5 14h.01M19 14h.01" />
                </svg>
            </button>
        </div>

        <div class="bg-white shadow-md rounded-lg p-8">
            
            <!-- Header Section -->
            <div class="text-center mb-6">
                <h1 class="text-2xl text-blue-950 font-bold">
                    মেসার্স রহমান কর্পোরেশন<br>
                    M/S. RAHMAN CORPORATION
                </h1>
                <p class="text-sm text-gray-600">
                    Corporate Office: Chittagong Co-Operative Housing Society, House No-1, Road No-3, Nasirabad, Chittagong<br>
                    Sales Office: House # 250, Road # 01, Block & F, Bashundhara R/A, Dhaka<br>
                    +88 01711 345 395 | +88 01783 976 578 | Email: rahman.corporation15@yahoo.com<br>
                    Web: rahmancorporationbitumen.com
                </p>
            </div>

            <!-- Title Section -->
            <div class="text-center bg-blue-950 w-40 text-white rounded-md mx-auto mb-6">
                <h2 class="text-lg font-semibold py-1">Truck Challan</h2>
            </div>

            <!-- Challan Information Section -->
            <div class="mb-6 ">
                <div class="flex justify-start">
                    <label class="w-1/6 text-sm font-bold  text-gray-700">Challan No:</label>
                    <p class="text-gray-800">{{ $challanMemo->challanno ?? 'N/A' }}</p>
                </div>
                <div class="flex items-center">
                    <label class="w-1/6 text-sm font-bold  text-gray-700">Client's Name:</label>
                    <p class="text-gray-800">{{ $order->customer->customername ?? 'N/A' }}</p>
                </div>
                <div class="flex items-center">
                    <label class="w-1/6 text-sm font-bold   text-gray-700">Address:</label>
                    <p class="text-gray-800">{{ $challanMemo->address ?? 'N/A' }}</p>
                </div>
                <div class="flex items-center">
                    <label class="w-1/6 text-sm font-bold  text-gray-700">Name of Driver:</label>
                    <p class="text-gray-800">{{ $challanMemo->driver ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Goods Description Table -->
            <table class="w-full border border-gray-300 mb-6 h-[300px] overflow-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-left">Description of Goods</th>
                        <th class="border border-gray-300 p-3 text-right">Rate</th>
                        <th class="border border-gray-300 p-3 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challanMemo->deliveryDetails as $index => $detail)
                        <tr>
                            <td class="border border-gray-300 p-3 text-gray-700">
                                <strong>{{ $detail->product->itemname ?? 'N/A' }}</strong><br>
                                <div class="ml-28">
                                Gross Weight: {{ $detail->gross_weight ?? 'N/A' }}<br>
                                Empty Weight: {{ $detail->empty_weight ?? 'N/A' }}<br>
                                <hr class="my-1 w-96">
                                Net Weight: {{ ($detail->gross_weight ?? 0) - ($detail->empty_weight ?? 0) }}
                            </div>
                            </td>
                            <td class="border border-gray-300 p-3 text-right text-gray-700 align-middle"></td>
                            <td class="border border-gray-300 p-3 text-right text-gray-700 align-middle"></td>
                        </tr>
                    @endforeach
                </tbody>
                <!-- Footer Section for Total, Advance, and Balance -->
                <tfoot>
                    <tr class="bg-gray-100">
                        <td class="border border-gray-300 p-3 text-left font-bold">Total</td>
                        <td class="border border-gray-300 p-3 text-right"></td>
                        <td class="border border-gray-300 p-3 text-right"></td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="border border-gray-300 p-3 text-left font-bold">Advance</td>
                        <td class="border border-gray-300 p-3 text-right"></td>
                        <td class="border border-gray-300 p-3 text-right"></td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="border border-gray-300 p-3 text-left font-bold">Balance</td>
                        <td class="border border-gray-300 p-3 text-right"></td>
                        <td class="border border-gray-300 p-3 text-right"></td>
                    </tr>
                </tfoot>
            </table>

            <!-- Time Fields Section -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="flex items-center text-sm font-medium text-gray-700">
                        Starting Time:
                        <span class="flex-grow border-t border-gray-300 mx-2"></span>
                    </label>
                </div>
                <div>
                    <label class="flex items-center text-sm font-medium text-gray-700">
                        Finish Time:
                        <span class="flex-grow border-t border-gray-300 mx-2"></span>
                    </label>
                </div>
            </div>

            <!-- Signature Section -->
            <div class="flex justify-between mt-10">
                <div class="text-center border-t border-gray-300 pt-4">
                    <p class="text-gray-700">Client's Signature</p>
                </div>
                <div class="text-center border-t border-gray-300 pt-4">
                    <p class="text-gray-700">Driver's Signature</p>
                </div>
                <div class="text-center border-t border-gray-300 pt-4">
                    <p class="text-gray-700">Office Signature</p>
                </div>
            </div>
        </div>
    </div>  

    <!-- JavaScript to Print Only the Slip -->
    <script>
        function printChallan() {
            const challanContent = document.querySelector('.container').innerHTML;
            const printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write(`
                <html>
                <head>
                    <title>Print Challan</title>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
                </head>
                <body onload="window.print(); window.close();">
                    <div class="container mx-auto px-4 py-6">${challanContent}</div>
                </body>
                </html>
            `);
            printWindow.document.close();
        }
    </script>
</body>
</html>
