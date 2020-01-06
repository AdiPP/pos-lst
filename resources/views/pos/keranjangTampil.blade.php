{{-- @php
    dd($model->produk->product_name);
@endphp --}}
@foreach ($models as $produk)
    <tr>
        <td class="v-align-middle">
            {{ $produk->produk->product_name }}
        </td>
        <td class="v-align-middle text-right">
            {{ Helper::numberToRupiah($produk->produk->product_price) }}
        </td>
        <td class="v-align-middle text-right">
            {{ $produk->jumlah }}
        </td>
        <td class="v-align-middle text-right">
            {{ Helper::numberToRupiah($produk->produk->product_price * $produk->jumlah) }}
        </td>
        <td>
            <div class="d-flex justify-content-center">
                <button onclick="kurangiProduk(this.value)" value="{{ $produk->id }}" class="btn btn-xs btn-danger btn-sm mx-1"><i class="fa fa-minus"></i></button>
                <button onclick="tambahProduk(this.value)" value="{{ $produk->id }}" class="btn btn-xs btn-success mx-1"><i class="fa fa-plus"></i></button>
            </div>
        </td>
    </tr>
@endforeach