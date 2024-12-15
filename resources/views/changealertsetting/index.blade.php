<x-app-layout>
    <div class="mx-auto w-[98%] ">
        <div class="flex justify-between items-center w-[96%] mx-auto my-8">
            <h1 class="text-2xl font-bold">Change Alert Settings</h1>
            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add Setting
            </button>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-8 w-full overflow-x-auto">
            <!-- DataTable -->
            <table id="example" class="display w-full">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Duration</th>
                        <th>UOM</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($changeAlertSettings as $setting)
                    <tr>
                        <form action="{{ route('alert-settings.update', $setting->id) }}" method="POST" class="update-form">
                            @csrf
                            @method('PUT')
                            <td>
                                <input type="text" name="item" value="{{ $setting->item }}" 
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td>
                                <input type="number" name="duration" value="{{ $setting->duration }}" 
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td>
                                <input type="text" name="uom" value="{{ $setting->uom }}" 
                                    class="w-full border border-gray-300 rounded px-2 py-1" disabled />
                            </td>
                            <td class="flex space-x-2">
                                <button type="button" onclick="enableEdit(this)"
                                    class="bg-blue-900 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button type="submit"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 hidden save-button">Save</button>
                            </form>
                            <form action="{{ route('alert-settings.destroy', $setting->id) }}" method="POST" class="inline">
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

    <!-- Add Setting Modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center">
        <div class="relative w-full max-w-2xl mx-auto p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal Header -->
                <div class="flex justify-between items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add Change Alert Setting</h3>
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
                <form action="{{ route('alert-settings.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <input type="text" name="item" 
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full" placeholder="Item">
                        <input type="number" name="duration" 
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full" placeholder="Duration">
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <input type="text" name="uom" 
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full" placeholder="UOM">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-3 px-6 rounded-lg font-semibold shadow-lg hover:from-blue-600 hover:to-teal-600">Add
                            Setting</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function enableEdit(button) {
        const row = button.closest('tr');
        row.querySelectorAll('textarea, select, input').forEach(field => field.disabled = false); // Enable fields
        button.classList.add('hidden'); // Hide the Edit button
        row.querySelector('.save-button').classList.remove('hidden'); // Show the Save button
    }
</script>

<script>
    @if (session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300'
            }
        });
    @endif
</script>

<style>
    .swal2-confirm {
        @apply bg-blue-800 text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300;
    }
</style>
