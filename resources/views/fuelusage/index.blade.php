<x-app-layout>
    <div class="mx-auto w-[98%] lg:ml-12">
        <div class="flex justify-between items-center w-[90%] mx-auto my-8">
            <h1 class="text-2xl font-bold">Fuel Usage</h1>
            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add New
            </button>
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
                                <textarea name="changedate"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $filter->changedate }}</textarea>
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
    </div>

    <!-- Add Modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center">
        <div class="relative w-full max-w-2xl mx-auto p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal Header -->
                <div class="flex justify-between items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add Usage</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <form action="{{ route('fuelusage.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">
                        <select name="truckid" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="" disabled selected>Select Truck</option>
                            @foreach($trucks as $truck)
                            <option value="{{ $truck->truck_id }}">{{ $truck->reg_no }}</option>
                            @endforeach
                        </select>

                        <input type="date" name="date"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full" placeholder=" Date">

                        <input type="number" name="quantity" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full" placeholder="Quantity">

                        <select name="fillingstation"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="" disabled selected>Select Filling Station</option>
                            <option value="inhouse">Inhouse</option>
                            <option value="3rdparty">3rdparty</option>
                        </select>

                        <select name="driver" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="" disabled selected>Select Driver</option>
                            @foreach($drivers as $driver)
                            <option value="{{ $driver->driver_id  }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>

                        <input type="number" name="meterREADING" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full" placeholder="Meter Reading">
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-3 px-6 rounded-lg font-semibold shadow-lg hover:from-blue-600 hover:to-teal-600">Add Usage</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
function enableEdit(button) {
    const row = button.closest('tr');
    row.querySelectorAll('textarea').forEach(textarea => textarea.disabled = false); // Enable all textarea fields
    row.querySelectorAll('input').forEach(input => input.disabled = false); // Enable all input fields (if any)
    row.querySelectorAll('select').forEach(select => select.disabled = false); // Enable all select fields
    button.classList.add('hidden'); // Hide the Edit button
    row.querySelector('.save-button').classList.remove('hidden'); // Show the Save button
}
</script>

<script>
@if(session('success'))
Swal.fire({
    title: 'Success!',
    text: '{{ session('
    success ') }}',
    icon: 'success',
    confirmButtonText: 'OK',
    customClass: {
        confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
    }
});
@endif
</script>

<style>
/* SweetAlert2 expects plain CSS, so Tailwind classes need to be converted using JIT compilation */
.swal2-confirm {
    @apply bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300;
}
</style>
