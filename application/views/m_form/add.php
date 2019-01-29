<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h4 class="card-title"><?= lang('ui_setting')?> -
              <small class="description"><?= lang('ui_mainsetup')?></small>
            </h4>
          </div>
          <div class="card-body">
            <div id="accordion" role="tablist">
              <div class="card-collapse">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#mastermember" aria-expanded="false" aria-controls="mastermember" class="collapsed">
                      <?= lang('ui_master')." / ".lang('ui_member')?>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="mastermember" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                  <div class="card-body">
                    <form method = "post" id="formMasterMember" action = "<?= base_url('m_form/savemember')?>">
                      <div class = "row">
                        <label class="col-sm-2 col-form-label"><?= lang('ui_numberformat')?></label>
                        <div class = "col-md-10">
                          <div class="form-group bmd-form-group">
                            <input id="formatnumber" type="text"  class="form-control transnumberformat" name = "formatnumber" value = "<?= $membermodel[0]->StringValue?>">
                            <span class="bmd-help text-primary"><?= lang('info_membernumberformat')?></span>
                          </div>
                        </div>
                      </div>
                      <div class = "row">
                        <div class = "col-md-10">
                          <div class="form-group">       
                            <input type="submit" value="<?= lang('ui_save')?>" class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-collapse">
                <div class="card-header" role="tab" id="headingTwo">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#submission" aria-expanded="false" aria-controls="collapseTwo">
                    <?= lang('ui_transaction')." / ".lang('ui_submission')?>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="submission" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                  <div class="card-body">
                    <form method = "post" id="formMasterMember" action = "<?= base_url('m_form/savesubmission')?>">
                      <div class = "row">
                        <label class="col-sm-2 col-form-label"><?= lang('ui_numberformat')?></label>
                        <div class = "col-md-10">
                          <div class="form-group bmd-form-group">
                            <input id="formatnumber" type="text"  class="form-control transnumberformat" name = "formatnumber" value = "<?= $submissionmodel[0]->StringValue?>">
                            <span class="bmd-help text-primary"><?= lang('info_numberformat')?></span>
                          </div>
                        </div>
                      </div>
                      <div class = "row">
                        <div class = "col-md-10">
                          <div class="form-group">       
                            <input type="submit" value="<?= lang('ui_save')?>" class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-collapse">
                <div class="card-header" role="tab" id="headingTwo">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#submissionpayment" aria-expanded="false" aria-controls="collapseTwo">
                    <?= lang('ui_transaction')." / ".lang('ui_submissionpayment')?>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="submissionpayment" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                  <div class="card-body">
                    <form method = "post" id="formMasterMember" action = "<?= base_url('m_form/savesubmissionpayment')?>">
                      <div class = "row">
                        <label class="col-sm-2 col-form-label"><?= lang('ui_numberformat')?></label>
                        <div class = "col-md-10">
                          <div class="form-group bmd-form-group">
                            <input id="formatnumber" type="text"  class="form-control transnumberformat" name = "formatnumber" value = "<?= $submissionpaymentmodel[0]->StringValue?>">
                            <span class="bmd-help text-primary"><?= lang('info_numberformat')?></span>
                          </div>
                        </div>
                      </div>
                      <div class = "row">
                        <label class="col-sm-2 col-form-label"><?= lang('ui_chartofaccount')?></label>
                        <div class = "col-md-10">
                          <div class="form-group bmd-form-group">
                            <div class="input-group has-success">
                              <input hidden id = "paymentcoaid" type="text" class="form-control" name = "paymentcoaid" value="<?= $submissionpaymentmodel[1]->IntValue?>" >
                              <input id = "paymentcoaname" name = "paymentcoaname" type="text" class="form-control custom-readonly"  value="<?= $submissionpaymentmodel[1]->StringValue?>" readonly>
                          
                              <div class="input-group-append">
                                <button id="btnCoaModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalChartOfAccounts"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class = "row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class = "col-md-10">
                          <div class="togglebutton">
                            <label>
                              <input type="checkbox" <?php if($submissionpaymentmodel[2]->BooleanValue) { echo  "checked"; }?>
                                name ="onemonth">
                              <span class="toggle"></span>
                              <?= lang('ui_onemonthpayment')?>
                            </label>
                          </div>
                        </div>
                      </div><div class = "row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class = "col-md-10">
                          <div class="togglebutton">
                            <label>
                              <input type="checkbox" <?php if($submissionpaymentmodel[3]->BooleanValue) { echo  "checked"; }?> 
                                name ="standalonefinepayment">
                              <span class="toggle"></span>
                              <?= lang('ui_standalonefinepayment')?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class = "row">
                        <div class = "col-md-10">
                          <div class="form-group">       
                            <input type="submit" value="<?= lang('ui_save')?>" class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </form>
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

        $("#paymentcoaid").val(id);
        $("#paymentcoaname").val(data[0]+" "+data[1] );
        $('#modalChartOfAccounts').modal('hide');
     } );
  }

</script>