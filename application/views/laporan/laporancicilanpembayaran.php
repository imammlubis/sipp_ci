
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="page-container">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <div class="container">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Laporan
                <!--small>dashboard &amp; statistics</small-->
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE CONTENT BODY -->
<div class="page-content">
<div class="container">
<!-- BEGIN PAGE BREADCRUMBS -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="#">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Laporan</span>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Laporan Cicilan Pembayaran</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMBS -->
<!--Modal 1-->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Data Piutang</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Perusahaan</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <select class="itemName form-control input-circle" style="width:370px"
                                            id="itemName" name="itemName"></select>
                                    <input id="company_name" name="company_name" type="text"
                                           class="form-control input-circle" placeholder="Perusahaan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Pemeriksa</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <input id="pemeriksa" name="pemeriksa" type="text"
                                           class="form-control input-circle" placeholder="Pemeriksa">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Periode</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <!--                                                    <div class="input-group input-large date-picker input-daterange input-circle"-->
                                    <!--                                                         data-date-format="yyyy-mm-dd">-->
                                    <!--                                                        <input type="text" class="form-control" name="from" id="from">-->
                                    <!--                                                        <span class="input-group-addon"> to </span>-->
                                    <!--                                                        <input type="text" class="form-control" name="to" id="to"> </div>-->
                                    <input type="text" name="periodtime" id="periodtime"
                                           data-date-format="yyyy-mm-dd"
                                           value="" class="form-control input-circle" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tahun Penagihan</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <input id="tahunpenagihan" name="tahunpenagihan" type="number"
                                           class="form-control input-circle" placeholder="Tahun Penagihan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">No Surat Tagihan</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <input id="nosurat" name="nosurat" type="text"
                                           class="form-control input-circle" placeholder="No Surat Tagihan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Tagihan</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <input id="tanggaltagihan" name="tanggaltagihan" type="text"
                                           class="form-control datepicker input-circle" placeholder="Tanggal Tagihan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tipe Tagihan</label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <select class="form-control input-circle"
                                            name="tipetagihan" id="tipetagihan">
                                        <option value="">- Silahkan Pilih  -</option>
                                        <option value="Iuran Tetap">Iuran Tetap</option>
                                        <option value="Royalti">Royalti</option>
                                        <option value="PHT">PHT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nominal Tagihan (IDR) </label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <input id="nominaltagihan" name="nominaltagihan" type="number"
                                           class="form-control input-circle" placeholder="Nominal Tagihan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nominal Tagihan (USD) </label>
                            <div class="col-md-8">
                                <div class="input-icon">
                                    <i class="fa fa-address-book-o"></i>
                                    <input id="nominaltagihandollar" name="nominaltagihandollar" type="number"
                                           class="form-control input-circle" placeholder="Nominal Tagihan">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!--End Modal1-->

<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="mt-content-body">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Laporan Piutang PNBP</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title="">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class="">
                                <table id="table" class="table table-striped table-bordered table-condensed"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Perusahaan</th>
                                        <th>Jenis Kontrak</th>
                                        <th>Provinsi</th>
                                        <th>Saldo Awal IT(IDR)</th>
                                        <th>Saldo Awal IT(USD)</th>
                                        <th>Saldo Awal R(IDR)</th>
                                        <th>Saldo Awal R(USD)</th>
                                        <th>Saldo Awal PHT(IDR)</th>
                                        <th>Saldo Awal PHT(USD)</th>
                                        <th>Pembayaran (IDR)</th>
                                        <th>Pembayaran (USD)</th>
                                        <th>Saldo Akhir (IDR)</th>
                                        <th>Saldo Akhir (USD)</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3" style="text-align:right">Total:</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-sm-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>
<!-- END PAGE CONTENT INNER -->
</div>
</div>
<!-- END PAGE CONTENT BODY -->
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>

<script type="text/javascript">
    $('#itemName').select2({
        placeholder: '--Pilih Perusahaan--',
        ajax: {
            url: 'TagihanAwal/search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    // function of datatables
    var table;
    $(document).ready(function() {
        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });
        $('#periodtime').daterangepicker({
            format: "yyyy-mm-dd"
        });
        //datatables
        table = $('#table').DataTable({
            "fnFooterCallback": function(nRow, aaData, iDataStart, iDataEnd,aiDisplay){
                var totalSaldoAwalIdr = 0;
                for ( var i=0 ; i<aaData.length ; i++ )
                {
                    totalSaldoAwalIdr += parseFloat(aaData[i][3].replace(/,/g, ''));
                }
                /* Calculate the market share for browsers on this page */
                var totalSaldoAwalUsd = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    totalSaldoAwalUsd += parseFloat(aaData[aiDisplay[i]][4].replace(/,/g, ''));
                }
                var totalPembayaranIdr = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    totalPembayaranIdr += parseFloat(aaData[aiDisplay[i]][5].replace(/,/g, ''));
                }
                var totalPembayaranUsd = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    totalPembayaranUsd += parseFloat(aaData[aiDisplay[i]][6].replace(/,/g, ''));
                }
                var totalSaldoAkhirIdr = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    totalSaldoAkhirIdr += parseFloat(aaData[aiDisplay[i]][7].replace(/,/g, ''));
                }
                var totalSaldoAkhirUsd = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    totalSaldoAkhirUsd += parseFloat(aaData[aiDisplay[i]][8].replace(/,/g, ''));
                }
                var pitu = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    pitu += parseFloat(aaData[aiDisplay[i]][9].replace(/,/g, ''));
                }

                var lapan = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    lapan += parseFloat(aaData[aiDisplay[i]][10].replace(/,/g, ''));
                }

                var sambilan = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    sambilan += parseFloat(aaData[aiDisplay[i]][11].replace(/,/g, ''));
                }
                var sapulu = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    sapulu += parseFloat(aaData[aiDisplay[i]][12].replace(/,/g, ''));
                }

                var nCells = nRow.getElementsByTagName('th');
                nCells[1].innerHTML = numberWithCommas(parseInt(totalSaldoAwalIdr));
                nCells[2].innerHTML = numberWithCommas(parseInt(totalSaldoAwalUsd));
                nCells[3].innerHTML = numberWithCommas(parseInt(totalPembayaranIdr));
                nCells[4].innerHTML = numberWithCommas(parseInt(totalPembayaranUsd));
                nCells[5].innerHTML = numberWithCommas(parseInt(totalSaldoAkhirIdr));
                nCells[6].innerHTML = numberWithCommas(parseInt(totalSaldoAkhirUsd));

                nCells[7].innerHTML = numberWithCommas(parseInt(pitu));
                nCells[8].innerHTML = numberWithCommas(parseInt(lapan));

                nCells[9].innerHTML = numberWithCommas(parseInt(sambilan));
                nCells[10].innerHTML = numberWithCommas(parseInt(sapulu));
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "deferRender": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('laporan/LaporanPiutang/ajax_list')?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": true //set not orderable
                },
            ],

            "dom": 'Blfrtip',
            "lengthMenu": [[10, 25, 100, -1], [10, 25, 100, "All"]],
            "pageLength": 25,
            "buttons": [
                {
                    extend: 'excel',
                    text: '<span class="fa fa-file-excel-o"></span> Excel Export',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        }
                    }
                }
            ],
        });
    });


    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

</script>
