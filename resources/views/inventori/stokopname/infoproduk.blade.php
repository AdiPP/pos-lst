<input type="hidden" value="{{ $produk->id }}" name="idProduk">
<tr>
    <td class="v-align-middle">
        {{ $produk->product_name }}
    </td>
    <td class="v-align-middle text-center">
        {{ $stokakhir }}
    </td>
    <td class="v-align-middle">
        <input type="text" min="1" value="1" class="form-group input-sm text-center no-margin w-75" name="jumlahProduk">
    </td>
    <td>
        <div class="d-flex justify-content-center">
            <button class="btn btn-sm"><i class="fa fa-plus"></i></button>
        </div>
    </td>
</tr>