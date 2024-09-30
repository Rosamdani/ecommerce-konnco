<div class="bg-gray-50">
    <main class="mx-auto max-w-7xl px-4 pb-24 pt-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <h1 class="sr-only">Checkout</h1>

            <form wire:submit.prevent='save' class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
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
                                    <input type="text" wire:model="alamat" id="address" autocomplete="street-address"
                                        class="block {{ $errors->has('alamat') ? 'border border-red-500' : 'border-0'}} w-full py-2 border px-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                @error('alamat')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="apartment" class="block text-sm font-medium text-gray-700">Apartemen, suite,
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
                                    <input type="text" wire:model="provinsi" id="provinsi" autocomplete="address-level1"
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
                                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor telpon</label>
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

                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <button type="submit"
                                class="w-full rounded-md border border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"><span
                                    wire:loading.remove wire:target='save'>Bayar sekarang</span><span wire:loading
                                    wire:target='save'>Memproses pembayaran...</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>