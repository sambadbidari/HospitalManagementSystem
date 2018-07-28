<ul class="nav">
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='index.php') echo 'active';?>">
        <a href="index.php">
            <i class="pe-7s-graph"></i> 
            <p>Dashboard</p>
        </a>            
    </li>
    <?php if($_SESSION["type"] == 1){ ?>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_bed.php'|| basename($_SERVER['PHP_SELF'])=='add_bed.php'|| basename($_SERVER['PHP_SELF'])=='edit_bed.php') echo 'active';?>">
        <a href="manage_bed.php">
            <i class="pe-7s-albums"></i> 
            <p>Bed Manager</p>
        </a>
    </li> 
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_test.php'|| basename($_SERVER['PHP_SELF'])=='add_test.php'|| basename($_SERVER['PHP_SELF'])=='edit_test.php') echo 'active';?>">
        <a href="manage_test.php">
            <i class="pe-7s-graph3"></i> 
            <p>Test Manager</p>
        </a>        
    </li>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_ward.php'|| basename($_SERVER['PHP_SELF'])=='add_ward.php'|| basename($_SERVER['PHP_SELF'])=='edit_ward.php') echo 'active';?>">
        <a href="manage_ward.php">
            <i class="pe-7s-culture"></i> 
            <p>Ward Manager</p>
        </a>
    </li> 
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_admin.php' || basename($_SERVER['PHP_SELF'])=='add_admin.php'|| basename($_SERVER['PHP_SELF'])=='edit_admin.php') echo 'active';?>">
        <a href="manage_admin.php">
            <i class="pe-7s-user"></i> 
            <p>User Manager</p>
        </a>
    </li>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_report.php'|| basename($_SERVER['PHP_SELF'])=='add_report.php'|| basename($_SERVER['PHP_SELF'])=='edit_repord.php') echo 'active';?>">
        <a href="manage_report.php">
            <i class="pe-7s-menu"></i>
            <p>Report Manager</p>
        </a>
    </li>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_receptionist.php'|| basename($_SERVER['PHP_SELF'])=='add_receptionist.php'|| basename($_SERVER['PHP_SELF'])=='edit_receptionist.php') echo 'active';?>">
        <a href="manage_receptionist.php">
            <i class="pe-7s-menu"></i>
            <p>Receptionist Manager</p>
        </a>
    </li>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_doctor.php'|| basename($_SERVER['PHP_SELF'])=='add_doctor.php'|| basename($_SERVER['PHP_SELF'])=='edit_doctor.php') echo 'active';?>">
        <a href="manage_doctor.php">
            <i class="pe-7s-id"></i> 
            <p>Doctor Manager</p>
        </a>        
    </li>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_patient.php'|| basename($_SERVER['PHP_SELF'])=='add_patient.php'|| basename($_SERVER['PHP_SELF'])=='edit_patient.php') echo 'active';?>">
        <a href="manage_patient.php">
            <i class="pe-7s-umbrella"></i> 
            <p>Patient Manager</p>
        </a>
    </li> 
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_department.php'|| basename($_SERVER['PHP_SELF'])=='add_department.php'|| basename($_SERVER['PHP_SELF'])=='edit_department.php') echo 'active';?>">
        <a href="manage_department.php">
            <i class="pe-7s-drawer"></i> 
            <p>Department Manager</p>
        </a>        
    </li>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_medicine.php') echo 'active';?>">
        <a href="manage_medicine.php">
            <i class="pe-7s-drawer"></i>
            <p>Medicine Manager</p>
        </a>
    </li>
    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='pharmacist_manager.php') echo 'active';?>">
        <a href="content/pharmacist_manager.php">
            <i class="pe-7s-drawer"></i>
            <p>Pharmacist Manager</p>
        </a>
    </li>
   <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_account.php'|| basename($_SERVER['PHP_SELF'])=='add_account.php'|| basename($_SERVER['PHP_SELF'])=='edit_account.php') echo 'active';?>">
        <a href="manage_account.php">
            <i class="pe-7s-drawer"></i>
            <p>Account Manager</p>
        </a>
    </li>
	<?php } ?>

    <?php if($_SESSION["type"] == 2){ ?>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_patient.php') echo 'active';?>">
            <a href="manage_patient.php">
                <i class="pe-7s-umbrella"></i>
                <p>Patient Manager</p>
            </a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_prescription.php') echo 'active';?>">
            <a href="manage_prescription.php">
                <i class="pe-7s-umbrella"></i>
                <p>Prescription Manage</p>
            </a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='change_password.php') echo 'active';?>">
            <a href="change_password.php?id=<?php echo $_SESSION["id"] ?>">
                <i class="pe-7s-drawer"></i>
                <p>Change Password</p>
            </a>
        </li>
    <?php } ?>

    <?php if($_SESSION["type"] == 3){ ?>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='add_medicin_to_patient.php') echo 'active';?>">
            <a href="content\add_medicin_to_patient.php"> <i class="pe-7s-drawer"></i><p>Sell Medicine to patient</p></a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='change_password.php') echo 'active';?>">
            <a href="change_password.php?id=<?php echo $_SESSION["id"] ?>">
                <i class="pe-7s-drawer"></i>
                <p>Change Password</p>
            </a>
        </li>
    <?php } ?>

    <?php if($_SESSION["type"] == 4){ ?>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_report.php'|| basename($_SERVER['PHP_SELF'])=='add_report.php'|| basename($_SERVER['PHP_SELF'])=='edit_repord.php') echo 'active';?>">
            <a href="manage_report.php">
                <i class="pe-7s-menu"></i>
                <p>Report Manager</p>
            </a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_patient.php'|| basename($_SERVER['PHP_SELF'])=='add_patient.php'|| basename($_SERVER['PHP_SELF'])=='edit_patient.php') echo 'active';?>">
            <a href="manage_patient.php">
                <i class="pe-7s-umbrella"></i>
                <p>Patient Manager</p>
            </a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_account.php'|| basename($_SERVER['PHP_SELF'])=='add_account.php'|| basename($_SERVER['PHP_SELF'])=='edit_account.php') echo 'active';?>">
            <a href="manage_account.php">
                <i class="pe-7s-drawer"></i>
                <p>Account Manager</p>
            </a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF'])=='change_password.php') echo 'active';?>">
            <a href="change_password.php?id=<?php echo $_SESSION["id"] ?>">
                <i class="pe-7s-drawer"></i>
                <p>Change Password</p>
            </a>
        </li>
    <?php }?>
		

</ul>