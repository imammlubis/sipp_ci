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
                    <h1>Tagihan Awal
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
                        <span>Input Tagihan Awal</span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->
                <!--Modal 1-->
                <div class="modal fade" id="addModal1" role="addModal1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Form Input Data Tagihan Awal Perusahaan</h4>
                            </div>
                            <form action="<?php echo base_url('tagihan/TagihanAwal/insertdata');?>" method="post"
                                  enctype="multipart/form-data"
                                  class="form-horizontal">
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Perusahaan</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-address-book-o"></i>
                                                    <select class="itemName form-control input-circle" style="width:370px"
                                                            id="itemName" name="itemName"></select>
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
                                                    <div class="input-group input-large date-picker input-daterange input-circle"
                                                         data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                        <input type="text" class="form-control" name="from" id="from">
                                                        <span class="input-group-addon"> to </span>
                                                        <input type="text" class="form-control" name="to" id="to"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Penagihan</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-address-book-o"></i>
                                                    <input id="tahunpenagihan" name="tahunpenagihan" type="number"
                                                           class="form-control input-circle" placeholder="Pemeriksa">
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
                                                           class="form-control input-circle" placeholder="Tanggal Tagihan">
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
                                            <label class="col-md-3 control-label">Nominal Tagihan</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-address-book-o"></i>
                                                    <input id="nominaltagihan" name="nominaltagihan" type="number"
                                                           class="form-control input-circle" placeholder="Nominal Tagihan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-circle default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-circle blue">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
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
                                            <span class="caption-subject font-green-sharp bold uppercase">Daftar Tagihan Awal Perusahaan</span>
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
                                                        <button id="addnew1" class="btn green" data-toggle="modal" data-target="#addModal1">
                                                            Add New <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" align="right">

                                                </div>
                                            </div>
                                        </div>
                                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">

                                            <div class="table-scrollable">


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

</script>