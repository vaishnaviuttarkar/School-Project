<div class="container mt-5">
    <div class="card mt-2">
        <div class="card-header flex">
            <h1>Student Detailed View</h1>
        </div>
        <div class="card-body mt-2">
            <form method="post" action="">
                    <div class="row" >
                        <div class="col-md-3">
                            <img style="width:100%; height:100%" src="<?php echo site_url("./uploads/$image"); ?>" alt="<?php echo $image; ?>" >
                        </div>
                        <div class="col-md-9">
                            <div class="row" >
                                <div class="col-md-2">
                                    <label for="from"><strong>NAME</strong></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="NAME" value="<?php echo $name; ?>" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="from"><strong>EMAIL</strong></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" value="<?php echo $email; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mt-5" >
                                <div class="col-md-2">
                                    <label for="address"><strong>ADDRESS</strong></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="ADDRESS" value="<?php echo $address; ?>" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="class"><strong>CLASS</strong></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="class" id="class" placeholder="CLASS" value="<?php echo $classname; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mt-5" >
                                <div class="col-md-2">
                                    <label for="created_at"><strong>CREATION DATE</strong></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="created_at" value="<?php echo $created_at; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row mt-5" >
                                <div class="col-md-1">
                                    <a href="<?php echo site_url('School/index')?>">
                                        <input type="button" class="btn btn-black" value="Back">
                                    </a>
                                </div>
                                <div class="col-md-11">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>