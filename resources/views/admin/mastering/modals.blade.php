{{-- SATUAN --}}
@foreach ($units as $unit)
{{-- Satuan Lihat --}}
<div class="modal fade slide-up disable-scroll" id="satuanLihat{{ $unit->id }}" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
            </button>
            <h5>Informasi <span class="semi-bold">Jenis Satuan</span></h5>
            <p class="p-b-10">Berikut informasi mengenai Jenis Satuan <span class="bold">{{ $unit->nama }}</span></p>
            </div>
            <div class="modal-body">
            <form role="form" action="">
                @csrf
                <div class="form-group-attached">
                    <div class="row">
                        <div class="col-md-8">
                        <div class="form-group form-group-default">
                            <label>Nama Satuan</label>
                            <p>{{ $unit->nama }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Singkatan</label>
                            <p>{{ $unit->singkatan }}</p>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Deskripsi</label>
                            @if (is_null($unit->deskripsi))
                                <p><cite>Belum diisi.<cite></p>
                            @else
                                <p>{{ $unit->deskripsi }}</p>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4 m-t-10 sm-m-t-10">
                    <button type="button" class="btn btn-primary btn-block m-t-5" data-dismiss="modal">Selesai</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

{{-- Satuan Hapus --}}
<div class="modal fade slide-up disable-scroll" id="satuanHapus{{ $unit->id }}" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
            <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>Perhatian</h5>
            </div>
            <div class="modal-body">
                <p class="no-margin">Apakah anda yakin ingin menghapus Satuan <span class="bold">{{ $unit->nama }}</span> dari sistem?</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="hapusSatuan({{ $unit->id }})" class="btn btn-primary btn-cons pull-left inline">Iya</button>
                <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
            </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- Satuan Ubah --}}
<div class="modal fade slide-up disable-scroll" id="satuanUbah{{ $unit->id }}" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
            </button>
            <h5>Informasi <span class="semi-bold">Jenis Satuan</span></h5>
            <p class="p-b-10">Berikut informasi mengenai Jenis Satuan <span class="bold">{{ $unit->nama }}</span></p>
            </div>
            <div class="modal-body">
            <form role="form" action="">
                @csrf
                <div class="form-group-attached">
                    <div class="row">
                        <div class="col-md-8">
                        <div class="form-group form-group-default">
                            <label>Nama Satuan</label>
                            <p>{{ $unit->nama }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Singkatan</label>
                            <p>{{ $unit->singkatan }}</p>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Deskripsi</label>
                            @if (is_null($unit->deskripsi))
                                <p><cite>Belum diisi.<cite></p>
                            @else
                                <p>{{ $unit->deskripsi }}</p>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4 m-t-10 sm-m-t-10">
                    <button type="button" class="btn btn-primary btn-block m-t-5" data-dismiss="modal">Selesai</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
@endforeach