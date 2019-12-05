<input type="hidden" value="{{ $produk->id }}" name="id">
<tr>
    <td class="v-align-middle">
        {{ $produk->product_name }}
    </td>
    <td class="v-align-middle text-right">
        {{ $produk->product_price }}
    </td>
    <td class="v-align-middle text-center" id="jumlahprodukparent">
        <input type="number" min="1" value="1" class="form-group input-sm text-center" name="jumlahproduk">
    </td>
    <td>
        <button class="btn btn-sm"><i class="fa fa-plus"></i></button>
    </td>
</tr>