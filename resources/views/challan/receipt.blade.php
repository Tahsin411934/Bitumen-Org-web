<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Challan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @media print {
            /* Ensure body font stays consistent and content takes up full page width */
            body {
                font-family: 'Arial', sans-serif;
            }

            .container {
                width: 100% !important;
                padding: 0 !important;
            }

            .bg-white,
            .bg-blue-900,
            .text-gray-700,
            .text-blue-950 {
                color: inherit !important;
            }

            h1, h2, p {
                margin: 0;
                font-size: 14px !important;
            }

            .p-8, .px-4, .py-1 {
                padding: 10px !important;
            }

            .w-[80%], .w-[70%] {
                width: 100% !important;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            table th, table td {
                border: 1px solid #ccc;
                padding: 5px;
                text-align: left;
                font-size: 12px;
            }

            .border-t {
                border-top: 1px solid #ccc;
            }

            .text-center {
                text-align: center !important;
            }

            .no-print {
                display: none;
            }

            /* Ensure QR Code size is adjusted */
            img {
                width: 100px;
                height: 100px;
            }

            /* Page Break between Office Copy and Customer Copy */
            .page-break {
                page-break-before: always;
            }
        }
    </style>
</head>

<body>
    <div class="container w-[100%] mx-auto px-4 py-1 relative">

        <!-- Print Icon Button -->
        <div class="no-print">
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Print Challan</button>
        </div>

        <!-- Office Copy -->
        <div class="bg-white rounded-lg p-8">
            <div class="text-center">
                <h1 class="text-2xl text-blue-950 font-bold">
                    মেসার্স রহমান কর্পোরেশন<br>
                    M/S. RAHMAN CORPORATION
                </h1>
                <p class="text-sm text-gray-600">
                    Corporate Office: Chittagong Co-Operative Housing Society, House No-1, Road No-3, Nasirabad, Chittagong<br>
                    Sales Office: House # 250, Road # 01, Block & F, Bashundhara R/A, Dhaka<br>
                    +88 01711 345 395 | +88 01783 976 578 | Email: rahman.corporation15@yahoo.com<br>
                    <i class="fas fa-globe"></i> rahmancorporationbitumenbd.com
                </p>
            </div>

            <div class="text-center">
                <div class="bg-blue-900 w-40 text-white rounded-md mx-auto mb-6 mt-2">
                    <h2 class="text-lg font-semibold py-1">Truck Challan</h2>
                </div>
                <span>Office Copy</span>
            </div>

            <!-- Challan Information Section -->
            <div class="flex justify-between mb-6">
                <div class="space-y-4">
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">SI No:</label>
                        <p class="text-gray-800">{{ $challanMemo->challanno ?? 'N/A' }}</p>
                    </div>
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">Client's Name:</label>
                        <p class="text-gray-800">{{ $order->customer->customername ?? 'N/A' }}</p>
                    </div>
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">Address:</label>
                        <p class="text-gray-800">{{ $challanMemo->address ?? 'N/A' }}</p>
                    </div>
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">Name of Driver:</label>
                        <p class="text-gray-800">{{ $challanMemo->driver ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- QR Code Section -->
                <div class="flex items-center justify-center">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=YourChallanInfoHere&size=150x150" alt="QR Code">
                </div>
            </div>

            <!-- Goods Description Table -->
            <table class="w-full border border-gray-300 mb-6 h-[300px] overflow-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-left">Description of Goods</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challanMemo->deliveryDetails as $index => $detail)
                        <tr>
                            <td class="border border-gray-300 p-3 text-gray-700">
                                <strong>{{ $detail->inventory->product->itemname ?? 'N/A' }}</strong><br>
                                <div class="ml-28">
                                    Gross Weight: {{ $detail->gross_weight ?? 'N/A' }}<br>
                                    Empty Weight: {{ $detail->empty_weight ?? 'N/A' }}<br>
                                    <hr class="my-1 w-96">
                                    Net Weight: {{ ($detail->gross_weight ?? 0) - ($detail->empty_weight ?? 0) }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="grid grid-cols-2 mt-10 gap-6 mb-6">
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

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Customer Copy -->
        <div class="bg-white rounded-lg p-8">
            <div class="text-center">
                <h1 class="text-2xl text-blue-950 font-bold">
                    মেসার্স রহমান কর্পোরেশন<br>
                    M/S. RAHMAN CORPORATION
                </h1>
                <p class="text-sm text-gray-600">
                    Corporate Office: Chittagong Co-Operative Housing Society, House No-1, Road No-3, Nasirabad, Chittagong<br>
                    Sales Office: House # 250, Road # 01, Block & F, Bashundhara R/A, Dhaka<br>
                    +88 01711 345 395 | +88 01783 976 578 | Email: rahman.corporation15@yahoo.com<br>
                    <i class="fas fa-globe"></i> rahmancorporationbitumenbd.com
                </p>
            </div>

            <div class="text-center">
                <div class="bg-blue-900 w-40 text-white rounded-md mx-auto mb-6 mt-2">
                    <h2 class="text-lg font-semibold py-1">Truck Challan</h2>
                </div>
                <span>Customer Copy</span>
            </div>

            <!-- Challan Information Section -->
            <div class="flex justify-between mb-6">
                <div class="space-y-4">
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">SI No:</label>
                        <p class="text-gray-800">{{ $challanMemo->challanno ?? 'N/A' }}</p>
                    </div>
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">Client's Name:</label>
                        <p class="text-gray-800">{{ $order->customer->customername ?? 'N/A' }}</p>
                    </div>
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">Address:</label>
                        <p class="text-gray-800">{{ $challanMemo->address ?? 'N/A' }}</p>
                    </div>
                    <div class="flex gap-5">
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">Name of Driver:</label>
                        <p class="text-gray-800">{{ $challanMemo->driver ?? 'N/A' }}</p>
                    </div>
                    <div class="flex">
                        <label class="w-32 font-semibold text-gray-700">License No:</label>
                        <p class="text-gray-800">{{ $challanMemo->license ?? 'N/A' }}</p>
                    </div>
                </div>
                </div>

                <!-- QR Code Section -->
                <div class="flex items-center justify-center">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=YourChallanInfoHere&size=150x150" alt="QR Code">
                </div>
            </div>

            <!-- Goods Description Table -->
            <table class="w-full border border-gray-300 mb-6 h-[300px] overflow-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 p-3 text-left">Description of Goods</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challanMemo->deliveryDetails as $index => $detail)
                        <tr>
                            <td class="border border-gray-300 p-3 text-gray-700">
                                <strong>{{ $detail->inventory->product->itemname ?? 'N/A' }}</strong><br>
                                <div class="ml-28">
                                    Gross Weight: {{ $detail->gross_weight ?? 'N/A' }}<br>
                                    Empty Weight: {{ $detail->empty_weight ?? 'N/A' }}<br>
                                    <hr class="my-1 w-96">
                                    Net Weight: {{ ($detail->gross_weight ?? 0) - ($detail->empty_weight ?? 0) }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="grid grid-cols-2 mt-10 gap-6 mb-6">
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
</body>
</html>
