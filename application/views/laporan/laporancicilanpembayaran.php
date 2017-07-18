
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
                                            <span class="caption-subject font-green-sharp bold uppercase">Laporan Piutang PNBP - Laporan Cicilan Pembayaran</span>
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
                                                        <th>Tanggal</th>
                                                        <th>Pembayaran (IDR)</th>
                                                        <th>Pembayaran (USD)</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="4" style="text-align:right">Total:</th>
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
                    totalSaldoAwalIdr += parseFloat(aaData[i][4].replace(/,/g, ''));
                }
                /* Calculate the market share for browsers on this page */
                var totalSaldoAwalUsd = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    totalSaldoAwalUsd += parseFloat(aaData[aiDisplay[i]][5].replace(/,/g, ''));
                }

                var nCells = nRow.getElementsByTagName('th');
                nCells[1].innerHTML = numberWithCommas(parseInt(totalSaldoAwalIdr));
                nCells[2].innerHTML = numberWithCommas(parseInt(totalSaldoAwalUsd));
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "deferRender": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('laporan/LaporanCicilanPembayaran/ajax_list')?>",
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
