<input type="hidden" value="{{ $produk->id }}" name="id">
<tr>
    <td class="v-align-middle">
        {{ $produk->product_name }}
    </td>
    <td class="v-align-middle text-right">
        {{ $produk->product_price }}
    </td>
    <td class="v-align-middle text-center">
        <input type="number" value="1" class="form-group input-sm text-center w-50">
    </td>
    <td>
        <button class="btn btn-sm"><i class="fa fa-plus"></i></button>
    </td>
</tr>