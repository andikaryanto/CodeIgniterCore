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
          <li class="nav-item disabled">
            <a class="nav-link  active show">
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
                      <p class="card-category"> <?= lang('ui_master_member')?></p>
                    </div>
                    <div class="col">
                      <div class="text-right">
                        <button type="button" rel="tooltip" class="btn btn-primary btn-round btn-fab" title="index" onclick="window.location.href='<?= base_url('mmember');?>'">
                          <i class="material-icons">list</i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">                 
                  <form method = "post" action = "<?= base_url('mmember/addsave');?>">
                    <div class = "row">
                      <div class = "col-md-8">
                        <div class="form-group">
                          <label><?= lang('ui_number')?></label>
                          <input id="number" type="text"  class="form-control" name = "number" placeholder ="[<?= lang('ui_autogenerate')?>]" disabled>
                        </div>
                      </div>
                      <div class = "col-md-4">
                        <!-- <label><?= lang('ui_membertype')?></label> -->
                        <div class="form-group">
                          <?php $blood = empty( $model->MemberType) ? lang("ui_membertype") : getEnumName("Job", $model->MemberType)?>
                          <select id = "membertype" name ="membertype" class="selectpicker" data-style="select-with-transition" title ="<?= $blood ?> ">
                            <!-- <option class="bs-title-option" value=""></option> -->
                            <?php 	
                            foreach ($this->M_enums->get_data_by_id(7) as $value)
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
                      <div class = "col-md-6">
                        <div class="form-group">
                          <label><?= lang('ui_instance')?></label>
                          <div class="input-group has-success">
                            <input hidden id = "instanceid" type="text" class="form-control" name = "instanceid" value="<?= $model->M_Instance_Id?>" >
                            <input id = "instancename" type="text" class="form-control custom-readonly"  value="<?= $model->get_M_Instance()->InstanceName?>" readonly>
                        
                            <div class="input-group-append">
                              <button id="btnInstanceModal" data-toggle="modal" type="button" class="btn btn-primary btn-lookup" data-target="#modalInstances"><i class="fa fa-search"></i></button>
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
                        <th><?=  lang('ui_ismember')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_name')?></th>
                        <th>NIK</th>
                        <th><?=  lang('ui_address')?></th>
                        <th><?=  lang('ui_ismember')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($this->M_peoples->get_list() as $value)
                        {
                          $class = "";
                          if($value->IsMember == 0 ) {
                            $class = "rowdetail";
                          }
                      ?>
                          <tr class = "<?= $class ?>" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->CompleteName?></td>
                            <td><?= $value->Nik?></td>
                            <td><?= $value->Address?></td>
                            <?php 
                              if($value->IsMember == 1 ) {
                              ?>
                              <td><a><i class='fa fa-check text-success'></i></a></td>
                              <?php
                              } else {
                              ?>
                                <td><a><i class='fa fa-close text-danger'></i></a></td>
                              <?php
                              }  
                              ?>
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
<div id="modalInstances" tabindex="-1" role="dialog" aria-labelledby="InstanceModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="InstanceModalLabel" class="modal-title"><?= lang('ui_people')?></h5>
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
                  <table data-page-length="<?= $_SESSION['usersettings']['RowPerpage']?>" id = "tablemodalInstances" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                    <thead class=" text-primary">
                        <th><?=  lang('ui_owner')?></th>
                        <th><?=  lang('ui_instancename')?></th>
                        <th><?=  lang('ui_address')?></th>
                        <th><?=  lang('ui_ismember')?></th>
                    </thead>
                    <tfoot class=" text-primary">
                      <tr role = "row">
                        <th><?=  lang('ui_owner')?></th>
                        <th><?=  lang('ui_instancename')?></th>
                        <th><?=  lang('ui_address')?></th>
                        <th><?=  lang('ui_ismember')?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($this->M_instances->get_list() as $value)
                        {
                          $class = "";
                          if($value->IsMember == 0 ) {
                            $class = "rowdetail";
                          }
                      ?>
                          <tr class = "<?= $class ?>" role = "row" id = <?= $value->Id?>>
                            <td><?= $value->Owner?></td>
                            <td><?= $value->InstanceName?></td>
                            <td><?= $value->Address?></td><?php 
                              if($value->IsMember == 1 ) {
                              ?>
                              <td><a><i class='fa fa-check text-success'></i></a></td>
                              <?php
                              } else {
                              ?>
                                <td><a><i class='fa fa-close text-danger'></i></a></td>
                              <?php
                              }  
                              ?>
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
    loadModalInstance();
    lookUpButton(0);
  });

  $("#membertype").on('change', function(e){
    lookUpButton($(this).val());
  });

  function lookUpButton(source){
    var btnInstance = document.getElementById('btnInstanceModal');
    var btnPeople = document.getElementById('btnPeopleModal');
    if(source == 1){
      btnInstance.classList.add("disabled");
      btnPeople.classList.remove("disabled");
      $("#instanceid").val("");
      $("#instancename").val("");
    } else if (source == 2) {
      btnInstance.classList.remove("disabled");
      btnPeople.classList.add("disabled");
      $("#peopleid").val("");
      $("#peoplename").val("");
    } else {
      btnInstance.classList.add("disabled");
      btnPeople.classList.add("disabled");
      $("#instanceid").val("");
      $("#instancename").val("");
      $("#peopleid").val("");
      $("#peoplename").val("");
    }
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

        $("#peopleid").val(id);
        $("#peoplename").val(data[0]);
        $('#modalPeoples').modal('hide');
     } );
  }

  function loadModalInstance(){
    var table = $('#tablemodalInstances').DataTable({
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

        $("#instanceid").val(id);
        $("#instancename").val(data[0] + "/" + data[1]);
        $('#modalInstances').modal('hide');
     } );
  }

</script>