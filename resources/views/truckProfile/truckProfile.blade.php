<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 px-8  rounded-xl shadow-lg space-y-8">
        <!-- Page Title -->
        <h2 class="text-4xl font-extrabold text-indigo-950 text-center mb-8">Truck Profile: #{{ $truck->reg_no }}</h2>

        <!-- Truck Info Section -->
        <div class="space-y-8">
            <!-- General Information Section -->
            <div class="p-6 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-3xl font-semibold text-gray-800 mb-4">Truck Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Row 1 -->
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 2L2 12l10 10 10-10-10-10z"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Registration Number</p>
                            <p class="text-lg text-gray-500">{{ $truck->reg_no }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-5M3 4l4 4m4 0l4 4m4 0l4-4M3 4h18"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Brand</p>
                            <p class="text-lg text-gray-500">{{ $truck->brand }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 4v6h4m-4 0v6h4m0 0H8v6h4m0 0h-4V4h4"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Model Year</p>
                            <p class="text-lg text-gray-500">{{ $truck->year }}</p>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12H3"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Chassis Number</p>
                            <p class="text-lg text-gray-500">{{ $truck->chassis_no }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20m8-8H4">
                            </path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Truck Type</p>
                            <p class="text-lg text-gray-500">{{ ucfirst($truck->type) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v16m8-8H4">
                            </path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Capacity</p>
                            <p class="text-lg text-gray-500">{{ $truck->capacity }} tons</p>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v16m8-8H4">
                            </path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Tire Count</p>
                            <p class="text-lg text-gray-500">{{ $truck->tier_count }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 2v12l3-3 3 3V2"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Tire Size</p>
                            <p class="text-lg text-gray-500">{{ $truck->tier_size }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Mileage</p>
                            <p class="text-lg text-gray-500">{{ $truck->mileage }} km</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 10V3H5v7H3v10h18V10h-2z"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Fuel Type</p>
                            <p class="text-lg text-gray-500">{{ ucfirst($truck->fuel_type) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Status</p>
                            <p class="text-lg text-gray-500">{{ ucfirst($truck->status) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16v12H4z">
                            </path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-700">Document Renewal Date</p>
                            <p class="text-lg text-gray-500">
                                {{ \Carbon\Carbon::parse($truck->docRenewDate)->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<h1 class="text-2xl text-blue-950 font-semibold">Service History</h1>
        <div class="bg-white shadow-lg rounded-lg p-8 w-full overflow-x-auto">
            <!-- DataTable -->
            <table id="example" class="display w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Truck</th>
                        <th>Date</th>
                        <th>Service</th>
                        <th>Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($truck->services as $serviceHistory)
                    <tr>
                        <form action="{{ route('service-history.update', $serviceHistory->id) }}" method="POST"
                            class="update-form">
                            @csrf
                            @method('PUT')
                            <td>
                                <input type="text" name="id" value="{{ $serviceHistory->id }}"
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td>
                                <select name="truck_id" class="w-full border border-gray-300 rounded px-2 py-1"
                                    disabled>
                                    @foreach ($trucks as $t)
                                    <option value="{{ $t->truck_id }}"
                                        {{ $serviceHistory->truck_id == $t->truck_id ? 'selected' : '' }}>
                                        {{ $t->reg_no }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="date" name="date" value="{{ $serviceHistory->date }}"
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td>
                                <select name="service" class="w-full border border-gray-300 rounded px-2 py-1" disabled>
                                    @foreach ($serviceTypes as $serviceType)
                                    <option value="{{ $serviceType->id }}"
                                        {{ $serviceHistory->service == $serviceType->id ? 'selected' : '' }}>
                                        {{ $serviceType->servicename }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="cost" value="{{ $serviceHistory->cost }}"
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td class="flex space-x-2">
                                <button type="button" onclick="enableEdit(this)"
                                    class="bg-blue-900 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button type="submit"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 hidden save-button">Save</button>
                        </form>

                        <form action="{{ route('service-history.destroy', $serviceHistory->id) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-8 w-full overflow-x-auto">
            <!-- DataTable -->
            <table id="example" class="display w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Truck ID</th>
                        <th>Change Date</th>
                        <th>Quantity</th>
                        <th>Filling Station</th>
                        <th>Driver</th>
                        <th>Meter Reading</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fuelUsages as $filter)
                    <tr>
                        <form action="{{ route('fuelusage.update', $filter->id) }}" method="POST"
                            class="update-form">
                            @csrf
                            @method('PUT')
                            <td>{{ $filter->id }}</td>
                            <td>
                                <textarea name="truckid"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $filter->truckid }}</textarea>
                            </td>
                            <td>
                                <textarea name="date"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $filter->date }}</textarea>
                            </td>
                            <td>
                                <textarea name="quantity"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $filter->quantity }}</textarea>
                            </td>
                            <td>
                                <select name="fillingstation"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none" disabled>
                                    <option value="inhouse" {{ $filter->fillingstation == 'inhouse' ? 'selected' : '' }}>Inhouse</option>
                                    <option value="3rdparty" {{ $filter->fillingstation == '3rdparty' ? 'selected' : '' }}>3rdparty</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="driver"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $filter->driver }}</textarea>
                            </td>
                            <td>
                                <textarea name="meterREADING"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $filter->meterREADING }}</textarea>
                            </td>
                            <td class="flex space-x-2">
                                <button type="button" onclick="enableEdit(this)"
                                    class="bg-blue-900 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button type="submit"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 hidden save-button">Save</button>
                           
                        </form>
                        <form action="{{ route('fuelusage.destroy', $filter->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- JavaScript for Toggle Edit Mode -->
        <script>
        function enableEdit(button) {
            // Find the parent row (tr)
            const row = button.closest('tr');
            const inputs = row.querySelectorAll('input, select');

            // Enable all input fields and selects
            inputs.forEach(input => {
                input.disabled = false;
            });

            // Show the Save button and hide the Edit button
            row.querySelector('.save-button').classList.remove('hidden');
            button.classList.add('hidden');
        }
        </script>

    </div>
</x-app-layout>