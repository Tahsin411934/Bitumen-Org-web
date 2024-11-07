<x-app-layout>
    <h1 class="text-2xl font-bold text-center my-6">Product Insert</h1>

    <form action="{{ route('products.store') }}" method="POST" class="max-w-5xl mx-auto bg-white shadow-md rounded p-6">
        @csrf
        <div id="product-rows">
            <!-- First Product Row -->
            <div class="product-row flex space-x-4 mb-4">
                <input type="text" name="products[0][itemcode]" placeholder="Item Code"
                    class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="text" name="products[0][itemname]" placeholder="Item Name"
                    class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="text" name="products[0][uom]" placeholder="UOM"
                    class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" class="remove-row bg-red-500 hover:bg-red-600 text-white p-2 rounded">
                    Remove
                </button>
            </div>
        </div>
        <div class="flex justify-between mt-6">
            <button type="button" id="add-row" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                Add Product
            </button>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Save
            </button>
        </div>
    </form>

    <!-- Ensure jQuery is loaded in your layout -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            let rowIndex = 1;

            // Adding a new row for product input
            $('#add-row').click(function() {
                $('#product-rows').append(`
                    <div class="product-row flex space-x-4 mb-4">
                        <input type="text" name="products[${rowIndex}][itemcode]" placeholder="Item Code"
                            class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <input type="text" name="products[${rowIndex}][itemname]" placeholder="Item Name"
                            class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <input type="text" name="products[${rowIndex}][uom]" placeholder="UOM"
                            class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" class="remove-row bg-red-500 hover:bg-red-600 text-white p-2 rounded">
                            Remove
                        </button>
                    </div>
                `);
                rowIndex++;
            });

            // Removing a product row
            $(document).on('click', '.remove-row', function() {
                $(this).closest('.product-row').remove();
            });
        });
    </script>
</x-app-layout>
