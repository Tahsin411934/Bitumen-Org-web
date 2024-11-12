<html>
<head>
    <title>Weight Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .border-table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .border-table td, .border-table th {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body class="p-8">
    <div class="border border-black p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="font-bold">ABP DRUM PLANT: {{$scaleSlip->plant}}</h1>
            </div>
            <div>
                <span class="font-bold">TICKET NUMBER : {{$scaleSlip->ticketno}}</span>
            </div>
        </div>
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
        <div class="mb-4">
            <div class="mb-4 flex items-center justify-evenly">
                <div>
                <div class="font-bold -ml-20">First Weight</div>
                <p>Date: {{ \Carbon\Carbon::parse($scaleSlip->first_weight_date)->format('Y-m-d') }}</p>
                <p>Time: {{$scaleSlip->first_weight_time}}</p>
                <p>Ref:: {{$scaleSlip->first_weight_ref}}</p>
            </div>
            <div>
                <div class="font-bold mt-4 -ml-20">Second Weight:</div>
                <p> Date: {{ \Carbon\Carbon::parse($scaleSlip->second_weight_date)->format('Y-m-d') }}</p>
                <p>Time: {{$scaleSlip->second_weight_time}}</p>
                <p>Ref:: {{$scaleSlip->second_weight_ref}}</p>
            </div>
                
            </div>
            <div class="mt-4 p-2 border flex justify-center items-center  border-gray-300 bg-gray-100  text-sm">
                <strong>Duration on Site:</strong> {{$scaleSlip->duration_on_site}}
            </div>
            
        </div>
        <div class="mb-4">
            <table class="border-table w-full">
                <tr>
                    <td class="font-bold">OPERATOR: <span class="font-normal">{{$scaleSlip->operator}}</span></td>
                    <td class="font-bold">VEHICLE NO:<span class="font-normal"> {{$scaleSlip->vehicle_regi}}</span></td>
                </tr>
                <tr>
                    <td class="font-bold">Customer:<span class="font-normal"> {{$scaleSlip->customer}}</span></td>
                    <td class="font-bold">Customer:<span class="font-normal"> {{$scaleSlip->customer}}</span></td>
                </tr>
            </table>
            
        </div>
        <div class="mb-4">
            <p class="font-bold">COMMENTS :</p>
        </div>
        <div class="text-sm">
            <p></p>
            <p></p>
        </div>
    </div>
</body>
</html>