@foreach ($temps as $temp)
    <tr>
        <td class="v-align-middle">
            {{ $temp->produk->product_name }}
        </td>
        <td class="v-align-middle">
            {{ $temp->jumlah }}
        </td>
        <td>
            <div class="d-flex justify-content-center">
                <button type="button" onclick="hapusTemp(this.value)" value="{{ $temp->id }}" class="btn btn-xs btn-danger mx-1"><i class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>    
@endforeach