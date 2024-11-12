<x-app-layout>
  
    <div class="container mx-auto p-6 bg-white">
      <h2 class="text-2xl font-semibold mb-6 text-gray-800">Create Scale Slip for Order #{{ $order_no }}</h2>
  
      <!-- Form to create Scale Slip -->
      <form action="{{ route('slipscale.store') }}" method="POST" class="space-y-6">
        @csrf
  
        <!-- Slip Number (Hidden) -->
        <div class="hidden">
          <label for="slipno" class="block text-gray-700">Slip Number</label>
          <input type="text" name="slipno" id="slipno" class="w-full p-3 border border-gray-300 rounded-md" />
        </div>
  
        <!-- Order Number (Pre-filled) -->
        <div class="mb-6 hidden">
          <label for="orderno" class="block text-gray-700 font-semibold">Order Number</label>
          <input type="text" name="orderno" id="orderno" class="w-full p-3 border border-gray-300 rounded-md" value="{{ $order_no }}" required readonly />
        </div>
  
        <!-- Plant and Ticket Number in one row -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 ">
          <div>
            <label for="plant" class="block text-gray-700 font-semibold">Plant</label>
            <input type="text" name="plant" id="plant" class="w-full p-3 border border-gray-300 rounded-md" required />
          </div>
          <div>
            <label for="ticketno" class="block text-gray-700 font-semibold">Ticket Number</label>
            <input type="text" name="ticketno" id="ticketno" class="w-full p-3 border border-gray-300 rounded-md" required />
          </div>

          <div class="mb-6">
            <label for="customer" class="block text-gray-700 font-semibold">Customer</label>
            <select name="customer" id="customer" class="w-full p-3 border border-gray-300 rounded-md" required>
                <option value="" disabled selected>Select a Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->customername }}">{{ $customer->customername }}</option>
                @endforeach
            </select>
        </div>
        
        </div>
  
        <!-- First Weight Section -->
        <div class="mb-6">
         
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 items-center gap-6">
            <h3 class="text-xl font-semibold  text-gray-800">First Weight :</h3>
            <div>
             
              <input type="date" name="first_weight_date" id="first_weight_date" class="w-full p-3 border border-gray-300 rounded-md" required />
            </div>
            <div>
             
              <input type="time" name="first_weight_time" id="first_weight_time" class="w-full p-3 border border-gray-300 rounded-md" required />
            </div>
            <div>
              
              <input type="text" name="first_weight_ref" id="first_weight_ref"  placeholder="Reference" class="w-full p-3 border border-gray-300 rounded-md" required />
            </div>
          </div>
        </div>
  
        <!-- Second Weight Section -->
        <div class="mb-6">
          
          <div class="grid grid-cols-1 item-center justify-center sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Second Weight : </h3>
            <div>
              
              <input type="date" name="second_weight_date" id="second_weight_date" class="w-full p-3 border border-gray-300 rounded-md" required />
            </div>
            <div>
             
              <input type="time" name="second_weight_time" id="second_weight_time" class="w-full p-3 border border-gray-300 rounded-md"  placeholder="Reference" required />
            </div>
            <div>
            
              <input type="text" name="second_weight_ref" id="second_weight_ref" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Reference" required />
            </div>
          </div>
        </div>
  
        <!-- Duration, Operator, and Vehicle Registration in one row -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
          <div>
            <label for="duration_on_site" class="block text-gray-700">Duration on Site (min)</label>
            <input type="number" name="duration_on_site" id="duration_on_site" class="w-full p-3 border border-gray-300 rounded-md" required />
          </div>
          <div>
            <label for="operator" class="block text-gray-700">Operator</label>
            <input type="text" name="operator" id="operator" class="w-full p-3 border border-gray-300 rounded-md" required />
          </div>
          <div>
            <label for="vehicle_regi" class="block text-gray-700">Vehicle Registration</label>
            <select name="vehicle_regi" id="vehicle_regi" class="w-full p-3 border border-gray-300 rounded-md" required>
                <option value="">Select Vehicle Registration</option>
                @foreach ($trucks as $truck)
                    <option value="{{ $truck->reg_no }}">{{ $truck->reg_no }}</option>
                @endforeach
            </select>
        </div>
        
        </div>
  
        <!-- Customer -->

  
        <!-- Submit Button -->
        <div>
          <button type="submit" class="w-full py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md mt-4">
            Submit Scale Slip
          </button>
        </div>
      </form>
    </div>
</x-app-layout>
