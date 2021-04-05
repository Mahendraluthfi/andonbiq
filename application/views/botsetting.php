 <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Bot Setting</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-lg-6">
          <table class="table table-bordered">            
            <tbody>
              <tr>
                <td class="bg-light">Chat ID Telegram Grup Ecosystem</td>
                <td style="vertical-align: middle;">
                    <input type="text" class="form-control input-eco" name="" value="<?php echo $get->api_ecosystem ?>" readonly>
                </td>
                <td style="vertical-align: middle;">
                    <button type="button" class="btn btn-success btn-block btn-eco btn-sm">Edit</button>
                    <div class="btn-eco-act" style="display: none;">                        
                        <button type="button" class="btn btn-primary btn-block btn-sm btn-save-eco">Save</button>
                        <button type="button" class="btn btn-danger btn-block btn-sm btn-cancel-eco">Cancel</button>
                    </div>
                </td>
              </tr>
              <tr>
                <td class="bg-light">Chat ID Telegram Grup Value Stream</td>
                <td style="vertical-align: middle;">
                    <input type="text" class="form-control input-vsm" name="" value="<?php echo $get->api_valuestream ?>" readonly>
                </td>
                <td style="vertical-align: middle;">
                    <button type="button" class="btn btn-success btn-block btn-vsm btn-sm">Edit</button>
                    <div class="btn-vsm-act" style="display: none;">                        
                        <button type="button" class="btn btn-primary btn-block btn-sm btn-save-vsm">Save</button>
                        <button type="button" class="btn btn-danger btn-block btn-sm btn-cancel-vsm">Cancel</button>
                    </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('.btn-eco').on('click',function(){
        $('.input-eco').removeAttr('readonly'); 
        $('.btn-eco').attr('style','display:none;');
        $('.btn-eco-act').removeAttr('style','display');
    });

    $('.btn-vsm').on('click',function(){
        $('.input-vsm').removeAttr('readonly');
        $('.btn-vsm').attr('style','display:none;');
        $('.btn-vsm-act').removeAttr('style','display');
    });

    $('.btn-cancel-eco').on('click',function(){
        $('.input-eco').attr('readonly','readonly'); 
        $('.btn-eco').removeAttr('style','display');
        $('.btn-eco-act').attr('style','display: none;');
    });

    $('.btn-cancel-vsm').on('click',function(){
        $('.input-vsm').attr('readonly','readonly');
        $('.btn-vsm').removeAttr('style','display');
        $('.btn-vsm-act').attr('style','display: none;');
    });

    $('.btn-save-eco').on('click',function(){
        var value_eco = $('.input-eco').val();
        $.ajax({
            url : "<?php echo site_url('index.php/botsetting/edit_eco')?>",
            type: "POST",
            data: {api_ecosystem: value_eco},
            dataType: "JSON",
            success: function(data)
            {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
        // console.log(value_eco);
    });

    $('.btn-save-vsm').on('click',function(){

        var value_vsm = $('.input-vsm').val();
        $.ajax({
            url : "<?php echo site_url('index.php/botsetting/edit_vsm')?>",
            type: "POST",
            data: {api_valuestream: value_vsm},
            dataType: "JSON",
            success: function(data)
            {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    
    });


  </script>

