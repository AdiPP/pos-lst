@foreach ($produks as $produk)
    <tr>
        <td class="v-align-middle">
            {{ $produk->product_name }}
        </td>
        <td class="v-align-middle">
            {{ $produk->category->category_name }}
        </td>
        <td class="v-align-middle">
            {{ Helper::numberToRupiah($produk->product_price) }}
        </td>
        <td class="v-align-middle text-right">
            {{ $penjualan = Helper::getPenjualanAll($produk, $outlet, $tanggal) }}
        </td>
        <td class="v-align-middle text-center">
            {{ $produk->unit->singkatan }}
        </td>
        <td class="v-align-middle text-right">
            {{ Helper::numberToRupiah($penjualan * $produk->product_price)  }}
        </td>
    </tr>
@endforeach