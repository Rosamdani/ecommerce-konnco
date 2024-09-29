<div class="bg-white">
    <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <!--
        Off-canvas menu backdrop, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
        <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

        <div class="fixed inset-0 z-40 flex">
            <!--
          Off-canvas menu, show/hide based on off-canvas menu state.

          Entering: "transition ease-in-out duration-300 transform"
            From: "-translate-x-full"
            To: "translate-x-0"
          Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "-translate-x-full"
        -->
            <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                <div class="flex px-4 pb-2 pt-5">
                    <button type="button"
                        class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/" wire:navigate
                            class="-m-2 block cursor-pointer p-2 font-medium {{ request()->routeIs('home') ? 'text-indigo-600': 'text-gray-900' }}">Beranda</a>
                    </div>
                    <div class="flow-root">
                        <a href="/produk" wire:navigate
                            class="-m-2 block cursor-pointer p-2 font-medium {{ request()->routeIs('produk') ? 'text-indigo-600': 'text-gray-900' }}">Produk</a>
                    </div>
                </div>

                @if (!$isLoggedIn)
                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="/register" wire:navigate
                            class="-m-2 block cursor-pointer p-2 font-medium {{ request()->routeIs('register') ? 'text-indigo-600': 'text-gray-900' }}">Buat
                            akun</a>
                    </div>
                    <div class="flow-root">
                        <a href="/login" wire:navigate
                            class="-m-2 cursor-pointer block p-2 font-medium {{ request()->routeIs('login') ? 'text-indigo-600': 'text-gray-900' }}">Login</a>
                    </div>
                </div>
                @endif

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <!-- Currency selector -->
                    <form>
                        <div class="inline-block">
                            <label for="mobile-currency" class="sr-only">Currency</label>
                            <div
                                class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
                                <select id="mobile-currency" name="currency"
                                    class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
                                    <option>IDR</option>
                                    <option>USD</option>
                                    <option>AUD</option>
                                    <option>EUR</option>
                                    <option>GBP</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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


                    @if (!$isLoggedIn)
                    <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                        <a href="/register" wire:navigate
                            class="text-sm cursor-pointer font-medium text-white hover:text-gray-100">Buat akun baru</a>
                        <span class="h-6 w-px bg-gray-600" aria-hidden="true"></span>
                        <a href="/login" wire:navigate
                            class="text-sm cursor-pointer font-medium text-white hover:text-gray-100">Login</a>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Secondary navigation -->
            <div class="bg-white">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="border-b border-gray-200">
                        <div class="flex h-16 items-center justify-between">
                            <!-- Logo (lg+) -->
                            <div class="hidden lg:flex lg:items-center">
                                <a href="/" class="cursor-pointer" wire:navigate>
                                    <span class="sr-only">Market</span>
                                    <img class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                                </a>
                            </div>

                            <div class="hidden h-full lg:flex">
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

                            <!-- Mobile menu and search (lg-) -->
                            <div class="flex flex-1 items-center lg:hidden">
                                <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                                <button type="button" class="-ml-2 rounded-md bg-white p-2 text-gray-400">
                                    <span class="sr-only">Open menu</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>

                                <!-- Search -->
                                <a href="#" class="ml-2 p-2 cursor-pointer text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Search</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </a>
                            </div>

                            <!-- Logo (lg-) -->
                            <a href="/" wire:navigate class="lg:hidden cursor-pointer">
                                <span class="sr-only">Your Company</span>
                                <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt=""
                                    class="h-8 w-auto">
                            </a>

                            <div class="flex flex-1 items-center justify-end">
                                <div class="flex items-center lg:ml-8">
                                    <div class="flex space-x-8">
                                        <div class="hidden lg:flex">
                                            <a href="#"
                                                class="-m-2 p-2 cursor-pointer text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Search</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="flex">
                                            <a href="/akun" wire:navigate
                                                class="-m-2 p-2 cursor-pointer {{ request()->routeIs('akun') ? 'text-indigo-600': 'text-gray-400 hover:text-gray-500' }}">
                                                <span class="sr-only">Account</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg>
                                            </a>
                                        </div>
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
                                                class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
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