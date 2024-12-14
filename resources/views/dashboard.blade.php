<x-app-layout>
    

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Dashboard Overview</h1>
    <div class="w-[95%] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Products -->
        <div class="flex items-center p-6 bg-gray-700 rounded-lg shadow-md">
            <div class="text-indigo-800 text-4xl mr-4">📦</div>
            <div>
                <h2 class="text-2xl font-semibold text-white">{{ $totalProducts }}</h2>
                <p class="text-lg text-white">Total Products</p>
            </div>
        </div>
        <!-- Total Suppliers -->
        <div class="flex items-center p-6 bg-gray-700 rounded-lg shadow-md">
            <div class="text-teal-800 text-4xl mr-4 ">🏢</div>
            <div>
                <h2 class="text-2xl font-semibold text-white">{{ $totalSuppliers }}</h2>
                <p class="text-lg text-white">Total Suppliers</p>
            </div>
        </div>
        <!-- Total Customers -->
        <div class="flex items-center p-6 bg-gray-700 rounded-lg shadow-md">
            <div class="text-pink-800 text-4xl mr-4">👥</div>
            <div>
                <h2 class="text-2xl font-semibold text-white">{{ $totalCustomers }}</h2>
                <p class="text-lg text-white">Total Customers</p>
            </div>
        </div>
        <!-- Total Orders -->
        <div class="flex items-center p-6 bg-gray-700 rounded-lg shadow-md">
            <div class="text-yellow-800 text-4xl mr-4">🛒</div>
            <div>
                <h2 class="text-2xl font-semibold text-white">{{ $totalOrders }}</h2>
                <p class="text-lg text-white">Total Orders</p>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
