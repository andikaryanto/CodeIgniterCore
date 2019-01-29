
<div class="content">
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
                
                  <button id = "btnPrintDetailPayment" type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="<?= lang('ui_print')?>">
                    <i class="material-icons">print</i>
                  </button>
                  <button type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="index" onclick="window.location.href='<?= base_url('tsubmissionpayment');?>'">
                    <i class="material-icons">list</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">                 
            <form method = "post" action = "<?= base_url('tsubmissionpayment/editsave');?>">
              <input hidden id =  "idsubmissionpayment" name = "idsubmissionpayment" value = "<?= $model->Id?>">
              <div class = "row">
                <div class = "col-md-6">
                  <div class="form-group">
                    <label><?= lang('ui_number')?></label>
                    <input id="number" type="text"  class="form-control" name = "number" disabled value = "<?= $model->NoPayment?>">
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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            
            <div class="row">
              <div class="col">
                <h4 class="card-title "><?= lang('ui_addpaymentdetail')?></h4>
              </div>
              <div class="col">
                <div class="text-right">
                  <button id = "btnSaveDetailPayment" type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="<?= lang('ui_save')?>">
                    <i class="material-icons">save</i>
                  </button>
                  <button data-toggle="modal" type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="<?= lang('ui_add')?>" data-target="#modalSubmissiondetail">
                    <i class="material-icons">add</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active show" id="installment">
                <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tableInstallment" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                  <thead class=" text-primary">
                    <tr role = "row">
                      <th>SubmisionDetailId</th>
                      <th><?=  lang('ui_month')?></th>
                      <th><?=  lang('ui_duedate')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_installmentpayment')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_ratepayment')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_finepayment')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_amountpayment')?></th>
                    </tr>
                  </thead>
                  <tfoot class=" text-primary">
                    <tr role = "row">
                      <th>SubmisionDetailId</th>
                      <th><?=  lang('ui_month')?></th>
                      <th><?=  lang('ui_duedate')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_installmentpayment')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_ratepayment')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_finepayment')?></th>
                      <th role="col" class="disabled-sorting"><?=  lang('ui_amountpayment')?></th>
                    </tr>
                  </tfoot>
                  
                </table>
              </div>
            </div>
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

<!-- modal -->
<div id="modalSubmissiondetail" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true" class="modal fade text-left bd-example-modal-lg">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="parentModalLabel" class="modal-title"><?= lang('ui_submission')?></h5>
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
                  <table data-page-length="5" id = "tablemodalSubmissionDetail" class="table table-striped table-no-bordered dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                      <tr role = "row">
                        <th >Id</th>
                        <th ><?=  lang('ui_month')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_duedate')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_installmentpayment')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_ratepayment')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_amountpayment')?></th>
                      </tr>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th >Id</th>
                        <th><?=  lang('ui_month')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_duedate')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_installmentpayment')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_ratepayment')?></th>
                        <th role="col" class="disabled-sorting"><?=  lang('ui_amountpayment')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                      foreach ($model->getUnpaidPaymentList() as $value)
                      {
                        
                        // setlocale(LC_MONETARY,"id_ID");
                        // $name = !empty($value->get_M_Member()->get_M_People()->CompleteName) ? $value->get_M_Member()->get_M_People()->CompleteName : $value->get_M_Member()->get_M_Instance()->Owner." / ".$value->get_M_Member()->get_M_Instance()->InstanceName;
                    ?>
                        <tr role = "row"></td>
                          <td><?= $value->Id?></td>
                          <td><?= $value->Month?></td>
                          <td><?= get_formated_date($value->DueDate, 'd-m-Y')?></td>
                          <td><?= number_format($value->InstallmentPayment, 2, ",", ".")?></td>
                          <td><?= number_format($value->RatePayment, 2, ",", ".")?></td>
                          <td><?= number_format($value->AmountPayment, 2, ",", ".")?></td>
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
  var url = "<?= base_url('t_submissionpayment/get_paymentdetails?idpayment='.$model->Id)?>";
  var arrsubmissiondetailid = [];
  var tablepaymentdetail;
  var idsubdetailarr = "&idsubdetailarr="+JSON.stringify(arrsubmissiondetailid);
  $(document).ready(function() {    
    init();
    loadModalSubmission();
    loadModalChartOfAccount();
    loadModalSubmissiondetail();
    loadInstallment();
    // console.log("<?= $model->Id?>");
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

  function loadInstallment(){

    //console.log("<?= base_url('t_submissionpayment/get_paymentdetails?idpayment='.$model->Id)?>"+idsubdetailarr);
    tablepaymentdetail = $('#tableInstallment').DataTable({
      
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      "columnDefs": [
        {
            "targets": [ 0 ],
            "visible": false,
            "searchable": false
        }
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
      },
      ajax: {
        url : url+idsubdetailarr,
        dataSrc : 'data'
      },
      columns: [
        { 
          "data": "T_Submissiondetail_Id"
        },
        { "data": "Month" },
        { 
          "data": "DueDate",
          render: function(data, type, row){
                  if(type === "sort" || type === "type"){
                      return data;
                  }
                  return moment(data).format("DD-MM-YYYY");
                }
        },
        { 
          "data": "Payment",
          render: $.fn.dataTable.render.number( '.', ',', 2 )
        },
        { 
          "data": "RatePayment",
          render: $.fn.dataTable.render.number( '.', ',', 2 ) },
        { 
          "data": "FinePayment",
          render: $.fn.dataTable.render.number( '.', ',', 2 ) },
        { 
          "data": "Amount",
          render: $.fn.dataTable.render.number( '.', ',', 2 ) 
        }
      ],
    });

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

  function loadModalSubmissiondetail(){
    var table = $('#tablemodalSubmissionDetail').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
        "columnDefs": [
          {
              "targets": [ 0 ],
              "visible": false,
              "searchable": false
          }
        ],
      colReorder: {
            order: [0,1,2,3,4,5]
        },
      select: {
          style :'multi',
      },
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
      
      },
      
    });

    table.on('select', function ( e, dt, type, indexes ) {
      if ( type === 'row' ) {
          var data = table.rows( indexes ).data().pluck( 'id' );
  
          arrsubmissiondetailid.push(parseInt(table.rows( indexes ).data()[0][0]));
          idsubdetailarr = "&idsubdetailarr="+JSON.stringify(arrsubmissiondetailid);
          reloadDtTable(tablepaymentdetail, url+idsubdetailarr);
      }
    });

    table.on('deselect', function ( e, dt, type, indexes ) {
      if ( type === 'row' ) {
          var data = table.rows( indexes ).data().pluck( 'id' );
  
          //arrsubmissiondetailid.pop(parseInt(table.rows( indexes ).data()[0][0]));
          var splicedData = arrsubmissiondetailid.indexOf(parseInt(table.rows( indexes ).data()[0][0]));
          if (splicedData != -1) {
            arrsubmissiondetailid.splice(splicedData, 1);   
          }
          idsubdetailarr = "&idsubdetailarr="+JSON.stringify(arrsubmissiondetailid);
          reloadDtTable(tablepaymentdetail, url+idsubdetailarr);
      }
    });
  }

  function reloadDtTable(table, newurl){
    table.ajax.url(newurl).load();
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

  $("#btnSaveDetailPayment").on('click', function(e){
    window.location.href = "<?= base_url('t_submissionpayment/save_detail?idpayment='.$model->Id)?>&idsubdetailarr="+JSON.stringify(arrsubmissiondetailid);
  });

  
  $("#btnPrintDetailPayment").on('click', function(e){
    window.location.reload();
    window.open("<?= base_url('t_submissionpayment/print_detail?idpayment='.$model->Id)?>&idsubdetailarr="+JSON.stringify(arrsubmissiondetailid),'_blank');
  });

</script> 