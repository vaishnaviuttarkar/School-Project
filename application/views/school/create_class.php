<div class="container mt-5">
    <div class="card mt-2">
    <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Add Class</h1>
                <a href="<?php echo site_url('School/index')?>">
                    <input type="button" class="btn btn-black" value="Exit">
                </a>
            </div>
        </div>
        <div class="card-body mt-2">
            <form method="post" enctype="multipart/form-data" action="<?= base_url('index.php/School/submit_class') ?>">
                <input type="hidden" name="srno" id="srno" value="<?php echo $srno; ?>">
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
                </div>
                <button type="submit" class="btn btn-black mt-5">Submit</button>
                <a href="<?php echo site_url('School/classes')?>" style="margin-top:5px;">
                    <button type="button" class="btn btn-black mt-5">Back to Class</button>
                </a>
            </form>
        </div>
    </div>
</div>