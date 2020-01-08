<?php ?>

<div class="container">

    <div class="panel panel-primary">
        <div class="panel-heading">Add Employee Details</div>
        <div class="panel-body text-center">
            <?php
            if (!empty($this->session->flashdata('success_msg'))) {
                ?>
                <div class="col-xs-12">
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                </div>
            <?php } elseif (!empty($this->session->flashdata('error_msg'))) { ?>
                <div class="col-xs-12">
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
            <!-- BEGIN FORM-->
            <?php
            echo form_open_multipart('Main_Controller/addEmployeeData/',
                    array('class' => 'form-horizontal', 'role' => 'form',
                        'id' => ''));
            ?>

            <form method="post" class="form-horizontal" action="">
                <!--<h2>Enter Employee Details</h2>-->
                <div class="form-group">
                    <label for="e_i_d" class="col-md-4 control-label">Employee ID :</label>
                    <div class="col-md-6">
                        <input type="text" name="e_i_d"  class="form-control" id="e_i_d" placeholder="Please Enter Employee ID" value="<?php echo set_value('e_i_d'); ?>" required="" autocomplete="off" minlength="1" maxlength="20"/>
                        <?php echo form_error('e_i_d'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="e_name" class="col-md-4 control-label">Employee Name :</label>
                    <div class="col-md-6">
                        <input type="text" name="e_name"  class="form-control" id="e_name" placeholder="Please Enter Employee Name" value="<?php echo set_value('e_name'); ?>" required="" autocomplete="off" minlength="2" maxlength="100"/>
                        <?php echo form_error('e_name'); ?>
                    </div>

                </div>

                <div class="form-group">
                    <label for="e_contact" class="col-md-4 control-label">Contact Number :</label>
                    <div class="col-md-6">
                        <input type="text" name="e_contact"  class="form-control" id="e_contact" placeholder="Please Enter Contact Number" value="<?php echo set_value('e_contact'); ?>" required="" autocomplete="off" minlength="10" maxlength="10" />
                        <?php echo form_error('e_contact'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="e_mail_id" class="col-md-4 control-label">Email ID :</label>
                    <div class="col-md-6">
                        <input type="email" name="e_mail_id" class="form-control" id="e_mail_id" placeholder="Please Enter Email ID" value="<?php echo set_value('e_mail_id'); ?>" required="" autocomplete="off" minlength="5" maxlength="20"/>
                        <?php echo form_error('e_mail_id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="e_mail_id" class="col-md-4 control-label">Department Name :</label>
                    <div class="col-md-6">
                        <input type="text" name="e_department"  class="form-control" id="e_department" placeholder="Please Enter Department Name" value="<?php echo set_value('e_department'); ?>" required="" autocomplete="off" minlength="1" maxlength="100"/>
                        <?php echo form_error('e_department'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="e_designation" class="col-md-4 control-label">Designation Name :</label>
                    <div class="col-md-6">
                        <input type="text" name="e_designation"  class="form-control" id="e_designation" placeholder="Please Enter Designation Name" value="<?php echo set_value('e_designation'); ?>" required="" autocomplete="off" minlength="1" maxlength="100"/>
                        <?php echo form_error('e_designation'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="e_gender" class="col-md-4 control-label">Gender</label>
                    <div class="col-md-6">
                        <select name="e_gender" id="e_gender" class="form-control" value="<?php echo set_value('e_gender'); ?>" required="">
                            <option>Select Gender</option>
                            <option value="Male" <?php if ('Male' == set_value('e_gender')) echo "selected = 'selected'" ?>>Male</option>
                            <option value="Female" <?php if ('Female' == set_value('e_gender')) echo "selected = 'selected'" ?>>Female</option>
                            <option value="Other" <?php if ('Other' == set_value('e_gender')) echo "selected = 'selected'" ?>>Other</option>

                        </select>
                        <?php echo form_error('e_gender'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="e_address" class="col-md-4 control-label">Address</label>
                    <div class="col-md-6">
                        <textarea name="e_address"  class="form-control" id="e_address" placeholder="Please Enter address."  required=""><?php echo set_value('e_address'); ?></textarea>
                        <?php echo form_error('e_address'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-offset-2 col-md-8">
                        <button type="submit" id="test" class="btn btn-success" >Submit</button>
                        <a href="<?php echo base_url(); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div>


            </form>
            <!-- END FORM-->

            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAUXznG9tJxAHWfCL2w2UwYCYfDO2mlHCQ&libraries=places"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var opts = {
            componentRestrictions: {country: "ind"}
        };
        var places = new google.maps.places.Autocomplete(document.getElementById('e_address'), opts);

    });
</script>

<script src="<?php echo base_url(); ?>/resources/js/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/datatables.min.js"></script>
<script>


    $(document).ready(function () {
        $('#addEmployee').addClass('active');
        $('.alert-success').fadeOut(10000);
        $('.alert-danger').fadeOut(10000);
    });
</script>
</body>
</html>
