<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add Purchase</h2>

        <div class="p-6 bg-white rounded-lg shadow-md">

            <form action="{{ route('purchases.store') }}" method="POST">
                @csrf

                <div class="flex mb-4">
                    <input type="date" name="purchase_date" required placeholder="Purchase Date"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <input type="text" name="DO_InvoiceNo" required placeholder="Invoice No"
                           class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">

                    <select name="supplier_id" required
                            class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <option value="">Select Supplier</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->supplied_id }}">{{ $supplier->suppliername }}</option>
                        @endforeach
                    </select>

                    <input type="text" name="remarks" placeholder="Remarks (Optional)"
                           class="w-full ml-4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                </div>

                <!-- Items Section -->
                <h3 class="text-xl font-medium text-gray-700 mt-8 mb-4">Items</h3>
                <div id="items" class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead>
                        <tr>
                            <th class="border border-gray-300 p-2 text-left">Item Code</th>
                            <th class="border border-gray-300 p-2 text-left">Quantity</th>
                            <th class="border border-gray-300 p-2 text-left">Unit of Measure</th>
                            <th class="border border-gray-300 p-2 text-left">Price</th>
                            <th class="border border-gray-300 p-2 text-left">Storage Location</th>
                            <th class="border border-gray-300 p-2 text-left">Actions</th>
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
                                       class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                            </td>
                            <td class="border border-gray-300 p-2">
                                <input type="text" name="items[0][uom]" placeholder="Unit of Measure" required
                                       class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 uom-input" readonly>
                            </td>
                            <td class="border border-gray-300 p-2">
                                <input type="number" name="items[0][price]" placeholder="Price" required
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
                                <button type="button" class="remove-item bg-red-500 text-white p-2 rounded-lg">Remove</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" id="add-item" class="mt-4 bg-green-500 text-white p-2 rounded-lg">Add Item</button>

                <button type="submit"
                        class="w-full text-white py-3 mt-6 bg-gradient-to-r from-green-500 to-teal-500 hover:from-blue-600 hover:to-teal-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    Add Purchase
                </button>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                function updateUOM(selectElement) {
                    const uomValue = selectElement.options[selectElement.selectedIndex].dataset.uom;
                    const uomInput = selectElement.closest('tr').querySelector('.uom-input');
                    uomInput.value = uomValue || '';
                }

                document.querySelectorAll('.item-select').forEach(function (select) {
                    select.addEventListener('change', function () {
                        updateUOM(this);
                    });
                });

                document.getElementById('add-item').addEventListener('click', function () {
                    const itemsContainer = document.getElementById('item-rows');
                    const newItemIndex = itemsContainer.children.length;

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

                    newItem.querySelector('.remove-item').addEventListener('click', function () {
                        newItem.remove();
                    });

                    newItem.querySelector('.item-select').addEventListener('change', function () {
                        updateUOM(this);
                    });
                });
            });
        </script>
    </div>
</x-app-layout>
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