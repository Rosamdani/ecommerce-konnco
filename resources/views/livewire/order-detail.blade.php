<div class="bg-white">
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <div class="max-w-xl">
            <h1 class="text-base font-medium text-indigo-600">Terimakasih!</h1>
            <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Pesanan anda telah diterima!</p>
            <p class="mt-2 text-base text-gray-500">Nomor pesanan {{ $order->order_number }} sedang diproses
            </p>

        </div>

        <div class="mt-10 border-t border-gray-200">
            <h2 class="sr-only">Pesanan anda</h2>

            <h3 class="sr-only">Items</h3>
            @foreach ($order->items as $item)
            <div class="flex space-x-6 border-b border-gray-200 py-10">
                <img src="{{asset('storage/'.$item->produk->images[0]) }}"
                    alt="Glass bottle with black plastic pour top and mesh insert."
                    class="h-20 w-20 flex-none rounded-lg bg-gray-100 object-cover object-center sm:h-40 sm:w-40">
                <div class="flex flex-auto flex-col">
                    <div>
                        <h4 class="font-medium text-gray-900">
                            <a href="#">{{ $item->produk->nama }}</a>
                        </h4>
                        <p class="mt-2 text-sm text-gray-600">{{ $item->produk->deskripsi }}</p>
                    </div>
                    <div class="mt-6 flex flex-1 items-end">
                        <dl class="flex space-x-4 divide-x divide-gray-200 text-sm sm:space-x-6">
                            <div class="flex">
                                <dt class="font-medium text-gray-900">jumlah</dt>
                                <dd class="ml-2 text-gray-700">{{$item->qty}}</dd>
                            </div>
                            <div class="flex pl-4 sm:pl-6">
                                <dt class="font-medium text-gray-900">Harga</dt>
                                <dd class="ml-2 text-gray-700">
                                    {{\App\Helpers\FormatRupiah::format($item->produk->harga)}}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="sm:ml-40 sm:pl-6">
                {{-- <h3 class="sr-only">Your information</h3>

                <h4 class="sr-only">Addresses</h4>
                <dl class="grid grid-cols-2 gap-x-6 py-10 text-sm">
                    <div>
                        <dt class="font-medium text-gray-900">Data pembeli</dt>
                        <dd class="mt-2 text-gray-700">
                            <address class="not-italic">
                                <span class="block">Nama: {{$order->customer->nama}}</span>
                                <span class="block">No Telpon: {{$order->customer->no_telp}}</span>
                                <span class="block">Email: {{$order->customer->email}}</span>
                                <span class="block">Kota: {{$order->customer->kota}}</span>
                                <span class="block">Provinsi: {{$order->customer->provinsi}}</span>
                                <span class="block">Alamat: {{$order->customer->alamat}}</span>
                                <span class="block">Apartment atau kamar: {{$order->customer->rumah}}</span>
                                <span class="block">Kode Pos: {{$order->customer->kode_pos}}</span>
                            </address>
                        </dd>
                    </div>
                </dl> --}}

                {{-- <h4 class="sr-only">Payment</h4>
                <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 py-10 text-sm">
                    <div>
                        <dt class="font-medium text-gray-900">Payment method</dt>
                        <dd class="mt-2 text-gray-700">
                            <p>Apple Pay</p>
                            <p>Mastercard</p>
                            <p><span aria-hidden="true">••••</span><span class="sr-only">Ending in </span>1545</p>
                        </dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Shipping method</dt>
                        <dd class="mt-2 text-gray-700">
                            <p>DHL</p>
                            <p>Takes up to 3 working days</p>
                        </dd>
                    </div>
                </dl> --}}

                <h3 class="sr-only">Ringkasan</h3>

                <dl class="space-y-6 border-t border-gray-200 pt-10 text-sm">
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-900">Subtotal</dt>
                        <dd class="text-gray-700">{{\App\Helpers\FormatRupiah::format($order->subtotal)}}</dd>
                    </div>
                    {{-- <div class="flex justify-between">
                        <dt class="flex font-medium text-gray-900">
                            Discount
                            <span
                                class="ml-2 rounded-full bg-gray-200 px-2 py-0.5 text-xs text-gray-600">STUDENT50</span>
                        </dt>
                        <dd class="text-gray-700">-$18.00 (50%)</dd>
                    </div> --}}
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-900">Pajak</dt>
                        <dd class="text-gray-700">{{\App\Helpers\FormatRupiah::format($order->tax)}}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-900">Status</dt>
                        <dd class="text-gray-700">{{$order->payment_status}}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-900">Total</dt>
                        <dd class="text-gray-900">{{\App\Helpers\FormatRupiah::format($order->grandtotal)}}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
