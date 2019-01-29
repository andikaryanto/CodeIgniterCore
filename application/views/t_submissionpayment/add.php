<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            
            <div class="row">
              <div class="col">
                <h4 class="card-title "><?= lang('ui_add_data')?></h4>
                <p class="card-category"> <?= lang('ui_transaction_submissionpayment')?></p>
              </div>
              <div class="col">
                <div class="text-right">
                  <button type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="index" onclick="window.location.href='<?= base_url('tsubmissionpayment');?>'">
                    <i class="material-icons">list</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">                 
            <form method = "post" action = "<?= base_url('tsubmissionpayment/addsave');?>">
              <div class = "row">
                <div class = "col-md-6">
                  <div class="form-group">
                    <label><?= lang('ui_number')?></label>
                    <input id="number" type="text"  class="form-control" name = "number" placeholder ="[<?= lang('ui_autogenerate')?>]" disabled>
                  </div>
                </div>  
                <div class = "col-md-6">
                  <div class="form-group">
                    <label><?= lang('ui_submission')?></label>
                    <div class="input-group has-success">
                      <input hidden id = "submissionid" type="text" class="form-control" name = "submissionid" value="<?= $model->T_Submission_Id?>" >
                      <input id = "submissionname" type="text" class="form-control custom-readonly"  value="<?= $model->get_T_Submission()->NoSubmission?>" readonly>
                  
                      <div class="input-group-append">
                        <button id="btnSubmissionModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalSubmissions"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>              
              </div>
              <div class = "row">
                <div class = "col-md-6">
                  <div class="form-group">  
                    <label><?= lang('ui_paymentdate')?></label>
                    <input id="paymentdate" type="text" class="form-control datepicker" name = "paymentdate"value = "<?= $model->PaymentDate?>" >
                  </div>
                </div>  
                <div class = "col-md-6">
                  <div class="form-group">
                    <label><?= lang('ui_chartofaccount')?></label>
                    <div class="input-group has-success">
                      <input hidden id = "coaid" type="text" class="form-control" name = "coaid" value="<?= $model->M_Chartofaccount_Id?>" >
                      <input id = "coaname" type="text" class="form-control custom-readonly"  value="<?= $model->get_M_Chartofaccount()->Code." ".$model->get_M_Chartofaccount()->Name?>" readonly>
                  
                      <div class="input-group-append">
                        <button id="btnCoaModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalChartOfAccounts"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
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
        </div>
      </div>
    </div>
  </div>

               <!-- modal -->
<div id="modalSubmissions" tabindex="-1" role="dialog" aria-labelledby="PeopleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="PeopleModalLabel" class="modal-title"><?= lang('ui_submission')?></h5>
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
                  <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tablemodalSubmissions" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
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
                        foreach ($this->T_submissions->get_list() as $value)
                        {
                          if(!$value->isPaidOff() && $value->Status == 2)
                          {
                            $name = !empty($value->get_M_Member()->get_M_People()->CompleteName) ? $value->get_M_Member()->get_M_People()->CompleteName : $value->get_M_Member()->get_M_Instance()->Owner." / ".$value->get_M_Member()->get_M_Instance()->InstanceName;
                      ?>
                          <tr class = "rowdetail" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->NoSubmission ?></td>
                            <td><?= $name ?></td>
                          </tr>
                      <?php
                          }
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
<div id="modalChartOfAccounts" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="parentModalLabel" class="modal-title"><?= lang('ui_chartofaccount')?></h5>
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
                  <table data-page-length="-1" id = "tablemodalChartOfAccounts" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                        <th><?=  lang('ui_code')?></th>
                        <th><?=  lang('ui_name')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_code')?></th>
                        <th><?=  lang('ui_name')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                      //print_r($modeldetail);
                      
                        $params = array(
                          'where' => array(
                            'Level' => 3
                          )
                        );

                        foreach ($this->M_chartofaccounts->get_list(null, null, $params) as $value)
                        {
                      ?>
                          <tr class = "rowdetail" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->Code?></td>
                            <td ><?= $value->Name?></td>
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
    loadModalSubmission();
    loadModalChartOfAccount();
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

   

  function loadModalSubmission(){
    var table = $('#tablemodalSubmissions').DataTable({
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

        $("#submissionid").val(id);
        $("#submissionname").val(data[0]);
        $('#modalSubmissions').modal('hide');
     } );
  }

  function loadModalChartOfAccount(){
    var table = $('#tablemodalChartOfAccounts').DataTable({
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

        $("#coaid").val(id);
        $("#coaname").val(data[0]+" "+data[1] );
        $('#modalChartOfAccounts').modal('hide');
     } );
  }

</script>