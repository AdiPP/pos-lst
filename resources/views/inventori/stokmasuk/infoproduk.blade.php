<input type="hidden" value="{{ $produk->id }}" name="id">
<tr>
    <td class="v-align-middle">
        {{ $produk->product_name }}
    </td>
    <td class="v-align-middle" id="hargabeliparent">
        <input type="text" class="form-group input-sm text-center" id="harga" name="hargabeli">
    </td>
    <td class="v-align-middle text-center" id="jumlahprodukparent">
        <input type="text" class="form-group input-sm text-center" id="jumlah" name="jumlahproduk">
    </td>
    <td class="v-align-middle text-center">
        Rp. <span id="result">0</span>
    </td>
    <td>
        <button class="btn btn-sm"><i class="fa fa-plus"></i></button>
    </td>
</tr>