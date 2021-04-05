 <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Lines</h6>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Add Line</button><p></p>
      <div class="table-responsive">
        <table class="table table-bordered table-sm" id="example">
            <thead>
                <tr class="bg-light">
                    <th width="1%">No</th>
                    <th>MAC Address</th>
                    <th>Line</th>
                    <th>Section</th>
                    <th>Last Online</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($line as $data) { ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data->mac_address ?></td>
                  <td><?php echo $data->line ?></td>
                  <td><?php echo $data->section ?></td>
                  <td><?php echo $data->last_update ?></td>
                  <td>
                      <button type="button" onclick="edit('<?php echo $data->id ?>')" class="btn btn-primary btn-sm">Edit</button>
                      <a href="<?php echo base_url('line/hapus/'.$data->id) ?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm">Delete</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Line</h5>
        </div>
        <div class="modal-body">
          <form id="frm">
            <div class="form-group row">
                <label class="col-form-label col-4">MAC Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="mac_address" placeholder="MAC Address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">Line</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="line" placeholder="Line">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">Section</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="section" placeholder="Section">
                </div>
            </div>
          <?php echo form_close(); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" onclick="save()">Save</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    var save_method; //for save method string
    var table;
    var gid;

    function add(){
      save_method = 'add';
      $('.modal-title').text('Add Line'); // Set title to Bootstrap modal title      
      $('#frm')[0].reset(); // reset form on modals
      $('#modal-id').modal('show'); // show bootstrap modal      
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

     function edit(id)
    {
      save_method = 'update';
      gid = id;
      $('#frm')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/line/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {            
            $('[name="mac_address"]').val(data.mac_address);            
            $('[name="line"]').val(data.line);            
            $('[name="section"]').val(data.section);            
            $('#modal-id').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Line'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function save(){
      var url;      
      // var x = document.forms["form"]["kodejenis"].value;
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/line/simpan')?>";          
      }else{          
          url = "<?php echo site_url('index.php/line/edit/')?>" + gid;         
      }    
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#frm').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal-id').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
  </script>