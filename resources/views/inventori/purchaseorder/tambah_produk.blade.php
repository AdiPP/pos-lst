<tr>
    <td class="v-align-middle">
        <select class="full-width" onchange="undisabled(this)" data-init-plugin="select2" name="produk[]">
            <option selected disabled>Pilih Produk</option>
            @foreach ($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->product_name }}</option>
            @endforeach
        </select>
    </td>
    <td class="v-align-middle">
        <input type="number" class="form-control input-sm text-right" onchange="totalByJumlah(this)" onkeyup="totalByJumlah(this)" name="jumlah[]" placeholder="0" disabled>
    </td>
    <td class="v-align-middle text-right">
        <input type="number" class="form-control input-sm text-right" onchange="totalByHargaBeli(this)" onkeyup="totalByHargaBeli(this)" name="hargaBeli[]" placeholder="0" disabled>
    </td>
    <td class="v-align-middle text-right">
        <input type="text" class="form-control input-sm text-right" placeholder="0" name="tampilTotal[]" readonly>
        <input type="hidden" class="form-control input-sm text-right" placeholder="0" name="total[]">
    </td>
    <td class="v-align-middle text-right">
        <div class="d-flex justify-content-center">
            <button type="button" onclick="hapusProduk(this)" class="btn btn-xs btn-danger mx-1"><i class="fa fa-trash"></i></button>
        </div>
    </td>
</tr>

<script>
</script>

<script type="text/javascript" src=" {{ asset('assets/plugins/select2/js/select2.full.min.js') }} "></script>

<!-- BEGIN CORE TEMPLATE JS -->
<script src=" {{ asset('pages/js/pages.min.js') }} "></script>
<!-- END CORE TEMPLATE JS -->