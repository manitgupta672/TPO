
<?php
function branch_name($branch)
{
	switch ($branch) {
        case 'ARC':
            $branch_fname = "Architecture and Town Planning";
            break;
        case "BCT":
            $branch_fname = "Building and Construction";
            break;
        case "CHE":
            $branch_fname = "Chemical Engineering";
            break;
        case "CIV":
            $branch_fname = "Civil Engineering";
            break;
        case "CSE":
            $branch_fname = "Computer Science and Engineering";
            break;
        case "ITE":
            $branch_fname = "Information Technology";
            break;
        case "EEL":
            $branch_fname = "Electrical Engineering";
            break;
        case "ECE":
            $branch_fname = "Electronics and Communication Engineeing";
            break;            
        case "EEE":
            $branch_fname = "Electronics and Electrical Engineering";
            break;
        case 'ECC':
            $branch_fname = "Electronics and Computers Engineering";
            break;
        case "MEC":
            $branch_fname = "Mechanical Engineering";
            break;
        case "MIN":
            $branch_fname = "Mining Engineering";
            break;
        case "PIE":
            $branch_fname = "Production and Industrial Engineering";
            break;
        case "STR":
            $branch_fname = "Structural Engineering";
            break;
        case "MCA":
            $branch_fname = "Master of Computer Application";
            break;
        default:
            $branch_fname = 0;
            break;
    }
    return $branch_fname;
}
?>

<?php 
// if(!isset($_GET['user_id'])) refresh('index');
// $user_id = test_input($_GET['user_id']);
// $result = mysqli_query($con,"SELECT * FROM resume WHERE user_id = '".$user_id."'");
// $resume = mysqli_fetch_array($result);
?>

<?php
$name = $resume['name'];
$fatherName = $resume['fatherName'];
$dob = $resume['dob'];
$email = $resume['email'];
$mobile = $resume['mobile'];
$gender = $resume['gender'];
$address = $resume['address'];
$city = $resume['city'];
$pinCode = $resume['pinCode'];
$state = $resume['state'];
$degree = $resume['degree'];
$currentSem = $resume['currentSem'];
$branch = branch_name($resume['branch']);
$facultyNo = $resume['facultyNo'];
$enrollmentNo = $resume['enrollmentNo'];
$board10 = $resume['board10'];
$board12 = $resume['board12'];
$board10Percent = $resume['board10Percent'];
$board12Percent = $resume['board12Percent'];
// $hsc_ed = $resume['hsc_ed'];
$d_institute = $resume['d_institute'];
$d_percent = $resume['d_percent'];
$d_ed = $resume['d_ed'];
$sem1 = $resume['sem1'];
$sem1MM = $resume['sem1MM'];
$sem1Percent = $resume['sem1Percent'];
$sem1_kt = $resume['sem1_kt'];
$sem2 = $resume['sem2'];
$sem2MM = $resume['sem2MM'];
$sem2Percent = $resume['sem2Percent'];
$sem2_kt = $resume['sem2_kt'];
$sem3 = $resume['sem3'];
$sem3MM = $resume['sem3MM'];
$sem3Percent = $resume['sem3Percent'];
$sem3_kt = $resume['sem3_kt'];
$sem4 = $resume['sem4'];
$sem4MM = $resume['sem4MM'];
$sem4Percent = $resume['sem4Percent'];
$sem4_kt = $resume['sem4_kt'];
$sem5 = $resume['sem5'];
$sem5MM = $resume['sem5MM'];
$sem5Percent = $resume['sem5Percent'];
$sem5_kt = $resume['sem5_kt'];
$sem6 = $resume['sem6'];
$sem6MM = $resume['sem6MM'];
$sem6Percent = $resume['sem6Percent'];
$sem6_kt = $resume['sem6_kt'];
$sem7 = $resume['sem7'];
$sem7MM = $resume['sem7MM'];
$sem7Percent = $resume['sem7Percent'];
$sem7_kt = $resume['sem7_kt'];
$sem8 = $resume['sem8'];
$sem8MM = $resume['sem8MM'];
$sem8Percent = $resume['sem8Percent'];
$sem8_kt = $resume['sem8_kt'];
$aggregatePercent = $resume['aggregatePercent'];
// $reason_kt = $resume['reason_kt'];
// $reason_yb = $resume['reason_yb'];
$proj1 = $resume['proj1'];
$proj2 = $resume['proj2'];
$extraCurricular = $resume['extraCurricular'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resume Template</title>
    <link rel="shortcut icon" href="../assets/users/img/webbed.ico"> <!-- TITLE ICON -->
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Webbed Resume Template" />
    <meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="../assets/users/css/resume.css" media="all" />

</head>
<body>
    <div class="social">
        <ul>
            <li>
                <a class='north' href="/student/panel" title="TPO Portal">Back</a>
            </li>
            <!-- <li>
                <a class='north' href="resume_builder" title="Resume Builder">Resume Builder</a>
            </li> -->
            <li>
                <a class='north' href="javascript:window.print()" title="Print">Print</a>
            </li>
        </ul>
    </div>
<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?php echo $name;?></h1>
                    <h2><?php echo $currentSem." Semester, ".$degree.",<br /> ".$branch.",<br />MBM Engineering College, Jodhpur"; ?></h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
                        <h3><a href="mailto:<?php echo $email ?>"><?php echo $email; ?></a></h3>
						<h3><?php echo $mobile; ?></h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Personal Details</h2>
						</div>
						<div class="yui-u">
                            <table class="left">
                                <tr><th>Father's Name : </th><td><?php echo $fatherName; ?></td></tr>
                                <tr><th>Gender : </th><td><?php echo $gender; ?></td></tr>
                                <tr><th>Date of Birth : </th><td><?php echo $dob; ?></td></tr>
                                <tr><th>Address : </th><td><?php echo $address.",<br />".$city.", ".$state.",<br />India - ".$pinCode;?></td></tr>
                            </table>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Academics</h2>
						</div>
						<div class="yui-u">
                            <table class="center">
                                <tr><th>Examination</th><th>Board</th><th>Percentage</th></td></tr>
                                <tr>
                                    <td>Class X</td>
                                    <td><?php echo $board10; ?></td>
                                    <td><?php echo $board10Percent; ?></td>
                                </tr>
                                <tr>
                                    <td>Class XII</td>
                                    <td><?php echo $board12 ;?></td>
                                    <td><?php echo $board12Percent; ?></td>
                                </tr>
                                
                                <?php if($degree == 'BE'){ ?>
                                <tr>
                                    <td>Graduation</td>
                                    <td>JNVU</td>
                                    <td><?php echo $aggregatePercent; ?></td>
                                    <td></td>
                                </tr>
                             	<?php } ?>
                                </table>
                            <table class="center">
                                <tr>
                                    <th colspan = "4"><center><h2><?php if($degree == 'BE'){ ?>Under Graduation<?php } else{ ?>Post Graduation<?php } ?></h2></center></th>
                                </tr>
                                <tr>
                                    <th><b>Semester</b></th>
                                    <th><b>Marks</b></th>
                                    <th><b>Percentage</b></th>
                                    <th><b>No. of AT/KT (current)</b></th>
                                </tr>
                                <?php if($sem1 != 0){ ?>
                                <tr>
                                    <td>First</td>
                                    <td><?php echo $sem1. " / ".$sem1MM ?></td>
                                    <td><?php echo $sem1Percent ?></td>
                                    <td><?php echo $sem1_kt ?></td>
                                </tr>
                                <?php } if($sem2 != 0){ ?>
                                <tr>
                                    <td>Second</td>
                                    <td><?php echo $sem2. " / ".$sem2MM ?></td>
                                    <td><?php echo $sem2Percent ?></td>
                                    <td><?php echo $sem2_kt ?></td>
                                </tr>
                                <?php } if($sem3 != 0){ ?>
                                <tr>
                                    <td>Third</td>
                                    <td><?php echo $sem3. " / ".$sem3MM ?></td>
                                    <td><?php echo $sem3Percent ?></td>
                                    <td><?php echo $sem3_kt ?></td>
                                </tr>
                                <?php } if($sem4 != 0){ ?>
                                <tr>
                                    <td>Fourth</td>
                                    <td><?php echo $sem4. " / ".$sem4MM ?></td>
                                    <td><?php echo $sem4Percent ?></td>
                                    <td><?php echo $sem4_kt ?></td>
                                </tr>
                                <?php } if($sem5 != 0){ ?>
                                <tr>
                                    <td>Fifth</td>
                                    <td><?php echo $sem5. " / ".$sem5MM ?></td>
                                    <td><?php echo $sem5Percent ?></td>
                                    <td><?php echo $sem5_kt ?></td>
                                </tr>
                                <?php } if($sem6 != 0){ ?>
                                <tr>
                                    <td>Sixth</td>
                                    <td><?php echo $sem6. " / ".$sem6MM ?></td>
                                    <td><?php echo $sem6Percent ?></td>
                                    <td><?php echo $sem6_kt ?></td>
                                </tr>
                                <?php } if($sem7 != 0){ ?>
                                <tr>
                                    <td>Seventh</td>
                                    <td><?php echo $sem7. " / ".$sem7MM ?></td>
                                    <td><?php echo $sem7Percent ?></td>
                                    <td><?php echo $sem7_kt ?></td>
                                </tr>
                                <?php } if($sem8 != 0){ ?>
                                <tr>
                                    <td>Eighth</td>
                                    <td><?php echo $sem8. " / ".$sem8MM ?></td>
                                    <td><?php echo $sem8Percent ?></td>
                                    <td><?php echo $sem8_kt ?></td>
                                </tr>
                                <?php } ?>
                            </table>
                            <?php if($proj1 != "0"){?>
                            <article>
                                <h2>Major Project 1</h2>
                                <p><?php echo $proj1; ?></p>
                            </article>
                            <?php } if($proj2 != "0"){?>
                            <article>
                                <h2>Reasons for Gap in studies during UG</h2>
                                <p><?php echo $proj2; ?></p>
                            </article>
                            <?php } ?>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Extra Curricular</h2>
						</div>
						<div class="yui-u">
							<p>
                                <?php echo $extraCurricular; ?>
							</p>
						</div>
					</div><!--// .yui-gf-->
				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>
