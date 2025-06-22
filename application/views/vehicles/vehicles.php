<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text">Vehicles List</h1>
                    <div class="card-tools">
                        
                          <ul class="nav nav-pills ml-auto">
                            <li>
                                <div class="row">
                                <?=form_open('dashboard/vehicles_search/')?>
                                    <div class="col-md-7 col-lg-7">
                                        <input type="text" name="search_text" placeholder="Search by Model Name" class="form-control" />
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                      <button type="submit" value="submit" name="submit" class="btn btn-primary mb-2 pa">Search</button>
                                    </div>                                     
                                    <?=form_close()?>
                                </div>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="dashboard/create_vehicles" ><i class="fa fa-plus"></i> New</a>
                            </li>
                          </ul>
                    </div>
                    <br/>                    
            </div>            
                
            
            <div class="mdl-card__supporting-text no-padding">

                    <table class="mdl-data-table mdl-js-data-table bordered-table">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">#</th>
                        <th class="mdl-data-table__cell--non-numeric">Model Name</th>
                        <th class="mdl-data-table__cell--non-numeric">Vehicle Number</th>
                        <th class="mdl-data-table__cell--non-numeric">Registration Date</th>
                        <th class="mdl-data-table__cell--non-numeric">Purchase Date</th>
                        <th class="mdl-data-table__cell--non-numeric">Service Type</th>
                        <th class="mdl-data-table__cell--non-numeric">Price (SGD )</th>
                        <!-- <th class="mdl-data-table__cell--non-numeric">Uploaded Document</th> -->
                        <th class="mdl-data-table__cell--non-numeric">Photo</th>
                        <th class="mdl-data-table__cell--non-numeric">Category</th>
                        <th class="mdl-data-table__cell--non-numeric">Available or Not</th>
                        <th class="mdl-data-table__cell--non-numeric">Status</th>
                        <th class="mdl-data-table__cell--non-numeric">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                             <?php
                                $i=1;
                                foreach($allvehicleslist->result() as $row):
                              ?>  
                            <tr>
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php echo $i; ?></td>
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><a href="dashboard/car_detail/<?php echo $row->cid; ?>" style="color:#f02424 !important;font-size: 14px !important"><?php echo $row->model_name; ?></a></td>
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php echo $row->vehicle_no; ?></td>      
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php echo $row->registration_date; ?></td>  
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php echo $row->purchase_date; ?></td>  
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php echo $row->price_status; ?></td> 

                                <?php if($row->price_status=="leasing"){ ?>
                                    <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php echo $row->rental_price; ?></td>
                                <?php }else{ ?>
                                    <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php echo $row->selling_price; ?></td>
                                <?php } ?>
                                

                                <!-- <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric">
                                    <?php
                                        $document = explode(',', $row->document);
                                        $totaldocument=count($document)-1; ?>
                                    <p style="color:#f02424 !important">( <?php echo $totaldocument; ?> ) files </p>
                                </td> -->
                                
                                <td style="vertical-align: top" width="200" class="mdl-data-table__cell--non-numeric">
                                    <?php if($row->photo!=""){ ?>
                                        
                                            <img src="<?php echo base_url() .'upload/files/'.$row->photo;?>" class="vehicle-photos">
                                       
                                    <?php }else{ ?>
                                        No Photo
                                    <?php } ?>
                                    
                                </td>
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric"><?php if($row->title_status=="1"){ ?>
                                        Popular
                                <?php }else if($row->title_status=="2"){ ?>
                                        Offers
                                <?php }else if($row->title_status=="3"){ ?>
                                        Brand New
                                <?php }else if($row->title_status=="4"){ ?>
                                        Electric
                                <?php }else if($row->title_status=="5"){ ?>
                                        A
                                <?php }else if($row->title_status=="6"){ ?>
                                        B
                                <?php }else if($row->title_status=="7"){ ?>
                                        C
                                <?php } ?>
                                </td>  
                                <td style="vertical-align: top">
                                    <?php
                                       
                                        
                                        if($row->status=='1'){ ?>                                            
                                                    <a class="btn btn-warning btn-xs date_status" data-avidate="<?= $row->avidate ?>" data-id="<?= $row->id ?>" type="button" href="javascript:void(0);" >Already Rent</a>                                      
                                            
                                        <?php }else{ ?>
                                            
                                                <a class="btn btn-success btn-xs" type="button" href="javascript:void(0);" >Available</a>                             
                                            
                                        <?php }?>                                   
                                        
                                    </td>
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric">
                                    <?php if($row->show_status=='0'){?>
                                        <a class="btn btn-warning btn-xs vehicle_approve" data-id="<?= $row->id ?>" type="button" href="javascript:void(0);" >Pending</a>
                                    <?php }else{?>
                                        <a class="btn btn-success btn-xs vehicle_cancel" data-id="<?= $row->id ?>" type="button" href="javascript:void(0);" >Show</a>
                                    <?php } ?>
                                </td>
                                <td style="vertical-align: top" class="mdl-data-table__cell--non-numeric">
                                    <a class="btn btn-primary btn-xs color-white vedit" data-id="<?= $row->id ?>" href="<?php echo base_url() .'dashboard/edit_vehicles/'.$row->cid;?>" data-id="<?= $row->cid ?>" type="button">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="<?php echo base_url() .'dashboard/delete_vehicles/'.$row->cid;?>" type="button" class="delete-asset btn btn-danger btn-xs color-white">
                                        <i class="fa fa-trash"></i> 
                                    </a>

                                </td>
                            </tr> 
                             <?php
                                $i++;
                                endforeach; ?>       
                    </tbody>
                </table>
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->



<div class="modal fade" id="modal-bookingavailable" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <form method="post" action="<?php echo site_url('dashboard/reset_rentedvehicle') ?>">
            <input type="hidden" name="id" id="vehi_id">
                <div class="modal-header">                  
                  <h4 class="modal-title">Available Rental Date</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        
                        <label>Available Date : </label>
                        <span id="avidate"></span>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Reset Date</button>
                </div>
        </form> 
      </div>
      
    </div>
</div>

<div class="modal fade" id="modal-vehicleapprove" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form method="post" action="<?php echo site_url('dashboard/update_vehicleapprove') ?>">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Approve Vehicles</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to approve?
                    <input type="hidden" name="id" >                    
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
        </form>
      </div>
      
    </div>
</div>
<div class="modal fade" id="modal-vehiclecancel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form method="post" action="<?php echo site_url('dashboard/update_vehiclecancel') ?>">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Cancel Vehicles</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel?
                    <input type="hidden" name="id" >                    
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
        </form>
      </div>
      
    </div>
</div>