<!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Patient Name</th>                                                                             
                           <th>Appointment Time</th>                                                                             
                           <th>Patient Sex</th>                                                                             
                           <th>Insurance</th>                                                                             
                           <th>Reason</th>                                                                             
                           
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $doctors) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $doctors->id; ?></td>
                           <td class="center"><?php echo $doctors->patient_firstname; ?></td>                         
                           <td class="center"><?php echo $doctors->appointment_time; ?></td>
                           <td class="center"><?php echo $doctors->patient_sex; ?></td>
                           <td class="center"><?php echo $doctors->insurance; ?></td>
                           <td class="center"><?php echo $doctors->reason; ?></td>


           
		   
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                                  <th class="hidden">ID</th>
                           <th>Patient Name</th>                                                                             
                           <th>Appointment Time</th>                                                                             
                           <th>Patient Sex</th>                                                                             
                           <th>Insurance</th>                                                                             
                           <th>Reason</th>  
                        </tr>
                     </tfoot>
                  </table>
               </div>