<div class="bg-white">

    <header class="relative z-10">
        <nav aria-label="Top">
            <!-- Top navigation -->
            <div class="bg-gray-900">
                <div class="mx-auto flex h-10 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                    <!-- Currency selector -->
                    <form class="hidden lg:block lg:flex-1">
                        <div class="flex">
                            <label for="desktop-currency" class="sr-only">Currency</label>
                            <div
                                class="group relative -ml-2 rounded-md border-transparent bg-gray-900 focus-within:ring-2 focus-within:ring-white">
                                <select id="desktop-currency" name="currency"
                                    class="flex items-center rounded-md border-transparent bg-gray-900 bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-white focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-100">
                                    <option>IDR</option>
                                    <option>USD</option>
                                    <option>AUD</option>
                                    <option>EUR</option>
                                    <option>GBP</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                                    <svg class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>


                    @guest
                    <div
                        class="flex w-full lg:w-fit justify-end lg:flex-1 gap-4 lg:gap-0 lg:items-center lg:justify-end lg:space-x-6">
                        <a href="/register" wire:navigate
                            class="text-sm cursor-pointer font-medium text-white hover:text-gray-100">Buat akun baru</a>
                        <span class="h-6 w-px bg-gray-600" aria-hidden="true"></span>
                        <a href="/login" wire:navigate
                            class="text-sm cursor-pointer font-medium text-white hover:text-gray-100">Login</a>
                    </div>
                    @endguest
                </div>
            </div>

            <!-- Secondary navigation -->
            <div class="bg-white">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="border-b border-gray-200">
                        <div class="flex h-16 items-center justify-between">
                            <!-- Logo (lg+) -->
                            <div class="flex lg:items-center">
                                <a href="/" class="cursor-pointer" wire:navigate>
                                    <span class="sr-only">Market</span>
                                    <img class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                                </a>
                            </div>

                            <div class="h-full flex">
                                <!-- Mega menus -->
                                <div class="ml-8">
                                    <div class="flex h-full justify-center space-x-8">

                                        <a href="/" wire:navigate
                                            class="flex cursor-pointer items-center {{ request()->routeIs('home') ? 'border-indigo-600 text-indigo-600': 'border-transparent text-gray-700 hover:text-gray-800' }} text-sm font-medium">Beranda</a>
                                        <a href="/produk" wire:navigate
                                            class="flex  cursor-pointer items-center {{ request()->routeIs('produk') ? 'border-indigo-600 text-indigo-600': 'border-transparent text-gray-700 hover:text-gray-800' }} text-sm font-medium ">Produk</a>
                                    </div>
                                </div>
                            </div>




                            <div class="flex flex-1 items-center justify-end">
                                <div class="flex items-center lg:ml-8">
                                    <div class="flex space-x-8">
                                        <div class="flex">
                                            <button id="openSearch"
                                                class="-m-2 p-2 cursor-pointer text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Search</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                </svg>
                                            </button>
                                        </div>

                                        @auth
                                        <div class="flex relative group">
                                            <button id="dropdownToggle"
                                                class="-m-2 p-2 cursor-pointer {{ request()->routeIs('akun') ? 'text-indigo-600': 'text-gray-400 hover:text-gray-500' }}">
                                                <span class="sr-only">Account</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg>
                                            </button>

                                            <ul id="dropdownMenu"
                                                class='absolute hidden group-hover:block top-8 left-[50%] -translate-x-1/2 shadow-lg bg-white py-2 z-[1000] min-w-full w-max rounded-lg max-h-96 overflow-auto'>
                                                <li class='py-2.5 px-5 flex items-center text-[#333] text-sm'>
                                                    <p class="font-medium text-md">Rosyamdani</p>
                                                </li>
                                                <li class="border border-b"></li>
                                                <li
                                                    class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="w-4 h-4 mr-3" viewBox="0 0 512 512">
                                                        <path
                                                            d="M337.711 241.3a16 16 0 0 0-11.461 3.988c-18.739 16.561-43.688 25.682-70.25 25.682s-51.511-9.121-70.25-25.683a16.007 16.007 0 0 0-11.461-3.988c-78.926 4.274-140.752 63.672-140.752 135.224v107.152C33.537 499.293 46.9 512 63.332 512h385.336c16.429 0 29.8-12.707 29.8-28.325V376.523c-.005-71.552-61.831-130.95-140.757-135.223zM446.463 480H65.537V376.523c0-52.739 45.359-96.888 104.351-102.8C193.75 292.63 224.055 302.97 256 302.97s62.25-10.34 86.112-29.245c58.992 5.91 104.351 50.059 104.351 102.8zM256 234.375a117.188 117.188 0 1 0-117.188-117.187A117.32 117.32 0 0 0 256 234.375zM256 32a85.188 85.188 0 1 1-85.188 85.188A85.284 85.284 0 0 1 256 32z"
                                                            data-original="#000000"></path>
                                                    </svg>
                                                    Profil saya
                                                </li>
                                                <li
                                                    class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="w-4 h-4 mr-3" viewBox="0 0 512 512">
                                                        <path
                                                            d="M197.332 170.668h-160C16.746 170.668 0 153.922 0 133.332v-96C0 16.746 16.746 0 37.332 0h160c20.59 0 37.336 16.746 37.336 37.332v96c0 20.59-16.746 37.336-37.336 37.336zM37.332 32A5.336 5.336 0 0 0 32 37.332v96a5.337 5.337 0 0 0 5.332 5.336h160a5.338 5.338 0 0 0 5.336-5.336v-96A5.337 5.337 0 0 0 197.332 32zm160 480h-160C16.746 512 0 495.254 0 474.668v-224c0-20.59 16.746-37.336 37.332-37.336h160c20.59 0 37.336 16.746 37.336 37.336v224c0 20.586-16.746 37.332-37.336 37.332zm-160-266.668A5.337 5.337 0 0 0 32 250.668v224A5.336 5.336 0 0 0 37.332 480h160a5.337 5.337 0 0 0 5.336-5.332v-224a5.338 5.338 0 0 0-5.336-5.336zM474.668 512h-160c-20.59 0-37.336-16.746-37.336-37.332v-96c0-20.59 16.746-37.336 37.336-37.336h160c20.586 0 37.332 16.746 37.332 37.336v96C512 495.254 495.254 512 474.668 512zm-160-138.668a5.338 5.338 0 0 0-5.336 5.336v96a5.337 5.337 0 0 0 5.336 5.332h160a5.336 5.336 0 0 0 5.332-5.332v-96a5.337 5.337 0 0 0-5.332-5.336zm160-74.664h-160c-20.59 0-37.336-16.746-37.336-37.336v-224C277.332 16.746 294.078 0 314.668 0h160C495.254 0 512 16.746 512 37.332v224c0 20.59-16.746 37.336-37.332 37.336zM314.668 32a5.337 5.337 0 0 0-5.336 5.332v224a5.338 5.338 0 0 0 5.336 5.336h160a5.337 5.337 0 0 0 5.332-5.336v-224A5.336 5.336 0 0 0 474.668 32zm0 0"
                                                            data-original="#000000"></path>
                                                    </svg>
                                                    Riwayat pesanan
                                                </li>
                                                <li><a href="/user/logout"
                                                        class='py-2.5 px-5 flex items-center hover:bg-gray-100 text-[#333] text-sm cursor-pointer'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            class="w-4 h-4 mr-3" viewBox="0 0 6.35 6.35">
                                                            <path
                                                                d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                                                                data-original="#000000"></path>
                                                        </svg>
                                                        Logout
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endauth
                                    </div>

                                    <span class="mx-4 h-6 w-px bg-gray-200 lg:mx-6" aria-hidden="true"></span>

                                    <div class="flow-root">
                                        <a href="/keranjang" wire:navigate class="group -m-2 flex items-center p-2">
                                            <svg class="h-6 w-6 cursor-pointer flex-shrink-0 {{ request()->routeIs('keranjang') ? 'text-indigo-600': 'text-gray-400 group-hover:text-gray-500' }}"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                            <span
                                                class="ml-2 text-sm font-medium {{ $total_count > 0 ? 'text-indigo-500 bg-opacity-30 px-2 border border-indigo-400 bg-indigo-300 rounded-full': 'text-gray-700' }} text-gray-700 group-hover:text-gray-800">{{
                                                $total_count }}</span>
                                            <span class="sr-only">Total item dalam keranjang</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>