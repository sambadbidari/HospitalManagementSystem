<?php
error_reporting(0);
session_start();
$admin_name=$_SESSION["admin_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HMS Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .table>thead>tr>th,
        .table-borderless td,
        .table-borderless th {
            border: 0 !important;
        }
        .custom-combobox {
            position: relative;
            display: inline-block;
        }
        .custom-combobox-toggle {
            position: absolute;
            top: 0;
            bottom: 0;
            margin-left: -1px;
            padding: 0;
        }
        .custom-combobox-input {
            margin: 0;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
<div class="wrapper"  style="height: 1000px !important;">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    HMS
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a href="../index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if($_SESSION["type"] == 1){ ?>
                    <li>
                        <a href="../manage_bed.php">
                            <i class="pe-7s-albums"></i>
                            <p>Bed Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_test.php">
                            <i class="pe-7s-graph3"></i>
                            <p>Test Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_ward.php">
                            <i class="pe-7s-culture"></i>
                            <p>Ward Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_admin.php">
                            <i class="pe-7s-user"></i>
                            <p>Admin Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_report.php">
                            <i class="pe-7s-menu"></i>
                            <p>Report Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_doctor.php">
                            <i class="pe-7s-id"></i>
                            <p>Doctor Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_patient.php">
                            <i class="pe-7s-umbrella"></i>
                            <p>Patient Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_department.php">
                            <i class="pe-7s-drawer"></i>
                            <p>Department Manager</p>
                        </a>
                    </li>
                    <li class="<?php if (basename($_SERVER['PHP_SELF'])=='manage_medicine.php') echo 'active';?>">
                        <a href="../manage_medicine.php">
                            <i class="pe-7s-drawer"></i>
                            <p>Medicine Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="pharmacist_manager.php">
                            <i class="pe-7s-drawer"></i>
                            <p>Pharmacist Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_account.php">
                            <i class="pe-7s-drawer"></i>
                            <p>Account Manager</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if($_SESSION["type"] == 3){ ?>
                    <li class="active">
                        <a href="../add_medicin_to_patient.php"> <i class="pe-7s-drawer"></i><p>Sell Medicine to patient</p></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                <i>Welcome! </i> <?php echo $_SESSION["admin_name"]?>
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/htdocs/new/function/logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br><br>

        <?php
        require '../function/db_connect.php';
        $allPatients = "SELECT * FROM tbl_patient";
        $allMedicine  = "SELECT * FROM tbl_medicine";
        $patients = mysqli_query($conn, $allPatients);
        $Medicines = mysqli_query($conn, $allMedicine);

        ?>

        <div class="col-md-8">
            <form action="" method="post">
                <div class="row">
                    <table class="table" id="data">
                        <tr>
                            <td>Select Patient</td>
                            <td>:</td>
                            <td>
                                <select name="patient_id" id="combobox" type="text" class="form-control">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($patients)) {
                                        ?>
                                        <option value="<?php echo $row['patient_id'] ?>"><?php echo $row['patient_phone'].'('. $row['patient_name'].')';?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input name="submit" type="submit" style="margin-left: 10px;"  value="Submit"/>
                    <input type="button" id="addnew" name="addnew" value="Add Medicine" />
                    <input type="hidden" id="items" name="items" value="1" />
                </div>
            </form>

            <!--    <select name="selectinput" id="selectinput">-->
            <!--        <option value="" id="options"></option>-->
            <!--    </select>-->
        </div>


    </div>



    <?php require 'footer.php'; ?>
</div>
</div>
<?php
$result_array = array();
while($row = mysqli_fetch_assoc($Medicines))
{
//    $result_array[] = $row;
    $option .= '<option value = "'.$row['name'].'|'.$row['price'].'|'.$row['store'].'|'.$row['sold'].'">'.$row['name'].'</option>';

}
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function() {
        var currentItem = 1;

        var jArray= <?php echo json_encode($result_array ); ?>;

//        $.each(jArray, function(i, item) {
////            var strToAdd2 =
//            $('#selectinput').append('<option>'+jArray[i].name+'</option>');
//        })



        $('#addnew').click(function(){
            currentItem++;
            $('#items').val(currentItem);
//            $.each(jArray, function(i, item)
//            {
//                $('#target1').append('<option>'+jArray[i].name+'</option>');
//                $('#target2').append('<option>'+jArray[i].name+'</option>');
//                $('#target3').append('<option>'+jArray[i].name+'</option>');
//                $('#target4').append('<option>'+jArray[i].name+'</option>');
//            })
            var strToAdd = '<tr><td>Medicine</td><td>:</td><td><select class="form-control" name="medicine[]" id="target'+currentItem+'" type="text" ><?php echo $option; ?></select></td><td>Quantity</td><td>:</td><td><input type="text" class="form-control" name="quantity[]" /></td></tr>';
            $('#data').append(strToAdd);
        });
    });
</script>

<?php
if (isset($_POST['submit'])){
    $prefix = $allMedicineString = '';
    $selectedMedicines = array();
    foreach ($_POST["medicine"] as $medicin) {

        $option_explode = explode('|', $medicin);

        $selectedMedicines[] = $option_explode[0];

        $allMedicineString .= $prefix . '"' . $option_explode[0] . '"';
        $prefix = ', ';
    }


// loop for selecting the prices
    $price = array();
    foreach ($_POST["medicine"] as $medicin) {
        $option_explode = explode('|', $medicin);
        $price[] =  $option_explode[1];
    }


// loop for selecting the store
    $store = array();
    foreach ($_POST["medicine"] as $medicin) {
        $option_explode = explode('|', $medicin);
        $store[] =  $option_explode[2];
    }
    print_r($store);

// loop for selecting the sold
    $sold = array();
    foreach ($_POST["medicine"] as $medicin) {
        $option_explode = explode('|', $medicin);
        $sold[] =  $option_explode[3];
    }
    print_r($sold);

// loop for selecting the quantity and update the medicine table info
    $quantity = array();
    $length = 0;
    foreach ($_POST["quantity"] as $quantities) {
        $quantity[] = $quantities;
        $length++;
    }

// calculating the total cost of medicine
    $total_cost = 0;
    for ($i=0;$i<=$length;$i++) {
        $total_cost += (($price[$i])*($quantity[$i]));
    }
// update the amounts of medicines in medicines table
    $j=0;
    foreach ($_POST["medicine"] as $medicin) {
        $currentMedicine = $selectedMedicines[$j];
        $currentStore = $store[$j] - $quantity[$j];
        $currentSold =  $sold[$j] + $quantity[$j];

        $update_query  = "UPDATE tbl_medicine SET store = $currentStore, sold = $currentSold WHERE name = '$currentMedicine';";
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            echo "updated";
        }
        else{
            echo "not updated";
        }
        $j++;
    }


    $patient_id = $_POST['patient_id'];
    $query  = "INSERT into  tbl_medicine_history (patient_id, medicines, total_cost) VALUES ('$patient_id', '$allMedicineString' , '$total_cost')";

    $result =  mysqli_query($conn, $query);
    if ($result){
        echo("<script> alert(\"Medicine successfully sell. Total Bill : $total_cost\");</script>");
//        header("Location: pharmacist_manager.php");
    }
    else
        echo "not edited!!";
}


?>
</body>
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.js"></script>
<script>
    $( function() {
        $.widget( "custom.combobox", {
            _create: function() {
                this.wrapper = $( "<span>" )
                    .addClass( "custom-combobox" )
                    .insertAfter( this.element );

                this.element.hide();
                this._createAutocomplete();
                this._createShowAllButton();
            },

            _createAutocomplete: function() {
                var selected = this.element.children( ":selected" ),
                    value = selected.val() ? selected.text() : "";

                this.input = $( "<input>" )
                    .appendTo( this.wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: $.proxy( this, "_source" )
                    })
                    .tooltip({
                        classes: {
                            "ui-tooltip": "ui-state-highlight"
                        }
                    });

                this._on( this.input, {
                    autocompleteselect: function( event, ui ) {
                        ui.item.option.selected = true;
                        this._trigger( "select", event, {
                            item: ui.item.option
                        });
                    },

                    autocompletechange: "_removeIfInvalid"
                });
            },

            _createShowAllButton: function() {
                var input = this.input,
                    wasOpen = false;

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .tooltip()
                    .appendTo( this.wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "custom-combobox-toggle ui-corner-right" )
                    .on( "mousedown", function() {
                        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                    })
                    .on( "click", function() {
                        input.trigger( "focus" );

                        // Close if already visible
                        if ( wasOpen ) {
                            return;
                        }

                        // Pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                    });
            },

            _source: function( request, response ) {
                var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                response( this.element.children( "option" ).map(function() {
                    var text = $( this ).text();
                    if ( this.value && ( !request.term || matcher.test(text) ) )
                        return {
                            label: text,
                            value: text,
                            option: this
                        };
                }) );
            },

            _removeIfInvalid: function( event, ui ) {

                // Selected an item, nothing to do
                if ( ui.item ) {
                    return;
                }

                // Search for a match (case-insensitive)
                var value = this.input.val(),
                    valueLowerCase = value.toLowerCase(),
                    valid = false;
                this.element.children( "option" ).each(function() {
                    if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                        this.selected = valid = true;
                        return false;
                    }
                });

                // Found a match, nothing to do
                if ( valid ) {
                    return;
                }

                // Remove invalid value
                this.input
                    .val( "" )
                    .attr( "title", value + " didn't match any item" )
                    .tooltip( "open" );
                this.element.val( "" );
                this._delay(function() {
                    this.input.tooltip( "close" ).attr( "title", "" );
                }, 2500 );
                this.input.autocomplete( "instance" ).term = "";
            },

            _destroy: function() {
                this.wrapper.remove();
                this.element.show();
            }
        });

        $( "#combobox" ).combobox();
        $( "#toggle" ).on( "click", function() {
            $( "#combobox" ).toggle();
        });
    } );
</script>
</html>

<!---->
<!--$que = "insert INTO tbl_patient(patient,target) VALUES ('".$_POST['type']."','".$year."','".$month."','".$week."','".$actual."','".$max."','".$target."')";-->
<!--mysqli_query($conn,$que);-->

