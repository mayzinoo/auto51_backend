<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Create Vehicles</h1>
            </div>
            <div class="mdl-card__supporting-text no-padding">
                <div class="">
                <form method="post" enctype="multipart/form-data" action="<?php echo site_url('dashboard/insert_vehicles') ?>">
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                        <div class="row">  
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="form-group">
                                        <label>Model Name</label>
                                        <input type="text" name="n_modelname" class="form-control" required>
                                </div>
                                <div class="form-group">
                                        <label>Brand Name</label>
                                        <?=form_dropdown("n_brandname",$getbrands_list,"","class='form-control'")?>
                                </div>
                               
                                <div class="form-group">
                                        <label>Vehicle Number</label>
                                        <input type="text" name="n_vehicleno" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                        <label>Transportation Network Company</label>
                                        <input type="text" name="n_tnc" class="form-control" required>
                                </div>
                                  
                                <div class="form-group">
                                        <label>Category Name</label>     
                                        <?=form_dropdown("category",$getcategory_list,"","class='form-control'")?> 
                                </div>
                                <div class="row nopadding">
                                    <div class="col-md-4">
                                            <label>Service Type</label>
                                            <select id="pricestatus" class="form-control" name="n_pricestatus" >
                                                <option value="leasing">Leasing</option>
                                                <option value="selling">Selling</option>  
                                            </select>
                                    </div>
                                    <div class="col-md-8">
                                            <div class="form-group" id="leasing">
                                                <label>Leasing Price / Day (SGD)</label>
                                                <input type="text" name="n_price" class="form-control" >
                                            </div>   
                                            <div class="form-group" id="selling">
                                                <label>Selling Price (SGD)</label>
                                                <input type="text" name="selling_price" class="form-control">
                                            </div> 
                                    </div>
                                </div> 
                                <div class="row nopadding">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Year</label>
                                                <input type="text" name="n_year" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                                <label>Consumption (litres/100 km)</label>
                                                <input type="text" name="n_consumption" class="form-control" required>
                                        </div> 
                                    </div>
                                    
                                </div>  
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="row nopadding">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Fuel Type</label>
                                                            <?=form_dropdown("n_fueltype",$getfuel_list,"","class='form-control'")?> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Body Type</label>
                                                            <?=form_dropdown("n_bodytype",$getbodytype_list,"","class='form-control'")?> 
                                                    </div>
                                                </div>
                                            </div>                                    
                                            <div class="row nopadding">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Doors</label>
                                                            <input type="number" name="n_door" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Seats</label>
                                                            <input type="number" name="n_seat" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row nopadding">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Engine</label>
                                                            <input type="text" name="n_engine" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Transmission</label>
                                                            <input type="text" name="n_transmission" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                    <label>Color</label>                                            
                                                    <select class="select3" name="color[]" data-placeholder="Color" style="width: 100%;" multiple required>
                                                        <option value="">&nbsp;</option>
                                                        <?php foreach($getcolors as $key => $status) : ?>
                                                        <option value="<?= $status->color_name ?>"><?= $status->color_name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <small>Multiple colors can be selected.</small>
                                            </div> 

                                            <div class="form-group">
                                                    <label>Features</label>
                                                    <select class="select3-clear form-control" name="feature[]" data-placeholder="Features" style="width: 100%;" multiple required>
                                                        <option value="">&nbsp;</option>
                                                        <?php foreach($getfeatures as $key => $feature) : ?>
                                                        <option value="<?= $feature->name ?>"><?= $feature->name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <small>Multiple features can be selected.</small>
                                            </div>
                                            <?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="form-group">
                                                <label>Purchase Date</label>
                                                <input name="n_purchase_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="date">
                                            </div>
                                            <div class="form-group">
                                                <label>Registration Date</label>
                                                <input name="n_registeration_date" placeholder="yyyy-mm-dd" class="form-control datepicker" type="date">
                                            </div>
                                            <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea cols="80" id="description" name="description" rows="10">
                                                        <?php echo $page_content->message1; ?>
                                                    </textarea>
                                                        <script>

                                                            CKEDITOR.replace('description');

                                                        </script>
                                            </div>
                            </div>
                        </div><!--  -->
                        <div class="row sm_toppadding">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cover Photo <span class="text-danger"> ( only jpg,png and jpeg are allowed )</span></label>
                                        <input type="file" class="form-control" name="cover" required/>
                                        <span class="text-danger"><div name="errmsg"></div></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gallery ( Multiple Photos can be selected )</label>
                                        <input type="file" class="form-control" name="files[]" multiple/>
                                    </div> 
                                </div> 
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Document</label>
                                        <input type="file" class="form-control" name="document[]" multiple/>
                                    </div>
                                </div>  -->   
                        </div><!--  -->
                        <div class="row sm_toppadding">
                            <div class="col-md-12">
                                <p class="formtitle">Vehicles Package</p>
                                 <h4 class="chosepkg-right"><span class="text-right btn" onclick="pkgcloneform(event)" style="float:right" ><i class="fa fa-plus"></i> Add New</span>
                                        </h4>
                                    <div id="vpkg" class="choosepackage">
                                   
                                        <div class="row package sm_toppadding">                    
                                                <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Duration</label> 
                                                            <?=form_dropdown("duration[]",$durationlist,"",'class="form-control"','required="required"')?>
                                                        </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Price / month (SGD)</label>
                                                            <input type="text" name="rentalprice[]" class="form-control" >
                                                        </div>  
                                                </div>
                                                <div class="col-md-3 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Status</label>  
                                                            <?=form_dropdown("vstatus[]",array('false'=>'...','true'=>"Best Saver"),"","class='form-control',required='required'")?>                                     
                                                            
                                                        </div>  
                                                </div>
                                                <div class="col-md-1 col-lg-1">
                                                        <div class="form-group">
                                                            <span class='btn btn-danger' onclick="removerpkg(event)" style="margin-top: 32px;"> x </span>
                                                        </div>  
                                                </div>
                                            
                                        </div>  
                                        
                                    </div><!-- end vpkg-->
                            </div>                            
                        </div><!--  -->
                        <div class="row right md_padding">
                            <div class="col-md-12">
                                <a href="dashboard/allvehicles" class="btn mybtn btn-default">Cancel</a>
                                <button type="submit" class="btn mybtn btn-success">Save</button>
                            </div>                    
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
</div>
