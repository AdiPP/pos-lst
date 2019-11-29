{{-- @php
    dd($model->produk->product_name);
@endphp --}}
@foreach ($models as $produk)
    <tr>
        <td class="v-align-middle">
            {{ $produk->produk->product_name }}
        </td>
        <td class="v-align-middle">
            {{ $produk->produk->product_price }}
        </td>
        <td class="v-align-middle">
            {{ $produk->jumlah }}
        </td>
        <td class="v-align-middle">
            {{ $produk->produk->product_price * $produk->jumlah }}
        </td>
        <td>
            <button onclick="kurangiProduk(this.value)" value="{{ $produk->id }}" class="btn btn-xs btn-danger mx-1"><i class="fa fa-minus"></i></button>
        </td>
    </tr>
@endforeach