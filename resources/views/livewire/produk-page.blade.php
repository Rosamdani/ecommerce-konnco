<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Produk kami</h2>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

            @foreach ($produks as $produk)
            <div class="group relative" wire:key='{{$produk->id}}'>
                <div
                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                    <img src="{{asset('storage/'.$produk->images[0]) }}" alt="{{ $produk->nama }}"
                        class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                @if ($produk->stok > 0)
                <button type="button" wire:click='addToCart({{ $produk->id }})'
                    class="group-hover:flex absolute left-1/2 bottom-16 -translate-x-1/2 -translate-y-1/2 max-w-xs duration-150 ease-in-out z-20 hidden flex-1 items-center justify-center rounded-md border border-transparent bg-gray-300 px-8 py-3 text-base font-medium text-white hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-[90%] sm:text-sm bg-opacity-60"><span
                        wire:loading.remove wire:target='addToCart({{ $produk->id }})'>
                        Masukkan keranjang</span> <span wire:loading wire:target='addToCart({{ $produk->id }})'>
                        Menambahkan...</span>
                </button>
                @endif

                <div class="mt-4 items-start flex justify-between">
                    <div>
                        <h3 class="text-xl text-gray-700">
                            <a href="/produk/{{$produk->id}}" wire:navigate>
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $produk->nama }}
                            </a>
                        </h3>
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
                    <p class="text-sm font-medium text-gray-900">{{\App\Helpers\FormatRupiah::format($produk->harga)}}
                    </p>
                </div>
            </div>
            @endforeach

            <!-- More products... -->
        </div>
    </div>
</div>
