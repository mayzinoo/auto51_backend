<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Edit Vehicles</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <div class="">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url('dashboard/update_vehicles') ?>">
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                        <div class="row">  
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="form-group">
                                        <label>Model Name</label>
                                        <input type="text" name="modelname" class="form-control" value="<?php echo $vehiclesdata->model_name;?>">
                                </div>
                                <div class="form-group">
                                        <label>Brand Name</label>
                                        <?=form_dropdown("brandname",$getbrands_list,$vehiclesdata->brand_name,"class='form-control'")?>
                                        
                                </div>
                                
                                <div class="form-group">
                                        <label>Vehicle Number</label>
                                        <input type="text" name="vehicleno" class="form-control" value="<?php echo $vehiclesdata->vehicle_no;?>">
                                </div>
                                    
                                
                                <div class="form-group">
                                        <label>Transportation Network Company</label>
                                        <input type="text" name="tnc" class="form-control" value="<?php echo $vehiclesdata->tnc;?>">
                                </div>
                                   
                                <div class="form-group">
                                        <label>Category Name</label>
                                        <?=form_dropdown("category",$getcategory_list,$vehiclesdata->title_status,"class='form-control'")?>            
                                        
                                </div>
                                <div class="row nopadding">
                                    <div class="col-md-4">
                                            <label>Service Type</label>
                                            <?=form_dropdown("pricestatus",array('leasing'=>"Leasing",'selling'=>"Selling"),$vehiclesdata->price_status,'class="form-control"','id="pricestatus"')?>
                                            
                                    </div>
                                    <div class="col-md-8">
                                            <div class="form-group" id="leasing">
                                                <label>Leasing Price / Day (SGD)</label>
                                                <input type="text" name="price" class="form-control" value="<?php echo $vehiclesdata->rental_price;?>">
                                            </div>   
                                            <div class="form-group" id="selling">
                                                <label>Selling Price (SGD)</label>
                                                <input type="text" name="selling_price" class="form-control" value="<?php echo $vehiclesdata->selling_price;?>">
                                            </div> 
                                    </div>
                                </div> 
                                <div class="row nopadding">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Year</label>
                                                <input type="text" name="year" class="form-control" value="<?php echo $vehiclesdata->year;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                                <label>Consumption (litres/100 km)</label>
                                                <input type="text" name="consumption" class="form-control" value="<?php echo $vehiclesdata->consumption;?>">
                                        </div> 
                                    </div>
                                    
                                </div>  
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="row nopadding">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Fuel Type</label>
                                                            <?=form_dropdown("fueltype",$getfuel_list,$vehiclesdata->fuel_type,"class='form-control'")?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Body Type</label>
                                                            <?=form_dropdown("bodytype",$getbodytype_list,$vehiclesdata->body_type,"class='form-control'")?> 
                                                    </div>
                                                </div>
                                            </div>                                    
                                            <div class="row nopadding">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Doors</label>
                                                            <input type="number" name="door" class="form-control" value="<?php echo $vehiclesdata->door;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Seats</label>
                                                            <input type="number" name="seat" class="form-control" value="<?php echo $vehiclesdata->seat_qty;?>">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row nopadding">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Engine</label>
                                                            <input type="text" name="engine" class="form-control" value="<?php echo $vehiclesdata->engine_type;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Transmission</label>
                                                            <input type="text" name="transmission" class="form-control" value="<?php echo $vehiclesdata->transmission;?>">
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                <label>Color</label> 
                                                <select name="color[]" class="select2 form-control" multiple required>
                                                    <?php $color_array = explode(',', $vehiclesdata->color); ?>
                                                    <?php foreach($getcolors as $key => $status) : ?>
                                                        <option value="<?= $status->color_name ?>" <?php if(in_array($status->color_name, $color_array)) echo "selected"; ?> > <?= $status->color_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small>Multiple colors can be selected.</small>
                                            </div> 

                                            <div class="form-group">
                                                    <label>Features</label>  
                                                    <select name="feature[]" class="select4-clear form-control" multiple required>
                                                        <?php $feature_array = explode(',', $vehiclesdata->features); ?>
                                                        <?php foreach($getfeatures as $key => $status) : ?>
                                                            <option value="<?= $status->name ?>" <?php if(in_array($status->name, $feature_array)) echo "selected"; ?> > <?= $status->name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>                                          
                                                   
                                                    <small>Multiple features can be selected.</small>
                                            </div>
                                            <?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="form-group">
                                                <label>Purchase Date</label>
                                                <input name="purchase_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="date" value="<?php echo $vehiclesdata->purchase_date;?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Registration Date</label>
                                                <input name="registeration_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="date" value="<?php echo $vehiclesdata->registration_date;?>">
                                            </div>
                                            <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea cols="80" id="description" name="edit_description" rows="10">
                                                       <?php echo $vehiclesdata->description;?>
                                                    </textarea>
                                                        <script>

                                                            CKEDITOR.replace('description');

                                                        </script>
                                            </div>
                            </div>
                        </div>

                        <?php 
                          $vid=$this->uri->segment(3);
                            $pkgdata=$this->db->query("SELECT * FROM car_package WHERE vehicle_id=$vid"); ?>
                            <input type="hidden" name="id" value="<?php echo $vid;?>">
                        <?php  if(empty($pkgdata->num_rows())){ ?>
                                
                                <div class="col-md-12 sm_toppadding">
                                        <label>Vehicles Package</label>
                                         <h4 class="chosepkgg-right"><span class="text-right btn" onclick="pkgcloneform(event)" style="float:right" ><i class="fa fa-plus"></i> Add New</span>
                                                </h4>

                                            <div id="vpkg" class="choosepackage">
                                                    <div class="row package sm_toppadding">                    
                                                        <div class="col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Duration</label> 
                                                                    <?=form_dropdown("duration[]",$durationlist,$row->duration,'class="form-control"','required="required"')?>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Price / month (SGD)</label>
                                                                    <input type="text" name="rentalprice[]" value="<?php echo $row->price; ?>" class="form-control" >
                                                                </div>  
                                                        </div>
                                                        <div class="col-md-3 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Status</label>  
                                                                    <?=form_dropdown("vstatus[]",array('false'=>'...','true'=>"Best Saver"),$row->best,"class='form-control',required='required'")?>                                     
                                                                    
                                                                </div>  
                                                        </div>
                                                        <div class="col-md-1 col-lg-1">
                                                                <div class="form-group">
                                                                    <span class='btn btn-danger' onclick="removerpkg(event)" style="margin-top: 32px;"> x </span>
                                                                </div>  
                                                        </div>
                                                    
                                                    </div> 
                                            </div><!-- end vpkg-->
                                </div><!--  -->
                        <?php }else{ ?>
                                    <div class="col-md-12 sm_toppadding">
                                            <label>Vehicles Package</label>
                                             <h4 class="chosepkgg-right"><span class="text-right btn" onclick="pkgcloneform(event)" style="float:right" ><i class="fa fa-plus"></i> Add New</span>
                                                    </h4>

                                                <div id="vpkg" class="choosepackage">
                                                 <?php
                                                $vid=$vehicledata->id;
                                                $pkg=$this->db->query("SELECT * FROM car_package WHERE vehicle_id=$vid");                    
                                                foreach($pkg->result() as $row):
                                              ?>
                                              
                                                    <input type="hidden" name="pkgid[]" value="<?php echo $row->id;?>">
                                                    <div class="row package sm_toppadding">                    
                                                            <div class="col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label>Duration</label> 
                                                                        <?=form_dropdown("duration[]",$durationlist,$row->duration,'class="form-control"','required="required"')?>
                                                                    </div>
                                                            </div>
                                                            <div class="col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label>Price / month (SGD)</label>
                                                                        <input type="text" name="rentalprice[]" value="<?php echo $row->price; ?>" class="form-control" >
                                                                    </div>  
                                                            </div>
                                                            <div class="col-md-3 col-lg-3">
                                                                    <div class="form-group">
                                                                        <label>Status</label>  
                                                                        <?=form_dropdown("vstatus[]",array('false'=>'...','true'=>"Best Saver"),$row->best,"class='form-control',required='required'")?>                                     
                                                                        
                                                                    </div>  
                                                            </div>
                                                            <div class="col-md-1 col-lg-1">
                                                                    <div class="form-group">
                                                                        <span class='btn btn-danger' onclick="removerpkg(event)" style="margin-top: 32px;"> x </span>
                                                                    </div>  
                                                            </div>
                                                        
                                                    </div> 
                                                    <?php
                                                    endforeach; ?>   
                                                    </div><!-- end vpkg-->
                                                </div><!--  -->
                                 
                        <?php }?>
                        <div class="row right md_padding">
                            <div class="col-md-12 ">
                                <a href="dashboard/allvehicles" class="btn mybtn btn-default">Cancel</a>
                                <button type="submit" class="btn mybtn btn-success">Update</button>
                            </div>                    
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
</div>

<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Cover Photo</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <div class="sm_toppadding">
                    <div class="col-md-6">
                            <div class="form-group">
                                <?php if($vehicledata->photo!=""){ ?>
                                <img src="<?php echo base_url() .'upload/files/'.$vehicledata->photo;?>" class="img-responsive cover-img">
                                <?php }else{ ?>
                                       No Photo
                                <?php } ?>
                                <div class="sm_toppadding lg_leftsidepadding">
                                        <a data-id="<?= $vehicledata->id ?>" type="button" href="javascript:void(0);" class="edit-coverImage btn btn-primary btn-xs color-white">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                </div>
                            </div>
                    </div>
                </div><!--  -->
            </div>
        </div>
</div>

<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Gallery Photos</h1>
                <div class="card-tools">
                      <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#modal-new-galleryImage"><i class="fa fa-plus"></i> New</a>
                        </li>
                      </ul>
                </div>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <!-- <div class="col-md-12"> -->
                    <?php 
                      $vid=$this->uri->segment(3);
                        $vphotodata=$this->db->query("SELECT * FROM vehicle_photos WHERE vehicle_id=$vid");
                      if(empty($vphotodata->num_rows())){ ?>
                             
                      <?php  }else{ ?>
                            <div class="col-md-12">
                                <div class="row form-group">                                   
                                    <?php
                                    $vid=$vehicledata->id;
                                    $carphotos=$this->db->query("SELECT * FROM vehicle_photos WHERE vehicle_id=$vid");                    
                                    foreach($carphotos->result() as $row):
                                  ?>
                                        <div class="col-md-6 sm_toppadding">
                                            <img src="<?php echo base_url() .'upload/files/'.$row->photos;?>" class="img-responsive galleryphoto">
                                            
                                            <div class="sm_padding showgallery">
                                                <a data-id="<?= $row->id ?>" type="button" href="javascript:void(0);" class="edit-galleryImage btn btn-primary btn-xs color-white">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a onclick="return confirm('Are you sure to delete?')" href="<?php echo base_url() .'dashboard/delete_galleryImage/'.$row->id.'/'.$row->vehicle_id;?>" type="button" class="delete-asset btn btn-danger btn-xs color-white">
                                                <i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                <?php 
                                endforeach; ?>
                                </div> 
                            </div> 
                      <?php  } ?>
                <!--  -->
            </div>
        </div>
</div>


<!-- Add Gallery Image -->
<div class="modal fade" id="modal-new-galleryImage" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form method="post" enctype="multipart/form-data" action="<?php echo site_url('dashboard/add_galleryphotos') ?>">
                <div class="modal-header">
                  
                  <h4 class="modal-title">Add Gallery Photos</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="vid" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="form-group">
                                <label>Gallery Photos</label>
                                <input type="file" class="form-control" name="files[]" multiple/>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
        </form>
      </div>
      
    </div>
</div>


<!-- Edit cover photo -->
<div class="modal fade" id="modal-edit-CoverImage" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form method="post" id="coverImage_editform" enctype="multipart/form-data" action="<?php echo site_url('dashboard/update_coverImage') ?>">
                <div class="modal-header">
                  
                  <h4 class="modal-title">Edit Cover Images</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <input type="hidden" value="" name="id"/>                        
                        
                        <div class="form-group" id="photo-preview">
                            <label>Cover Image</label>
                            <div>
                                    (No photo)
                                    <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="label-photo">Upload Image </label>
                            <div>
                                    <input name="cover" type="file" class="form-control"multiple="true" accept="image/*">
                                    <span class="help-block"></span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="brandsform" class="btn btn-success">Update</button>
                    </div>
                </div>
        </form>
      </div>
      
    </div>
</div>

<!-- Edit Gallery Photos -->
<div class="modal fade" id="modal-edit-galleryImage" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form method="post" id="galleryImage_editform" enctype="multipart/form-data" action="<?php echo site_url('dashboard/update_galleryImage') ?>">
                <div class="modal-header">
                  
                  <h4 class="modal-title">Edit Gallery Images</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <input type="hidden" value="" name="id"/>    
                        <input type="hidden" value="" name="vid"/>                     
                        
                        <div class="form-group" id="photo-preview">
                            <label>Gallery Image</label>
                            <div>
                                    (No photo)
                                    <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="label-photo">Upload Image </label>
                            <div>
                                    <input name="cover" type="file" class="form-control" multiple="true" accept="image/*">
                                    <span class="help-block"></span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" id="brandsform" class="btn btn-success">Update</button>
                    </div>
                </div>
        </form>
      </div>
      
    </div>
</div>