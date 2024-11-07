<x-app-layout>
    <h1 class="text-3xl font-bold text-center my-8 text-blue-600">Product List</h1>
    @if (session('success'))
    <div class="text-center p-4 bg-green-100 font-semibold text-green-700">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">
        @if($products->isEmpty())
            <p class="text-center text-gray-600">No products found.</p>
        @else
            <table class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-center font-medium border-b border-gray-300">Item Code</th>
                        <th class="py-3 px-6 text-center font-medium border-b border-gray-300">Item Name</th>
                        <th class="py-3 px-6 text-center font-medium border-b border-gray-300">UOM</th>
                        <th class="py-3 px-6 text-center font-medium border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors duration-300">
                            <td class="py-3 px-6 border-b border-gray-300 text-gray-800">{{ $product->itemcode }}</td>
                            <td class="py-3 px-6 border-b border-gray-300 text-gray-800">{{ $product->itemname }}</td>
                            <td class="py-3 px-6 border-b border-gray-300 text-gray-800">{{ $product->uom }}</td>
                            <td class="py-3 px-6 border-b border-gray-300">
                                <div class="flex gap-3 justify-center">
                                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                            class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700"
                                            onclick="openEditModal('{{ $product->itemcode }}', '{{ $product->itemname }}', '{{ $product->uom }}')">Edit</button>
                                    <form action="{{ route('products.destroy', $product->itemcode) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Product
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <!-- Edit form -->
                    <form id="edit-form" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="itemcode" class="block text-sm font-medium text-gray-900">Item Code</label>
                            <input disabled type="text" id="itemcode" name="itemcode" class="mt-1 disabled block w-full p-2 border border-gray-300 rounded-md" required readonly>
                        </div>
                        <div>
                            <label for="itemname" class="block text-sm font-medium text-gray-900">Item Name</label>
                            <input type="text" id="itemname" name="itemname" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div>
                            <label for="uom" class="block text-sm font-medium text-gray-900">UOM</label>
                            <input type="text" id="uom" name="uom" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" form="edit-form" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(itemcode, itemname, uom) {
            // Update the form action URL dynamically
            document.getElementById('edit-form').action = '/products/' + itemcode;

            // Set the values in the modal input fields
            document.getElementById('itemcode').value = itemcode;
            document.getElementById('itemname').value = itemname;
            document.getElementById('uom').value = uom;
        }
    </script>
</x-app-layout>
