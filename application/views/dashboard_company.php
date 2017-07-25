<div class="page-container">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <div class="container">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Dashboard
                <small>dashboard &amp; progress</small>
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
        <a href="index.html">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Dashboard</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
<div class="mt-content-body">
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet light ">
<!--            <div class="portlet-title">-->
<!--                <div class="caption caption-md">-->
<!--                    <i class="icon-bar-chart font-dark hide"></i>-->
<!--                    <span class="caption-subject font-green-steel uppercase bold">Progress</span>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="portlet-body">-->
<!--                <div class="row list-separated">-->
<!--                    <div class="col-md-3 col-sm-3 col-xs-6">-->
<!--                        <div class="font-grey-mint font-sm"> Total Piutang </div>-->
<!--                        <div class="uppercase font-hg font-red-flamingo"> 13,760-->
<!--                            <span class="font-lg font-grey-mint">IDR</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-3 col-sm-3 col-xs-6">-->
<!--                        <div class="font-grey-mint font-sm"> Total Pembayaran </div>-->
<!--                        <div class="uppercase font-hg theme-font"> 4,760-->
<!--                            <span class="font-lg font-grey-mint">IDR</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-3 col-sm-3 col-xs-6">-->
<!--                        <div class="font-grey-mint font-sm"> Total Saldo </div>-->
<!--                        <div class="uppercase font-hg font-purple"> 9,000-->
<!--                            <span class="font-lg font-grey-mint">IDR</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row list-separated">-->
<!--                    <div class="col-md-3 col-sm-3 col-xs-6">-->
<!--                        <div class="font-grey-mint font-sm"> Total Piutang </div>-->
<!--                        <div class="uppercase font-hg font-red-flamingo"> 13,760-->
<!--                            <span class="font-lg font-grey-mint">USD</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-3 col-sm-3 col-xs-6">-->
<!--                        <div class="font-grey-mint font-sm"> Total Pembayaran </div>-->
<!--                        <div class="uppercase font-hg theme-font"> 4,760-->
<!--                            <span class="font-lg font-grey-mint">USD</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-3 col-sm-3 col-xs-6">-->
<!--                        <div class="font-grey-mint font-sm"> Total Saldo </div>-->
<!--                        <div class="uppercase font-hg font-purple"> 9,000-->
<!--                            <span class="font-lg font-grey-mint">USD</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            Selamat Datang Di sippminerba (sistem informasi piutang pnbp mineral dan batubara)
        </div>
<!--        <div class="portlet light">-->
<!--            <div class="portlet-title">-->
<!--                <div class="caption">-->
<!--                    <i class="fa fa-cogs font-green-sharp"></i>-->
<!--                    <span class="caption-subject font-green-sharp bold uppercase">Laporan Piutang PNBP - Laporan Tagihan Awal</span>-->
<!--                </div>-->
<!--                <div class="tools">-->
<!--                    <a href="javascript:;" class="collapse" data-original-title="" title="">-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="portlet-body">-->
<!--                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">-->
<!--                    <div class="">-->
<!--                        <table id="table" class="table table-striped table-bordered table-condensed"-->
<!--                               cellspacing="0" width="100%">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th>Perusahaan</th>-->
<!--                                <th>Tanggal</th>-->
<!--                                <th>Iuran Tetap (IDR)</th>-->
<!--                                <th>Iuran Tetap (USD)</th>-->
<!--                                <th>Royalti(IDR)</th>-->
<!--                                <th>Royalti(USD)</th>-->
<!--                                <th>PHT(IDR)</th>-->
<!--                                <th>PHT(USD)</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tfoot>-->
<!--                            <tr>-->
<!--                                <th colspan="2" style="text-align:right">Total:</th>-->
<!--                                <th></th>-->
<!--                                <th></th>-->
<!--                                <th></th>-->
<!--                                <th></th>-->
<!--                                <th></th>-->
<!--                                <th></th>-->
<!--                            </tr>-->
<!--                            </tfoot>-->
<!--                            <tbody>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-7 col-sm-12">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
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
    // function of datatables
    var table;
    $(document).ready(function() {

        table = $('#table').DataTable({
//            "fnFooterCallback": function(nRow, aaData, iDataStart, iDataEnd,aiDisplay){
//                var totalSaldoAwalIdr = 0;
//                for ( var i=0 ; i<aaData.length ; i++ )
//                {
//                    totalSaldoAwalIdr += parseFloat(aaData[i][4].replace(/,/g, ''));
//                }
//                /* Calculate the market share for browsers on this page */
//                var totalSaldoAwalUsd = 0;
//                for ( var i=iDataStart ; i<iDataEnd ; i++ )
//                {
//                    totalSaldoAwalUsd += parseFloat(aaData[aiDisplay[i]][5].replace(/,/g, ''));
//                }
//                var totalPembayaranIdr = 0;
//                for ( var i=iDataStart ; i<iDataEnd ; i++ )
//                {
//                    totalPembayaranIdr += parseFloat(aaData[aiDisplay[i]][6].replace(/,/g, ''));
//                }
//                var totalPembayaranUsd = 0;
//                for ( var i=iDataStart ; i<iDataEnd ; i++ )
//                {
//                    totalPembayaranUsd += parseFloat(aaData[aiDisplay[i]][7].replace(/,/g, ''));
//                }
//                var totalSaldoAkhirIdr = 0;
//                for ( var i=iDataStart ; i<iDataEnd ; i++ )
//                {
//                    totalSaldoAkhirIdr += parseFloat(aaData[aiDisplay[i]][8].replace(/,/g, ''));
//                }
//                var totalSaldoAkhirUsd = 0;
//                for ( var i=iDataStart ; i<iDataEnd ; i++ )
//                {
//                    totalSaldoAkhirUsd += parseFloat(aaData[aiDisplay[i]][9].replace(/,/g, ''));
//                }
//
//                var nCells = nRow.getElementsByTagName('th');
//                nCells[1].innerHTML = numberWithCommas(parseInt(totalSaldoAwalIdr));
//                nCells[2].innerHTML = numberWithCommas(parseInt(totalSaldoAwalUsd));
//                nCells[3].innerHTML = numberWithCommas(parseInt(totalPembayaranIdr));
//                nCells[4].innerHTML = numberWithCommas(parseInt(totalPembayaranUsd));
//                nCells[5].innerHTML = numberWithCommas(parseInt(totalSaldoAkhirIdr));
//                nCells[6].innerHTML = numberWithCommas(parseInt(totalSaldoAkhirUsd));
//            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "deferRender": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('laporan/LaporanTagihanAwal/ajax_list_dua')?>",
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
            "pageLength": 25
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