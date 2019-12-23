<select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" name="kota" id="kota">
    @if (is_null($user->bisnis))
        <option selected disabled>Pilih Kota</option>
        @foreach ($kotas as $kota)
            <option value="{{ $kota->KODE_WILAYAH }}">{{ $kota->NAMA }}</option>
        @endforeach
    @else
        <option selected disabled>Pilih Kota</option>
        @foreach ($kotas as $kota)
            <option value="{{ $kota->KODE_WILAYAH }}" @if ($user->bisnis->kota == $kota->KODE_WILAYAH)
                selected
            @endif>{{ $kota->NAMA }}</option>
        @endforeach
    @endif
</select>

<script type="text/javascript" src=" {{ asset('assets/plugins/select2/js/select2.full.min.js') }} "></script>

<!-- BEGIN CORE TEMPLATE JS -->
<script src=" {{ asset('pages/js/pages.min.js') }} "></script>
<!-- END CORE TEMPLATE JS -->