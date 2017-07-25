
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
                    <h1>Transaksi Pembayaran
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
                        <span>Transaksi</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Transaksi Pembayaran</span>
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
                                <h3 class="modal-title">Form Perusahaan</h3>
                            </div>
                            <div class="modal-body form">
                                <form action="<?php echo base_url('perusahaan/RiwayatTransaksi/ajax_add');?>"
                                      id="form" class="form-horizontal" enctype="multipart/form-data" method="post">
                                    <input type="hidden" value="" name="id"/>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Jumlah Piutang (IDR) </label>
                                            <div class="col-md-9">
                                                <input name="jumlah" id="jumlah" placeholder="Jumlah Piutang"
                                                       class="form-control" type="text" disabled="disabled">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Jumlah Piutang (USD) </label>
                                            <div class="col-md-9">
                                                <input name="jumlahusd" id="jumlahusd" placeholder="Jumlah Piutang"
                                                       class="form-control" type="text" disabled="disabled">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nominal Pembayaran (IDR)</label>
                                            <div class="col-md-9">
                                                <input name="nominal" id="nominal"
                                                       placeholder="Nominal Pembayaran (IDR)" class="form-control" type="number">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nominal Pembayaran (USD)</label>
                                            <div class="col-md-9">
                                                <input name="nominaldollar" id="nominaldollar"
                                                       placeholder="Nominal Pembayaran (USD)" class="form-control" type="number">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Foto / Scan Bukti Pembayaran</label>
                                            <div class="col-md-9">
                                                <input name="image" id="image" placeholder="Foto / Scan"
                                                       class="form-control" type="file">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Keterangan apabila keberatan atas tagihan</label>
                                            <div class="col-md-9">
                                                <textarea name="keterangan" id="keterangan"
                                                          placeholder="Keterangan apabila keberatan atas tagihan"
                                                       class="form-control" rows="5">
                                                    </textarea>
                                                <span class="help-block"></span>
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
                                            <span class="caption-subject font-green-sharp bold uppercase">Transaksi Pembayaran</span>
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
                                                        <th>Nominal Pembayaran (IDR)</th>
                                                        <th>Nominal Pembayaran (USD)</th>
                                                        <th>File</th>
                                                        <th>Keterangan</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Bayar</th>
                                                    </tr>
                                                    </thead>
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
            url: 'tagihanawal/search',
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

        //datatables
        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('perusahaan/RiwayatTransaksi/ajax_list')?>",
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
    function view_email(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('perusahaan/RiwayatTransaksi/ajax_view_email/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="company_id"]').val(data.company_id);
                $('[name="email"]').val(data.email);

                $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Email'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    function edit_company(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('perusahaan/RiwayatTransaksi/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="nama"]').val(data.company_name);
                $('[name="tipetagihan"]').val(data.legal_type);
                $('[name="provinsi"]').val(data.province);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Perusahaan'); // Set title to Bootstrap modal title

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
        //var formData = new FormData($(this)[0]);
//        var formData = new FormData( $("#modal_form")[0] );
        if(save_method == 'add') {
            url = "<?php echo site_url('perusahaan/RiwayatTransaksi/ajax_add')?>";
        } else {
            url = "<?php echo site_url('perusahaan/RiwayatTransaksi/ajax_update')?>";
        }
        $.each($('image'[0]).files, function(i, file){
            data.append('image', file);
        });
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            //data: formData,
            data: $('#form').serialize(),
            dataType: "JSON",
//            contentType : false,
//            processData : false,
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
                url : "<?php echo site_url('perusahaan/RiwayatTransaksi/ajax_delete')?>/"+id,
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
        $('.modal-title').text('Bayar Tagihan'); // Set Title to Bootstrap modal title
        $('#nominal').val(0);
        $('#nominaldollar').val(0);
        $('#keterangan').val('');
        $.ajax({
            url : "<?php echo site_url('perusahaan/RiwayatTransaksi/get_piutang/')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('#jumlah').val(data)
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
        $.ajax({
            url : "<?php echo site_url('perusahaan/RiwayatTransaksi/get_piutang_dollar/')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data2)
            {
                $('#jumlahusd').val(data2)
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax '.errorThrown);
            }
        });
    }
</script>