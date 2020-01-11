<table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
    <thead>
      <tr>
        <th class="v-align-middle w-25">Nama Produk</th>
        <th class="v-align-middle">Kategori</th>
        <th class="v-align-middle">Harga</th>
        <th class="v-align-middle text-right">Terjual</th>
        <th class="v-align-middle" style="width: 1%">Unt.</th>
        <th class="v-align-middle text-right w-25">Total</th>
      </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>

<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>