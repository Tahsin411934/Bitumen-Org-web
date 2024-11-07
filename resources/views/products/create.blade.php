<x-app-layout>
    <h1 class="text-2xl font-bold text-center my-6">Product Insert</h1>
    @if (session('success'))
    <div class="text-center p-4 bg-green-100 font-semibold text-green-700">
        <p>{{ session('success') }}</p>
    </div>
@endif

    <form action="{{ route('products.store') }}" method="POST" class="max-w-5xl mx-auto bg-white shadow-md rounded p-6">
        @csrf
        <div id="product-rows">
            <!-- First Product Row -->
            <div class="product-row flex space-x-4 mb-4">
                <input type="number" name="products[0][itemcode]" value="{{ $maxItemCode + 1 }}" placeholder="Item Code"
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let rowIndex = 1;
            let currentItemCode = {{ $maxItemCode + 1 }}; // Start with max + 1

            const addRowButton = document.getElementById("add-row");
            const productRowsContainer = document.getElementById("product-rows");

            // Function to add a new row for product input
            addRowButton.addEventListener("click", function() {
                currentItemCode += 1; // Increment itemcode by 1 for each new row

                const productRow = document.createElement("div");
                productRow.className = "product-row flex space-x-4 mb-4";
                productRow.innerHTML = `
                    <input type="number" name="products[${rowIndex}][itemcode]" value="${currentItemCode}" placeholder="Item Code"
                        class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="products[${rowIndex}][itemname]" placeholder="Item Name"
                        class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="products[${rowIndex}][uom]" placeholder="UOM"
                        class="w-1/3 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="button" class="remove-row bg-red-500 hover:bg-red-600 text-white p-2 rounded">
                        Remove
                    </button>
                `;

                // Append the new row to the container
                productRowsContainer.appendChild(productRow);

                // Increase rowIndex for the next row
                rowIndex++;

                // Add event listener to the "Remove" button of the new row
                productRow.querySelector(".remove-row").addEventListener("click", function() {
                    productRowsContainer.removeChild(productRow);
                    currentItemCode -= 1; // Decrement itemcode by 1 when a row is removed
                });
            });

            // Event listener for removing existing "Remove" button (first row)
            document.querySelector(".remove-row").addEventListener("click", function() {
                const firstRow = this.closest(".product-row");
                productRowsContainer.removeChild(firstRow);
                currentItemCode -= 1; // Decrement itemcode by 1 when the row is removed
            });
        });
    </script>
</x-app-layout>
