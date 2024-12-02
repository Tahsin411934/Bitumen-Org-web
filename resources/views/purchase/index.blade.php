<x-app-layout>
    <div class="w-[98%] mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add Purchase</h2>

        <div class="p-6 bg-white rounded-lg shadow-md">

            <form id="purchase-form" action="{{ route('purchases.store') }}" method="POST">
                @csrf

                <div class="lg:flex mb-4 ">
                    <input id="datepicker" type="text" placeholder="purchase_date"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                        name="purchase_date" required />
                    <input type="text" name="DO_InvoiceNo" required placeholder="Invoice No"
                        class="w-full lg:ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">

                    <select name="supplier_id" required
                        class="w-full lg:ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <option value="">Select Supplier</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->supplied_id }}">{{ $supplier->suppliername }}</option>
                        @endforeach
                    </select>

                    <input type="text" name="remarks" placeholder="Remarks (Optional)"
                        class="w-full lg:ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                </div>

                <!-- Items Section -->
                <h3 class="text-xl font-medium text-gray-700 mt-8 mb-4">Items</h3>
                <div id="items" class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-2 bg-slate-200 text-left">Item Code</th>
                                <th class="border border-gray-300 p-2 bg-slate-200 text-left">Quantity</th>
                                <th class="border border-gray-300 p-2 bg-slate-200 text-left">Unit of Measure</th>
                                <th class="border border-gray-300 p-2 bg-slate-200 text-left">Price</th>
                                <th class="border border-gray-300 p-2 bg-slate-200 text-left">Storage Location</th>
                                <th class="border border-gray-300 p-2 bg-slate-200 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="item-rows">
                            <tr id="item-0">
                                <td class="border border-gray-300 p-2">
                                    <select name="items[0][itemcode]" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 item-select">
                                        <option value="">Item Code</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->itemcode }}" data-uom="{{ $product->uom }}">
                                            {{ $product->itemname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <input type="number" name="items[0][quantity]" placeholder="Quantity" required
                                        step="any"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <input type="text" name="items[0][uom]" placeholder="Unit of Measure" required
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 uom-input"
                                        readonly>
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <input type="number" name="items[0][price]" placeholder="Price" required step="any"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <select name="items[0][storage_location]" required
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                        <option value="" disabled selected>Select Storage Location</option>
                                        <option value="Supplier Storage">Supplier Storage</option>
                                        <option value="In House Storage">In House Storage</option>
                                    </select>
                                </td>
                                <td class="border border-gray-300 p-2">
                                    <button type="button"
                                        class="remove-item bg-red-500 text-white p-2 rounded-lg">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" id="add-item" class="mt-4 bg-green-500 text-white p-2 rounded-lg">Add
                    Item</button>

                <button type="submit"
                    class="w-full text-white py-3 mt-6 bg-gradient-to-r from-green-500 to-teal-500 hover:from-blue-600 hover:to-teal-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    Add Purchase
                </button>
            </form>
        </div>

        <script>
        flatpickr("#datepicker", {
            dateFormat: "d/m/y", // Set the format to dd/mm/yy (2-digit year)
            altInput: true, // Show a user-friendly format
            altFormat: "d/m/y" // Optional: user-friendly alternative format for display
        });
        document.addEventListener('DOMContentLoaded', function() {
            let itemCount = 1;

            function updateUOM(selectElement) {
                const uomValue = selectElement.options[selectElement.selectedIndex].dataset.uom;
                const uomInput = selectElement.closest('tr').querySelector('.uom-input');
                uomInput.value = uomValue || '';
            }

            document.querySelectorAll('.item-select').forEach(function(select) {
                select.addEventListener('change', function() {
                    updateUOM(this);
                });
            });

            document.getElementById('add-item').addEventListener('click', function() {
                const itemsContainer = document.getElementById('item-rows');
                const newItemIndex = itemCount++;

                const newItem = document.createElement('tr');
                newItem.classList.add('item');
                newItem.id = 'item-' + newItemIndex;

                newItem.innerHTML = `
                        <td class="border border-gray-300 p-2">
                            <select name="items[${newItemIndex}][itemcode]" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 item-select">
                                <option value="">Item Code</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->itemcode }}" data-uom="{{ $product->uom }}">
                                        {{ $product->itemname }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="border border-gray-300 p-2">
                            <input type="number" name="items[${newItemIndex}][quantity]" placeholder="Quantity" required
                                   class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        </td>
                        <td class="border border-gray-300 p-2">
                            <input type="text" name="items[${newItemIndex}][uom]" placeholder="Unit of Measure" required
                                   class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 uom-input" readonly>
                        </td>
                        <td class="border border-gray-300 p-2">
                            <input type="number" name="items[${newItemIndex}][price]" placeholder="Price" required
                                   class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        </td>
                        <td class="border border-gray-300 p-2">
                            <select name="items[${newItemIndex}][storage_location]" required
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                <option value="" disabled selected>Select Storage Location</option>
                                <option value="Supplier Storage">Supplier Storage</option>
                                <option value="In House Storage">House Storage</option>
                            </select>
                        </td>
                        <td class="border border-gray-300 p-2">
                            <button type="button" class="remove-item bg-red-500 text-white p-2 rounded-lg">Remove</button>
                        </td>
                    `;

                itemsContainer.appendChild(newItem);

                newItem.querySelector('.remove-item').addEventListener('click', function() {
                    newItem.remove();
                });

                newItem.querySelector('.item-select').addEventListener('change', function() {
                    updateUOM(this);
                });
            });

            document.getElementById('purchase-form').addEventListener('submit', function(event) {
                const itemSelects = document.querySelectorAll('.item-select');
                const selectedItems = new Set();
                let hasDuplicate = false;

                itemSelects.forEach(function(select) {
                    const selectedItem = select.value;
                    if (selectedItems.has(selectedItem)) {
                        hasDuplicate = true;
                    } else {
                        selectedItems.add(selectedItem);
                    }
                });

                if (hasDuplicate) {
                    alert('You cannot add the same item more than once.');
                    event.preventDefault();
                }
            });
        });
        </script>
    </div>
</x-app-layout>
<script>
@if(session('success'))
Swal.fire({
    title: 'Success!',
    text: '{{ session('
    success ') }}',
    icon: 'success',
    confirmButtonText: 'OK'
})
@endif
</script>