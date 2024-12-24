

<x-app-layout>
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-8">MEB Industrial Complex Ltd</h1>

        <hr class="w-1 border-black my-6"> <!-- Horizontal line -->

        <div class="text-center text-lg font-semibold mb-6">Customer Copy</div>

        <!-- Table displaying the data -->
        <table class="min-w-full border-collapse border border-black">
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td class="border border-black p-2 font-semibold">No</td>
                    <td class="border border-black p-2">{{ $meb_infos->no }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Date & Time</td>
                    <td class="border border-black p-2">{{ $meb_infos->date_time }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Customer Name</td>
                    <td class="border border-black p-2">{{ $meb_infos->customer_name }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">VEHICLE</td>
                    <td class="border border-black p-2">{{ $meb_infos->vehicle }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Goods</td>
                    <td class="border border-black p-2">{{ $meb_infos->goods }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Gross Weight</td>
                    <td class="border border-black p-2"><span class="border-r border-gray-900  divide-y divide-blue-200">{{ $meb_infos->gross_weight_time }}</span> <hr> {{ $meb_infos->gross_weight_amount }} {{ $meb_infos->gross_weight_uom }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Tare Weight</td>
                    <td class="border border-black p-2">{{ $meb_infos->tare_weight_amount }} {{ $meb_infos->tare_weight_uom }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Net Weight</td>
                    <td class="border border-black p-2">{{ $meb_infos->net_weight }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Price</td>
                    <td class="border border-black p-2">{{ $meb_infos->price }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Total Price</td>
                    <td class="border border-black p-2">{{ $meb_infos->total_price }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Company</td>
                    <td class="border border-black p-2">{{ $meb_infos->company }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Address</td>
                    <td class="border border-black p-2">{{ $meb_infos->address }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Holder</td>
                    <td class="border border-black p-2">{{ $meb_infos->holder }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">Phone</td>
                    <td class="border border-black p-2">{{ $meb_infos->phone }}</td>
                </tr>
                <tr>
                    <td class="border border-black p-2 font-semibold">DO No</td>
                    <td class="border border-black p-2">{{ $meb_infos->do_no }}</td>
                </tr>

            </tbody>
        </table>
 <div class="text-center mt-6">
            <a href="{{ route('meb.print', $meb_infos->id) }}" target="_blank"
               class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Print
            </a>
        </div>
    </div>
</x-app-layout>
