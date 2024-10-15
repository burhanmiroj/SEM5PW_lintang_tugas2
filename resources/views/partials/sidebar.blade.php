<div class="space-y-8">
    <div>
        <h3 class="text-xs uppercase text-gray-400 font-semibold pl-3"><span
                class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                aria-hidden="true">•••</span><span
                class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span></h3>
        <ul class="mt-3">
            {{-- SINGLE LIST --}}
            <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] false">
                <a href="{{ route('dashboard') }}" class="block {{ request()->routeIs('dashboard') ? 'text-blue-500 hover:text-blue-600' : 'text-gray-800 hover:text-gray-700' }} truncate transition duration-150">
                    <div class="flex items-center">
                        <iconify-icon icon="iconamoon:category" class="text-lg"></iconify-icon>
                        <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                    </div>
                </a>
            </li>
            {{-- SINGLE LIST --}}
            <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] false">
                <a href="{{ route('skincare-category.index') }}" class="block {{ request()->routeIs('skincare-category.*') ? 'text-blue-500 hover:text-blue-600' : 'text-gray-800 hover:text-gray-700' }} truncate transition duration-150">
                    <div class="flex items-center">
                        <iconify-icon icon="material-symbols:category-search-outline-rounded" class="text-lg"></iconify-icon>
                        <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kategori Skincare</span>
                    </div>
                </a>
            </li>
            {{-- SINGLE LIST --}}
            <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] false">
                <a href="{{ route('skincare.index') }}" class="block {{ request()->routeIs('skincare.*') ? 'text-blue-500 hover:text-blue-600' : 'text-gray-800 hover:text-gray-700' }} truncate transition duration-150">
                    <div class="flex items-center justify-between">
                        <div class="grow flex items-center">
                            <iconify-icon icon="iconoir:healthcare" class="text-lg"></iconify-icon>
                            <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Data Skincare</span>
                        </div>
                        <div class="flex flex-shrink-0 ml-2">
                            <span class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-violet-400 px-2 rounded">4</span>
                        </div>
                    </div>
                </a>
            </li>
            {{-- <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] false">
                <a href="#0"
                    class="block text-gray-800 truncate transition duration-150 hover:text-gray-900">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center"><svg
                                class="shrink-0 fill-current text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16">
                                <path
                                    d="M10.5 1a3.502 3.502 0 0 1 3.355 2.5H15a1 1 0 1 1 0 2h-1.145a3.502 3.502 0 0 1-6.71 0H1a1 1 0 0 1 0-2h6.145A3.502 3.502 0 0 1 10.5 1ZM9 4.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM5.5 9a3.502 3.502 0 0 1 3.355 2.5H15a1 1 0 1 1 0 2H8.855a3.502 3.502 0 0 1-6.71 0H1a1 1 0 1 1 0-2h1.145A3.502 3.502 0 0 1 5.5 9ZM4 12.5a1.5 1.5 0 1 0 3 0 1.5 1.5 0 0 0-3 0Z"
                                    fill-rule="evenodd"></path>
                            </svg><span
                                class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Settings</span>
                        </div>
                        <div class="flex shrink-0 ml-2"><svg
                                class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 false"
                                viewBox="0 0 12 12">
                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                            </svg></div>
                    </div>
                </a>
                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                    <ul class="pl-8 mt-1 hidden">
                        <li class="mb-1 last:mb-0"><a
                                class="block transition duration-150 truncate text-gray-500/90 hover:text-gray-700"
                                href="https://cruip.com/mosaic/"><span
                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                    Account</span></a></li>
                        <li class="mb-1 last:mb-0"><a
                                class="block transition duration-150 truncate text-gray-500/90 hover:text-gray-700"
                                href="https://cruip.com/mosaic/"><span
                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                    Notifications</span></a></li>
                        <li class="mb-1 last:mb-0"><a
                                class="block transition duration-150 truncate text-gray-500/90 hover:text-gray-700"
                                href="https://cruip.com/mosaic/"><span
                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Connected
                                    Apps</span></a></li>
                        <li class="mb-1 last:mb-0"><a
                                class="block transition duration-150 truncate text-gray-500/90 hover:text-gray-700"
                                href="https://cruip.com/mosaic/"><span
                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Plans</span></a>
                        </li>
                        <li class="mb-1 last:mb-0"><a
                                class="block transition duration-150 truncate text-gray-500/90 hover:text-gray-700"
                                href="https://cruip.com/mosaic/"><span
                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Billing
                                    &amp; Invoices</span></a></li>
                        <li class="mb-1 last:mb-0"><a
                                class="block transition duration-150 truncate text-gray-500/90 hover:text-gray-700"
                                href="https://cruip.com/mosaic/"><span
                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Give
                                    Feedback</span></a></li>
                    </ul>
                </div>
            </li> --}}
        </ul>
    </div>
</div>