<div class="content">
  <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-left" role="tablist">
    <li class="nav-item">
      <a  href = "<?= base_url('mpeople/add');?>" class="nav-link" >
        <i class="material-icons">assignment_ind</i> <?= lang('ui_individual') ?>
      </a>
    </li>
    <li class="nav-item ">
      <a  href = "<?= base_url('minstance/add');?>" class="nav-link" >
        <i class="material-icons">assignment</i> <?= lang('ui_instance') ?>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href = "<?= base_url('mmember/add');?>">
        <i class="material-icons">list</i>  <?= lang('ui_register') ?>
      </a>
    </li>
    <li class="nav-item disabled">
      <a  class="nav-link active show">
        <i class="material-icons">money</i>  <?= lang('ui_submission') ?>
      </a>
    </li>
  </ul>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col">
                <h4 class="card-title "><?= lang('ui_add_data')?></h4>
                <p class="card-category"> <?= lang('ui_transaction_submission')?></p>
              </div>
              <div class="col">
                <div class="text-right">
                  <button type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="index" onclick="window.location.href='<?= base_url('tsubmission');?>'">
                    <i class="material-icons">list</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#forminput" role="tablist">
                        Form
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#attachfile" role="tablist">
                        File
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-space">
              <div class = "tab-pane active show" id = "forminput">                 
                <form method = "post" action = "<?= base_url('tsubmission/editsave');?>">
                  <input hidden id =  "idsubmission" name = "idsubmission" value = "<?= $model->Id?>">
                  <div class = "row">
                    <div class = "col-md-6">
                      <div class="form-group">
                        <label><?= lang('ui_number')?></label>
                        <input id="number" type="text"  class="form-control " name = "number" placeholder ="<?= $model->NoSubmission?>" disabled>
                      </div>
                    </div>
                    <div class = "col-md-4">
                      <!-- <label><?= lang('ui_status')?></label> -->
                      <div class="form-group">
                        <?php $status = empty( $model->Status) ? lang("ui_status") : getEnumName("SubmissionStatus", $model->Status)?>
                        <select id = "status" name ="status" class="selectpicker" data-style="select-with-transition" title ="<?= $status ?> ">
                          <!-- <option class="bs-title-option" value=""></option> -->
                          <?php 	
                          foreach ($this->M_enums->get_data_by_id(9) as $value)
                          { 
                          ?>
                            <option value ="<?= $value->Value?>"><?= lang($value->Resource)?></option>
                          <?php 
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                  </div>
                  <div class = "row">
                    <div class = "col-md-6">
                      <div class="form-group">
                        <label><?= lang('ui_member')?></label>
                        <div class="input-group has-success">
                          <input hidden id = "memberid" type="text" class="form-control" name = "memberid" value="<?= $model->M_Member_Id?>" >
                          <input id = "membername" type="text" class="form-control custom-readonly"  value="<?= $model->get_M_Member()->NoMember?>" readonly>
                      
                          <div class="input-group-append">
                            <button id="btnPeopleModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalMembers"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class = "col-md-6">
                      <div class="form-group">
                        <label><?= lang('ui_loan')?></label>
                        <div class="input-group has-success">
                          <input hidden id = "loanid" type="text" class="form-control" name = "loanid" value="<?= $model->M_Loan_Id?>" >
                          <input id = "loanname" type="text" class="form-control custom-readonly"  value="<?= $model->get_M_Loan()->Name?>" readonly>
                      
                          <div class="input-group-append">
                            <button id="btnLoanModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalLoans"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class = "row">
                    <div class = "col-md-6">
                      <div class="form-group">  
                        <label><?= lang('ui_submissiondate')?></label>
                        <input id="submissiondate" type="text" class="form-control datepicker" name = "submissiondate"value = "<?= $model->ApplyDate?>" >
                      </div>
                    </div>
                    <div class = "col-md-6">
                      <div class="form-group">  
                        <label><?= lang('ui_plafon')?></label>
                        <input id="plafon" type="text" class="form-control money2" name = "plafon" value = "<?= $model->Plafon?>" >
                        <span class="bmd-help input-help text-primary "><?= lang('info_in_rupiah')?></span>
                      </div>
                    </div>
                  </div>
                
                  <div class = "row">
                    <div class = "col-md-6">
                      <div class="form-group">  
                        <label><?= lang('ui_span')?></label>
                        <input id="span" type="text" class="form-control" name = "span" value = "<?= $model->Span?>" >
                        <span class="bmd-help input-help text-primary"><?= lang('info_in_month')?></span>
                      </div>
                    </div>
                    
                    <div class = "col-md-2">
                      <div class="form-group">
                        <label><?= lang('ui_rate')?></label>
                        <input id="rate" type="text" class="form-control money" name = "rate" value = "<?= $model->Rate?>">
                        <span class="bmd-help input-help text-primary"><?= lang('info_in_percent')?></span>
                      </div>
                    </div>
                    <div class = "col-md-4">
                      <!-- <label><?= lang('ui_ratetype')?></label> -->
                      <div class="form-group">
                        <?php $blood = empty( $model->RateType) ? lang("ui_ratetype") : getEnumName("RateType", $model->RateType)?>
                        <select id = "ratetype" name ="ratetype" class="selectpicker" data-style="select-with-transition" title ="<?= $blood ?> ">
                          <!-- <option class="bs-title-option" value=""></option> -->
                          <?php 	
                          foreach ($this->M_enums->get_data_by_id(8) as $value)
                          { 
                          ?>
                            <option value ="<?= $value->Value?>"><?= lang($value->Resource)?></option>
                          <?php 
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class = "row">
                    <div class = "col-md-12">      
                      <input type="submit" value="<?= lang('ui_save')?>" class="btn btn-primary">
                    </div>
                  </div>
                </form>
              </div>
              <div class = "tab-pane" id = "attachfile">
                <div class="row" >
                  <div class="col-md-12">
                    <label><?= lang('ui_choosefile')?></label>
                    <?php if($model->hasUploadedFiles()){?>
                      <label> ~ </label>
                      <a href="#" data-toggle="modal" data-target = "#modalFiles"><?= lang('info_submission_has_attach_file')?></a>
                    <?php }?>
                    <!-- <form action="<?= base_url('t_submission/upload_file');?>" class="dropzone" enctype="multipart/form-data">
                      <input hidden id =  "idsubmission" name = "idsubmission" value = "<?= $model->Id?>">
                      <div class="fallback">
                        <input name="file[]" type="file" multiple />
                        <img src="removebutton.png" alt="Click me to remove the file." data-dz-remove />
                      </div>
                    </form> -->
                    <div id = "submissiondropzone" class = "dropzone">
                    </div>
                  </div>
                </div>
                <?php if($model->hasUploadedFiles()){?>
                <div class="row" >
                  <div class="col-md-12 text-right">
                    <label class = "text-danger"><?= lang('info_reupload_submission_file')?></label>
                  </div>
                </div>
                <?php }?>
                <div class = "row">
                    <div class = "col-md-12">      
                      <input id = "uploadsubmissionfile" type="button" value="<?= lang('ui_upload')?>" class="btn btn-primary">
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item" rel="tooltip" title="<?= lang('ui_installment')?>">
                    <a class="nav-link active show" href="#installment" data-toggle="tab">
                      <i class="material-icons">subject</i>
                      <div class="ripple-container"></div>
                    <div class="ripple-container"></div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#messages" data-toggle="tab">
                      <i class="material-icons">code</i> Website
                      <div class="ripple-container"></div>
                    <div class="ripple-container"></div></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#settings" data-toggle="tab">
                      <i class="material-icons">cloud</i> Server
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active show" id="installment">
                <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tableInstallment" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                  <thead class=" text-primary">
                    <tr role = "row">
                      <th><?=  lang('ui_month')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_duedate')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_installment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_installmentpayment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_ratepayment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_amountpayment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_balance')?></th>
                    </tr>
                  </thead>
                  <tfoot class=" text-primary">
                    <tr role = "row">
                      <th><?=  lang('ui_month')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_duedate')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_installment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_installmentpayment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_ratepayment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_amountpayment')?></th>
                      <th class="disabled-sorting"><?=  lang('ui_balance')?></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                      $i = 1;
                    foreach ($model->get_list_T_Submissiondetail() as $value)
                    {
                      // setlocale(LC_MONETARY,"id_ID");
                      // $name = !empty($value->get_M_Member()->get_M_People()->CompleteName) ? $value->get_M_Member()->get_M_People()->CompleteName : $value->get_M_Member()->get_M_Instance()->Owner." / ".$value->get_M_Member()->get_M_Instance()->InstanceName;
                  ?>
                      <tr role = "row" id = <?= $value->Id?>>
                        <td><?= $value->Month?></td>
                        <td><?= get_formated_date($value->DueDate, 'd-m-Y')?></td>
                        <td><?= number_format($value->Installment, 2, ",", ".")?></td>
                        <td><?= number_format($value->InstallmentPayment, 2, ",", ".")?></td>
                        <td><?= number_format($value->RatePayment, 2, ",", ".")?></td>
                        <td><?= number_format($value->AmountPayment, 2, ",", ".")?></td>
                        <td><?= number_format($value->Balance, 2, ",", ".")?></td>
                      </tr>
                  <?php
                      $i++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
               <!-- modal -->
<div id="modalMembers" tabindex="-1" role="dialog" aria-labelledby="PeopleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="PeopleModalLabel" class="modal-title"><?= lang('ui_member')?></h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="card-body">
        <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar
                                  -->
        </div>
        <div class="material-datatables">
          <div id = "datatables_wrapper" class = "dataTables_wrapper dt-bootstrap4">
            <!-- <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatables_length"><label>Show <select name="datatables_length" aria-controls="datatables" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatables_filter" class="dataTables_filter"><label><span class="bmd-form-group bmd-form-group-sm"><input type="search" class="form-control form-control-sm" placeholder="Search records" aria-controls="datatables"></span></label></div></div></div> -->
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tablemodalMembers" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                        <th><?=  lang('ui_number')?></th>
                        <th><?=  lang('ui_name')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_number')?></th>
                        <th><?=  lang('ui_name')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($this->M_members->get_list() as $value)
                        {
                          $name = !empty($value->get_M_People()->CompleteName) ? $value->get_M_People()->CompleteName : $value->get_M_Instance()->Owner." / ".$value->get_M_Instance()->InstanceName;
                      ?>
                          <tr class = "rowdetail" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->NoMember ?></td>
                            <td><?= $name ?></td>
                          </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


               <!-- modal -->
<div id="modalLoans" tabindex="-1" role="dialog" aria-labelledby="LoanModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="LoanModalLabel" class="modal-title"><?= lang('ui_member')?></h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="card-body">
        <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar
                                  -->
        </div>
        <div class="material-datatables">
          <div id = "datatables_wrapper" class = "dataTables_wrapper dt-bootstrap4">
            <!-- <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatables_length"><label>Show <select name="datatables_length" aria-controls="datatables" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatables_filter" class="dataTables_filter"><label><span class="bmd-form-group bmd-form-group-sm"><input type="search" class="form-control form-control-sm" placeholder="Search records" aria-controls="datatables"></span></label></div></div></div> -->
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tablemodalLoans" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                        <th><?=  lang('ui_name')?></th>
                        <th><?=  lang('ui_description')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_name')?></th>
                        <th><?=  lang('ui_description')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($this->M_loans->get_list() as $value)
                        {
                      ?>
                          <tr class = "rowdetail" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->Name?></td>
                            <td><?= $value->Description?></td>
                          </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modalFiles" tabindex="-1" role="dialog" aria-labelledby="FilesModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="FilesModalLabel" class="modal-title"><?= lang('ui_files')?></h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="card-body">
        <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar
                                  -->
        </div>
        <div class="material-datatables">
          <div id = "datatables_wrapper" class = "dataTables_wrapper dt-bootstrap4">
            <!-- <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatables_length"><label>Show <select name="datatables_length" aria-controls="datatables" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatables_filter" class="dataTables_filter"><label><span class="bmd-form-group bmd-form-group-sm"><input type="search" class="form-control form-control-sm" placeholder="Search records" aria-controls="datatables"></span></label></div></div></div> -->
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table data-page-length="-1" id = "tablemodalFiles" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                        <th><?=  lang('ui_name')?></th>
                        <th class="disabled-sorting text-right"><?=  lang('ui_actions')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_name')?></th>
                        <th class="disabled-sorting text-right"><?=  lang('ui_actions')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($model->get_list_T_Submissionfile() as $value)
                        {
                      ?>
                          <tr class = "rowdetail" role = "row">
                            <td><?= $value->FileName?></td>
                            <td class = "td-actions text-right">
                              <a href="<?= base_url('tsubmission/download_file/'.$value->Id)?>" rel="tooltip" title="<?=  lang('ui_download')?>" class="btn btn-link btn-primary btn-just-icon delete"><i class="material-icons">get_app</i></a>
                            </td>
                          </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  var submissionDropzone;
  $(document).ready(function() {    
    init();
    loadModal("#tablemodalMembers");
    loadModalLoan();
    dataDetail();
    loadModalFile();
    $("#ratetype").val("<?= $model->RateType?>");
    $("#status").val("<?= $model->Status?>");
    submissionDropzone = dropzoneUpload("div#submissiondropzone", 
                    "<?= base_url('tsubmission/upload_file/'.$model->Id);?>", 
                    "file",
                    4, 
                    "image/*, application/pdf, application/msword",
                    '#uploadsubmissionfile');
    //console.log(submissionDropzone);
  });

  function dataDetail(){
    var table = $('#tableInstallment').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      "order" : [[0, "asc"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
      }
    }); 

    // var datacolumn = $('a.toggle-vis');
    // for (index = 0; index < datacolumn.length; ++index) {
    //   var data = datacolumn[index];
    //   //var column = table.column( data.attr('data-column') );
    //   var column = table.column(data.getAttribute("data-column"));
    //   if(data.getAttribute("data-column") == 1 || 
    //     data.getAttribute("data-column") == 6){
    //     column.visible( ! column.visible() );
    //   }
    // }

    // $('a.toggle-vis').on( 'click', function (e) {
    //     e.preventDefault();
    //     console.log($(this).attr('data-column'));
    //     // Get the column API object
    //     var column = table.column( $(this).attr('data-column') );
 
    //     // Toggle the visibility
    //     column.visible( ! column.visible() );
    // } );
     // Edit record
    //  table.on( 'click', '.edit', function () {
    //     $tr = $(this).closest('tr');

    //     var id = $tr.attr('id');
    //     window.location = "<?= base_url('tsubmission/edit/');?>" + id;
    //  } );

     // Delete a record
     

  }

  function init(){
    <?php 
    if($this->session->flashdata('add_warning_msg'))
    {
      $msg = $this->session->flashdata('add_warning_msg');
      for($i=0 ; $i<count($msg); $i++)
      {
    ?>
        setNotification("<?= lang($msg[$i]); ?>", 3, "bottom", "right");
    <?php 
      }
    }
    
    if($this->session->flashdata('success_msg'))
    {
      $msg = $this->session->flashdata('success_msg');
      for($i=0 ; $i<count($msg); $i++)
      {
    ?>
        setNotification("<?= lang($msg[$i]); ?>", 2, "bottom", "right");
    <?php 
      }
    }
    ?>
  }

   function loadModal(idtable){
    $(idtable).DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
      }
    });

    var table = $(idtable).DataTable();
     // Edit record
     table.on( 'click', '.rowdetail', function () {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        var id = $tr.attr('id');

        $("#memberid").val(id);
        $("#membername").val(data[0]);
        $('#modalMembers').modal('hide');
     } );
  }

  function loadModalLoan(){
    var table = $('#tablemodalLoans').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
      }
    });

     // Edit record
     table.on( 'click', '.rowdetail', function () {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        var id = $tr.attr('id');

        $("#loanid").val(id);
        $("#loanname").val(data[0] );
        $('#modalLoans').modal('hide');
     } );
  }

  function loadModalFile(){
    var table = $('#tablemodalFiles').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
      }
    });
  }
</script>