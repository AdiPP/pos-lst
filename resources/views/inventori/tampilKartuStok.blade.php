@foreach ($produks as $produk)
    @php
        if ($outlet == 0) {
            $stokmasuk = $produk
                        ->stokmasuks
                        // ->where('outlet_id', 3)
                        ->reduce(function($carry, $item){
                            return $carry + $item->infos[0]->jumlah;
                        });

            if (is_null($stokmasuk)) {
                $stokmasuk = 0;
            }

            $stokkeluar = $produk
                        ->stokkeluars
                        // ->where('outlet_id', 2)
                        ->reduce(function($carry, $item){
                            return $carry + $item->infos[0]->jumlah;
                        });

            if (is_null($stokkeluar)) {
                $stokkeluar = 0;
            }

            $i = 0;

            foreach ($produk->sales as $sale) {
                // if ($sale->outlet_id == 2) {
                    foreach ($sale->infos as $info) {
                        if ($info->product_id == $produk->id) {
                            $i = $i + $info->jumlah;
                        }
                    // }
                }
            }

            $penjualan = $i;

            // $penjualan = $produk
            //             ->sales
            //             ->where('outlet_id', 2)
            //             ->reduce(function($carry, $item) {
            //                 return $carry + $item->jumlah;
            //             });

            if (is_null($penjualan)) {
                $penjualan = 0;
            }
        } else {
            $stokmasuk = $produk
                        ->stokmasuks
                        ->where('outlet_id', $outlet)
                        ->reduce(function($carry, $item){
                            return $carry + $item->infos[0]->jumlah;
                        });

            if (is_null($stokmasuk)) {
                $stokmasuk = 0;
            }

            $stokkeluar = $produk
                        ->stokkeluars
                        ->where('outlet_id', $outlet)
                        ->reduce(function($carry, $item){
                            return $carry + $item->infos[0]->jumlah;
                        });

            if (is_null($stokkeluar)) {
                $stokkeluar = 0;
            }

            $i = 0;

            foreach ($produk->sales as $sale) {
                if ($sale->outlet_id == $outlet) {
                    foreach ($sale->infos as $info) {
                        if ($info->product_id == $produk->id) {
                            $i = $i + $info->jumlah;
                        }
                    }
                }
            }

            $penjualan = $i;

            if (is_null($penjualan)) {
                $penjualan = 0;
            }
        }

        $stokakhir = $stokmasuk - $stokkeluar - $penjualan;
        
    @endphp
    <tr>
        <td class="v-align-middle">
            {{ $produk->product_name }}
        </td>
        <td class="v-align-middle">
            {{ $produk->category->category_name }}
        </td>
        <td class="v-align-middle text-right">
            0
        </td>
        <td class="v-align-middle text-right">
            {{ $stokmasuk }}
        </td>
        <td class="v-align-middle text-right">
            {{ $stokkeluar }}
        </td>
        <td class="v-align-middle text-right">
            {{ $penjualan }}
        </td>
        <td class="v-align-middle text-right">
            0
        </td>
        <td class="v-align-middle text-right">
            0
        </td>
        <td class="v-align-middle text-right">
            {{ $stokakhir }}
        </td>
    </tr>
@endforeach