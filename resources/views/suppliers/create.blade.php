<x-app-layout>

    <!-- Supplier Form -->
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl mt-4 shadow-lg">
      <h2 class="text-3xl font-extrabold text-center mb-8 ">Add New Supplier</h2>
  
      <!-- Form -->
      <form action="/suppliers" method="POST" class="space-y-6">
        <!-- CSRF Token (for Laravel) -->
        @csrf
  
        <!-- Supplied ID and Supplier Name (1 row, 2 fields) -->
        <div class="grid grid-cols-2 gap-6">
          <input type="text" name="supplied_id" id="supplied_id" required
                 class="p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                 placeholder="Enter supplied ID">
          <input type="text" name="suppliername" id="suppliername" required
                 class="p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                 placeholder="Enter supplier name">
        </div>
  
        <!-- Address and City (1 row, 2 fields) -->
        <div class="grid grid-cols-2 gap-6">
          <input type="text" name="address" id="address" required
                 class="p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                 placeholder="Enter address">
          <input type="text" name="city" id="city" required
                 class="p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                 placeholder="Enter city">
        </div>
  
        <!-- Contact Person and Mobile (1 row, 2 fields) -->
        <div class="grid grid-cols-2 gap-6">
          <input type="text" name="contact_person" id="contact_person" required
                 class="p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                 placeholder="Enter contact person name">
          <input type="text" name="mobile" id="mobile" required
                 class="p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                 placeholder="Enter mobile number">
        </div>
  
        <!-- Email -->
        <div class="flex flex-col">
          <input type="email" name="email" id="email" required
                 class="mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                 placeholder="Enter email address">
        </div>
  
        <!-- Submit Button -->
        <div class="flex justify-center">
          <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-3 px-6 rounded-lg font-semibold shadow-lg hover:from-blue-600 hover:to-teal-600 transition-all duration-300">
            Add Supplier
          </button>
        </div>
      </form>
    </div>
  
  </x-app-layout>
  