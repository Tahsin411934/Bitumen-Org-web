<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Orders</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Order No</th>
                    <th class="px-4 py-2">Customer ID</th>
                    <th class="px-4 py-2">Order Date</th>
                    <th class="px-4 py-2">Details</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="px-4 py-2">{{ $order->order_no }}</td>
                        <td class="px-4 py-2">{{ $order->customerid }}</td>
                        <td class="px-4 py-2">{{ $order->orderdate }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('orders.show', $order->order_no) }}" class="text-blue-500">View Details</a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('orders.edit', $order->order_no) }}" class="text-yellow-500">Edit</a> |
                            <form action="{{ route('orders.destroy', $order->order_no) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
