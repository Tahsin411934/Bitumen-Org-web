<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Trucks Information</h1>
            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Add Truck
            </button>
        </div>

        @if($trucks->isEmpty())
        <p class="text-center text-red-600 text-lg font-medium">No trucks found.</p>
        @else
        <div class="overflow-x-auto">
            <table id="example" class="min-w-full border border-gray-300 bg-white rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Truck ID</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Registration No.</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Capacity</th>
                        <!-- <th class="px-4 py-2 text-left text-gray-700 font-medium">Type</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Brand</th> -->
                        <!-- <th class="px-4 py-2 text-left text-gray-700 font-medium">Year</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Chassis No.</th> -->
                        <!-- <th class="px-4 py-2 text-left text-gray-700 font-medium">Tier Count</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Tier Size</th> -->
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Mileage</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Fuel Type</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Status</th>
                        <!-- <th class="px-4 py-2 text-left text-gray-700 font-medium">Document Renewal Date</th> -->
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($trucks as $truck)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $truck->truck_id }}</td>
                        <td class="px-4 py-2">{{ $truck->reg_no }}</td>
                        <td class="px-4 py-2">{{ $truck->capacity }}</td>
                        <!-- <td class="px-4 py-2">{{ $truck->type }}</td>
                        <td class="px-4 py-2">{{ $truck->brand }}</td> -->
                        <!-- <td class="px-4 py-2">{{ $truck->year }}</td>
                        <td class="px-4 py-2">{{ $truck->chassis_no }}</td> -->
                        <!-- <td class="px-4 py-2">{{ $truck->tier_count }}</td>
                        <td class="px-4 py-2">{{ $truck->tier_size }}</td> -->
                        <td class="px-4 py-2">{{ $truck->mileage }}</td>
                        <td class="px-4 py-2">{{ $truck->fuel_type }}</td>
                        <td class="px-4 py-2">{{ $truck->status ? 'Active' : 'Inactive' }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <button onclick="editTruck({{ $truck->truck_id }})" data-modal-target="static-modal1"
                                data-modal-toggle="static-modal1"
                                class="btn bg-blue-950 rounded text-white p-2 font-bold" type="button">View &
                                Edit</button>
                            <a href="/drivertrucks">
                                <button class="btn bg-green-600 rounded text-white p-2 font-bold" type="button">Assign
                                    Driver</button></a>
                            <form action="{{ route('trucks.destroy', $truck->truck_id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this truck?');">
                                @csrf
                                @method('DELETE')
                                <!-- Use DELETE method -->
                                <button
                                    class="btn bg-red-600 rounded text-white p-2 font-bold hover:bg-red-700 focus:ring-4 focus:ring-red-300"
                                    type="submit">
                                    DELETE
                                </button>
                            </form>


                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <!-- Modal for Adding Trucks -->
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden fixed top-0 left-0 right-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
            <div class="relative bg-white rounded-lg shadow-lg w-full max-w-3xl">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold">Add New Truck</h3>
                    <button type="button" class="text-gray-400 hover:bg-gray-200 rounded-lg p-2"
                        data-modal-hide="static-modal">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    <form action="{{ route('trucks.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Truck ID -->
                            <div>
                                <input type="number" id="truck_id" name="truck_id"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Truck ID"
                                    required />
                            </div>
                            <!-- Registration No -->
                            <div>
                                <input type="text" id="reg_no" name="reg_no"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Registration No."
                                    required />
                            </div>
                            <!-- Capacity -->
                            <div>
                                <input type="number" step="0.01" id="capacity" name="capacity"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Capacity"
                                    required />
                            </div>
                            <!-- Type -->
                            <div>
                                <input type="text" id="type" name="type"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Type" required />
                            </div>
                            <!-- Brand -->
                            <div>
                                <input type="text" id="brand" name="brand"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Brand" required />
                            </div>
                            <!-- Year -->
                            <div>
                                <input type="number" id="year" name="year"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Year" min="1900"
                                    max="{{ date('Y') }}" required />
                            </div>
                            <!-- Chassis No -->
                            <div>
                                <input type="text" id="chassis_no" name="chassis_no"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Chassis No."
                                    required />
                            </div>
                            <!-- Tier Count -->
                            <div>
                                <input type="number" id="tier_count" name="tier_count"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Tier Count"
                                    required />
                            </div>
                            <!-- Tier Size -->
                            <div>
                                <input type="text" id="tier_size" name="tier_size"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Tier Size"
                                    required />
                            </div>
                            <!-- Mileage -->
                            <div>
                                <input type="number" step="0.01" id="mileage" name="mileage"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Mileage" required />
                            </div>
                            <!-- Fuel Type -->
                            <div>
                                <input type="text" id="fuel_type" name="fuel_type"
                                    class="form-input rounded-md shadow-md p-3 w-full" placeholder="Fuel Type"
                                    required />
                            </div>
                            <!-- Status -->
                            <div>
                                <select id="status" name="status" class="form-select rounded-md shadow-md p-3 w-full"
                                    required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <!-- Document Renewal Date -->
                            <div>
                                <input type="date" id="docRenewDate" name="docRenewDate"
                                    class="form-input rounded-md shadow-md p-3 w-full"
                                    placeholder="Document Renewal Date" required />
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="px-5 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="static-modal1" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 left-0 right-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-3xl">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-xl font-semibold">view and edit Truck info</h3>
                <button type="button" class="text-gray-400 hover:bg-gray-200 rounded-lg p-2"
                    data-modal-hide="static-modal1">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <form action="{{ route('trucks.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- To indicate it's an update request -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Truck ID -->
                        <div>
                            <label for="truck_id1" class="block text-sm font-medium text-gray-700">Truck ID</label>
                            <input type="number" id="truck_id1" name="truck_id"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Truck ID"
                                value="{{ $truck->truck_id }}" required />
                        </div>
                        <!-- Registration No -->
                        <div>
                            <label for="reg_no" class="block text-sm font-medium text-gray-700">Registration No.</label>
                            <input type="text" id="reg_no1" name="reg_no"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Registration No."
                                value="{{ $truck->reg_no }}" required />
                        </div>
                        <!-- Capacity -->
                        <div>
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                            <input type="number" step="0.01" id="capacity1" name="capacity"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Capacity"
                                value="{{ $truck->capacity }}" required />
                        </div>
                        <!-- Type -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <input type="text" id="type1" name="type" class="form-input rounded-md shadow-md p-3 w-full"
                                placeholder="Type" value="{{ $truck->type }}" required />
                        </div>
                        <!-- Brand -->
                        <div>
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" id="brand1" name="brand"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Brand"
                                value="{{ $truck->brand }}" required />
                        </div>
                        <!-- Year -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                            <input type="number" id="year1" name="year"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Year" min="1900"
                                max="{{ date('Y') }}" value="{{ $truck->year }}" required />
                        </div>
                        <!-- Chassis No -->
                        <div>
                            <label for="chassis_no" class="block text-sm font-medium text-gray-700">Chassis No.</label>
                            <input type="text" id="chassis_no1" name="chassis_no"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Chassis No."
                                value="{{ $truck->chassis_no }}" required />
                        </div>
                        <!-- Tier Count -->
                        <div>
                            <label for="tier_count" class="block text-sm font-medium text-gray-700">Tier Count</label>
                            <input type="number" id="tier_count1" name="tier_count"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Tier Count"
                                value="{{ $truck->tier_count }}" required />
                        </div>
                        <!-- Tier Size -->
                        <div>
                            <label for="tier_size" class="block text-sm font-medium text-gray-700">Tier Size</label>
                            <input type="text" id="tier_size1" name="tier_size"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Tier Size"
                                value="{{ $truck->tier_size }}" required />
                        </div>
                        <!-- Mileage -->
                        <div>
                            <label for="mileage" class="block text-sm font-medium text-gray-700">Mileage</label>
                            <input type="number" step="0.01" id="mileage1" name="mileage"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Mileage"
                                value="{{ $truck->mileage }}" required />
                        </div>
                        <!-- Fuel Type -->
                        <div>
                            <label for="fuel_type" class="block text-sm font-medium text-gray-700">Fuel Type</label>
                            <input type="text" id="fuel_type1" name="fuel_type"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Fuel Type"
                                value="{{ $truck->fuel_type }}" required />
                        </div>
                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" class="form-select rounded-md shadow-md p-3 w-full"
                                required>
                                <option value="1" @if($truck->status == 1) selected @endif>Active</option>
                                <option value="0" @if($truck->status == 0) selected @endif>Inactive</option>
                            </select>
                        </div>
                        <!-- Document Renewal Date -->
                        <div>
                            <label for="docRenewDate" class="block text-sm font-medium text-gray-700">Document Renewal
                                Date</label>
                            <input type="date" id="docRenewDate1" name="docRenewDate"
                                class="form-input rounded-md shadow-md p-3 w-full" placeholder="Document Renewal Date"
                                value="{{ $truck->docRenewDate }}" required />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Save Changes
                        </button>
                        <button type="button"
                            class="px-5 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700"
                            data-modal-hide="static-modal1">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
    // Assuming $trucks is an array of trucks in your Laravel controller
    const trucksData = @json($trucks);

    // Function to edit truck by ID
    function editTruck(truckId) {
        // Find the truck by truckId

        const truck = trucksData.find(t => t.truck_id === truckId);

        // Log the found truck data to verify


        // If truck is found, populate the form fields
        if (truck) {
            document.getElementById("truck_id1").value = truck.truck_id;
            document.getElementById("reg_no1").value = truck.reg_no;
            document.getElementById("capacity1").value = truck.capacity;
            document.getElementById("type1").value = truck.type;
            document.getElementById("brand1").value = truck.brand;
            document.getElementById("year1").value = truck.year;
            document.getElementById("chassis_no1").value = truck.chassis_no;
            document.getElementById("tier_count1").value = truck.tier_count;
            document.getElementById("tier_size1").value = truck.tier_size;
            document.getElementById("mileage1").value = truck.mileage;
            document.getElementById("fuel_type1").value = truck.fuel_type;
            document.getElementById("status").value = truck.status;
            document.getElementById("docRenewDate1").value = truck.docRenewDate;
        } else {
            console.log("Truck not found with ID: " + truckId);
        }
    }
    </script>

</x-app-layout>