<main class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
    @if(count($my_cart) > 0)
    <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Keranjang belanjamu</h1>

    <div class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
        <section aria-labelledby="cart-heading" class="lg:col-span-7">
            <h2 id="cart-heading" class="sr-only">Beberapa item di keranjangmu, checkout sekarang...</h2>

            <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
                @forelse ($my_cart as $cart)

                <li wire:key='{{$cart["id"]}}' class="flex py-6 sm:py-10">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $cart['images']) }}"
                            alt="Front of men&#039;s Basic Tee in sienna."
                            class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48">
                    </div>

                    <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                        <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                            <div>
                                <div class="flex justify-between">
                                    <h3 class="text-sm">
                                        <a href='/produk/{{$cart["id"]}}'
                                            class="font-medium hover:text-indigo-600 hover:underline text-gray-700 ">{{$cart["nama"]}}</a>
                                    </h3>
                                </div>
                                <p class="mt-1 text-sm font-medium text-gray-900">
                                    {{\App\Helpers\FormatRupiah::format($cart["harga"])}}</p>
                                <div
                                    class="flex mt-1 h-10 max-w-xs items-center justify-center rounded-md overflow-hidden">
                                    <button wire:click='decreaseQty({{$cart["id"]}})' type="button"
                                        class="basis-1/4 px-3 active:bg-sky-200 active:duration-300 active:ease-in-out transition-transform transform active:scale-95 bg-gray-200 h-full font-bold text-xl">-</button>
                                    <input
                                        class="basis-1/2 bg-gray-100 h-full max-w-28 outline-none border-none text-center flex cursor-default"
                                        type="text" readonly value="{{$cart['qty']}}">
                                    <button wire:click='increaseQty({{$cart["id"]}})' type="button"
                                        class="basis-1/4 px-3 active:bg-sky-200 active:duration-300 active:ease-in-out transition-transform transform active:scale-95 bg-gray-200 h-full font-bold text-xl">+</button>

                                </div>
                            </div>

                            <div class="mt-4 sm:mt-0 sm:pr-9">

                                <div class="absolute right-0 top-0">
                                    <button type="button" wire:click='removeFromCart({{$cart["id"]}})'
                                        class="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Remove</span> <span wire:loading
                                            wire:target='removeFromCart({{$cart["id"]}})'>
                                            <span class="animate-pulse">
                                                <span class="inline-block w-2 h-2 rounded-full bg-gray-400 mr-1"></span>
                                                <span class="inline-block w-2 h-2 rounded-full bg-gray-400 mr-1"
                                                    style="animation-delay: 0.1s"></span>
                                                <span class="inline-block w-2 h-2 rounded-full bg-gray-400"
                                                    style="animation-delay: 0.2s"></span>
                                            </span>
                                        </span>
                                        <svg wire:loading.remove wire:target='removeFromCart({{$cart["id"]}})'
                                            class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        @if ($cart["stok"] && $cart["stok"] > 0)
                        <p class="mt-1 flex space-x-2 text-sm text-gray-700">
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Stok : {{$cart["stok"]}}</span>
                        </p>
                        @else
                        <div class="mt-1 flex space-x-2 text-sm text-gray-700 items-center">
                            <svg width="15px" height="15px" viewBox="0 0 24 24"
                                id="meteor-icon-kit__regular-exclamation-circle" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM12 15C12.5523 15 13 15.4477 13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15ZM11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8V13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13V8Z"
                                        fill="#758CA3"></path>
                                </g>
                            </svg>
                            <span class="">
                                Stok produk saat ini belum tersedia
                            </span>
                        </div>
                        @endif
                    </div>
                </li>
                @empty

                @endforelse
            </ul>
        </section>

        <!-- Order summary -->
        <section aria-labelledby="summary-heading"
            class="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
            <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Ringkasan pesanan</h2>

            <dl class="mt-6 space-y-4">
                <div class="flex items-center justify-between">
                    <dt class="text-sm text-gray-600">Subtotal</dt>
                    <dd class="text-sm font-medium text-gray-900">{{\App\Helpers\FormatRupiah::format($subtotal)}}</dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                    <dt class="flex text-sm text-gray-600">
                        <span>Estimasi pajak</span>
                        <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Belajar bagaimana pajak dihitung</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </dt>
                    <dd class="text-sm font-medium text-gray-900">{{\App\Helpers\FormatRupiah::format($estimateTax)}}
                    </dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                    <dt class="text-base font-medium text-gray-900">Total pesanan</dt>
                    <dd class="text-base font-medium text-gray-900">{{\App\Helpers\FormatRupiah::format($grandtotal)}}
                    </dd>
                </div>
            </dl>

            <div class="mt-6">
                <a wire:click.prevent='cekProdukStokFromDB'
                    class="w-full rounded-md cursor-pointer border block text-center border-transparent bg-indigo-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"><span
                        wire:loading.remove wire:target='cekProdukStokFromDB'>Checkout</span><span wire:loading
                        wire:target='cekProdukStokFromDB'>Proses...</span></a>
            </div>
            @if (count($stockErrors) > 0)
            <div class="mt-6 text-sm text-red-500">
                Maaf, jumlah pesanan melebihi stok.
            </div>
            @endif
        </section>
    </div>
    @else
    <section class="w-full h-96 flex flex-col items-center justify-center">
        <lord-icon src="https://cdn.lordicon.com/jprtoagx.json" trigger="loop" state="loop-oscillate-empty"
            colors="primary:#1b1091,secondary:#66a1ee" style="width:250px;height:250px">
        </lord-icon>
        <p class="text-xl font-bold">Keranjang belanjamu masih kosong, <a href="/produk" wire:navigate
                class="text-indigo-600 hover:underline">lihat produk kami</a></p>
    </section>
    @endif


</main>