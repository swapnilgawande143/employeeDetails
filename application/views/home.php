
<div class="container">

    <div class="panel panel-primary">
        <div class="panel-heading text-center">Employee Details Management System </div>
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
            <div class="x_content table-responsive">
                <table id="employeeInfo" class="table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <!--<th>Address</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result) {
                            $i = 0;
                            foreach ($result as $empData) {
                                ?>
                                <tr index="<?php echo $empData->employeeId; ?>">
                                    <td> <?php echo $empData->employeeId; ?></td>
                                    <td> <?php echo $empData->employeeName; ?></td>
                                    <td> <?php echo $empData->employeeContact; ?></td>
                                    <td> <?php echo $empData->employeeEmail; ?></td>
                                    <td> <?php echo $empData->employeeDepartment; ?></td>
                                    <td> <?php echo $empData->employeeDesignation; ?></td>
                                    <!--<td name="<?php // echo $empData->employeeId;                                                                           ?>"> <?php // echo $empData->employeeAddress;                                                                           ?></td>-->
                                    <td>
                                        <button value="<?php echo $empData->employeeId; ?>" type="button" onclick="employee.viewEmp(this.value,<?= $i ?>)" class="btn btn-success fa fa-eye" data-target='#viewEmployeeModal' data-toggle='modal' title="View Employee Details..!!"></button>
                                        <button value="<?php echo $empData->employeeId; ?>" type="button" onclick="employee.editEmp(this.value,<?= $i ?>)" class="btn btn-primary fa fa-pencil" data-target='#editEmployeeModal' data-toggle='modal' title="Edit Employee Details..!!"></button>
                                        <button value="<?php echo $empData->employeeId; ?>" type="button" onclick="deleteEmp(this.value)" class="btn btn-danger fa fa-remove" title="Remove Employee..!!"></button>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>


        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="dialog">
        <!-- BEGIN FORM-->
        <?php
        echo form_open_multipart('Main_Controller/editEmployeeDetails/',
                array('class' => 'form-horizontal', 'role' => 'form',
                    'id' => ''));
        ?>
        <div class="modal-content">
            <form method="post" class="form-horizontal" action="">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Enter Employee Details</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">

                        <input type="hidden" name="e_i_d_temp" id="e_i_d_temp" value="<?php echo set_value('e_i_d_temp'); ?>">
                        <input type="hidden" name="e_contact_temp" id="e_contact_temp" value="<?php echo set_value('e_contact_temp'); ?>">
                        <input type="hidden" name="e_mail_id_temp" id="e_mail_id_temp" value="<?php echo set_value('e_mail_id_temp'); ?>">

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
                                <input type="text" name="e_contact"  class="form-control" id="e_contact" placeholder="Please Enter Contact Number" value="<?php echo set_value('e_contact'); ?>" required="" />
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



                    </div>



                </div>
                <div class="modal-footer" style="text-align:center;">
                    <a href="<?php echo base_url(); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="submitEmpDataEdit" id='btn-update-emp' class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- END FORM-->

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal -->


<!-- view emp Modal -->
<div class="modal fade" id="viewEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="dialog">
        <!-- BEGIN FORM-->
        <?php
        echo form_open_multipart('Main_Controller/addEmployee/',
                array(
                    'class' => 'form-horizontal remember', 'role' => 'form',
                    'id' => ''));
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><b>View Employee Details</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row">

                    <form method="post" class="form-horizontal" action="">
                        <!--<h2>Enter Employee Details</h2>-->
                        <div class="form-group">
                            <label for="e_i_d" class="col-md-4 control-label">Employee ID :</label>
                            <div class="col-md-6">
                                <input type="text" name="e_i_d1"  class="form-control" id="e_i_d1" placeholder="Please Enter Employee ID" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="e_name" class="col-md-4 control-label">Employee Name :</label>
                            <div class="col-md-6">
                                <input type="text" name="e_name1"  class="form-control" id="e_name1" placeholder="Please Enter Employee Name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="e_contact" class="col-md-4 control-label">Contact Number :</label>
                            <div class="col-md-6">
                                <input type="text" name="e_contact1"  class="form-control" id="e_contact1" placeholder="Please Enter Contact Number" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="e_mail_id" class="col-md-4 control-label">Email ID :</label>
                            <div class="col-md-6">
                                <input type="email" name="e_mail_id1"  class="form-control" id="e_mail_id1" placeholder="Please Enter Email ID" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="e_mail_id" class="col-md-4 control-label">Department Name :</label>
                            <div class="col-md-6">
                                <input type="text" name="e_department1"  class="form-control" id="e_department1" placeholder="Please Enter Department Name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="e_designation" class="col-md-4 control-label">Designation Name :</label>
                            <div class="col-md-6">
                                <input type="text" name="e_designation1"  class="form-control" id="e_designation1" placeholder="Please Enter Designation Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="e_gender" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select name="e_gender1" id="e_gender1" class="form-control">
                                    <option>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="e_address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <textarea name="e_address1"  class="form-control" id="e_address1" placeholder="Please Enter address." ></textarea>
                            </div>
                        </div>





                    </form>
                </div>



            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal -->


<script src="<?php echo base_url(); ?>resources/js/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/datatables.min.js"></script>


<?php
if (!empty($this->session->flashdata('modelError'))) {
    echo "<script>$('#editEmployeeModal').modal('show');</script>";
}
?>
<script type="text/javascript">
                                            $(document).ready(function () {
                                                $('.alert-success').fadeOut(10000);
                                                $('.alert-danger').fadeOut(10000);
                                                $('#viewEmployee').addClass('active');
                                                $('th').addClass('text-center');
                                                $('td').addClass('text-center');
                                                $('#employeeInfo').DataTable();
                                                $('#btn-update-emp').click(function () {
                                                    employee.updateData();
                                                })
                                            });



                                            function deleteEmp(data) {

                                                swal({
                                                    title: "Are you sure?",
                                                    text: "Do you realy want to remove employee",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#DD6B55',
                                                    confirmButtonText: 'Yes, I am sure!',
                                                    cancelButtonText: "No, cancel it!",
                                                    closeOnConfirm: false,
                                                    closeOnCancel: false
                                                },
                                                        function (isConfirm) {
                                                            if (isConfirm) {
                                                                employee.deleteEmpData(data);
                                                                swal({
                                                                    title: '',
                                                                    text: 'Okay...!.',
                                                                    type: 'success'
                                                                });
                                                            } else {
                                                                swal("Cancelled", "Okay...!  :)", "error");
                                                            }
                                                        });
                                            }



                                            var employee = {
                                                rowIndex: '',

                                                // function to set data
                                                editEmp: function (data, RowIndex) {

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo base_url(); ?>" + "index.php/Main_Controller/viewEmpDetails",
                                                        data: {'employeeId': data},
                                                        async: false,
                                                        success: function (result)
                                                        {
                                                            result = $.parseJSON(result);
                                                            $('#e_i_d').val(result[0].employeeId);
                                                            $('#e_i_d_temp').val(result[0].employeeId);
                                                            employee.rowIndex = RowIndex;
                                                            $('#e_name').val(result[0].employeeName);
                                                            $('#e_contact').val(result[0].employeeContact);
                                                            $('#e_contact_temp').val(result[0].employeeContact);
                                                            $('#e_mail_id').val(result[0].employeeEmail);
                                                            $('#e_mail_id_temp').val(result[0].employeeEmail);
                                                            $('#e_department').val(result[0].employeeDepartment);
                                                            $('#e_designation').val(result[0].employeeDesignation);
                                                            $('#e_address').val(result[0].employeeAddress);
                                                            $('#e_gender').val(result[0].gender);
                                                        }
                                                    });

                                                },

                                                viewEmp: function (data) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo base_url(); ?>" + "index.php/Main_Controller/viewEmpDetails",
                                                        data: {'employeeId': data},
                                                        async: false,
                                                        success: function (result)
                                                        {
                                                            result = $.parseJSON(result);
                                                            $('#e_i_d1').val(result[0].employeeId);
                                                            $('#e_name1').val(result[0].employeeName);
                                                            $('#e_contact1').val(result[0].employeeContact);
                                                            $('#e_mail_id1').val(result[0].employeeEmail);
                                                            $('#e_department1').val(result[0].employeeDepartment);
                                                            $('#e_designation1').val(result[0].employeeDesignation);
                                                            $('#e_address1').val(result[0].employeeAddress);
                                                            $('#e_gender1').val(result[0].gender);
                                                        }
                                                    });
                                                },

                                                deleteEmpData: function (data) {
                                                    //  alert(data);
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo base_url(); ?>" + "index.php/Main_Controller/deleteEmployee",
                                                        data: {'employeeId': data},
                                                        async: false,
                                                        success: function (result)
                                                        {
                                                            result = $.parseJSON(result);
                                                            if (result.ErrorFlag) {
                                                                swal({
                                                                    title: '',
                                                                    text: 'Employee Details Removed...!.',
                                                                    type: 'success'
                                                                });
                                                                $('#employeeInfo').DataTable().row('tr[index ="' + data + '"]').remove().draw(false);
                                                            } else {
                                                                swal({
                                                                      title: "Error",
                                                                      text: "Something went wrong",
                                         
                                                                      button: "Close",
                                                                });
                                                            }
                                                        }
                                                    });
                                                },

                                                updateData: function () {



                                                    if (employee.rowIndex != '') {
                                                        // AJAX CALL RESPONE
                                                        var data = $('#employeeInfo').DataTable().row(parseInt(employee.rowIndex)).data();
                                                        data[0] = $('#e_i_d').val();
                                                        data[1] = $('#e_name').val();
                                                        data[2] = $('#e_contact').val();
                                                        data[3] = $('#e_mail_id').val();
                                                        data[4] = $('#e_department').val();
                                                        data[5] = $('#e_designation').val();
                                                        $('#employeeInfo').dataTable().fnUpdate(data, parseInt(employee.rowIndex), undefined, false);
                                                    }




                                                }


                                            }

</script>
</body>
</html>
