<table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
    <thead>
    <tr>
        <th class="w-50">Nama</th>
        <th class="">Singkatan</th>
        <th class="invisible" style="width: 1%;">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($models as $model)
            <tr>
                <td class="v-align-middle">
                    {{ $model->nama }}
                </td>
                <td class="v-align-middle">
                    {{ $model->singkatan }}
                </td>
                <td class="v-align-middle">
                    <div class="d-flex justify-content-center">
                        <button href="" class="btn btn-xs btn-success mx-1" data-target="" data-toggle="modal" id=""><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs btn-complete mx-1" data-target="#satuanLihat{{ $model->id }}" data-toggle="modal" id=""><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs btn-danger mx-1" data-target="#satuanHapus{{ $model->id }}" data-toggle="modal" id=""><i class="fa fa-trash-o"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src=" {{ asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }} " type="text/javascript"></script>
<script src=" {{ asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }} " type="text/javascript"></script>
<script src=" {{ asset('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }} " type="text/javascript"></script>
<script src=" {{ asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }} " type="text/javascript"></script>
<script type="text/javascript" src=" {{ asset('assets/plugins/datatables-responsive/js/datatables.responsive.js') }} "></script>
<script type="text/javascript" src=" {{ asset('assets/plugins/datatables-responsive/js/lodash.min.js') }} "></script>

<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
