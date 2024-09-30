<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
            <!-- Image gallery -->
            <div class="flex flex-col-reverse">
                <!-- Image selector -->
                <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
                    <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                        @foreach ($produk->images as $key => $gambar)
                        <button wire:key='{{$key}}' id="tabs-{{ $key + 1 }}-tab-{{ $key + 1 }}"
                            class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4 {{ $key == 0 ? 'ring-indigo-500' : '' }}"
                            aria-controls="tabs-{{ $key + 1 }}-panel-{{ $key + 1 }}" role="tab" type="button">
                            <span class="sr-only">Angled view</span>
                            <span class="absolute inset-0 overflow-hidden rounded-md">
                                <img src="{{ asset('storage/' . $gambar) }}" alt=""
                                    class="h-full w-full object-cover object-center">
                            </span>
                            <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                            <span
                                class="pointer-events-none absolute inset-0 rounded-md ring-2 {{ $key == 0 ? 'ring-indigo-500' : 'ring-transparent' }} ring-offset-2"
                                aria-hidden="true"></span>
                        </button>
                        @endforeach
                    </div>
                </div>

                <div class="aspect-h-1 aspect-w-1 w-full">
                    <!-- Tab panel, show/hide based on tab state. -->
                    @foreach ($produk->images as $key => $gambar)
                    <div wire:key='{{$key}}' id="tabs-{{ $key + 1 }}-panel-{{ $key + 1 }}"
                        aria-labelledby="tabs-{{ $key + 1 }}-tab-{{ $key + 1 }}" role="tabpanel" tabindex="0"
                        class="{{ $key == 0 ? '' : 'hidden' }}">
                        <img src="{{ asset('storage/' . $gambar) }}"
                            alt="Angled front view with bag zipped and handles upright."
                            class="h-full w-full object-cover object-center sm:rounded-lg">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Product info -->
            <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $produk->nama }}</h1>

                <div class="mt-3">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-gray-900">
                        {{\App\Helpers\FormatRupiah::format($produk->harga)}}</p>
                </div>

                <!-- Reviews -->
                <div class="mt-3">
                    <div class="flex items-center">
                        @if ($produk->stok > 0)
                        <p class="mt-1 flex space-x-2 text-sm text-gray-700">
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Stok : {{$produk->stok}}</span>
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
                                Produk saat ini belum tersedia
                            </span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6 text-base text-gray-700">
                        <p>{{$produk->deskripsi}}</p>
                    </div>
                </div>

                <form class="mt-6">

                    <div class="mt-10 flex">
                        @if($qty > 0 && $produk->stok > 0)
                        <div class="flex max-w-xs flex-1 items-center justify-center rounded-md overflow-hidden">
                            <button type="button" wire:click.prevent='decreaseQty'
                                class="basis-1/4 active:bg-sky-200 active:duration-300 active:ease-in-out transition-transform transform active:scale-95 bg-gray-100 h-full font-bold text-xl">-</button>
                            <input
                                class="basis-1/2 bg-gray-50 h-full outline-none border-none text-center flex cursor-default"
                                type="text" wire:model.defer='qty'>
                            <button type="button" wire:click.prevent='increaseQty'
                                class="basis-1/4 active:bg-sky-200 active:duration-300 active:ease-in-out transition-transform transform active:scale-95 bg-gray-100 h-full font-bold text-xl">+</button>

                        </div>
                        @else
                        @if ($produk->stok > 0)
                        <button type="button" wire:click='addToCart({{$produk->id}})'
                            class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full"><span
                                wire:loading.remove>Masukkan
                                ke keranjang</span> <span wire:loading>Menambahkan...</span></button>

                        @else
                        <button type="button" disabled
                            class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-gray-300 px-8 py-3 text-base font-medium text-white hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full"><span>Stok
                                produk
                                ini belum tersedia</span></button>

                        @endif
                        @endif

                        <button type="button"
                            class="ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                            <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <span class="sr-only">Add to favorites</span>
                        </button>
                    </div>
                </form>

                <section aria-labelledby="details-heading" class="mt-12">
                    <h2 id="details-heading" class="sr-only">Additional details</h2>

                    <div class="divide-y divide-gray-200 border-t">
                        <div>
                            <h3>
                                <!-- Expand/collapse question button -->
                                <button type="button"
                                    class="group relative flex w-full items-center justify-between py-6 text-left"
                                    aria-controls="disclosure-1" aria-expanded="false">
                                    <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                                    <span class="text-sm font-medium text-gray-900">Features</span>
                                    <span class="ml-6 flex items-center">
                                        <!-- Open: "hidden", Closed: "block" -->
                                        <svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        <!-- Open: "block", Closed: "hidden" -->
                                        <svg class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="prose prose-sm pb-6" id="disclosure-1">
                                <ul role="list">
                                    <li>Konfigurasi tali bahu yang dapat disesuaikan</li>
                                    <li>Interior yang luas dengan ritsleting atas</li>
                                    <li>Tangkai kulit dan tab</li>
                                    <li>Pembagi interior</li>
                                    <li>Lingkaran tali stainless</li>
                                    <li>Konstruksi jahit ganda</li>
                                    <li>Tahan air</li>
                                </ul>
                            </div>
                        </div>

                        <!-- More sections... -->

                    </div>
                </section>
            </div>
        </div>
    </div>
</div>