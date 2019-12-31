@foreach ($sales as $sale)
<tr>
    <td class="v-align-middle">
        {{ $sale->day }}
    </td>
    <td class="v-align-middle text-right">
        {{ $sale->jumlahTransaksi }}
    </td>
    <td class="v-align-middle text-right">
        Rp {{ $sale->penjualan }}
    </td>
    <td class="v-align-middle text-right">
        Rp {{ $sale->penjualan / $sale->jumlahTransaksi }}
    </td>
</tr>    
@endforeach