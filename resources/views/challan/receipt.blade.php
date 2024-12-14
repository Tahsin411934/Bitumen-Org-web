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

        /* Adjust background and text colors for printing */
        .bg-white,
        .bg-blue-900,
        .text-gray-700,
        .text-blue-950 {
            color: inherit !important;
        }

       

        .p-8,
        .px-4,
        .py-1 {
            padding: 10px !important;
        }

        .w-[80%],
        .w-[70%] {
            width: 100% !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
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
            display: none !important;
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

        #heading {
            font-size: 28px !important;
            color: #1E3A8A !important;
        }

        #subheading {
            font-size: 10px !important;
            color: #090d16 !important;
        }

        #TrackChallan {
            background-color: #1e3a8a !important;
            color: white !important;

            text-align: center !important;
            /* padding: 1rem !important; */
        }

        #TrackChallan h2 {
            font-size: 16px !important;
            font-weight: 600 !important;
            padding-top: 0.5rem !important;
        }

        /* Ensures overall alignment and readability when printing */
        .flex {
            display: flex !important;
            justify-content: space-between !important;
        }

        .space-y-4 {
            margin-bottom: 10px !important;
        }

        .text-sm {
            font-size: 12px !important;
        }

        /* Override specific font and padding rules in print mode */
        .text-lg,
        .font-semibold {
            font-size: 16px !important;
            font-weight: 600 !important;
        }

        /* Watermark style */

    }




    .watermark {
        background-image: url('./logo2.jpeg');
        background-size: contain;
        /* Adjust the size of the image */
        background-repeat: no-repeat;
        /* Prevent the image from repeating */
        background-position: center;
        /* Center the image */
        width: 200%;
        /* Set the width of the div */
        height: 100vh;
        /* Set the height of the div (adjust as needed) */
    }

    /* Normal styles */
    .watermark {

        background-size: cover;
        background-position: center;
        position: relative;
    }

    .watermark th,
    .watermark td {
        position: relative;
        z-index: 2;
    }

    .watermark td {
        background-color: rgba(255, 255, 255, 0.7);
    }

    /* Print styles */
    @media print {

        /* Ensure background images are printed */
        body {
            -webkit-print-color-adjust: exact;
            /* For Webkit browsers (Chrome, Safari) */
            print-color-adjust: exact;
            /* For other browsers */
        }
.print-space {
        margin-left: 8px; /* Adjust the value as needed */
    }
        .watermark {
            background-image: url('./logo2.jpeg');
            background-size: 38%;
            /* The image will cover 50% of the container */
            /* Prevent the image from repeating */
            background-position: center;
            /* Center the image */
            position: relative;
            height: 200px;
        }


        .watermark th,
        .watermark td {
            position: relative;
            z-index: 2;
            color: black;
            /* Ensure text color is visible during printing */
        }

        .watermark td {
            background-color: rgba(255, 255, 255, 0.7);
        }
    }
    </style>

</head>

<body>
    <div class="container w-[60%]  mx-auto px-4 py-1 relative ">


        <!-- Print Icon Button -->
        <div class="flex items-center gap-5">
            <div class="no-print">
                <button onclick="window.print()" class="bg-blue-900 text-white px-4 py-2 rounded-md">Print
                    Challan</button>
            </div>
            <div class="no-print">
                <a href="/bitumin/dashboard" class="bg-blue-900 text-white px-4 py-2 rounded-md">Go Back
                    To Home</a>
            </div>
        </div>
        <!-- Office Copy -->
        <div class="bg-white rounded-lg p-8">

            <div class="flex text-center mt-2 justify-between items-center">
                <img src="./logo3.png" alt="Logo" class="w-16 h-16">

                <h1 id="heading" class="text-5xl text-blue-950 font-bold">
                    মেসার্স রহমান কর্পোরেশন<br>
                    M/S. RAHMAN CORPORATION
                </h1>
                <img src="./qr.png" alt="QR Code" class="w-16 h-16">
            </div>

            <div class="text-center">
                <p id="subheading" class="text-[14px] text-gray-600">
                    Corporate Office: 2 No Gate, S A Paribahan Tower, Fifth Floor, Nasirabad, Chittagong<br>
                    Sales Office: House #250, Road #01, Block & F, Bashundhara R/A, Dhaka<br>
                    +88 01711 345 395 | +88 01783 976 578 | Email: rahman.corporation15@yahoo.com<br>
                    <i class="fas fa-globe"></i> rahmancorporationbd.com
                </p>
                <div class="flex justify-between">
                    <span class="float-right font-bold">Date:
                        {{ \Carbon\Carbon::parse($challanMemo->datetime)->format('d/m/y') }} </span>



                    <span class="float-right text-sm  font-bold">Receive Copy</span>
                </div>
            </div>
        </div>

        <div class="text-center">
            <div id="TrackChallan" class="bg-blue-900 w-32 text-white rounded-md mx-auto mb-2 ">
                <h2 class="text-lg font-semibold py-1">Truck Challan</h2>
            </div>


        </div>


        <div class="flex">
            <p class="font-semibold mb-2 text-gray-700">SI No : <span
                    class="font-bold text-xl">{{ $challanMemo->challanno ?? 'N/A' }}</span> </p>

        </div>


<div class="grid grid-cols-2 gap-x-8 gap-y-4 mb-3">
    <!-- Client Name Row -->
<div class="col-span-2 flex items-center justify-start text-[15px] print:space-x-2">
    <p class="font-semibold text-gray-700">Client's Name:       <span class="ml-7 font-normal">     {{ $order->customer->customername ?? $Ledger->customer->customername ?? 'N/A' }} </span></p>
    
</div>



    <!-- Row 1 -->
    <div class="flex items-center justify-start space-x-4">
        <div class="flex items-center">
  <p class="font-semibold text-gray-700">Address:</p>
  <span class="font-normal ml-16"> {{ $challanMemo->address ?? 'N/A' }} </span>
</div>

    </div>
    <div class="flex items-center space-x-4">
        <p class="font-semibold text-gray-700">Name of Driver:      <span class="ml-3 font-normal">    {{ $challanMemo->driver ?? 'N/A' }} </span></p>
    </div>

    <!-- Row 2 -->
    <div class="flex items-center space-x-4">
        <p class="font-semibold text-gray-700">License/Mobile:       <span class="ml-3 font-normal">    {{ $challanMemo->license ?? 'N/A' }} </span></p>
    </div>
    <div class="flex items-center space-x-4">
      <p class="font-semibold text-gray-700">Lorry No:       <span class="ml-14 font-normal">    {{ $challanMemo->truck->reg_no ?? 'N/A' }} </span></p>
    </div>
</div>




        <!-- Goods Description Table -->
        <table class="w-full border border-gray-300 mb-4 h-[300px] overflow-auto watermark">
            <thead>
                <!-- Table Header -->
                <tr class="bg-white text-xl text-center">
                    <th class="border border-gray-300 text-xl p-3">Description of Goods</th>
                    <th class="border border-gray-300 text-xl p-3">Rate</th>
                    <th class="border border-gray-300 text-xl p-3">Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table Body -->
                @foreach ($challanMemo->deliveryDetails as $index => $detail)
                <tr>
                    <!-- Description of Goods -->
                    <td class="border border-gray-300 p-3 text-gray-700">
                        <h1 class="text-lg font-semibold pb-2">Weight:</h1>
                       <div class="ml-8 text-base font-normal">
    <div class="mb-2 flex gap-5">
        <p class="font-semibold">Gross Weight:</p>
        <p>{{ $detail->gross_weight ?? 'N/A' }} {{ $detail->product->uom ?? 'N/A' }}</p>
    </div>
    <div class="mb-2 flex gap-4">
        <p class="font-semibold">Empty Weight:</p>
        <p>{{ $detail->empty_weight ?? 'N/A' }} {{ $detail->product->uom ?? 'N/A' }}</p>
    </div>
    <hr class="my-1 w-96">
    <div class="mt-2 flex gap-9">
        <p class="font-semibold">Net Weight:</p>
        <p>{{ $detail->net_weight ?? 'N/A' }} {{ $detail->product->uom ?? 'N/A' }}</p>
    </div>
</div>

                        <h1 class="text-lg font-semibold pt-10 ">Product Name and Brand: </h1><br>
                        <div class="ml-16">
                            <strong>{{ $detail->product->itemname ?? 'N/A' }}</strong><br>
                        </div>
                        <div class="flex  justify-between">
                            <div class="mt-12">
                                Lock Numbers:
                            </div>
                            <div class="flex items-center mt-5 gap-5 justify-center">
                                @php
                                // Split the Lock_number by commas into an array
                                $lockNumbers = explode(',', $challanMemo->Lock_number);

                                // Function to convert integer to Roman numeral
                                function intToRoman($num) {
                                $n = intval($num);
                                $res = '';

                                // Define roman numeral values
                                $romanNumerals = [
                                1000 => 'M',
                                900 => 'CM',
                                500 => 'D',
                                400 => 'CD',
                                100 => 'C',
                                90 => 'XC',
                                50 => 'L',
                                40 => 'XL',
                                10 => 'X',
                                9 => 'IX',
                                5 => 'V',
                                4 => 'IV',
                                1 => 'I'
                                ];

                                foreach ($romanNumerals as $value => $symbol) {
                                while ($n >= $value) {
                                $res .= $symbol;
                                $n -= $value;
                                }
                                }

                                return $res;
                                }
                                @endphp

                                <div class="flex items-center space-x-2">
                                    <!-- Check if there are exactly 2 lock numbers -->
                                    @if(count($lockNumbers) === 2)
                                    <input type="text" name="lock_numbers[]" value="{{ trim($lockNumbers[0]) }}"
                                        readonly
                                        class="p-3 border-none border-gray-900 rounded-md bg-gray-200 text-gray-900" />
                                    <span class="text-lg font-semibold">#</span>
                                    <input type="text" name="lock_numbers[]" value="{{ trim($lockNumbers[1]) }}"
                                        readonly
                                        class="p-3 border-none border-gray-900 rounded-md bg-gray-200 text-gray-900" />
                                    @else
                                    <!-- Display all lock numbers concatenated with '#' if not exactly 2 -->
                                    <input type="text" name="lock_numbers"
                                        value="{{ implode(' # ', array_map('trim', $lockNumbers)) }}" readonly
                                        class="w-full p-3 border-none border-gray-900 rounded-md bg-gray-200 text-gray-900" />
                                    @endif
                                </div>

                            </div>
                        </div>
                    </td>

                    <!-- Rate Column -->
                    <td class="border border-gray-300 p-3 text-gray-700 text-center">
                        {{ $detail->rate ?? 'As per contract' }}
                    </td>

                    <!-- Amount Column -->
                    <td class="border border-gray-300 p-3 text-gray-700 text-center">
                        <!-- {{ $detail->amount ?? 'As per contract' }} -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Signature Section -->
        <div class="flex justify-between mt-8">
            <div class="text-center border-t border-gray-300 pt-4">
                <p class="text-gray-700">Driver's Signature</p>
            </div>
            <div class="text-center border-t border-gray-300 pt-4">
                <p class="text-gray-700">Supervisor's Signature</p>
            </div>
            <div class="text-center border-t border-gray-300 pt-4">
                <p class="text-gray-700">Client's Signature</p>
            </div>
        </div>
    </div>
    <div class="mt-5 bg-blue-800 text-center text-white rou">
        <h1>Specialized in Supply of High Temperature Bulk Bitumen By own Carrier</h1>
    </div>
    <!-- Page Break -->
    <div class="page-break"></div>

    <!-- Customer Copy -->
    <div class="container w-[60%]   mx-auto px-4 py-1 relative ">



        <!-- Office Copy -->
        <div class="bg-white rounded-lg p-8">

            <div class="flex text-center mt-2 justify-between items-center">
                <img src="./logo3.png" alt="Logo" class="w-16 h-16">

                <h1 id="heading" class="text-5xl text-blue-950 font-bold">
                    মেসার্স রহমান কর্পোরেশন<br>
                    M/S. RAHMAN CORPORATION
                </h1>
                <img src="./qr.png" alt="QR Code" class="w-16 h-16">
            </div>

            <div class="text-center">
                <p id="subheading" class="text-[14px] text-gray-600">
                    Corporate Office: 2 No Gate, S A Paribahan Tower, Fifth Floor, Nasirabad, Chittagong<br>
                    Sales Office: House #250, Road #01, Block & F, Bashundhara R/A, Dhaka<br>
                    +88 01711 345 395 | +88 01783 976 578 | Email: rahman.corporation15@yahoo.com<br>
                    <i class="fas fa-globe"></i> rahmancorporationbd.com
                </p>
                <div class="flex justify-between">
                    <span class="float-right font-bold">Date:
                        {{ \Carbon\Carbon::parse($challanMemo->datetime)->format('d/m/y') }} </span>

                    <!-- {{ date('d/m/y') }} -->
                    <span class="float-right text-sm  font-bold">Customer Copy</span>
                </div>
            </div>
        </div>

        <div class="text-center">
            <div id="TrackChallan" class="bg-blue-900 w-32 text-white rounded-md mx-auto mb-2 ">
                <h2 class="text-lg font-semibold py-1">Truck Challan</h2>
            </div>


        </div>


        <div class="flex">
            <p class="font-semibold mb-5 text-gray-700">SI No/Challan No : <span
                    class="font-bold text-xl">{{ $challanMemo->challanno ?? 'N/A' }}</span> </p>

        </div>


       <div class="grid grid-cols-2 gap-x-8 gap-y-4 mb-3">
    <!-- Client Name Row -->
<div class="col-span-2 flex items-center justify-start text-[15px] print:space-x-2">
    <p class="font-semibold text-gray-700">Client's Name:       <span class="ml-7 font-normal">     {{ $order->customer->customername ?? $Ledger->customer->customername ?? 'N/A' }} </span></p>
    
</div>



    <!-- Row 1 -->
    <div class="flex items-center justify-start space-x-4">
        <div class="flex items-center">
  <p class="font-semibold text-gray-700">Address:</p>
  <span class="font-normal ml-16"> {{ $challanMemo->address ?? 'N/A' }} </span>
</div>

    </div>
    <div class="flex items-center space-x-4">
        <p class="font-semibold text-gray-700">Name of Driver:      <span class="ml-3 font-normal">    {{ $challanMemo->driver ?? 'N/A' }} </span></p>
    </div>

    <!-- Row 2 -->
    <div class="flex items-center space-x-4">
        <p class="font-semibold text-gray-700">License/Mobile:       <span class="ml-3 font-normal">    {{ $challanMemo->license ?? 'N/A' }} </span></p>
    </div>
    <div class="flex items-center space-x-4">
      <p class="font-semibold text-gray-700">Lorry No:       <span class="ml-14 font-normal">    {{ $challanMemo->truck->reg_no ?? 'N/A' }} </span></p>
    </div>
</div>




        <table class="w-full border border-gray-300 mb-4 h-[300px] overflow-auto watermark">
            <thead>
                <!-- Table Header -->
                <tr class="bg-white text-xl text-center">
                    <th class="border border-gray-300 text-xl p-3">Description of Goods</th>
                    <th class="border border-gray-300 text-xl p-3">Rate</th>
                    <th class="border border-gray-300 text-xl p-3">Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table Body -->
                @foreach ($challanMemo->deliveryDetails as $index => $detail)
                <tr>
                    <!-- Description of Goods -->
                    <td class="border border-gray-300 p-3 text-gray-700">
                        <h1 class="text-lg font-semibold pb-2">Weight:</h1>
                        <div class="mb-2 flex gap-5">
        <p class="font-semibold">Gross Weight:</p>
        <p>{{ $detail->gross_weight ?? 'N/A' }} {{ $detail->product->uom ?? 'N/A' }}</p>
    </div>
    <div class="mb-2 flex gap-4">
        <p class="font-semibold">Empty Weight:</p>
        <p>{{ $detail->empty_weight ?? 'N/A' }} {{ $detail->product->uom ?? 'N/A' }}</p>
    </div>
    <hr class="my-1 w-96">
    <div class="mt-2 flex gap-9">
        <p class="font-semibold">Net Weight:</p>
        <p>{{ $detail->net_weight ?? 'N/A' }} {{ $detail->product->uom ?? 'N/A' }}</p>
    </div>
                        <h1 class="text-lg font-semibold pt-10 ">Product Name and Brand: </h1><br>
                        <div class="ml-16">
                            <strong>{{ $detail->product->itemname ?? 'N/A' }}</strong><br>
                        </div>
                        <div class="flex justify-between">
                            <div class="mt-12">
                                Lock Numbers:
                            </div>
                            <div class="flex items-center mt-10 gap-5 justify-center">



                                <!-- Loop through each lock number and display it in an input field for customer copy -->
                                <div class="flex items-center space-x-2">
                                    <!-- Check if there are exactly 2 lock numbers -->
                                    @if(count($lockNumbers) === 2)
                                    <input type="text" name="lock_numbers[]" value="{{ trim($lockNumbers[0]) }}"
                                        readonly
                                        class="p-3 border-none border-gray-900 rounded-md bg-gray-200 text-gray-900" />
                                    <span class="text-lg font-semibold">#</span>
                                    <input type="text" name="lock_numbers[]" value="{{ trim($lockNumbers[1]) }}"
                                        readonly
                                        class="p-3 border-none border-gray-900 rounded-md bg-gray-200 text-gray-900" />
                                    @else
                                    <!-- Display all lock numbers concatenated with '#' if not exactly 2 -->
                                    <input type="text" name="lock_numbers"
                                        value="{{ implode(' # ', array_map('trim', $lockNumbers)) }}" readonly
                                        class="w-full p-3 border-none border-gray-900 rounded-md bg-gray-200 text-gray-900" />
                                    @endif
                                </div>


                            </div>

                        </div>


                    </td>

                    <!-- Rate Column -->
                    <td class="border border-gray-300 p-3 text-gray-700 text-center">
                        {{ $detail->rate ?? 'As per contract' }}
                    </td>

                    <!-- Amount Column -->
                    <td class="border border-gray-300 p-3 text-gray-700 text-center">
                        <!-- {{ $detail->amount ?? 'N/A' }} -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Signature Section -->
        <div class="flex justify-between mt-8">
            <div class="text-center border-t border-gray-300 pt-4">
                <p class="text-gray-700">Driver's Signature</p>
            </div>
            <div class="text-center border-t border-gray-300 pt-4">
                <p class="text-gray-700">Supervisor's Signature</p>
            </div>
            <div class="text-center border-t border-gray-300 pt-4">
                <p class="text-gray-700">Client's Signature</p>
            </div>
        </div>
    </div>
    </div>
    <div class="mt-5 bg-blue-800 text-center text-white rou">
        <h1>Specialized in Supply of High Temperature Bulk Bitumen By own Carrier</h1>
    </div>
</body>

</html>