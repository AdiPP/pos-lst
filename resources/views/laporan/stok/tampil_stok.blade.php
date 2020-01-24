<table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
    <thead>
      <tr>
        <th class="v-align-middle w-50">Produk</th>
        <th class="v-align-middle w-25">Kategori</th>
        <th class="v-align-middle text-right w-25">Stok</th>
        <th class="v-align-middle" style="width: 1%">Unt.</th>                                                                                                                                                                                                                                                                                     </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($produks as $produk)
        <tr>
            <td class="v-align-middle">
                {{ $produk->product_name }}
            </td>
            <td class="v-align-middle">
                {{ Helper::getKategoriProduk($produk->id) }}
            </td>
            <td class="v-align-middle text-right">
                {{ Helper::getStokAkhir($produk, $outlet, $tanggal)}}
            </td>
            <td class="v-align-middle">
                {{ $produk->unit->singkatan }}
            </td>
        </tr>     
        @endforeach
    </tbody>
</table>

<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>