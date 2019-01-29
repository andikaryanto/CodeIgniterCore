<div class="content">
        <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-left" role="tablist">
          <li class="nav-item">
            <a href = "<?= base_url('mpeople/add');?>"  class="nav-link">
              <i class="material-icons">assignment_ind</i> <?= lang('ui_individual') ?>
            </a>
          </li>
          <li class="nav-item disabled">
            <a class="nav-link active show" data-toggle="tab" href="#link7" role="tablist">
              <i class="material-icons">assignment</i> <?= lang('ui_instance') ?>
            </a>
          </li>
          <li class="nav-item">
            <a href = "<?= base_url('mmember/add');?>" class="nav-link">
              <i class="material-icons">list</i>  <?= lang('ui_register') ?>
            </a>
          </li>
          <li class="nav-item">
            <a href = "<?= base_url('tsubmission/add');?>" class="nav-link">
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
                      <p class="card-category"> <?= lang('ui_master_instance')?></p>
                    </div>
                    <div class="col">
                      <div class="text-right">
                        <button type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="index" onclick="window.location.href='<?= base_url('minstance');?>'">
                          <i class="material-icons">list</i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">                 
                  <form method = "post" action = "<?= base_url('minstance/addsave');?>">
                    <div class = "row">
                      <div class = "col-md-6">
                        <div class="form-group">
                          <label><?= lang('ui_instancename')?></label>
                          <input id="instancename" type="text"  class="form-control" name = "instancename" value="<?= $model->InstanceName?>" required>
                        </div>
                      </div>
                      <div class = "col-md-6">
                        <div class="form-group">
                          <label><?= lang('ui_owner')?></label>
                          <input id="owner" type="text"  class="form-control" name = "owner" value="<?= $model->Owner?>" required>
                        </div>
                      </div>
                    </div>
                    <div class = "row">
                      <div class = "col-md-6">
                        <div class="form-group">       
                          <label><?= lang('ui_noinstance')?></label>
                          <input id="noinstance" type="text" class="form-control" name = "noinstance" value = "<?= $model->NoInstance?>" >
                        </div>
                      </div>
                      <div class = "col-md-6">
                        <div class="form-group">  
                          <label><?= lang('ui_instancetype')?></label>
                          <input id="instancetype" type="text" class="form-control" name = "instancetype"value = "<?= $model->InstanceType?>" >
                        </div>
                      </div>
                    </div>
                    <!-- <div class = "row">
                      <div class = "col-md-12">
                        <div class="form-group">
                          <label><?= lang('ui_village')?></label>
                          <div class="input-group has-success">
                            <input hidden id = "villageid" type="text" class="form-control" name = "villageid" value="<?= $model->M_Village_Id?>">
                            <input id = "villagename" type="text" class="form-control custom-readonly"  value="<?= $model->get_M_Village()->Name?>" readonly>
                        
                            <div class="input-group-append">
                              <button id="btnVillageModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalVillages"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class = "row">
                      <div class = "col-md-12">
                        <div class="form-group">       
                          <label><?= lang('ui_address')?></label>
                          <textarea id="address" type="text" class="form-control" name = "address" ><?= $model->Address?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class = "row">
                      <div class = "col-md-4">
                        <div class="form-group">       
                          <label>RT</label>
                          <input id="rt" type="text" class="form-control" name = "rt" value = "<?= $model->Rt?>" >
                        </div>
                      </div>
                      <div class = "col-md-4">
                        <div class="form-group">       
                          <label>RW</label>
                          <input id="rw" type="text" class="form-control" name = "rw"value = "<?= $model->Rw?>" >
                        </div>
                      </div>
                      <div class = "col-md-4">
                        <div class="form-group">       
                          <label><?= lang('ui_postcode')?></label>
                          <input id="postcode" type="text" class="form-control" name = "postcode" value = "<?= $model->PostCode?>">
                        </div>
                      </div>
                    </div>
                    <div class = "row">
                      <div class = "col-md-6">      
                        <input type="submit" name= "save" value="<?= lang('ui_save')?>" class="btn btn-primary">  
                      </div>
                      <!-- <div class = "col-md-6 text-right">
                        <input type="submit" name= "next" value="<?= lang('ui_next')?>" class="btn btn-primary">
                      </div>   -->
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

               <!-- modal -->
<div id="modalVillages" tabindex="-1" role="dialog" aria-labelledby="VillageModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="VillageModalLabel" class="modal-title"><?= lang('ui_village')?></h5>
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
                  <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tablemodalVillages" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                        <th><?=  lang('ui_village')?></th>
                        <th><?=  lang('ui_subcity')?></th>
                        <th><?=  lang('ui_city')?></th>
                        <th><?=  lang('ui_province')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_village')?></th>
                        <th><?=  lang('ui_subcity')?></th>
                        <th><?=  lang('ui_city')?></th>
                        <th><?=  lang('ui_province')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($datamodal['modal_village'] as $value)
                        {
                      ?>
                          <tr class = "rowdetail" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->Name?></td>
                            <td><?= $value->get_M_Subcity()->Name?></td>
                            <td><?= $value->get_M_Subcity()->get_M_City()->Name?></td>
                            <td><?= $value->get_M_Subcity()->get_M_City()->get_M_Province()->Name?></td>
                            
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
    loadModal("#tablemodalVillages");
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

        $("#villageid").val(id);
        $("#villagename").val(data[0]);
        $('#modalVillages').modal('hide');
     } );
  }

</script>