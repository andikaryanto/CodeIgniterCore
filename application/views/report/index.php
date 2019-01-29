<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title "><?= lang('ui_report')?></h4>
                      <!-- <p class="card-category"> <?= lang('ui_master_groupuser')?></p> -->
                    </div>
                    
                    <div class="col">
                      <div class="text-right">
                        
                      </div>
                    </div>
                  </div>
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
                            <table data-page-length="-1" id = "tableReport" class="table table-striped table-no-bordered table-hover dataTable dtr-inline collapsed" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                              <thead class=" text-primary">
                                <tr role = "row">
                                  <!-- <th># </th> -->
                                  <th><?=  lang('ui_name')?></th>
                                  <th><?=  lang('ui_description')?></th>
                                  <th><?=  lang('ui_alias')?></th>
                                  <!-- <th class="disabled-sorting text-right"><?=  lang('ui_actions')?></th> -->
                                </tr>
                              </thead>
                              <tfoot class=" text-primary">
                                <tr role = "row">
                                  <!-- <th># </th> -->
                                  <th><?=  lang('ui_name')?></th>
                                  <th><?=  lang('ui_description')?></th>
                                  <th><?=  lang('ui_alias')?></th>
                                  <!-- <th class="disabled-sorting text-right"><?=  lang('ui_actions')?></th> -->
                                </tr>
                              </tfoot>
                              <tbody>
                              <?php
                                foreach ($model as $value)
                                {
                              ?>
                                  <tr role = "row" id = <?= $value->Id?>>
                                    <td><a href="<?= $value->Url?>"><?= $value->Name?></a></td>
                                    <td><?= $value->Description?></td>
                                    <td><?= lang($value->Resource)?></td>
                                    <!-- <td class = "td-actions text-right">
                                      <a href="#" rel="tooltip" title="<?=  lang('ui_edit')?>" class="btn btn-link btn-primary btn-just-icon edit"><i class="material-icons">edit</i></a>
                                    </td> -->
                                  </tr>
                              <?php
                                }
                              ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <!-- <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">Showing 1 to 10 of 40 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_full_numbers" id="datatables_paginate"><ul class="pagination"><li class="paginate_button page-item first disabled" id="datatables_first"><a href="#" aria-controls="datatables" data-dt-idx="0" tabindex="0" class="page-link">First</a></li><li class="paginate_button page-item previous disabled" id="datatables_previous"><a href="#" aria-controls="datatables" data-dt-idx="1" tabindex="0" class="page-link">Prev</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatables" data-dt-idx="2" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatables" data-dt-idx="3" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatables" data-dt-idx="4" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatables" data-dt-idx="5" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next" id="datatables_next"><a href="#" aria-controls="datatables" data-dt-idx="6" tabindex="0" class="page-link">Next</a></li><li class="paginate_button page-item last" id="datatables_last"><a href="#" aria-controls="datatables" data-dt-idx="7" tabindex="0" class="page-link">Last</a></li></ul></div></div></div> -->
                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
<script>

  $(document).ready(function() {   
    dataTable();
  });

  function dataTable(){
    $('#tableReport').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
      "order" : [[0, "asc"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
      }
    }); 

    var table = $('#tableReport').DataTable();
     // Edit record
     table.on( 'click', '.edit', function () {
        $tr = $(this).closest('tr');

        var id = $tr.attr('id');
        //window.location = "<?= base_url('mgroupuser/edit/');?>" + id;
     } );

     
  }

</script>
      