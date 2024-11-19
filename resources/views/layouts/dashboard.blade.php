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

    @include('sweetalert::alert')
    @stack('script')
</body>

</html>
