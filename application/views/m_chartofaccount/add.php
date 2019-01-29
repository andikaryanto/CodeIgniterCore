<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title "><?= lang('ui_add_data')?></h4>
                      <p class="card-category"> <?= lang('ui_master_chartofaccount')?></p>
                    </div>
                    <div class="col">
                      <div class="text-right">
                        <button type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="index" onclick="window.location.href='<?= base_url('mchartofaccount');?>'">
                          <i class="material-icons">list</i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">                 
                  <form method = "post" action = "<?= base_url('mchartofaccount/addsave');?>">
                    <div class="form-group">
                      <label><?= lang('ui_code')?></label>
                      <input id="code" type="text"  class="form-control" name = "code" value="<?= $model->Code?>" required>
                    </div>
                    <div class="form-group">
                      <label><?= lang('ui_name')?></label>
                      <input id="named" type="text"  class="form-control" name = "named" value="<?= $model->Name?>" required>
                    </div>
                    <div class="form-group">
                      <label><?= lang('ui_parent')?></label>
                      <div class="input-group has-success">
                        
                        <input hidden id = "parentid" type="text" class="form-control" name = "parentid" value="<?= $model->Parent?>">
                        <input id = "parentname" type="text" class="form-control custom-readonly"  value="<?= $model->M_Parent()->Code." ".$model->M_Parent()->Name?>" readonly>
                        <!-- <span class="form-control-feedback text-primary">
                            <i class="material-icons">search</i>
                        </span> -->
                        <div class="input-group-append">
                          <button id="btnSubcityModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalChartOfAccounts"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">       
                      <input type="submit" value="<?= lang('ui_save')?>" class="btn btn-primary">
                    </div>
                  </form>
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
        <h5 id="parentModalLabel" class="modal-title"><?= lang('ui_parent')?></h5>
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
                        foreach ($this->M_chartofaccounts->get_list() as $value)
                        {
                          
                          $class = "";
                          if($value->Level < 3 ) {
                            $class = "rowdetail";
                          }

                          $padding = 5;
                          if($value->DownLevel > 0)
                            $padding = $value->DownLevel * 30;
                      ?>
                          <tr class = "<?= $class ?>" role = "row" id = <?= $value->Id?>>
                          <?php if(!$value->IsParent) { ?>
                            <td style = "padding-left : <?= $padding?>px !important;"><?= $value->Code?></td>
                            <td style = "padding-left : <?= $padding?>px !important;"><?= $value->Name?></td>
                          <?php } else {?>
                            <td style = "padding-left : <?= $padding?>px !important; font-weight: 500;"><?= $value->Code?></td>
                            <td style = "padding-left : <?= $padding?>px !important; font-weight: 500;"><?= $value->Name?></td>
                          <?php }?>
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
    loadModal("#tablemodalChartOfAccounts");
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
    console.log(idtable);
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

        // console.log(data[1]);
        $("#parentid").val(id);
        $("#parentname").val(data[0]+" "+data[1]);
        $('#modalChartOfAccounts').modal('hide');
     } );
  }

</script>