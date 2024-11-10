<x-app-layout>
    <div class="max-w-screen-lg mx-auto w-full">
        <div class="my-8">
            <h1 class="text-2xl font-bold">Inventory List</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-8 w-full">
            <!-- Inventory Data Table -->
            <table id="example" class="display w-full">
                <thead>
                    <tr>
                        <th>Purchase No</th>
                        <th>Item Code</th>
                        <th>DO/Invoice No</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->purchase_no }}</td>
                        <td>{{ $inventory->itemcode }}</td>
                        <td>{{ $inventory->do_invoice_no }}</td>
                        <td>{{ $inventory->quantity }}</td>
                        <td>{{ $inventory->uom }}</td>
                        <td>{{ $inventory->price }}</td>
                        <td>{{ $inventory->location }}</td>
                        <td>
                            <form action="{{ route('inventories.update', $inventory->id) }}" method="POST" class="update-form">
                                @csrf
                                @method('PUT')
                                
                                <select name="status" class="w-full border border-gray-300 rounded px-2 py-1" disabled>
                                    <option value="Pending" {{ $inventory->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Approved" {{ $inventory->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                </select>
                        </td>
                        <td class="flex space-x-2">
                                <button type="button" onclick="enableStatusEdit(this)"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button type="submit"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 hidden save-button">Save</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function enableStatusEdit(button) {
            const row = button.closest('tr');
            const statusSelect = row.querySelector('select[name="status"]');
            statusSelect.disabled = false;
            button.classList.add('hidden');
            row.querySelector('.save-button').classList.remove('hidden');
        }
    </script>

    <script>
        @if (session('success'))
          Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
          })
        @endif
    </script>
</x-app-layout>
