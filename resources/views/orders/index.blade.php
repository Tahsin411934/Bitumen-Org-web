<x-app-layout>
    <div class="w-[94%] mx-auto p-6 bg-white rounded-xl">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Sales Orders View</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <table id="example" class="table-auto w-full border border-gray-300 shadow-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">SALES ORDER NO</th>
                    <th class="px-4 py-2 border">ORDER DATE</th>
                    <th class="px-4 py-2 border">CUSTOMER NAME</th>
                    <th class="px-4 py-2 border">DELIVERY LOCATION</th>
                    <th class="px-4 py-2 border">ORDER DESCRIPTION</th>
                    <th class="px-4 py-2 border">TOTAL</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="px-4 py-2 border">{{ $order->order_no }}</td>
                        <td class="px-4 py-2 border">{{ $order->orderdate }}</td>
                        <td class="px-4 py-2 border">{{ $order->customer->customername ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $order->deliverylocation }}</td>
                        <td class="px-4 py-2 border">
                            @foreach ($order->orderDetails as $detail)
                                {{ $detail->product->itemname?? 'N/A' }} - Quantity: {{ $detail->quantity }} - Price: {{ number_format($detail->price, 2) }} tk<br>
                            @endforeach
                        </td>
                        <td class="px-4 py-2 border">
                            {{ number_format($order->orderDetails->sum(fn($detail) => $detail->quantity * $detail->price), 2) }} 
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex flex-col space-y-2">
                                <a href="" 
                                   class="bg-blue-500 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded text-center">View Details</a>
                                
                                <a href="" 
                                   class="bg-blue-500 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded text-center">Invoice</a>
                                
                                <a href="" 
                                   class="bg-blue-500 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded text-center">Challan</a>
                                
                                   <a href="{{ route('scaleSlip.create', ['order_no' => $order->order_no]) }}" 
                                    class="bg-blue-500 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded text-center">
                                     Scale Slip
                                 </a>
                                 
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
