<x-app-layout>
    <div class="mx-auto w-[98%] lg:ml-12">
        <div class="flex justify-between items-center w-[90%] mx-auto my-8">
            <h1 class="text-2xl font-bold"> Assign Driver and Truck</h1>
            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Assign Driver and Truck
            </button>
        </div>
        @if (session('conflict'))
        <script>
        Swal.fire({
            title: 'Conflict Detected!',
            text: @json(session('conflict')), // Properly escape the conflict message
            icon: 'warning',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'swal2-confirm'
            }
        });
        </script>
        @endif

        <div class="bg-white shadow-lg rounded-lg p-8 w-full overflow-x-auto">
            <table id="example" class="display w-full">
                <thead>
                    <tr>
                        <th>Truck ID</th>
                        <th>Driver ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($truck_drivers as $truck_driver)
                    <tr>
                        <form action="{{ route('drivertrucks.update', $truck_driver->id) }}" method="POST"
                            class="update-form">
                            @csrf
                            @method('PUT')

                            <td>
                                <textarea name="truck_id"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $truck_driver->truck_id }}</textarea>
                            </td>
                            <td>
                                <textarea name="driver_id"
                                    class="w-full border border-gray-300 rounded px-2 py-1 resize-none"
                                    disabled>{{ $truck_driver->driver_id }}</textarea>
                            </td>
                            <td>
                                <input type="date" name="start_date" value="{{ $truck_driver->start_date }}"
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td>
                                <input type="date" name="end_date" value="{{ $truck_driver->end_date }}"
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td class="flex space-x-2">
                                <button type="button" onclick="enableEdit(this)"
                                    class="bg-blue-900 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button type="submit"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 hidden save-button">Save</button>
                        </form>
                        <form action="{{ route('drivertrucks.destroy', $truck_driver->id) }}" method="POST"
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
    </div>

    <!-- Add Driver Modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center">
        <div class="relative w-full max-w-2xl mx-auto p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add Driver</h3>
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

                <form action="{{ route('drivertrucks.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">
                        <select name="truck_id" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="" disabled selected>Select Truck</option>
                            @foreach($trucks as $truck)
                            <option value="{{ $truck->truck_id }}">{{ $truck->reg_no }}</option>
                            @endforeach
                        </select>

                        <select name="driver_id" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="" disabled selected>Select Driver</option>
                            @foreach($drivers as $driver)
                            <option value="{{ $driver->driver_id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="date" name="start_date" class="p-2 border border-gray-300 rounded-lg w-full"
                        required />
                    <input type="date" name="end_date" class="p-2 border border-gray-300 rounded-lg w-full" required />

                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-3 px-6 rounded-lg font-semibold shadow-lg hover:from-blue-600 hover:to-teal-600">
                            Add Driver
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
function enableEdit(button) {
    const row = button.closest('tr');
    row.querySelectorAll('textarea, input').forEach(field => field.disabled = false); // Enable fields
    button.classList.add('hidden'); // Hide Edit button
    row.querySelector('.save-button').classList.remove('hidden'); // Show Save button
}

@if(session('success'))
Swal.fire({
    title: 'Success!',
    text: '{{ session('
    success ') }}',
    icon: 'success',
    confirmButtonText: 'OK',
    customClass: {
        confirmButton: 'swal2-confirm'
    }
});
@endif
</script>

<style>
.swal2-confirm {
    background-color: #1e40af;
    /* Equivalent to bg-blue-800 */
    color: white;
    border-radius: 0.375rem;
    /* Rounded-lg */
    padding: 0.625rem 1.25rem;
    /* px-5 py-2.5 */
    font-size: 0.875rem;
    /* text-sm */
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    /* Shadow-lg */
}

.swal2-confirm:hover {
    background-color: #2563eb;
    /* Equivalent to hover:bg-blue-700 */
}
</style>