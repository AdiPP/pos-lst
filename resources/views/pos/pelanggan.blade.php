<select class="full-width" data-init-plugin="select2" name="pelanggan" id="pelanggan">
    <option selected value="0">Default</option>
    @foreach ($pelanggans as $pelanggan)
        <option value="{{ $pelanggan->id }}">{{ $pelanggan->id }} - {{ $pelanggan->nama }}</option>
    @endforeach
</select>

<script type="text/javascript" src=" {{ asset('assets/plugins/select2/js/select2.full.min.js') }} "></script>

<!-- BEGIN CORE TEMPLATE JS -->
<script src=" {{ asset('pages/js/pages.min.js') }} "></script>
<!-- END CORE TEMPLATE JS -->