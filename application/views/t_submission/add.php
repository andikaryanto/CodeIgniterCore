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
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
        <i class="material-icons">gavel</i> Legal Info
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#link10" role="tablist">
        <i class="material-icons">help_outline</i> Help Center
      </a>
    </li> -->
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
            <form method = "post" action = "<?= base_url('tsubmission/addsave');?>" enctype="multipart/form-data">
              <div class = "row">
                <div class = "col-md-6">
                  <div class="form-group">
                    <label><?= lang('ui_number')?></label>
                    <input id="number" type="text"  class="form-control" name = "number" placeholder ="[<?= lang('ui_autogenerate')?>]" disabled>
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
                    <span class="bmd-help input-help text-primary"><?= lang('info_in_rupiah')?></span>
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
              <input type="file" multiple="multiple" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
              <div class = "row">
                <div class = "col-md-12">      
                  <input type="submit" value="<?= lang('ui_save')?>" class="btn btn-primary">
                </div>
              </div>
            </form>
            
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

<script>
  $(document).ready(function() {    
    init();
    loadModal("#tablemodalMembers");
    loadModalLoan();
    $("#ratetype").val("<?= $model->RateType?>");
    $("#status").val("<?= $model->Status?>");
  });

  

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

</script>