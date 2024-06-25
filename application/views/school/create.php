<div class="container mt-5">
    <div class="card mt-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Add Student</h1>
                <a href="<?php echo site_url('School/index')?>">
                    <input type="button" class="btn btn-black" value="Exit">
                </a>
            </div>
        </div>
        <div class="card-body mt-2">
            <form method="post" enctype="multipart/form-data" action="<?= base_url('index.php/School/submit_student') ?>">
                <input type="hidden" name="srno" id="srno" value="<?php echo $srno; ?>">
                <input type="hidden" name="old_file" id="old_file" value="<?php echo $image; ?>">
                <div class="row" >
                    <div class="col-md-2">
                        <label for="name">
                            <strong>
                                NAME
                                <span style="color:red;">*</span>
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="name" id="name" placeholder="NAME" value="<?php echo $name; ?>">
                        <span style="color:red;"><?php echo form_error('name'); ?></span>
                    </div>
                    <div class="col-md-2">
                        <label for="email">
                            <strong>
                                EMAIL
                                <span style="color:red;">*</span>
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" value="<?php echo $email; ?>">
                        <span style="color:red;"><?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="row mt-5" >
                    <div class="col-md-2">
                        <label for="address">
                            <strong>
                                ADDRESS
                                <span style="color:red;">*</span>
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="address" id="address" placeholder="ADDRESS" value="<?php echo $address; ?>">
                        <span style="color:red;"><?php echo form_error('address'); ?></span>
                    </div>
                    <div class="col-md-2">
                        <label for="class">
                            <strong>
                                CLASS
                                <span style="color:red;">*</span>
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="class" id="class"><?php
                            if((set_value('class'))||($srno))
                            {?> 
                                <option value="<?php echo $class; ?>"><?php echo $classname; ?></option><?php 
                            }
                            else
                            {?> 
                                <option value="">SELECT CLASS</option><?php 
                            }
                            foreach($display_class as $dc)
                            {?>
                                <option value="<?php echo $dc['class_id']; ?>"><?php echo $dc['name']; ?></option><?php
                            }?>
                        </select>
                        <span style="color:red;"><?php echo form_error('class'); ?></span>
                    </div>
                </div>
                <div class="row mt-5" >
                    <div class="col-md-2">
                        <label for="image">
                            <strong>
                                IMAGE
                                <span style="color:red;">*</span>
                            </strong>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="file"  class="form-control" name="image" id="image">
                    </div>
                    <div class="col-md-4">
                        <span style="color:red;"><?php echo $upload_error;?></span>
                        <strong><u><a target="__blank" href="<?php echo site_url("./uploads/$image");?>" style="color:black;"><?php echo $image; ?></a></u></strong>
                    </div>
                </div>

                <button type="submit" class="btn btn-black mt-5">Submit</button>
                <a href="<?php echo site_url('School/index')?>" style="margin-top:5px;">
                    <button type="button" class="btn btn-black mt-5">Back to Students</button>
                </a>

            </form>
        </div>
    </div>
</div>
