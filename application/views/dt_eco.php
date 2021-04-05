 <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Downtime Ecosystem</h6>
      <div class="dropdown no-arrow">
          <!-- <button type="button" class="btn btn-info btn-sm"><i class="fa fa-download"></i> Export</button>         -->
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-sm" id="example">
            <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Line</th>
                    <th>Date</th>
                    <th>Time Start</th>
                    <th>Time Stop</th>
                    <th>Diff Time (m)</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($get as $data) { ?>
                    <tr>
                     <td><?php echo $no++; ?></td>   
                     <td><?php echo $data->line ?></td>   
                     <td><?php echo $data->date ?></td>   
                     <td><?php echo $data->time_start ?></td>   
                     <td><?php echo $data->time_end ?></td>   
                     <td><?php echo $data->count ?> minutes</td>   
                    </tr>
                <?php } ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>