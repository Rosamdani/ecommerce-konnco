<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-SyUcVUKmD-BKcFDy"></script>
    </script>
    <title>Checkout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
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
                                class="text-sm cursor-pointer font-medium text-white hover:text-gray-100">Buat akun
                                baru</a>
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
                                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                            alt="">
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
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
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
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
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
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
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

    {{-- Content --}}
    <div class="bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 pb-24 pt-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-none">
                <h1 class="sr-only">Checkout</h1>

                <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                    <div>
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">Informasi pembeli</h2>

                            <div class="mt-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email
                                </label>
                                <div class="mt-1">
                                    <input type="email" id="email" wire:model="email" autocomplete="email"
                                        value="{{auth()->user()->email}}"
                                        class="block {{ $errors->has('email') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                @error('email')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-10 border-t border-gray-200 pt-10">
                            <h2 class="text-lg font-medium text-gray-900">Informasi pemesanan</h2>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div class="sm:col-span-2">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Nama
                                        pembeli</label>
                                    <div class="mt-1">
                                        <input type="text" id="first-name" wire:model="nama" autocomplete="given-name"
                                            value="{{auth()->user()->name}}"
                                            class="block {{ $errors->has('nama') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    @error('nama')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="alamat" id="address"
                                            autocomplete="street-address"
                                            class="block {{ $errors->has('alamat') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    @error('alamat')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="apartment" class="block text-sm font-medium text-gray-700">Apartemen,
                                        suite,
                                        etc.</label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="apartment" id="apartment"
                                            class="block {{ $errors->has('apartment') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    @error('apartment')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="kota" id="kota" autocomplete="address-level2"
                                            class="block {{ $errors->has('kota') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    @error('kota')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div>
                                    <label for="provinsi" class="block text-sm font-medium text-gray-700">
                                        Provinsi</label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="provinsi" id="provinsi"
                                            autocomplete="address-level1"
                                            class="block {{ $errors->has('provinsi') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    @error('provinsi')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="postal" class="block text-sm font-medium text-gray-700">Kode
                                        pos</label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="postal" id="postal" autocomplete="postal"
                                            class="block {{ $errors->has('postal') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    @error('postal')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor
                                        telpon</label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="phone" id="phone" autocomplete="tel"
                                            class="block {{ $errors->has('phone') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                    @error('phone')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Order summary -->
                    <div class="mt-10 lg:mt-0">
                        <h2 class="text-lg font-medium text-gray-900">Ringkasan pesanan</h2>

                        <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
                            <h3 class="sr-only">Item dalam keranjang</h3>
                            <ul role="list" class="divide-y divide-gray-200">
                                @forelse ($my_cart as $cart)
                                <li class="flex px-4 py-6 sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img src="{{asset('storage/'.$cart['images'])}}" alt="{{$cart['nama']}}"
                                            class="w-20 rounded-md">
                                    </div>

                                    <div class="ml-6 flex flex-1 flex-col">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-sm">
                                                    <a href="/produk/{{$cart['id']}}"
                                                        class="font-medium text-gray-700 hover:text-gray-800">{{$cart['nama']}}</a>
                                                </h4>
                                            </div>

                                            <div class="ml-4 flow-root flex-shrink-0">
                                                <button type="button"
                                                    class="-m-2.5 flex items-center justify-center bg-white p-2.5 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Remove</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex flex-1 items-end justify-between pt-2">
                                            <p class="mt-1 text-sm font-medium text-gray-900">
                                                {{\App\Helpers\FormatRupiah::format($cart['harga'])}}</p>

                                            <div class="ml-4">
                                                <label for="quantity" class="sr-only">Quantity</label>
                                                <p>x<span class="font-medium">{{$cart['qty']}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty

                                @endforelse

                                <!-- More products... -->
                            </ul>
                            <dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Subtotal</dt>
                                    <dd class="text-sm font-medium text-gray-900">
                                        {{\App\Helpers\FormatRupiah::format($subtotal)}}</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Pajak</dt>
                                    <dd class="text-sm font-medium text-gray-900">
                                        {{\App\Helpers\FormatRupiah::format($estimateTax)}}</dd>
                                </div>
                                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                    <dt class="text-base font-medium">Total</dt>
                                    <dd class="text-base font-medium text-gray-900">
                                        {{\App\Helpers\FormatRupiah::format($grandtotal)}}</dd>
                                </div>
                            </dl>


                        </div>
                    </div>
                </form>
                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                    <button type="button" id="pay-button"
                        class="w-full rounded-md border border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"><span>Bayar
                            sekarang</span></button>
                </div>
            </div>
        </div>
    </div>
    {{-- Content --}}

    {{-- Footer --}}
    <footer class="bg-gray-900" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <img class="h-7" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Company name">
                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">Solutions</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Marketing</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Analytics</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Commerce</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Insights</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-white">Support</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Pricing</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Documentation</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Guides</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">API Status</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">Company</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">About</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Blog</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Jobs</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Press</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Partners</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-white">Legal</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Claim</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Privacy</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24 lg:flex lg:items-center lg:justify-between">
                <div>
                    <h3 class="text-sm font-semibold leading-6 text-white">Subscribe to our newsletter</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-300">The latest news, articles, and resources, sent to
                        your inbox weekly.</p>
                </div>
                <form class="mt-6 sm:flex sm:max-w-md lg:mt-0">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input type="email" name="email-address" id="email-address" autocomplete="email" required
                        class="w-full min-w-0 appearance-none rounded-md border-0 bg-white/5 px-3 py-1.5 text-base text-white shadow-sm ring-1 ring-inset ring-white/10 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:w-56 sm:text-sm sm:leading-6"
                        placeholder="Enter your email">
                    <div class="mt-4 sm:ml-4 sm:mt-0 sm:flex-shrink-0">
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Subscribe</button>
                    </div>
                </form>
            </div>
            <div class="mt-8 border-t border-white/10 pt-8 md:flex md:items-center md:justify-between">
                <div class="flex space-x-6 md:order-2">
                    <a href="#" class="text-gray-500 hover:text-gray-400">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-400">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-400">
                        <span class="sr-only">X</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-400">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-400">
                        <span class="sr-only">YouTube</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <p class="mt-8 text-xs leading-5 text-gray-400 md:order-1 md:mt-0">&copy; 2024 Market, Inc. All
                    rights reserved.</p>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function () {
                console.log("Pay button clicked");
              // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
              window.snap.pay("{{$snapToken}}", {
                onSuccess: function(result){
                  /* You may add your own implementation here */
                  alert("payment success!"); console.log(result);
                },
                onPending: function(result){
                  /* You may add your own implementation here */
                  alert("wating your payment!"); console.log(result);
                },
                onError: function(result){
                  /* You may add your own implementation here */
                  alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                  /* You may add your own implementation here */
                  alert('you closed the popup without finishing the payment');
                }
              })
            });
    </script>
</body>

</html>