<div class="container mt-5">
    <div class="card mt-2">
        <div class="card-header flex">
            <h1>Students&nbsp;&nbsp;
                <a href="<?php echo site_url('School/create'); ?>" title="Add Student">
                    <img class="header_image_style" src="<?= base_url('assets/img/add.png')?>" alt="add.png">
                </a>
            </h1>
        </div>
        <div class="card-body mt-2">
            <form method="post" action="">
                <div class="table-responsive mailbox-messages" style="overflow:auto; margin-top:20px;">
                    <table id="stud_list" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="bg-dark" style="color: white;">Srno</th>
                                <th class="bg-dark" style="color: white;">Image</th>
                                <th class="bg-dark" style="color: white;">Name</th>
                                <th class="bg-dark" style="color: white;">Email</th>
                                <th class="bg-dark" style="color: white;">Creation Date</th>
                                <th class="bg-dark" style="color: white;">Class Name</th>
                                <th class="bg-dark" style="color: white;">View</th>
                                <th class="bg-dark" style="color: white;">Edit</th>
                                <th class="bg-dark" style="color: white;">Delete</th>
                            </tr>
                        </thead>
                        <tbody><?php 
                            $sr=1; 
                            foreach($display_student as $ds)
                            {?>
                                <tr>
                                    <td><?php echo $sr; ?></td>
                                    <td>
                                        <?php $image=$ds['image']; ?>
                                        <img class="thumnbnail" src="<?php echo site_url("./uploads/$image"); ?>" alt="<?php echo $ds['image']; ?>" >
                                    </td>
                                    <td><?php echo $ds['name']; ?></td>
                                    <td><?php echo $ds['email']; ?></td>
                                    <td><?php echo $ds['created_at']; ?></td>
                                    <td><?php echo $ds['class_name']; ?></td>
                                    <td><img class="image_style" src="<?= base_url('assets/img/eye.png')?>" alt="eye.png" onclick="view_student('<?php echo $ds['id']; ?>');"></td>
                                    <td><img class="image_style" src="<?= base_url('assets/img/editing.png')?>" alt="editing.png" onclick="edit_student('<?php echo $ds['id']; ?>');"></td>
                                    <td><img class="image_style" src="<?= base_url('assets/img/delete.png')?>" alt="delete.png" onclick="delete_entry('<?php echo $ds['id']; ?>');"></td>
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
<script src="<?php echo base_url('assets/js/school/index.js'); ?>" type="text/javascript"></script>

