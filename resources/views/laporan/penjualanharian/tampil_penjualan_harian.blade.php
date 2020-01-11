<table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
    <thead>
      <tr>
        <th class="v-align-middle w-25">Tanggal</th>
        <th class="v-align-middle text-right">Jumlah Transaksi</th>
        <th class="v-align-middle text-right">Penjualan</th>
        <th class="v-align-middle text-right">Rata-Rata</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
        <tr>
            <td class="v-align-middle">
                {{ $sale->day }}
            </td>
            <td class="v-align-middle text-right">
                {{ $sale->jumlahTransaksi }}
            </td>
            <td class="v-align-middle text-right">
                {{ Helper::numberToRupiah($sale->penjualan) }}
            </td>
            <td class="v-align-middle text-right">
                {{ Helper::numberToRupiah($sale->penjualan / $sale->jumlahTransaksi) }}
            </td>
        </tr>    
        @endforeach
    </tbody>
</table>

<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>