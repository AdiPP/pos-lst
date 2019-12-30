{{-- @php
    echo 'Today: '.$tanggal.', Tomorrow: '.date('Y-m-d', strtotime('+1 day', strtotime($tanggal)));
@endphp --}}

@foreach ($produks as $produk)
    <tr>
        <td class="v-align-middle">
            {{ $produk->product_name }}
        </td>
        <td class="v-align-middle">
            {{ $produk->category->category_name }}
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