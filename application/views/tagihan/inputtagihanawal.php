
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
                    <h1>Tagihan
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
                        <span>Tagihan</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Data Tagihan Awal</span>
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
                                <h3 class="modal-title">Form Data Tagihan Awal Perusahaan</h3>
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
                                     <label class="col-md-3 control-label">Iuran Tetap (IDR) </label>
                                     <div class="col-md-8">
                                         <div class="input-icon">
                                             <i class="fa fa-address-book-o"></i>
                                             <input id="iuran_tetap_idr" name="iuran_tetap_idr" type="number"
                                                    class="form-control input-circle" placeholder="Iuran Tetap (IDR)">
                                         </div>
                                     </div>
                                 </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Iuran Tetap (USD) </label>
                                    <div class="col-md-8">
                                        <div class="input-icon">
                                            <i class="fa fa-address-book-o"></i>
                                            <input id="iuran_tetap_usd" name="iuran_tetap_usd" type="number"
                                                   class="form-control input-circle" placeholder="Iuran Tetap (USD)">
                                        </div>
                                    </div>
                                </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Royalti (IDR) </label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-address-book-o"></i>
                                                    <input id="royalti_idr" name="royalti_idr" type="number"
                                                           class="form-control input-circle" placeholder="Royalti (IDR)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Royalti (USD) </label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-address-book-o"></i>
                                                    <input id="royalti_usd" name="royalti_usd" type="number"
                                                           class="form-control input-circle" placeholder="Royalti (USD)">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">PHT (IDR) </label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-address-book-o"></i>
                                                    <input id="pht_idr" name="pht_idr" type="number"
                                                           class="form-control input-circle" placeholder="PHT (IDR)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">PHT (USD) </label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-address-book-o"></i>
                                                    <input id="pht_usd" name="pht_usd" type="number"
                                                           class="form-control input-circle" placeholder="PHT (USD)">
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
                                            <span class="caption-subject font-green-sharp bold uppercase">Data Tagihan Awal</span>
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="" title="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Data Tagihan Awal </button>

                                                    </div>
                                                    <div class="btn-group">
                                                        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload Data </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" align="right">

                                                </div>
                                            </div>
                                        </div>
                                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                            <div class="table-scrollable">
                                                <table id="table" class="table table-striped table-bordered table-condensed"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Perusahaan</th>
                                                        <th>Provinsi</th>
                                                        <th>Evaluator</th>
                                                        <th>Periode Pemeriksaan</th>
                                                        <th>Periode Tagihan</th>
                                                        <th>No Tagihan</th>
                                                        <th>Tgl Tagihan</th>
                                                        <th>IuranTetap(IDR)</th>
                                                        <th>IuranTetap(USD)</th>
                                                        <th>Royalti(IDR)</th>
                                                        <th>Royalti(USD)</th>
                                                        <th>PHT(IDR)</th>
                                                        <th>PHT(USD)</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="8" style="text-align:right">Total:</th>
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
                var sada = 0;
                for ( var i=0 ; i<aaData.length ; i++ )
                {
                    sada += parseFloat(aaData[i][8].replace(/,/g, ''));
                }
                /* Calculate the market share for browsers on this page */
                var dua = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    dua += parseFloat(aaData[aiDisplay[i]][9].replace(/,/g, ''));
                }
                var tolu = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    tolu += parseFloat(aaData[aiDisplay[i]][10].replace(/,/g, ''));
                }
                var opat = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    opat += parseFloat(aaData[aiDisplay[i]][11].replace(/,/g, ''));
                }
                var lima = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    lima += parseFloat(aaData[aiDisplay[i]][12].replace(/,/g, ''));
                }
                var onom = 0;
                for ( var i=iDataStart ; i<iDataEnd ; i++ )
                {
                    onom += parseFloat(aaData[aiDisplay[i]][13].replace(/,/g, ''));
                }
                var nCells = nRow.getElementsByTagName('th');
                nCells[1].innerHTML = numberWithCommas(parseInt(sada));
                nCells[2].innerHTML = numberWithCommas(parseInt(dua));
                nCells[3].innerHTML = numberWithCommas(parseInt(tolu));
                nCells[4].innerHTML = numberWithCommas(parseInt(opat));
                nCells[5].innerHTML = numberWithCommas(parseInt(lima));
                nCells[6].innerHTML = numberWithCommas(parseInt(onom));
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('tagihan/TagihanAwal/ajax_list')?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": true //set not orderable
                },
            ],
        });
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };
    function edit_tagihan(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#company_name').prop('disabled',true);
        $('#company_name').show();
        //$('#itemName').prop('disabled',true);
        $('#itemName').hide();
        $('span.select2').hide();
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('tagihan/TagihanAwal/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                data.iuran_tetap_idr = data.iuran_tetap_idr == null ? 0 : data.iuran_tetap_idr;
                data.iuran_tetap_usd = data.iuran_tetap_usd == null ? 0 : data.iuran_tetap_usd;

                data.royalti_idr = data.royalti_idr == null ? 0 : data.royalti_idr;
                data.royalti_usd = data.royalti_usd == null ? 0 : data.royalti_usd;

                data.pht_idr = data.pht_idr == null ? 0 : data.pht_idr;
                data.pht_usd = data.pht_usd == null ? 0 : data.pht_usd;

                $('[name="id"]').val(data.id);
                $('[name="company_name"]').val(data.company_name);
                $('[name="pemeriksa"]').val(data.evaluator);
                $('#periodtime').val(data.checking_period1+ ' - '+data.checking_period2);

                $('[name="tahunpenagihan"]').val(data.billing_period);
                $('[name="nosurat"]').val(data.billing_no);
                $('[name="tanggaltagihan"]').val(data.billing_date);
                $('[name="iuran_tetap_idr"]').val(data.iuran_tetap_idr);
                $('[name="iuran_tetap_usd"]').val(data.iuran_tetap_usd);

                $('[name="royalti_idr"]').val(data.royalti_idr);
                $('[name="royalti_usd"]').val(data.royalti_usd);

                $('[name="pht_idr"]').val(data.pht_idr);
                $('[name="pht_usd"]').val(data.pht_usd);

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
            url = "<?php echo site_url('tagihan/TagihanAwal/ajax_add')?>";
        } else {
            url = "<?php echo site_url('tagihan/TagihanAwal/ajax_update')?>";
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
                url : "<?php echo site_url('tagihan/TagihanAwal/ajax_delete')?>/"+id,
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
        $('#iuran_tetap_idr').val(0);
        $('#iuran_tetap_usd').val(0);
        $('#royalti_idr').val(0);
        $('#royalti_usd').val(0);
        $('#pht_idr').val(0);
        $('#pht_usd').val(0);

    }
</script>