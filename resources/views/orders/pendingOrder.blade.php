<x-app-layout>
    <div class="container w-[90%] mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">Pending Order</h1>

        <table id="example" class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Transaction ID</th>
                    <th class="border border-gray-300 px-4 py-2">Date</th>
                    <th class="border border-gray-300 px-4 py-2">Item Code</th>
                    <th class="border border-gray-300 px-4 py-2">DO No</th>
                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2">UOM</th>
                    <th class="border border-gray-300 px-4 py-2">Challan No</th>
                    <th class="border border-gray-300 px-4 py-2">Customer</th>
                    <th class="border border-gray-300 px-4 py-2">Stock Source</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inventoryLedgers as $ledger)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->trxid }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($ledger->date)->format('d/m/y') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->itemcode }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->DO_no ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->uom }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->customer->customername }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->suppliers->suppliername }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $ledger->challan_no ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if(empty($ledger->order_no))
                                <a href="/bitumin/challan-order-create/{{ $ledger->trxid }}" 
                                   class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 text-sm rounded">
                                    Order Now
                                </a>
                            @else
                                {{ $ledger->order_no }}
                            @endif
                        </td>
                        <!-- <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('inventory-ledger.update', $ledger->trxid) }}" method="POST" class="ledger-form">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select border border-gray-300 rounded py-1 px-2" disabled>
                                    <option value="verified" {{ $ledger->status === 'verified' ? 'selected' : '' }}>Verified</option>
                                    <option value="unverified" {{ $ledger->status === 'unverified' ? 'selected' : '' }}>Unverified</option>
                                </select>
                            </form>
                        </td> -->
                        <!-- <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                           
                            <button type="button" onclick="enableStatusEdit(this)" 
                                class="bg-blue-900 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </button>
                            
                            
                            <button type="button" onclick="submitForm(this)" 
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 hidden save-button">
                                Save
                            </button>
                        </td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="border border-gray-300 px-4 py-2 text-center">
                            No records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        // Function to enable status editing and show Save button
        function enableStatusEdit(button) {
            const row = button.closest('tr');
            const statusSelect = row.querySelector('select[name="status"]');
            statusSelect.disabled = false;  // Enable the status select field

            // Hide the Edit button and show the Save button
            button.classList.add('hidden');
            row.querySelector('.save-button').classList.remove('hidden');
        }

        // Function to submit the form when Save is clicked
        function submitForm(button) {
            const row = button.closest('tr');
            const form = row.querySelector('.ledger-form');
            form.submit();  // Submit the form
        }
    </script>
</x-app-layout>
