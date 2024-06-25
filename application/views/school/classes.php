<div class="container mt-5">
    <div class="card mt-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Classes&nbsp;&nbsp;
                    <a href="<?php echo site_url('School/create_class'); ?>" title="Add Class">
                        <img class="header_image_style" src="<?= base_url('assets/img/add.png')?>" alt="add.png" >
                    </a>
                </h1>
                <a href="<?php echo site_url('School/index')?>">
                    <input type="button" class="btn btn-black" value="Exit">
                </a>
            </div>
        </div>
        <div class="card-body mt-2">
            <form method="post" action="">
                <div class="table-responsive mailbox-messages" style="overflow:auto; margin-top:20px;">
                    <table id="class_list" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="bg-dark" style="color: white;">Srno</th>
                                <th class="bg-dark" style="color: white;">Name</th>
                                <th class="bg-dark" style="color: white;">Edit</th>
                                <th class="bg-dark" style="color: white;">Delete</th>
                            </tr>
                        </thead>
                        <tbody><?php 
                            $sr=1; 
                            foreach($display_class as $ds)
                            {?>
                                <tr>
                                    <td><?php echo $sr; ?></td>
                                    <td><?php echo $ds['name']; ?></td>
                                    <td><img class="image_style" src="<?= base_url('assets/img/editing.png')?>" alt="editing.png" onclick="edit_class('<?php echo $ds['class_id']; ?>');"></td>
                                    <td><img class="image_style" src="<?= base_url('assets/img/delete.png')?>" alt="delete.png" onclick="delete_entry('<?php echo $ds['class_id']; ?>');"></td>
                                </tr><?php
                                $sr++;
                            }?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?php echo base_url('assets/js/school/classes.js'); ?>" type="text/javascript"></script>