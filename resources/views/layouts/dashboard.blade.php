<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('style')
    <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
    <script>
        // LOADING
        function onReady(callback) {
            let intervalId = window.setInterval(function() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
                window.clearInterval(intervalId);
                    callback.call(this);
                }
            }, 300);
        }

        function setVisible(selector, visible) {
            document.querySelector(selector).style.display = visible ? 'block' : 'none';
        }

        onReady(function() {
            setVisible('#app', true);
            setVisible('#loading', false);
        });
    </script>
</head>

<body>
    <div id="loading" class="w-full h-full fixed inset-0 z-[99999] bg-white bg-opacity-50 backdrop-blur-xl grid place-items-center">
        <span class="loader"></span>
    </div>
    {{--  --}}
    <div id="app">
        <div class="flex h-screen overflow-hidden">
            {{-- SIDEBAR --}}
            <div class="min-w-fit">
                {{-- SIDEBAR CLOSER --}}
                <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200 opacity-0 pointer-events-none" aria-hidden="true"></div>
                {{-- SIDEBAR CONTENT --}}
                <div id="sidebar" class="flex lg:!flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-white p-4 transition-all duration-200 ease-in-out -translate-x-64 shadow-sm">
                    <div class="flex justify-between mb-10 pr-3 sm:px-2">
                        <button class="lg:hidden text-gray-500 hover:text-gray-400" aria-controls="sidebar" aria-expanded="false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
                            </svg>
                        </button>
                        <a aria-current="page" class="block active" href="/">
                            <svg class="fill-violet-500" xmlns="http://www.w3.org/2000/svg" width="32" height="32">
                                <path d="M31.956 14.8C31.372 6.92 25.08.628 17.2.044V5.76a9.04 9.04 0 0 0 9.04 9.04h5.716ZM14.8 26.24v5.716C6.92 31.372.63 25.08.044 17.2H5.76a9.04 9.04 0 0 1 9.04 9.04Zm11.44-9.04h5.716c-.584 7.88-6.876 14.172-14.756 14.756V26.24a9.04 9.04 0 0 1 9.04-9.04ZM.044 14.8C.63 6.92 6.92.628 14.8.044V5.76a9.04 9.04 0 0 1-9.04 9.04H.044Z"></path>
                            </svg>
                        </a>
                    </div>
                    {{-- SIDEBAR --}}
                    @include('partials.sidebar')
                </div>
            </div>
            {{-- MAIN CONTENT --}}
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden bg-gray-500">
                <header class="sticky top-0 before:absolute before:inset-0 before:backdrop-blur-md max-lg:before:bg-white/90 before:-z-10 z-30 max-lg:shadow-sm lg:before:bg-gray-100/90">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between h-16 lg:border-b border-gray-200">
                            <div class="flex">
                                <button class="text-gray-500 hover:text-gray-600 lg:hidden" aria-controls="sidebar" aria-expanded="false">
                                    <span class="sr-only">Open sidebar</span>
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4" y="5" width="16" height="2"></rect>
                                        <rect x="4" y="11" width="16" height="2"></rect>
                                        <rect x="4" y="17" width="16" height="2"></rect>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div><button
                                        class="w-8 h-8 flex items-center justify-center hover:bg-gray-100 lg:hover:bg-gray-200 rounded-full ml-3 false"
                                        aria-controls="search-modal"><span class="sr-only">Search</span><svg
                                            class="fill-current text-gray-500/80/80" width="16"
                                            height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7ZM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5Z">
                                            </path>
                                            <path
                                                d="m13.314 11.9 2.393 2.393a.999.999 0 1 1-1.414 1.414L11.9 13.314a8.019 8.019 0 0 0 1.414-1.414Z">
                                            </path>
                                        </svg></button>
                                    <div class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
                                        aria-hidden="true" style="display: none;"></div>
                                    <div id="search-modal"
                                        class="fixed inset-0 z-50 overflow-hidden flex items-start top-20 mb-4 justify-center px-4 sm:px-6"
                                        role="dialog" aria-modal="true" style="display: none;">
                                        <div
                                            class="bg-white border border-transparent overflow-auto max-w-2xl w-full max-h-full rounded-lg shadow-lg">
                                            <form class="border-b border-gray-200">
                                                <div class="relative"><label for="search"
                                                        class="sr-only">Search</label><input id="search"
                                                        class="w-full bg-white border-0 focus:ring-transparent placeholder-gray-400 appearance-none py-3 pl-10 pr-4"
                                                        type="search" placeholder="Search Anything…"><button
                                                        class="absolute inset-0 right-auto group" type="submit"
                                                        aria-label="Search"><svg
                                                            class="shrink-0 fill-current text-gray-400 group-hover:text-gray-500 ml-4 mr-2"
                                                            width="16" height="16" viewBox="0 0 16 16"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z">
                                                            </path>
                                                            <path
                                                                d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z">
                                                            </path>
                                                        </svg></button></div>
                                            </form>
                                            <div class="py-4 px-2">
                                                <div class="mb-3 last:mb-0">
                                                    <div
                                                        class="text-xs font-semibold text-gray-400 uppercase px-2 mb-2">
                                                        Recent searches</div>
                                                    <ul class="text-sm">
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z">
                                                                    </path>
                                                                </svg><span>Form Builder - 23 hours on-demand
                                                                    video</span></a></li>
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z">
                                                                    </path>
                                                                </svg><span>Access Mosaic on mobile and TV</span></a></li>
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z">
                                                                    </path>
                                                                </svg><span>Product Update - Q4 2024</span></a></li>
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z">
                                                                    </path>
                                                                </svg><span>Master Digital Marketing Strategy
                                                                    course</span></a></li>
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z">
                                                                    </path>
                                                                </svg><span>Dedicated forms for products</span></a></li>
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z">
                                                                    </path>
                                                                </svg><span>Product Update - Q4 2024</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="mb-3 last:mb-0">
                                                    <div
                                                        class="text-xs font-semibold text-gray-400 uppercase px-2 mb-2">
                                                        Recent pages</div>
                                                    <ul class="text-sm">
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z">
                                                                    </path>
                                                                </svg><span><span class="font-medium">Messages</span> -
                                                                    <span
                                                                        class="text-gray-600">Conversation
                                                                        / … / Mike Mills</span></span></a></li>
                                                        <li><a class="flex items-center p-2 text-gray-800 hover:bg-gray-100 rounded-lg"
                                                                href="/#0"><svg
                                                                    class="fill-current text-gray-400 shrink-0 mr-3"
                                                                    width="16" height="16" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M14 0H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h8l5-5V1c0-.6-.4-1-1-1zM3 2h10v8H9v4H3V2z">
                                                                    </path>
                                                                </svg><span><span class="font-medium">Messages</span> -
                                                                    <span
                                                                        class="text-gray-600">Conversation
                                                                        / … / Eva Patrick</span></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative inline-flex"><button
                                        class="w-8 h-8 flex items-center justify-center hover:bg-gray-100 lg:hover:bg-gray-200 rounded-full false"
                                        aria-haspopup="true" aria-expanded="false"><span
                                            class="sr-only">Notifications</span><svg
                                            class="fill-current text-gray-500/80/80" width="16"
                                            height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 0a7 7 0 0 0-7 7c0 1.202.308 2.33.84 3.316l-.789 2.368a1 1 0 0 0 1.265 1.265l2.595-.865a1 1 0 0 0-.632-1.898l-.698.233.3-.9a1 1 0 0 0-.104-.85A4.97 4.97 0 0 1 2 7a5 5 0 0 1 5-5 4.99 4.99 0 0 1 4.093 2.135 1 1 0 1 0 1.638-1.148A6.99 6.99 0 0 0 7 0Z">
                                            </path>
                                            <path
                                                d="M11 6a5 5 0 0 0 0 10c.807 0 1.567-.194 2.24-.533l1.444.482a1 1 0 0 0 1.265-1.265l-.482-1.444A4.962 4.962 0 0 0 16 11a5 5 0 0 0-5-5Zm-3 5a3 3 0 0 1 6 0c0 .588-.171 1.134-.466 1.6a1 1 0 0 0-.115.82 1 1 0 0 0-.82.114A2.973 2.973 0 0 1 11 14a3 3 0 0 1-3-3Z">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-gray-100 rounded-full">
                                        </div>
                                    </button>
                                    <div class="origin-top-right z-10 absolute top-full -mr-48 sm:mr-0 min-w-80 bg-white border border-gray-200 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1 right-0"
                                        style="display: none;">
                                        <div>
                                            <div
                                                class="text-xs font-semibold text-gray-400 uppercase pt-1.5 pb-2 px-4">
                                                Notifications</div>
                                            <ul>
                                                <li class="border-b border-gray-200 last:border-0">
                                                    <a class="block py-2 px-4 hover:bg-gray-50"
                                                        href="/#0"><span class="block text-sm mb-2">📣 <span
                                                                class="font-medium text-gray-800">Edit
                                                                your information in a swipe</span> Sint occaecat cupidatat
                                                            non proident, sunt in culpa qui officia deserunt mollit
                                                            anim.</span><span
                                                            class="block text-xs font-medium text-gray-400">Feb
                                                            12, 2024</span></a></li>
                                                <li class="border-b border-gray-200 last:border-0">
                                                    <a class="block py-2 px-4 hover:bg-gray-50"
                                                        href="/#0"><span class="block text-sm mb-2">📣 <span
                                                                class="font-medium text-gray-800">Edit
                                                                your information in a swipe</span> Sint occaecat cupidatat
                                                            non proident, sunt in culpa qui officia deserunt mollit
                                                            anim.</span><span
                                                            class="block text-xs font-medium text-gray-400">Feb
                                                            9, 2024</span></a></li>
                                                <li class="border-b border-gray-200 last:border-0">
                                                    <a class="block py-2 px-4 hover:bg-gray-50"
                                                        href="/#0"><span class="block text-sm mb-2">🚀<span
                                                                class="font-medium text-gray-800">Say
                                                                goodbye to paper receipts!</span> Sint occaecat cupidatat
                                                            non proident, sunt in culpa qui officia deserunt mollit
                                                            anim.</span><span
                                                            class="block text-xs font-medium text-gray-400">Jan
                                                            24, 2024</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative inline-flex"><button
                                        class="w-8 h-8 flex items-center justify-center hover:bg-gray-100 lg:hover:bg-gray-200 rounded-full false"
                                        aria-haspopup="true" aria-expanded="false"><span class="sr-only">Need
                                            help?</span><svg class="fill-current text-gray-500/80/80"
                                            width="16" height="16" viewBox="0 0 16 16"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 7.5a1 1 0 1 0-2 0v4a1 1 0 1 0 2 0v-4ZM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm6-8A6 6 0 1 1 2 8a6 6 0 0 1 12 0Z">
                                            </path>
                                        </svg></button>
                                    <div class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-gray-200 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1 right-0"
                                        style="display: none;">
                                        <div>
                                            <div
                                                class="text-xs font-semibold text-gray-400 uppercase pt-1.5 pb-2 px-3">
                                                Need help?</div>
                                            <ul>
                                                <li><a class="font-medium text-sm text-violet-500 hover:text-violet-600 flex items-center py-1 px-3"
                                                        href="/#0"><svg
                                                            class="w-3 h-3 fill-current text-violet-500 shrink-0 mr-2"
                                                            viewBox="0 0 12 12">
                                                            <rect y="3" width="12" height="9" rx="1">
                                                            </rect>
                                                            <path d="M2 0h8v2H2z"></path>
                                                        </svg><span>Documentation</span></a></li>
                                                <li><a class="font-medium text-sm text-violet-500 hover:text-violet-600 flex items-center py-1 px-3"
                                                        href="/#0"><svg
                                                            class="w-3 h-3 fill-current text-violet-500 shrink-0 mr-2"
                                                            viewBox="0 0 12 12">
                                                            <path
                                                                d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z">
                                                            </path>
                                                        </svg><span>Support Site</span></a></li>
                                                <li><a class="font-medium text-sm text-violet-500 hover:text-violet-600 flex items-center py-1 px-3"
                                                        href="/#0"><svg
                                                            class="w-3 h-3 fill-current text-violet-500 shrink-0 mr-2"
                                                            viewBox="0 0 12 12">
                                                            <path
                                                                d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z">
                                                            </path>
                                                        </svg><span>Contact us</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div><input type="checkbox" name="light-switch" id="light-switch"
                                        class="light-switch sr-only" checked=""><label
                                        class="flex items-center justify-center cursor-pointer w-8 h-8 hover:bg-gray-100 lg:hover:bg-gray-200 rounded-full"
                                        for="light-switch"><svg
                                            class="dark:hidden fill-current text-gray-500/80/80"
                                            width="16" height="16" viewBox="0 0 16 16"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0a1 1 0 0 1 1 1v.5a1 1 0 1 1-2 0V1a1 1 0 0 1 1-1Z"></path>
                                            <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0Zm-4 2a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z">
                                            </path>
                                            <path
                                                d="M13.657 3.757a1 1 0 0 0-1.414-1.414l-.354.354a1 1 0 0 0 1.414 1.414l.354-.354ZM13.5 8a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2h-.5a1 1 0 0 1-1-1ZM13.303 11.889a1 1 0 0 0-1.414 1.414l.354.354a1 1 0 0 0 1.414-1.414l-.354-.354ZM8 13.5a1 1 0 0 1 1 1v.5a1 1 0 1 1-2 0v-.5a1 1 0 0 1 1-1ZM4.111 13.303a1 1 0 1 0-1.414-1.414l-.354.354a1 1 0 1 0 1.414 1.414l.354-.354ZM0 8a1 1 0 0 1 1-1h.5a1 1 0 0 1 0 2H1a1 1 0 0 1-1-1ZM3.757 2.343a1 1 0 1 0-1.414 1.414l.354.354A1 1 0 1 0 4.11 2.697l-.354-.354Z">
                                            </path>
                                        </svg><svg
                                            class="hidden dark:block fill-current text-gray-500/80/80"
                                            width="16" height="16" viewBox="0 0 16 16"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.875 4.375a.625.625 0 1 0 1.25 0c.001-.69.56-1.249 1.25-1.25a.625.625 0 1 0 0-1.25 1.252 1.252 0 0 1-1.25-1.25.625.625 0 1 0-1.25 0 1.252 1.252 0 0 1-1.25 1.25.625.625 0 1 0 0 1.25c.69.001 1.249.56 1.25 1.25Z">
                                            </path>
                                            <path
                                                d="M7.019 1.985a1.55 1.55 0 0 0-.483-1.36 1.44 1.44 0 0 0-1.53-.277C2.056 1.553 0 4.5 0 7.9 0 12.352 3.648 16 8.1 16c3.407 0 6.246-2.058 7.51-4.963a1.446 1.446 0 0 0-.25-1.55 1.554 1.554 0 0 0-1.372-.502c-4.01.552-7.539-2.987-6.97-7ZM2 7.9C2 5.64 3.193 3.664 4.961 2.6 4.82 7.245 8.72 11.158 13.36 11.04 12.265 12.822 10.341 14 8.1 14 4.752 14 2 11.248 2 7.9Z">
                                            </path>
                                        </svg><span class="sr-only">Switch to light / dark version</span></label></div>
                                <hr class="w-px h-6 bg-gray-200/60 border-none">
                                <div class="relative inline-flex"><button
                                        class="inline-flex justify-center items-center group" aria-haspopup="true"
                                        aria-expanded="false"><img class="w-8 h-8 rounded-full"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAIAAAAlC+aJAAAD/ElEQVR4Ae2axXorRxCFq+by3VyT2NkENTecrC4zMz5A3sIw3mUXfoLQNsywCTOzMSiIhWZ7ZrpSU25NmGFGX/p8UneV8Pzq023E63edg3aWBVHIABgAA2AADIABMAAGwAAYAANw9VU39HTbbQzgurNbNvdv2zKQ6LHbEqBYfAsBerrz27b0b98mGO0FUG+MLi42AJFrdr9je//OHYPJhN1Om7hQehuImCEYAZOJ/M4dA7t2DqaSdnsAFEtvE0+BeQwmaVLJ/O5dA3v2CEbMASqVjzxvQawHEAKCXLJSCXvvnoF9+5x0yo4vgFJe+dv3CMQ4sAQkkCwIYipx2b59gwcOCEYMAeQselPME0tAQNTaGNJzqA4eHDx4yMmk7dgBlMvvKd+TJcBl51oUVrpIJ/OHDg0ePuxkMnaMAFxvfrL6MZBsgnA/i3QlM2kezKTzR444R486WcGIGkBUKLzV8qgllUzCxQPKLuFeWuJFOHp08NhxJ5u1owcold5CvY918kH6oAmF4UCo78dcxj5xwuFLLmdHCTC/0KjVRmUF9L5FSZNuxDFJp4VIROHj2f3Jk0OnTju9ghEBAKtQfDtcAVG4CsGgG11ryp88PpfdyAxnzg719m6MAqDwpvgKP2nkWawShkAo+QlZfunxuWz+7Fnn7PmhC/4Yxkr4h6SIFmZ5EPlKEciVS1KuxyVXvk++y6PyPd/3lL64ynU9Hj3X95Y8d8lnGG/F1wsrp8H6DwHSqesBqJVsZCJEUhRwoGUBIykgkHv0GMzyYFkTIrmbrX+zsPJFz/oKRP8dQCp5HeiDkidFSodFWEhnXbWSREIgt+IyE+IifDFjPb+04ssINvHaNR2dnRcF7nTukaVDjhZpKtAi7Tx8+IL/RWXprpq6dwm/d/+frkA6dR0p0oenUmISpBNJQlQAoS+Ss4Bj1p2oTD87701AqIgArkcLKYi5nJhIIsGAAAmxFSENB7OL46Xa07NL4yCKEmDVynXdnbYEwyImQFRilIH0kW9ZchgBWgA+TM+PFSaf4BFE0QMkE1ezRUAdaH2qy74Ux0ra4NqcHv2q9PjU7Gi8vp1OZ663GACAlAq//xEICb5lcd+YHvlo5PaPxu7Q7uMDYFkrE91XinVAxiC9AgIRDI2p4Xc+vvm9T29tzIzAzxV5hHq6L1+1ar18/CTBRzn1iYHqzeHRiYfqzc8gVOwA5ADFIOcKEclXgMCqNYdHxh6sNbT1WANkUtcSkYW4nKdK7dOR0Qeq9U9BFHeAjo6LV6/pANFk9dOR4ftD620BIN/AIVYqnwyP3F+taevtBLB69fpXXrmxItajkvl/IQNgAAyAATAABsAAGAADYAD+vwDfAQSHHlNp5b1mAAAAAElFTkSuQmCC"
                                            width="32" height="32" alt="User">
                                        <div class="flex items-center truncate"><span
                                                class="truncate ml-2 text-sm font-medium text-gray-600 group-hover:text-gray-800 dark:group-hover:text-white">Acme
                                                Inc.</span><svg
                                                class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400"
                                                viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                            </svg></div>
                                    </button>
                                    <div class="origin-top-right z-10 absolute top-full min-w-44 bg-white border border-gray-200 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1 right-0"
                                        style="display: none;">
                                        <div>
                                            <div
                                                class="pt-0.5 pb-2 px-3 mb-1 border-b border-gray-200">
                                                <div class="font-medium text-gray-800">Acme Inc.</div>
                                                <div class="text-xs text-gray-500 italic">Administrator
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a class="font-medium text-sm text-violet-500 hover:text-violet-600 flex items-center py-1 px-3"
                                                        href="/settings">Settings</a></li>
                                                <li><a class="font-medium text-sm text-violet-500 hover:text-violet-600 flex items-center py-1 px-3"
                                                        href="/signin">Sign Out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="grow bg-gray-100">
                    @yield('content')
                </main>
                {{-- BOTTOM MODAL --}}
                <div class="fixed bottom-0 right-0 w-full md:bottom-8 md:right-12 md:w-auto z-50">
                    <div class="bg-gray-800 border border-transparent text-gray-50 text-sm p-3 md:rounded shadow-lg flex justify-between">
                        <div class="text-gray-500 inline-flex">
                            <a class="font-medium hover:underline text-gray-50" href="https://github.com/cruip/laravel-tailwindcss-admin-dashboard-template" target="_blank" rel="noreferrer">Download<span class="hidden sm:inline"> on GitHub</span></a> 
                            <span class="italic px-1.5">or</span>
                            <a class="font-medium hover:underline text-emerald-400" href="https://cruip.com/mosaic/" target="_blank" rel="noreferrer">Check Premium Version</a>
                        </div>
                        <button class="text-gray-500 hover:text-gray-400 pl-2 ml-3 border-l border-gray-700/60">
                            <span class="sr-only">Close</span><svg class="w-4 h-4 shrink-0 fill-current" viewBox="0 0 16 16">
                                <path d="M12.72 3.293a1 1 0 00-1.415 0L8.012 6.586 4.72 3.293a1 1 0 00-1.414 1.414L6.598 8l-3.293 3.293a1 1 0 101.414 1.414l3.293-3.293 3.293 3.293a1 1 0 001.414-1.414L9.426 8l3.293-3.293a1 1 0 000-1.414z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('script')
</body>

</html>
