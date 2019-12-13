@foreach ($temps as $temp)
    @php
        $stokakhir = Helper::stokAkhir($temp->produk, session('idOutlet'));
    @endphp
    <tr>
        <td class="v-align-middle">
            {{ $temp->produk->product_name }}
        </td>
        <td class="v-align-middle">
            {{ $stokakhir }}
        </td>
        <td class="v-align-middle">
            {{ $stokakhir - $temp->selisih }}
        </td>
        <td class="v-align-middle">
            {{ $temp->selisih }}
        </td>
        <td>
            <div class="d-flex justify-content-center">
                <button type="button" onclick="hapusTemp(this.value)" value="{{ $temp->id }}" class="btn btn-xs btn-danger mx-1"><i class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>    
@endforeach