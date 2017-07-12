
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
        <span>Laporan Piutang</span>
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
                            <div class="table-scrollable">
                                <table id="table" class="table table-striped table-bordered table-condensed"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Perusahaan</th>
                                        <th>Evaluator</th>
                                        <th>Periode Pemeriksaan</th>
                                        <th>Periode Tagihan</th>
                                        <th>No Tagihan I</th>
                                        <th>Tgl Tagihan I</th>
                                        <th>Nominal(IDR)</th>
                                        <th>Nominal(USD)</th>
                                        <th>Tipe</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6" style="text-align:right">Total:</th>
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
                var iTotalMarket = 0;
                for ( var i=0 ; i<aaData.length ; i++ )
                {
                    iTotalMarket += parseFloat(aaData[i][6].replace(/,/g, ''));
                }

                /* Calculate the market share for browsers on this page */
                var iPageMarket = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    iPageMarket += parseFloat(aaData[aiDisplay[i]][6].replace(/,/g, ''));
                }
                var nCells = nRow.getElementsByTagName('th');
//                nCells[1].innerHTML = parseInt(iPageMarket);
                nCells[1].innerHTML = numberWithCommas(parseInt(iPageMarket));
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

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
            ]
        });

    });
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function edit_tagihan(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#company_name').prop('disabled',true);
        //$('#itemName').prop('disabled',true);
        $('#itemName').hide();
        $('span.select2').hide();
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('laporan/LaporanPiutang/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="company_name"]').val(data.company_name);
                $('[name="pemeriksa"]').val(data.evaluator);
                $('#periodtime').val(data.checking_period1+ ' - '+data.checking_period2);

                $('[name="tahunpenagihan"]').val(data.billing_period);
                $('[name="nosurat"]').val(data.billing_no);
                $('[name="tanggaltagihan"]').val(data.billing_date);
                $('[name="tipetagihan"]').val(data.billing_type);
                $('[name="nominaltagihan"]').val(data.amount);
                $('[name="nominaltagihandollar"]').val(data.nominaltagihandollar);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Tagihan'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('laporan/LaporanPiutang/ajax_add')?>";
        } else {
            url = "<?php echo site_url('laporan/LaporanPiutang/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }

    function delete_company(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('laporan/LaporanPiutang/ajax_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }


    function add_person()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Tagihan'); // Set Title to Bootstrap modal title
        $('#company_name').prop('disabled',false);
        $('#company_name').hide();

        $('#itemName').show();
        $('span.select2').show();
    }
</script>