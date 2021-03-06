<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Specialty Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>Home</a></li>
         <li><a href="#">Specialty Details</a></li>
         <li class="active">Add Specialty</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
         </div>
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title"> Add Specialty Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
			   
                  <div class="box-body">                 
                     <div class="col-md-12">
					 
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Specialty Name</label>
                            <input type="text" class="form-control required" 
							  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\  \/]+$"
                              required="" name="specialty_name"  placeholder="Specialty Name">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						
						
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				   
				</div>
			</div>
			
			<div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">View Specialty Details</h3>
               </div>	   
				 <div class="box-body">    
				    <div class="col-md-12">
					
					<table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Specialty Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($data as $visit) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $visit->id; ?></td>
                           <td class="center"><?php echo $visit->specialty_name; ?></td>
                           <td class="center">	
			                  
							  <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Visitation_ctrl/edit_visitdetailsdval/<?php echo $visit->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
							  
							   <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Visitation_ctrl/delete_visitation/<?php echo $visit->id; ?>" onClick="return doconfirm()">
                               <i class="fa fa-fw fa-trash"></i>Delete</a> 
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
                           <th>Visitaion Name</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
				   
				    </div>
				   </div>
				   </div>
				   
				  </div>
               </form>
            </div>
            <!-- /.box -->

      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>

