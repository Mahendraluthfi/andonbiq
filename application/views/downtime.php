 <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Downtime</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example">
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