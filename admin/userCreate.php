<?php 
session_start(); 
include("config.php");
if(!(isset($_SESSION['user_spritEducation']) && $_SESSION['user_spritEducation'] != '')){
	header ("Location:login.php");
}

if(isset($_GET['id']))
{
                     $student_id=$_GET['id'];
					 $sql="select * from pdu_user where id=$student_id";
					 $resultquery=mysqli_query($con,$sql);
					 $heading=mysqli_fetch_array($resultquery,MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
	<title>Edhut Education Solution :: Dashboard</title>
	<meta content="Admin Dashboard" name="description">
	<meta content="Themesbrand" name="author">
	<link rel="shortcut icon" href="http://edhutsolutions.com/img/core-img/favicon-2.png">
	<!--Chartist Chart CSS -->
	<link rel="stylesheet" href="../plugins/chartist/css/chartist.min.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Begin page -->
	<div id="wrapper">
		<!-- Top Bar Start -->
		<?php include("include/top_header.php");?>
		<!-- Top Bar End -->
		<!-- ========== Left Sidebar Start ========== -->
		<?php include("include/side_menu.php");?>
		<!-- Left Sidebar End -->
		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container-fluid">
					<div class="page-title-box">
						<div class="row align-items-center">
							<div class="col-sm-6">
								<h4 class="page-title">User Master</h4>
							</div>
						</div>
					</div>
					<!-- end row -->
					<div class="row">
			           <div class="col-12">
			                <?php
        					if(isset($_GET['msg']))
        					{						
        						echo '<div class="alert alert-warning">
        						  <strong>Mobile No Or Email Already Exit!</strong>
        						</div>';
        					}
        					elseif(isset($_GET['success']))
        					{
        						echo '<div class="alert alert-success">
        						  <strong>User Added Successfully!</strong>
        						</div>';
        					}
        					?>
							<div class="card">
								<div class="card-body">

									 <form class="repeater" enctype="multipart/form-data"  name="form1" method="post" action="userInsert.php">
									 <div>
											<div class="row">
											    <input type="hidden" name="student_idd" value="<?php if(isset($_GET['id'])){echo $heading['id'];} ?>" />
												<div class="form-group col-lg-4">
													<label for="name">User Type</label>
													<select class="form-control" name="userType" required >
                                                        <option >Select user type</option>
                                                        <option value="PMP PDUs" <?php if(isset($_GET['id']) && $heading['userType'] == 'PMP PDUs'){ echo 'selected';} ?> >PMP PDUs</option>
                                                        <option value="PMP Simulator" <?php if(isset($_GET['id']) && $heading['userType'] == 'PMP Simulator'){ echo 'selected';} ?> >PMP Simulator</option>
                                                    </select>
												</div>
												<div class="form-group col-lg-4">
													<label for="name">User Name</label>
													<input type="text" class="form-control" name="s_name" value="<?php if(isset($_GET['id'])){echo $heading['name'];} ?>" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">User Email</label>
													<input type="email" class="form-control" name="email" value="<?php if(isset($_GET['id'])){echo $heading['email'];} ?>" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">User Mobile</label>
													<input type="text" class="form-control" name="mobile" value="<?php if(isset($_GET['id'])){echo $heading['mobile'];} ?>"  maxlength="10" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">User Course</label>
													<select class="form-control"  name="c_status" style="color:#a1b1be;" required>
                									    <option>Select  Course</option>
                										<option value="PDUs" <?php if(isset($_GET['id']) && $heading['course'] == 'PDUs'){ echo 'selected';} ?>>PDUs</option>
                										<option value="Trainee" <?php if(isset($_GET['id']) && $heading['course'] == 'Trainee'){ echo 'selected';} ?>>Trainee</option>
                									</select>
												</div>
												<div class="form-group col-lg-4">
													<label for="name">Certificate Valid Date</label>
													<input type="date" class="form-control" name="status_date"  value="<?php if(isset($_GET['id'])){echo $heading['certificate_valid_date'];} ?>" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">Gender</label>
													<select class="form-control" name="gender" style="color:#a1b1be;" required>
                										<option>Gender</option>
                										<option value="Male" <?php if(isset($_GET['id']) && $heading['gender'] == 'Male'){ echo 'selected';} ?>>Male</option>
                										<option value="Female" <?php if(isset($_GET['id']) && $heading['gender'] == 'Female'){ echo 'selected';} ?>>Female</option>
                										<option value="Other" <?php if(isset($_GET['id']) && $heading['gender'] == 'Other'){ echo 'selected';} ?>>Other</option>
                									</select>
												</div>
												<div class="form-group col-lg-4">
													<label for="name">City</label>
													<input type="text" class="form-control" name="city" value="<?php if(isset($_GET['id'])){echo $heading['city'];} ?>" required />
												</div>
												<div class="form-group col-lg-4">
													<label for="name">Country</label>
													<select id="country" name="country" class="form-control" style="margin-bottom:30px;">
                    								   <option value="India">India</option>
                    								   <option value="Afganistan">Afghanistan</option>
                    								   <option value="Albania">Albania</option>
                    								   <option value="Algeria">Algeria</option>
                    								   <option value="American Samoa">American Samoa</option>
                    								   <option value="Andorra">Andorra</option>
                    								   <option value="Angola">Angola</option>
                    								   <option value="Anguilla">Anguilla</option>
                    								   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                    								   <option value="Argentina">Argentina</option>
                    								   <option value="Armenia">Armenia</option>
                    								   <option value="Aruba">Aruba</option>
                    								   <option value="Australia">Australia</option>
                    								   <option value="Austria">Austria</option>
                    								   <option value="Azerbaijan">Azerbaijan</option>
                    								   <option value="Bahamas">Bahamas</option>
                    								   <option value="Bahrain">Bahrain</option>
                    								   <option value="Bangladesh">Bangladesh</option>
                    								   <option value="Barbados">Barbados</option>
                    								   <option value="Belarus">Belarus</option>
                    								   <option value="Belgium">Belgium</option>
                    								   <option value="Belize">Belize</option>
                    								   <option value="Benin">Benin</option>
                    								   <option value="Bermuda">Bermuda</option>
                    								   <option value="Bhutan">Bhutan</option>
                    								   <option value="Bolivia">Bolivia</option>
                    								   <option value="Bonaire">Bonaire</option>
                    								   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                    								   <option value="Botswana">Botswana</option>
                    								   <option value="Brazil">Brazil</option>
                    								   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    								   <option value="Brunei">Brunei</option>
                    								   <option value="Bulgaria">Bulgaria</option>
                    								   <option value="Burkina Faso">Burkina Faso</option>
                    								   <option value="Burundi">Burundi</option>
                    								   <option value="Cambodia">Cambodia</option>
                    								   <option value="Cameroon">Cameroon</option>
                    								   <option value="Canada">Canada</option>
                    								   <option value="Canary Islands">Canary Islands</option>
                    								   <option value="Cape Verde">Cape Verde</option>
                    								   <option value="Cayman Islands">Cayman Islands</option>
                    								   <option value="Central African Republic">Central African Republic</option>
                    								   <option value="Chad">Chad</option>
                    								   <option value="Channel Islands">Channel Islands</option>
                    								   <option value="Chile">Chile</option>
                    								   <option value="China">China</option>
                    								   <option value="Christmas Island">Christmas Island</option>
                    								   <option value="Cocos Island">Cocos Island</option>
                    								   <option value="Colombia">Colombia</option>
                    								   <option value="Comoros">Comoros</option>
                    								   <option value="Congo">Congo</option>
                    								   <option value="Cook Islands">Cook Islands</option>
                    								   <option value="Costa Rica">Costa Rica</option>
                    								   <option value="Cote DIvoire">Cote DIvoire</option>
                    								   <option value="Croatia">Croatia</option>
                    								   <option value="Cuba">Cuba</option>
                    								   <option value="Curaco">Curacao</option>
                    								   <option value="Cyprus">Cyprus</option>
                    								   <option value="Czech Republic">Czech Republic</option>
                    								   <option value="Denmark">Denmark</option>
                    								   <option value="Djibouti">Djibouti</option>
                    								   <option value="Dominica">Dominica</option>
                    								   <option value="Dominican Republic">Dominican Republic</option>
                    								   <option value="East Timor">East Timor</option>
                    								   <option value="Ecuador">Ecuador</option>
                    								   <option value="Egypt">Egypt</option>
                    								   <option value="El Salvador">El Salvador</option>
                    								   <option value="Equatorial Guinea">Equatorial Guinea</option>
                    								   <option value="Eritrea">Eritrea</option>
                    								   <option value="Estonia">Estonia</option>
                    								   <option value="Ethiopia">Ethiopia</option>
                    								   <option value="Falkland Islands">Falkland Islands</option>
                    								   <option value="Faroe Islands">Faroe Islands</option>
                    								   <option value="Fiji">Fiji</option>
                    								   <option value="Finland">Finland</option>
                    								   <option value="France">France</option>
                    								   <option value="French Guiana">French Guiana</option>
                    								   <option value="French Polynesia">French Polynesia</option>
                    								   <option value="French Southern Ter">French Southern Ter</option>
                    								   <option value="Gabon">Gabon</option>
                    								   <option value="Gambia">Gambia</option>
                    								   <option value="Georgia">Georgia</option>
                    								   <option value="Germany">Germany</option>
                    								   <option value="Ghana">Ghana</option>
                    								   <option value="Gibraltar">Gibraltar</option>
                    								   <option value="Great Britain">Great Britain</option>
                    								   <option value="Greece">Greece</option>
                    								   <option value="Greenland">Greenland</option>
                    								   <option value="Grenada">Grenada</option>
                    								   <option value="Guadeloupe">Guadeloupe</option>
                    								   <option value="Guam">Guam</option>
                    								   <option value="Guatemala">Guatemala</option>
                    								   <option value="Guinea">Guinea</option>
                    								   <option value="Guyana">Guyana</option>
                    								   <option value="Haiti">Haiti</option>
                    								   <option value="Hawaii">Hawaii</option>
                    								   <option value="Honduras">Honduras</option>
                    								   <option value="Hong Kong">Hong Kong</option>
                    								   <option value="Hungary">Hungary</option>
                    								   <option value="Iceland">Iceland</option>
                    								   <option value="Indonesia">Indonesia</option>
                    								   <option value="Iran">Iran</option>
                    								   <option value="Iraq">Iraq</option>
                    								   <option value="Ireland">Ireland</option>
                    								   <option value="Isle of Man">Isle of Man</option>
                    								   <option value="Israel">Israel</option>
                    								   <option value="Italy">Italy</option>
                    								   <option value="Jamaica">Jamaica</option>
                    								   <option value="Japan">Japan</option>
                    								   <option value="Jordan">Jordan</option>
                    								   <option value="Kazakhstan">Kazakhstan</option>
                    								   <option value="Kenya">Kenya</option>
                    								   <option value="Kiribati">Kiribati</option>
                    								   <option value="Korea North">Korea North</option>
                    								   <option value="Korea Sout">Korea South</option>
                    								   <option value="Kuwait">Kuwait</option>
                    								   <option value="Kyrgyzstan">Kyrgyzstan</option>
                    								   <option value="Laos">Laos</option>
                    								   <option value="Latvia">Latvia</option>
                    								   <option value="Lebanon">Lebanon</option>
                    								   <option value="Lesotho">Lesotho</option>
                    								   <option value="Liberia">Liberia</option>
                    								   <option value="Libya">Libya</option>
                    								   <option value="Liechtenstein">Liechtenstein</option>
                    								   <option value="Lithuania">Lithuania</option>
                    								   <option value="Luxembourg">Luxembourg</option>
                    								   <option value="Macau">Macau</option>
                    								   <option value="Macedonia">Macedonia</option>
                    								   <option value="Madagascar">Madagascar</option>
                    								   <option value="Malaysia">Malaysia</option>
                    								   <option value="Malawi">Malawi</option>
                    								   <option value="Maldives">Maldives</option>
                    								   <option value="Mali">Mali</option>
                    								   <option value="Malta">Malta</option>
                    								   <option value="Marshall Islands">Marshall Islands</option>
                    								   <option value="Martinique">Martinique</option>
                    								   <option value="Mauritania">Mauritania</option>
                    								   <option value="Mauritius">Mauritius</option>
                    								   <option value="Mayotte">Mayotte</option>
                    								   <option value="Mexico">Mexico</option>
                    								   <option value="Midway Islands">Midway Islands</option>
                    								   <option value="Moldova">Moldova</option>
                    								   <option value="Monaco">Monaco</option>
                    								   <option value="Mongolia">Mongolia</option>
                    								   <option value="Montserrat">Montserrat</option>
                    								   <option value="Morocco">Morocco</option>
                    								   <option value="Mozambique">Mozambique</option>
                    								   <option value="Myanmar">Myanmar</option>
                    								   <option value="Nambia">Nambia</option>
                    								   <option value="Nauru">Nauru</option>
                    								   <option value="Nepal">Nepal</option>
                    								   <option value="Netherland Antilles">Netherland Antilles</option>
                    								   <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    								   <option value="Nevis">Nevis</option>
                    								   <option value="New Caledonia">New Caledonia</option>
                    								   <option value="New Zealand">New Zealand</option>
                    								   <option value="Nicaragua">Nicaragua</option>
                    								   <option value="Niger">Niger</option>
                    								   <option value="Nigeria">Nigeria</option>
                    								   <option value="Niue">Niue</option>
                    								   <option value="Norfolk Island">Norfolk Island</option>
                    								   <option value="Norway">Norway</option>
                    								   <option value="Oman">Oman</option>
                    								   <option value="Pakistan">Pakistan</option>
                    								   <option value="Palau Island">Palau Island</option>
                    								   <option value="Palestine">Palestine</option>
                    								   <option value="Panama">Panama</option>
                    								   <option value="Papua New Guinea">Papua New Guinea</option>
                    								   <option value="Paraguay">Paraguay</option>
                    								   <option value="Peru">Peru</option>
                    								   <option value="Phillipines">Philippines</option>
                    								   <option value="Pitcairn Island">Pitcairn Island</option>
                    								   <option value="Poland">Poland</option>
                    								   <option value="Portugal">Portugal</option>
                    								   <option value="Puerto Rico">Puerto Rico</option>
                    								   <option value="Qatar">Qatar</option>
                    								   <option value="Republic of Montenegro">Republic of Montenegro</option>
                    								   <option value="Republic of Serbia">Republic of Serbia</option>
                    								   <option value="Reunion">Reunion</option>
                    								   <option value="Romania">Romania</option>
                    								   <option value="Russia">Russia</option>
                    								   <option value="Rwanda">Rwanda</option>
                    								   <option value="St Barthelemy">St Barthelemy</option>
                    								   <option value="St Eustatius">St Eustatius</option>
                    								   <option value="St Helena">St Helena</option>
                    								   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    								   <option value="St Lucia">St Lucia</option>
                    								   <option value="St Maarten">St Maarten</option>
                    								   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                    								   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                    								   <option value="Saipan">Saipan</option>
                    								   <option value="Samoa">Samoa</option>
                    								   <option value="Samoa American">Samoa American</option>
                    								   <option value="San Marino">San Marino</option>
                    								   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                    								   <option value="Saudi Arabia">Saudi Arabia</option>
                    								   <option value="Senegal">Senegal</option>
                    								   <option value="Seychelles">Seychelles</option>
                    								   <option value="Sierra Leone">Sierra Leone</option>
                    								   <option value="Singapore">Singapore</option>
                    								   <option value="Slovakia">Slovakia</option>
                    								   <option value="Slovenia">Slovenia</option>
                    								   <option value="Solomon Islands">Solomon Islands</option>
                    								   <option value="Somalia">Somalia</option>
                    								   <option value="South Africa">South Africa</option>
                    								   <option value="Spain">Spain</option>
                    								   <option value="Sri Lanka">Sri Lanka</option>
                    								   <option value="Sudan">Sudan</option>
                    								   <option value="Suriname">Suriname</option>
                    								   <option value="Swaziland">Swaziland</option>
                    								   <option value="Sweden">Sweden</option>
                    								   <option value="Switzerland">Switzerland</option>
                    								   <option value="Syria">Syria</option>
                    								   <option value="Tahiti">Tahiti</option>
                    								   <option value="Taiwan">Taiwan</option>
                    								   <option value="Tajikistan">Tajikistan</option>
                    								   <option value="Tanzania">Tanzania</option>
                    								   <option value="Thailand">Thailand</option>
                    								   <option value="Togo">Togo</option>
                    								   <option value="Tokelau">Tokelau</option>
                    								   <option value="Tonga">Tonga</option>
                    								   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                    								   <option value="Tunisia">Tunisia</option>
                    								   <option value="Turkey">Turkey</option>
                    								   <option value="Turkmenistan">Turkmenistan</option>
                    								   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                    								   <option value="Tuvalu">Tuvalu</option>
                    								   <option value="Uganda">Uganda</option>
                    								   <option value="United Kingdom">United Kingdom</option>
                    								   <option value="Ukraine">Ukraine</option>
                    								   <option value="United Arab Erimates">United Arab Emirates</option>
                    								   <option value="United States of America">United States of America</option>
                    								   <option value="Uraguay">Uruguay</option>
                    								   <option value="Uzbekistan">Uzbekistan</option>
                    								   <option value="Vanuatu">Vanuatu</option>
                    								   <option value="Vatican City State">Vatican City State</option>
                    								   <option value="Venezuela">Venezuela</option>
                    								   <option value="Vietnam">Vietnam</option>
                    								   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    								   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    								   <option value="Wake Island">Wake Island</option>
                    								   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                    								   <option value="Yemen">Yemen</option>
                    								   <option value="Zaire">Zaire</option>
                    								   <option value="Zambia">Zambia</option>
                    								   <option value="Zimbabwe">Zimbabwe</option>
                    								</select>
												</div>
												<div class="col-lg-2 align-self-center">
												    <?php
												    if(isset($_GET['id']))
                                                    {
												    ?>
												    <input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="studentupdate" value="Add">
												    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
													<input data-repeater-delete type="submit" class="btn btn-primary btn-block" name="studentsave" value="Add">
													<?php
                                                    }
                                                    ?>
												</div>
											</div>
									</div>
									
									</form>
									
								</div>
							</div>
						</div>
					
					</div>
					
				</div>
				<!-- container-fluid -->
			</div>
			<!-- content -->
			<?php include("include/footer.php");?>
		</div>
		<!-- ============================================================== -->
		<!-- End Right content here -->
		<!-- ============================================================== -->
	</div>
	<!-- END wrapper -->
	<!-- jQuery  -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/metisMenu.min.js"></script>
	<script src="assets/js/jquery.slimscroll.js"></script>
	<script src="assets/js/waves.min.js"></script>
	<!--Chartist Chart-->
	<script src="../plugins/chartist/js/chartist.min.js"></script>
	<script src="../plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
	<!-- peity JS -->
	<script src="../plugins/peity-chart/jquery.peity.min.js"></script>
	<script src="assets/pages/dashboard.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
</body>


</html>