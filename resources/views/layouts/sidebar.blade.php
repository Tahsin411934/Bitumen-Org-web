<!-- Sidebar toggle button -->
<div class="">
    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <!-- Sidebar -->
    <aside id="sidebar-multi-level-sidebar"
        class="fixed  top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
       
        <div class="h-full border-r border-gray-200 px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div class="flex flex-col items-center px-4 ">
                <!-- Sidebar content (e.g., links, logo) -->
            
                <!-- Logo -->
                <a href="/dashboard" class="mb-6">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            
                <!-- Search Bar -->
                <fieldset class=" mb-5 mx-auto space-y-1 dark:text-gray-800">
                    <label for="Search" class="sr-only">Search</label> <!-- Use sr-only for screen reader access -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-gray-800">
                                    <path d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z"></path>
                                </svg>
                            </button>
                        </span>
                        <input
                            type="search"
                            name="Search"
                            placeholder="Search..."
                            class="w-full sm:w-[95%] py-2 pl-10 text-sm rounded-md focus:outline-none dark:bg-gray-100 dark:text-gray-800 focus:dark:bg-gray-50 focus:dark:border-violet-600"
                        >
                    </div>
                </fieldset>
            </div>
            
            <ul class="space-y-2 font-medium">

                <!-- Dashboard -->
                <li>
                    <a href="/dashboard"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <!-- Products Dropdown -->
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-products" data-collapse-toggle="dropdown-products">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M21.447 6.106 13.447 2.106a3 3 0 0 0-2.894 0l-8 4A3 3 0 0 0 1 8.882v6.236a3 3 0 0 0 1.553 2.776l8 4A3 3 0 0 0 13 21v-6.236a1 1 0 0 1 .553-.894l8-4A3 3 0 0 0 23 8.882V8a3 3 0 0 0-1.553-2.776ZM3 8.882a1 1 0 0 1 .553-.894l8-4a1 1 0 0 1 .894 0l8 4a1 1 0 0 1 .553.894v.764L12 13.618 3 9.646v-.764Zm9 11.058a1 1 0 0 1-.447-.106l-8-4A1 1 0 0 1 3 15.118v-.764l8.553 3.973a3 3 0 0 0 2.894 0L20 14.354v.764a1 1 0 0 1-.553.894l-8 4a1 1 0 0 1-.447.106Z" />
                        </svg>


                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Products</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-products" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/products"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Show
                                Products</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-supplier" data-collapse-toggle="dropdown-supplier">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M20 8h-3V5a3 3 0 0 0-3-3H6a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h1v2a1 1 0 0 0 2 0v-2h4v2a1 1 0 0 0 2 0v-2h1a3 3 0 0 0 3-3v-4h2v2a1 1 0 0 0 2 0v-3a2 2 0 0 0-2-2Zm-15 7V5a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1Zm16-6h-2V8h2ZM8 6h6a1 1 0 0 1 0 2H8a1 1 0 0 1 0-2Z" />
                        </svg>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Supplier</span>
                        <svg class="w-3 h-3 transition-transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-supplier" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/suppliers"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Show
                                Supplier</a>
                        </li>
                    </ul>
                </li>

                <!-- Customers Section -->
                <li>
                    <a href="/customers"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-5.33 0-8 2.67-8 5a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1c0-2.33-2.67-5-8-5Z" />
                        </svg>

                        <span class="ms-3">Customers</span>
                    </a>
                </li>
                {{-- purchase --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-purchase" data-collapse-toggle="dropdown-purchase">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M7 4a1 1 0 0 0-1-1H4a1 1 0 1 0 0 2h1.22l1.356 6.78a4 4 0 1 0 4.923 4.213l6.085-.036a3.5 3.5 0 1 0 3.403-4.213l-10.15-.006L8.78 4H7Zm2.49 7 .322 1.61a4 4 0 0 0-.812-.1 4 4 0 0 0-.734.07L7.1 11H9.49ZM17 18.5a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 17 18.5ZM8.5 16A1.5 1.5 0 1 1 7 14.5 1.5 1.5 0 0 1 8.5 16Z" />
                        </svg>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Purchase</span>
                        <svg class="w-3 h-3 transition-transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-purchase" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/inventory-ledger"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Inventory Ledger</a>
                        </li>
                        <li>
                            <a href="/inventories"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Inventories</a>
                        </li>
                        <!-- Additional purchase related links can be added here -->
                        <li>
                            <a href="/purchases/create"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Add
                                Purchase</a>
                        </li>
                        {{-- <li>
            <a href="/purchase-history"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Purchase
                History</a>
        </li> --}}
                    </ul>
                </li>
                {{-- sales --}}


                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-orders" data-collapse-toggle="dropdown-orders">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M5 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5Zm0 2h14v16H5V4Zm3 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm-1 5a1 1 0 0 1 1-1h10a1 1 0 1 1 0 2H8a1 1 0 0 1-1-1Zm1 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" />
                        </svg>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Orders</span>
                        <svg class="w-3 h-3 transition-transform" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-orders" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/pendingOrder"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                Panding Orders</a>
                        </li>
                        <li>
                            <a href="/orders"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                Sales Order View</a>
                        </li>
                        <li>
                            <a href="/orders/create"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create
                                New Order</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-challan" data-collapse-toggle="dropdown-challan">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 8h-2V7a5 5 0 0 0-10 0v1H6a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h3a3 3 0 0 0 6 0h4a3 3 0 0 0 6 0h1a1 1 0 0 0 1-1V10a2 2 0 0 0-2-2ZM9 7a3 3 0 0 1 6 0v1H9Zm3 12.5a1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 0 1-3 0ZM5 18v-6h14v6Z"/>
                          </svg>
                          

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Manage Challan</span>
                        <svg class="w-3 h-3 transition-transform" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-challan" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/challanCreate"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                Create direct Challan</a>
                        </li>
                        <li>
                            <a href="/challans"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">View
                                Trucks</a>
                        </li>
                        <li>
                            <a href="/challans/create"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Add
                                Drivers</a>
                        </li>
                    </ul>
                </li>

                <li>
    <button type="button"
        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        aria-controls="dropdown-vehicle" data-collapse-toggle="dropdown-vehicle">
        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M18 7c-1.1 0-2 .9-2 2v5c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2H9v2H8c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2H9v2H8c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2H9v2H8c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2H9v2H8c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2H9v2H8c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2H9v2H8c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2H9v2H8c-1.1 0-2-.9-2-2V9c0-1.1-.9-2-2-2h1V5h14v2h1c1.1 0 2 .9 2 2v5c0 1.1-.9 2-2 2h-1v2h-2v-2h-1c0 1.1-.9 2-2 2h-2c-1.1 0-2-.9-2-2h-1v-2h1z"></path>
        </svg>
        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Vehicle Management</span>
        <svg class="w-3 h-3 transition-transform" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <ul id="dropdown-vehicle" class="hidden py-2 space-y-2">
        <li>
            <a href="/view_trucks"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">View
                TRUCK</a>
        </li>
        <li>
            <a href="/drivers"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Add
                Driver</a>
        </li>
        <li>
            <a href="/drivertrucks"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Assign Truck
                Driver</a>
        </li>
        <li>
            <a href="/filter-usage"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">filter usage
                </a>
        </li>
        <li>
            <a href="/fuelusage"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Fuel usage
                </a>
        </li>
        <li>
            <a href="/mobile-usage"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mobil usage
                </a>
        </li>
        <li>
            <a href="/vehicles/reports"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Vehicle
                Reports</a>
        </li>
        <li>
            <a href="/expenditures"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Expenditures
                </a>
        </li>
        <li>
            <a href="/waybills"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">waybill
                </a>
        </li>
    </ul>
</li>





            </ul>
        </div>
    </aside>

    <script>
        document.querySelectorAll('[data-collapse-toggle]').forEach((button) => {
            button.addEventListener('click', (e) => {
                const targetId = button.getAttribute('aria-controls');
                const targetEl = document.getElementById(targetId);

                if (targetEl.classList.contains('hidden')) {
                    targetEl.classList.remove('hidden');
                    button.setAttribute('aria-expanded', 'true');
                } else {
                    targetEl.classList.add('hidden');
                    button.setAttribute('aria-expanded', 'false');
                }
            });
        });
    </script>
</div>
