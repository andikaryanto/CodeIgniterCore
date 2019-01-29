<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            
            <div class="row">
              <div class="col">
                <h4 class="card-title "><?= lang('ui_edit_data')?></h4>
                <p class="card-category"> <?= lang('ui_master_worker')?></p>
              </div>
              <div class="col">
                <div class="text-right">
                  <button type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="index" onclick="window.location.href='<?= base_url('mworker');?>'">
                    <i class="material-icons">list</i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">                 
            <form method = "post" action = "<?= base_url('mworker/editsave');?>">
              <input hidden name ="idworker" id="idworker" value="<?= $model->Id?>">
              <div class = "row">
                <div class = "col-md-6">
                  <div class="form-group">
                    <label><?= lang('ui_number')?></label>
                    <input id="number" type="text"  class="form-control" name = "number" placeholder ="<?= $model->NoWorker?>" disabled>
                  </div>
                </div>
                <div class = "col-md-6">
                  <div class="form-group">
                    <label><?= lang('ui_people')?></label>
                    <div class="input-group has-success">
                      <input hidden id = "peopleid" type="text" class="form-control" name = "peopleid" value="<?= $model->M_People_Id?>" >
                      <input id = "peoplename" type="text" class="form-control custom-readonly"  value="<?= $model->get_M_People()->CompleteName?>" readonly>
                  
                      <div class="input-group-append">
                        <button id="btnPeopleModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalPeoples"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class = "row">
                <div class = "col-md-6">
                  <div class="form-group">       
                    <label><?= lang('ui_telephone')?></label>
                    <input id="telephone" type="text" class="form-control" name = "telephone" value = "<?= $model->Phone?>" required>
                  </div>
                </div>
                <div class = "col-md-6">
                  <div class="form-group">  
                    <label><?= lang('ui_email')?></label>
                    <input id="email" type="email" class="form-control" name = "email"value = "<?= $model->Email?>" >
                  </div>
                </div>
              </div>
              <div class = "row">
                <div class="col-sm-4">
                  <label><?= lang('ui_type')?></label>
                  <div class="form-group">
                    <?php $blood = empty($model->WorkerType) ? lang("ui_type") : getEnumName("Job", $model->WorkerType)?>
                    <select id = "workertype" name ="workertype" class="selectpicker" data-style="select-with-transition" title ="<?= $blood ?> ">
                      <!-- <option class="bs-title-option" value=""></option> -->
                      <?php 	
                      foreach ($this->M_enums->get_data_by_id(4) as $value) 
                      { 
                      ?>
                        <option value ="<?= $value->Id?>"><?= lang($value->Resource)?></option>
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
        </div>
      </div>
    </div>
  </div>

  
 <!-- modal -->
<div id="modalPeoples" tabindex="-1" role="dialog" aria-labelledby="PeopleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="PeopleModalLabel" class="modal-title"><?= lang('ui_people')?></h5>
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
                  <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tablemodalPeoples" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                        <th><?=  lang('ui_name')?></th>
                        <th>NIK</th>
                        <th><?=  lang('ui_address')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_name')?></th>
                        <th>NIK</th>
                        <th><?=  lang('ui_address')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($this->M_peoples->get_list() as $value)
                        {
                      ?>
                          <tr class = "rowdetail" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->CompleteName?></td>
                            <td><?= $value->Nik?></td>
                            <td><?= $value->Address?></td>
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
    loadModal("#tablemodalPeoples");
    $("#workertype").val("<?= $model->WorkerType ?>")
  });

  function init(){
    <?php 
    if($this->session->flashdata('edit_warning_msg'))
    {
      $msg = $this->session->flashdata('edit_warning_msg');
      for($i=0 ; $i<count($msg); $i++)
      {
    ?>
        setNotification("<?= lang($msg[$i]); ?>", 3, "bottom", "right");
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

        $("#peopleid").val(id);
        $("#peoplename").val(data[0]);
        $('#modalPeoples').modal('hide');
     } );
  }
</script>