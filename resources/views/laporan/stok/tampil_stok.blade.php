@foreach ($produks as $produk)
<tr>
    <td class="v-align-middle">
        {{ $produk->product_name }}
    </td>
    <td class="v-align-middle">
        {{ $produk->category->category_name }}
    </td>
    <td class="v-align-middle text-right">
        {{ Helper::getStokAkhir($produk, $outlet, $tanggal)}}
    </td>
    <td class="v-align-middle">
        {{ $produk->unit->singkatan }}
    </td>
</tr>     
@endforeach