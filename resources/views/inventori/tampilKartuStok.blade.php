@foreach ($produks as $produk)
    <tr>
        <td class="v-align-middle">
            {{ $produk->product_name }}
        </td>
        <td class="v-align-middle">
            {{ $produk->category->category_name }}
        </td>
        <td class="v-align-middle text-right">
            0
        </td>
        <td class="v-align-middle text-right">
            {{ $stokmasuk = Helper::getStokMasuk($produk, $outlet) }}
        </td>
        <td class="v-align-middle text-right">
            {{ $stokkeluar = Helper::getStokKeluar($produk, $outlet) }}
        </td>
        <td class="v-align-middle text-right">
            {{ $penjualan = Helper::getPenjualan($produk, $outlet) }}
        </td>
        <td class="v-align-middle text-right">
            {{ $transfer = Helper::getTransfer($produk, $outlet) }}
        </td>
        <td class="v-align-middle text-right">
            0
        </td>
        <td class="v-align-middle text-right">
            {{ Helper::getStokAkhir($produk,$outlet) }}
        </td>
    </tr>
@endforeach