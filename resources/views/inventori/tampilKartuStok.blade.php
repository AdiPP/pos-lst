<table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
    <thead>
        <tr>
        <th class="w-25">Nama Produk</th>
        <th class="v-align-middle">Kategori</th>
        <th class="v-align-middle">Stok Awal</th>
        <th class="v-align-middle">Stok Masuk</th>
        <th class="v-align-middle">Stok Keluar</th>
        <th class="v-align-middle">Penjualan</th>
        <th class="v-align-middle">Transfer</th>
        <th class="v-align-middle">Penyesuaian</th>
        <th class="v-align-middle">Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $produk)
        {{-- @php
        dd(($result = $produk->stokkeluars->where('user_id', session('user')->id)->where('tanggal', '>', date('Y-m-d', strtotime('-1 day', strtotime($tanggal))))->where('tanggal', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
            return $carry + $item->pivot->jumlah;
        })))
        @endphp --}}
        <tr>
            <td class="v-align-middle">
                {{ $produk->product_name }}
            </td>
            <td class="v-align-middle">
                {!! Helper::getKategoriProduk($produk->id) !!}
            </td>
            <td class="v-align-middle text-right">
                {{ $stokawal = Helper::getStokAwal($produk, $outlet, $tanggal) }}
            </td>
            <td class="v-align-middle text-right">
                {{ $stokmasuk = Helper::getStokMasuk($produk, $outlet, $tanggal) }}
            </td>
            <td class="v-align-middle text-right">
                {{ $stokkeluar = Helper::getStokKeluar($produk, $outlet, $tanggal) }}
            </td>
            <td class="v-align-middle text-right">
                {{ $penjualan = Helper::getPenjualan($produk, $outlet, $tanggal) }}
            </td>
            <td class="v-align-middle text-right">
                {{ $transfer = Helper::getTransfer($produk, $outlet, $tanggal) }}
            </td>
            <td class="v-align-middle text-right">
                {{ $stokopname = Helper::getStokOpname($produk, $outlet, $tanggal) }}
            </td>
            <td class="v-align-middle text-right">
                {{ Helper::getStokAkhir($produk, $outlet, $tanggal) }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>