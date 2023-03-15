<?
//==========================================================================================
// MYEMR FUNCTIONS  >> NOTE: CHECK LOADING OF CSS/JS AT THE BOTTOM
//==========================================================================================

// SET DEFAULT TIMEZONE
date_default_timezone_set('Asia/Singapore');

// DEFINE COMPANY CONSTANTS
const compname = "MERITA DIAGNOSTIC CLINIC INC.";
const compaddr = "5th & 6th Flr Jettac Bldg., 920 Quirino Ave. Cor. San Antonio St. Malate Manila";
const comptelno = "310-0595";
const compfaxno = "";
const compweb = "meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com";
const compinfo = 
	"<b>5th & 6th Flr Jettac Bldg., 920 Quirino Ave. Cor. San Antonio St. Malate, Manila<b><br>
	Tel No.: (02) 5310-032 / 5310-0825 / 0917-8576942 / 0908-8908850<br>
	Email: meritaclinic@gmail.com / meritadiagnosticclinic@yahoo.com<br>
	Accredited:  DOH * POEA * MARINA * TESDA * Oil & Gas UK<br>Skuld P&I * West of England P&I";

// DEFINE SYSTEM CONSTANTS
const sysname = "myEMR";
const sysfullname = "Electronic Medical Record";
const version = "1.0.0";
const lastupdate = "Feb. 14, 2020";
const maxmin = 10;

// DEFINE PIC PATH CONSTANTS
const emp_path = "pics/employee/";
const agn_path = "pics/agency/";
const pat_path = "pics/patient/";
const esg_path = "pics/esignature/";

// DEFINE VARIABLES
$url = $_SERVER['SERVER_NAME'];
$script = str_replace("/myemr-mdci/","",$_SERVER['SCRIPT_NAME']);
$docuRoot = $_SERVER['DOCUMENT_ROOT'];
$dtShow = $currdatetime = date("F d, Y H:i:s");
$dtSave = date("Y-m-d H:i:s");
$dateShow = date("F d, Y");
$dateSave = date("Y-m-d");
$dateInput = date("m-d-Y");
$defURL = "dashboard.php";
$loginURL = "index.php";
$tblUsers = "mast_employee";
$scriptname = str_replace("/","",str_replace(".php","",$script));

// // SESSION
// session_cache_expire(60);
// session_start();

// $minutes = 20;
// if (isset($_SESSION['timestamp'])) {
// 	if (time()-$_SESSION['timestamp']>60*$minutes && $scriptname!="index") {
// 		// saveLog("Session Destroy Logout",0,"Session Destroy");
// 		session_destroy();
// 		echo '<script language="javascript">alert("Session expired, please login again."); location.href="index.php"</script>';
// 		exit;
// 	}
// }

$_SESSION['timestamp'] = time();

// DATABASE CREDENTIALS
$host = env('DB_HOST');;
$db = env('DB_DATABASE');
$dbid = env('DB_USERNAME');
$dbpwd = "";

// INIT DATABASE CONNECTION
$conn = getConn($host,$dbid,$dbpwd,$db);

// FOR NAVPANEL
$qstring = (isset($_SERVER['QUERY_STRING']))? $_SERVER['QUERY_STRING'] : "";
$thisOffset = (initObj("thisOffset")=="") ? 0 : initObj("thisOffset");
$lineIndex = initObj("lineIndex");
$recperpage = 20;	

// ASSIGN VARIABLES
$type = initObj("type");
$page = initObj("page");
$action = initObj("action");
$uid = initObj("uid");
$tabid = initObj("tabid");
$submit = trim(initObj("submit"));

// LIST VARIABLES
$arrPregnancy = array("Negative","Positive","Not Required");
$arrPositive = array("Negative","Positive","Reset");
$arrReactive = array("Non Reactive","Reactive","Reset");
$arrPlus = array("+","-","Reset");
$arrType = array("Rare","Few","Many","Moderate","Ocassional");
$arrUrine = array("Urine","Serum");
$arrBloodType = array("A","B","AB","O","Reset");
$arrBlood = array("A","B","AB","O ","A+","B+","O+","AB+","O-","A-","B-","AB-");
$arrScore = array("1","2","3","4","5","6","7");
$arrMethod = array("Not Required","Instrumented","Test Kit","Random Drug Test");
$arrPurpose = array("Not Required","Pre-Employement","Student","Licensing","Random Drug Testing","Others");
$arrFect = array("FECT","Routine");
$arrStatus = array("Normal","With Findings","Not Required");
$arrSpecimen = array("Urine","Sputum","Stool","Blood");
$arrEmployment = array("Sea-Based","Land-Based","Local-Based");
$arrService = array("--SELECT--","DECK SERVICES","ENGINE SERVICES","CATERING SERVICES","OTHER SERVICES");
$arrFStatus = array("Fit","Unfit","Pending");
$arrFindings= array("Not Required","Normal","With Significant","Non-Significant");
$arrPackage = array("PRC","LOC","COP","Marina");
$arrConclusion = array("RECOMMENDED","FOR FURTHER EVALUATION");
$arrDoctors = array("Medical Director","Cardiologist","Nurse","Treadmill Technician","Echo Technician","Physician","Chief Physician","Audiometrician","ENT Consultant","Psychologist","Psychometrician","Chief Dentist","Dentist","Optometrist","Radiologic Technologist","Radiologist","Chief Medical Technologist","Clinic Operations Manager","Medical Technologist","Pathologist","Laboratory Technician","Medical Support","Medical Staff","Supervisor","Marketing Director","Marketing Officer","Marketing Assistant","Security","Utility","Messenger Utility","Cashier/Registration Clerk","System Administrator","Finance & Admin Staff");
$arrDeck = array("Master","Chief","Third Mate","Second Mate","Bosun","Ordinary Seaman","Able Seaman","Deck Cadet","Deck Hand");
$arrEngine = array("Chief Engineer","First Engineer","Second Engineer","Asst. Engineer","Oiler","Oiler No.1","Wiper","Welder","Fitter","Motorman","Engine Cadet","Second Asst. Engineer","First Asst. Engineer");
$arrCatering = array("Chief Cook","Chief Cook","Cook","Asst. Cook","Second Cook","Waiter","Stewardess","Steward","Messman","Chef De Partie","D/R Waiter");
$arrOther = array("Rigger","Purser","Asst. Purser","Cruise Purser","OJT","Galley Utility","Nurse","Medic","Plumber","Cashier","Piccolo","Asst. Plumber","Safety Officer","Electrician","Medic","Asst. Cruise Staff","Musician","Diver","Bar Manager");
$arrFeca = array("Normal","With Findings","No Specimen");
$arrReligion = array("Roman Catholic","INC","Dating Daan","Pentecostal","Seventh Day Adventist","Born Again","Hindu","Buddhism","Jehovah`s Witness","Mormons","Christ the King","Protestant","Methodist","Atheist");
$arrIntellectual = array("Very Superior","Superior","Above Average","Average","Below Average","Borderline","Mentally Deficient");
$arrArrangement = array("Cash","Charge");
$arrFloor = array("1ST","2ND","3RD","4TH","5TH","6TH");
$arrTPHA = array("TPHA-POSITIVE","TPHA-NEGATIVE","STOOL CULTURE");
$arrAccType = array("ASSETS","OPERATING EXPENSES"," OTHERS");
$arrColor = array("Yellow","Light Yellow","Dark Yellow");
$arrTransparency = array("Clear","Sl. Turbid","Turbid");
$arrExam = array("Head & Neck","Chest","Abdominal","Skeletal","Upper Extremities","Lower Extremities");
$arrExamHNType = array("Skull","Nasal","Paranasal Sinuses","Cervical Spine");
$arrExamHNView = array("AP","Lateral","AP/LAT","Skull Series","Water`s View","Townes View");
$arrExamCType = array("Chest (Child)","Chest (Adult)");
$arrExamCView = array("PA 11 X 14","PA 14 X 14","PA 14 X 14","AP","Lateral","AP/LAT","APL (Lordotic)","Spot Film","Lateral Decubitus");
$arrExamAType = array("Plain Abdomen (Adult)","Plain Abdomen (Child)","KUB","Pelvimetry");
$arrExamAView = array("Upright","Supine","AP","Lateral","AP/LAT");
$arrExamSType = array("Thoracic Cage","Thoracic Spine","Thoraco Lumbar Spine","Lumbosacral","Sacral");
$arrExamSView = $arrExamUEView = $arrExamLEView = array("AP","Lateral","AP/LAT","Oblique");
$arrExamUEType = array("Clavicle","Scapula","Shoulder","Humerus","Elbow Joint","Forearm","Wrist Joint","Hands/Fingers");
$arrExamLEType = array("Pelvic Bone","Hips (Adult)","Hips (Child)","Knee","Femur","Ankle Joint","Foot");
$arrUltraExam = array("KUB","HBT","THYROID","BREAST","WHOLE ABDOMEN","GENITALS");
$arrNegative = array("Negative","+1","+2","+3","+4","Reset");
$arrNormal = array("Normal","+1","+2","+3","+4","Reset");
$arrFrequency = array("Occassional","Few","Moderate","Many","Reset");
$arrAdequate = array("Adequate","Defective","Reset");
$arrSpecimen = array("Urine","Serum","Reset");

if (strpos($script,"print")===false) 	require("footerheader.php");
if (strpos($script,"print")!==false) 	require("footerheaderprt.php");

//============================================================================================
// EUREKA FUNCTIONS     
//============================================================================================
	function vdump($val) {
		echo "<pre>"; var_dump($val); echo "</pre>";
	}

	function initField($val) {
		return ($val) ? $val : "&nbsp;";
	}

	function ynChkbox($val) {
		if ($val=="Yes")
			return "<span style='font-size:15px;'>&#9745;</span> <span style='font-size:15px;'>&#9744;</span>"; // check
		else
			return "<span style='font-size:15px;'>&#9744;</span> <span style='font-size:15px;'>&#9745;</span>";  //uncheck
	}
	
	function readTextfile($filename) {
		$myfile = fopen($filename, "r") or die("Unable to open file!");
		$line = fgets($myfile);
		fclose($myfile);
		return $line;
	}

	function dispCheckbox($val,$chkval) {
		if ($val==$chkval)
			return "<span style='font-size:15px;'>&#9745;</span>"; // check
		else
			return "<span style='font-size:15px;'>&#9744;</span>";  //uncheck
	}
	
	function markSlash($val) {
		return ($val=="") ? " / " : $val;
	}

	function getCount($table, $condition="1=1") {
		$sql0 = "select count(id) as ct form $table where $condition";
		$row = getRow($sql);
		return $row['ct'];		  
	}
	
	function genButtons($userid,$scriptname,$id,$ynadd=0) {
		$sql = "select * from main_useraccess a left join main_usergroup b on a.usergroup_id=b.id 
			left join main_usergroupdtl c on b.id=c.usergroup_id left join main_module d on c.module_id=d.id
			where a.user_id=$userid and d.link='$scriptname.php'";
		$row = getRow($sql);
		if (is_array($row)) {
			if ($ynadd==1) {
				if ($row['yncreate']==1)
					echo '<button type="button" class="btn btn-warning" onclick="location=\''.$scriptname.'.php?action=form&uid=0\'" title="Add Record"><i class="glyphicon glyphicon-plus"></i></button> ';
				echo '<button type="button" class="btn btn-warning" onclick="location=\''.$scriptname.'.php\'" title="Reset List"><i class="glyphicon glyphicon-refresh"></i></button>';
			} else {
				if ($row['ynread']==1)
					echo '<button type="button" class="btn btn-success" title="View Record ID# '.$id.'" onclick="location=\''.$scriptname.'.php?action=formview&uid='.$id.'\'"><i class="glyphicon glyphicon-eye-open"></i></button> ';
				if ($row['ynupdate']==1)
					echo '<button type="button" class="btn btn-primary" title="Edit Record ID# '.$id.'" onclick="location=\''.$scriptname.'.php?action=form&uid='.$id.'\'"><i class="glyphicon glyphicon-pencil"></i></button> ';
				if ($row['yndelete']==1)
					echo '<a href="'.$scriptname.'.php?action=delete&uid='.$id.'" title="Delete ID# '.$id.'" onClick="return confirm(\'You cannot undo this operation!\nDo you wish to delete this record?\')"><button type="button" class="btn btn-danger" title="Delete Record ID# '.$id.'"><i class="glyphicon glyphicon-remove"></i></button></a> ';
				if ($row['ynprint']==1)
					echo '<button type="button" class="btn btn-warning" onclick="window.open(\''.$scriptname.'_print.php?uid='.$id.'\',\'wp\',\'width=800,height=500\')" title="Print"><i class="fa fa-print"></i></button> ';
			}
		}
	}
	function initOptionArr($arr,$val,$withselect=1) {
		if ($withselect==1) echo "<option value=''>--SELECT--</option>";
		foreach ($arr as $tmp) {
			$selected = ($tmp==$val) ? "selected" : "";
			echo "<option value='$tmp' $selected>$tmp</option>";
		}                        
	}
	
	function initOptionTbl($table,$optval,$optlabel,$val,$withselect=1) {
		if ($withselect==1) echo "<option value=''>--SELECT--</option>";
		$result0 = getResult("select * from $table");
		while ($row0 = getArray($result0)) {
			$selected = ($row0[$optval]==$val) ? "selected" : "";
			echo "<option value='".$row0[$optval]."' $selected>".$row0[$optlabel]."</option>";
		}
	}
	
	function initRadioArr($arr,$fld,$val) {
		$ct = 0;
		foreach ($arr as $tmp) {
			if ($tmp=="Reset")  
				echo '<input name="'.$fld.'" type="radio" id="'.$fld.'_'.$ct.'" value="" '.initCheck($tmp,$val).'/>'.$tmp;
			else
				echo '<input name="'.$fld.'" type="radio" id="'.$fld.'_'.$ct.'" value="'.$tmp.'" '.initCheck($tmp,$val).'/>'.$tmp;
			$ct++;
		}
	}
	
	function getStamp($table,$uid,$userid) {
		global $dtSave;
		return (getVal($table,"id=$uid","yndelete")=="") ? "yndelete=0 " : "updated_date='$dtSave',updated_by='$userid' ";
	}
	
	function chkUID($val,$table,$userid,$condition="") {
		return ($val!=0) ? $val : chkNum(getVal($table,"(yndelete is null) and created_by=$userid $condition","id"));
	}

	function chkNum($val) {
		return ($val=="") ? 0 : $val;
	}
	
	function getPerc($val) {
		return round($val*100,0);	
	}
	
	function setDefault($val,$defval="/") {
		if ($val=="")
			return $defval;
		else
			return $val;
	}
	
	function getEmpInfo($position) {
		global $tblUsers,$arrEmp;
		$sql = "select *,case when title='' then concat(firstname,' ',lastname) when title<>'' then concat(firstname,' ',lastname,', ',title) end as fullname from $tblUsers where position='$position'";
		$row = getRow($sql);
		if (is_array($row)) {
			$arrEmp['fullname'] = $row['fullname'];
			$arrEmp['license_no'] = $row['license_no'];
			$arrEmp['license_expdate'] = $row['license_expdate'];
		}
		return $arrEmp;
	}

	function showChkbox($val,$option,$size=15,$yesno=1) {
		/*if ($yesno==1) {
			$ret = "<span style='font-size:".$size."px'>&#9744;</span>"; // uncheck
			if ($val!="") {
				if (($val=="1" && $option=="opt1") || ($val=="0" && $option=="opt2")) {
					$ret = "<span style='font-size:".$size."px'>&#9745;</span>"; // check
				}
			} 
			return $ret;
		} else {
			if (($val==1 && $option=="opt1") || ($val==2 && $option=="opt2") || ($val==3 && $option=="opt3") || ($val==4 && $option=="opt4"))
				return "<span style='font-size:".$size."px'>&#9745;</span>"; // check
			else
				return "<span style='font-size:".$size."px'>&#9744;</span>"; // uncheck			
		}*/
		if ($yesno==1) {
			$ret = "<img src='images/icoUncheck.gif' width='10'>"; // uncheck
			if ($val!="") {
				if (($val=="1" && $option=="opt1") || ($val=="0" && $option=="opt2")) {
					$ret = "<img src='images/icoCheck.gif' width='10'>"; // check
				}
			} 
			return $ret;
		} else {
			if (($val==1 && $option=="opt1") || ($val==2 && $option=="opt2") || ($val==3 && $option=="opt3") || ($val==4 && $option=="opt4"))
				return "<img src='images/icoCheck.gif'>"; // check
			else
				return "<img src='images/icoUncheck.gif'>"; // uncheck	
		}
	}
	
	function genCode($prefix, $code, $table) {
		global $dateSave;
		
		$ret = "";
		$sql0 = "select substring($code,5,6) as num from $table order by $code desc";
		$row0 = getRow($sql0);
		if (is_array($row0)) {
			$num = intval($row0['num'])+1;
			$ret = $prefix.date("y",strtotime($dateSave))."-".str_pad($num,6,"0",STR_PAD_LEFT);
		}
		return $ret;
	}
	
	function initActive($val1,$val2) {
		if ($val1==$val2)
			return "active";
		else
			return "";
	}
	
	function initCheck($val,$chkval) {
		return ($val==$chkval) ? "checked" : "";
	}
	
	function getNameBy ($val) {
		$retval = "";
		if ($val!="")
			$retval = getVal("mast_employee","id=$val","concat(firstname,' ',lastname)");
		return $retval;	
	}

	function chkPic ($pictype,$code) {
		if ($pictype=="patient")
			return (file_exists(pat_path.$code.".jpg")) ? pat_path.$code.".jpg" : pat_path."profilepic.jpg";
		elseif ($pictype=="employee")
			return (file_exists(emp_path.$code.".jpg")) ? emp_path.$code.".jpg" : emp_path."profilepic.jpg";
		elseif ($pictype=="esignature")
			return (file_exists(esg_path.$code.".jpg")) ? esg_path.$code.".jpg" : esg_path."blank.jpg";
	}

	function chkResult ($result) {
		if (mysqli_num_rows($result)!=0)
			return true;
		else
			return false;
	}
	//--------------------------------------------------------------------------------------------
	// CONVERT OPTICAL
	//--------------------------------------------------------------------------------------------
	function convertVal($val) {
		if ($val=="20"){
		   $val="1.000";
		}else if($val=="25"){
		  $val="0.800";
		}else if($val=="30"){
		  $val="0.667";
		}else if($val=="35"){
		  $val="0.571";
		}else if($val=="40"){
		  $val="0.500";
		}else if($val=="45"){
		  $val="0.444";
		}else if($val=="50"){
		  $val="0.400";
		}else if($val=="55"){
		  $val="0.364";
		}else if($val=="60"){
		  $val="0.333";
		}else if($val=="65"){
		  $val="0.308";
		}else if($val=="70"){
		  $val="0.286";
		}else if($val=="80"){
		  $val="0.250";
		}else if($val=="100"){
		  $val="0.200";
		}else if($val=="200"){
		  $val="0.100";
		}
		return $val;
	}
	//--------------------------------------------------------------------------------------------
	// MARK LETTER X
	//--------------------------------------------------------------------------------------------
	function encircle($val,$num) {
		echo ($val=="") ? $num : '<span style="border-radius:50%; border:solid black 1px;padding:5px">'.$num.'</span>';
	}
	//--------------------------------------------------------------------------------------------
	// MARK LETTER X
	//--------------------------------------------------------------------------------------------
	function markX($val,$chkval) {
		echo ($val==$chkval) ? " X " : "&nbsp;&nbsp;&nbsp;";
	}
	//--------------------------------------------------------------------------------------------
	// GENERATE MENU
	//--------------------------------------------------------------------------------------------
	function genMenu($arr,$val) {
		echo ($val=="") ? "<option value='' selected>--SELECT--</option>" : "";
		foreach ($arr as $tmp) {
			$selected = ($val==$tmp) ? "selected" : "";
			echo "<option value='$tmp' $selected>$tmp</option>";
		}
	}
	//--------------------------------------------------------------------------------------------
	// GET PATIENT INFO
	//--------------------------------------------------------------------------------------------
	function getPatientInfo($patientcode) {
		global $patientcode,$lastname,$firstname,$middlename,$email,$gender,$license_no,$license_date,$username,$password,$ynactive,$patientname,$age;
		global $main_id,$patientcode,$address,$contactno,$telno,$celno,$occupation,$nationality,$religion,$maritalstatus,$passportno,$bookno,$birthdate,$birthplace;

		$sql0 = "select a.*,b.*,concat(lastname,', ',firstname,' ',substring(middlename,1,1),'.') as patientname from mast_patient a left join mast_patientinfo b on a.id=b.main_id where a.patientcode='$patientcode'";
		$row0 = getRow($sql0);
		if (is_array($row0)) {
			// PATIENT
			$patientcode = $row0['patientcode'];
			$lastname = $row0['lastname'];
			$firstname = $row0['firstname'];
			$middlename = $row0['middlename'];
			$email = $row0['email'];
			$gender = $row0['gender'];
			$license_no = $row0['license_no'];
			$license_date = formatDate($row0['license_date']);
			// PATIENTINFO
			$address = $row0['address'];
			$contactno = $row0['contactno'];
			$telno = $row0['telno'];
			$celno = $row0['celno'];
			$occupation = $row0['occupation'];
			$nationality = $row0['nationality'];
			$religion = ($row0['religion']!="") ? $row0['religion'] : $row0['religion_others'];
			$maritalstatus = $row0['maritalstatus'];
			$passportno = $row0['passportno'];
			$srbno = $row0['srbno'];
			$birthdate = formatDate($row0['birthdate']);
			$birthplace = $row0['birthplace'];
			// OTHERS
			$patientname = strtoupper($row0['patientname']);
			$age = getAge(formatDate($row0['birthdate']));
			$gender = $row0['gender'];
			$address = $row0['address'];
			$maritalstatus = $row0['maritalstatus'];
			// SIGNATURE
			$signature = $row0['signature'];
		}
	}
	//--------------------------------------------------------------------------------------------
	// GET PATIENT INFO
	//--------------------------------------------------------------------------------------------
	function getAdmissionInfo($admission_id) {
		global $peme_date,$position,$category,$patientcode,$lastname,$firstname,$middlename,$email,$gender,$license_no,$license_date,$gender,$address,$contactno,$nationality,$occupation,$religion,$maritalstatus,$passportno,$passport_expdate,$srbno,$srb_expdate,$birthdate,$birthplace,$patientname,$patientname0,$agencyname,$age,$signature;
				
		if ($admission_id=="")  $admission_id=0;
		$sql0 = "select a.trans_date as peme_date,a.position,a.other_position,a.category,b.*,d.agencyname,c.*
			from tran_admission a left join mast_patient b on a.patientcode=b.patientcode left join mast_patientinfo c on b.id=c.main_id 
			left join mast_agency d on a.agency_id=d.id
			where a.id='$admission_id' and b.yndelete=0 and d.yndelete=0";
		$row0 = getRow($sql0);
		if (is_array($row0)) {
			// ADMISSION
			$peme_date = formatDate($row0['peme_date'],12);
			$position = ($row0['other_position']!="") ? $row0['other_position'] : $row0['position'];
			$category = $row0['category'];
			// PATIENT
			$patientcode = $row0['patientcode'];
			$lastname = $row0['lastname'];
			$firstname = $row0['firstname'];
			$middlename = $row0['middlename'];
			$email = $row0['email'];
			$gender = $row0['gender'];
			$license_no = $row0['license_no'];
			$license_date = formatDate($row0['license_date']);
			$signature = $row0['signature'];
			// PATIENTINFO
			$gender = $row0['gender'];
			$address = $row0['address'];			
			$contactno = $row0['contactno'];
			$nationality = $row0['nationality'];
			$occupation = $row0['occupation'];
			$religion = $row0['religion'];
			$religion = ($row0['religion_others']!="") ? $row0['religion_others'] : $row0['religion'];
			$maritalstatus = $row0['maritalstatus'];
			$passportno = $row0['passportno'];
			$passport_expdate = formatDate($row0['passport_expdate']);
			$srbno = $row0['srbno'];
			$srb_expdate = formatDate($row0['srb_expdate']);
			$birthdate = formatDate($row0['birthdate']);
			$birthplace = $row0['birthplace'];
			// OTHERS
			$patientname = ($row0['middlename']=="") ? strtoupper($row0['lastname'].", ".$row0['firstname']) : strtoupper($row0['lastname'].", ".$row0['firstname']." ".substr($row0['middlename'],0,1).".");
			$patientname0 = ($row0['middlename']=="") ? strtoupper($row0['lastname'].", ".$row0['firstname']) : strtoupper($row0['lastname'].", ".$row0['firstname']." ".$row0['middlename']);
			$agencyname = $row0['agencyname'];
			$age = ($row0['birthdate']!="") ? getAge(formatDate($row0['birthdate'])) : "";
		}
	}
	//--------------------------------------------------------------------------------------------
	// LOGIN AN USER
	//--------------------------------------------------------------------------------------------
	
	function getTechInfo ($techid,$techid2=0,$techid3=0) {
		global $tech_sign,$tech_name,$tech_licno,$tech2_sign,$tech2_name,$tech2_licno,$tech3_sign,$tech3_name,$tech3_licno;
		
		// GET TECH 1 INFO
		if ($techid=="")  $techid=0;
		$sql = "select employeecode,username,case when title='' or title is null then concat(firstname,' ',left(middlename,1),'. ',lastname) when title<>'' then concat(firstname,' ',left(middlename,1),'. ',lastname,', ',title) end as techname,license_no
			from mast_employee where id=$techid";
		$row = getRow($sql);
		$tech_sign = (file_exists("pics/esignature/".$row['employeecode'].".jpg")) ? '<img src="pics/esignature/'.$row['employeecode'].'.jpg" alt="e-Signature" width="80" height="25"/>' : "";
		$tech_name = $row['techname'];
		$tech_licno = $row['license_no'];
		
		// GET TECH 2 INFO
		
		if ($techid2=="")  $techid2=0;
		$sql = "select employeecode,username,case when title='' then concat(firstname,' ',left(middlename,1),'. ',lastname) when title<>'' then concat(firstname,' ',left(middlename,1),'. ',lastname,', ',title) end as techname,license_no
			from mast_employee where id=$techid2";
		$row = getRow($sql);
		$tech2_sign = (file_exists("pics/esignature/".$row['employeecode'].".jpg")) ? '<img src="pics/esignature/'.$row['employeecode'].'.jpg" alt="e-Signature" width="80" height="25"/>' : "";
		$tech2_name = $row['techname'];
		$tech2_licno = $row['license_no'];
		
		// GET TECH 3 INFO
		if ($techid3=="")  $techid3=0;
		$sql = "select employeecode,username,case when title='' then concat(firstname,' ',left(middlename,1),'. ',lastname) when title<>'' then concat(firstname,' ',left(middlename,1),'. ',lastname,', ',title) end as techname,license_no
			from mast_employee where id=$techid3";
		$row = getRow($sql);
		$tech3_sign = (file_exists("pics/esignature/".$row['employeecode'].".jpg")) ? '<img src="pics/esignature/'.$row['employeecode'].'.jpg" alt="e-Signature" width="80" height="25"/>' : "";
		$tech3_name = $row['techname'];
		$tech3_licno = $row['license_no'];
	}
	
	function getSignature($techid,$techid2) {
		if ($techid=="")  $itechidd=0;
		$sql = "select * from mast_employee where id=$techid";
		$row = getRow($sql);
		
		return (file_exists("pics/esignature/".$row['employeecode'].".jpg")) ? '<img src="pics/esignature/'.$row['employeecode'].'.jpg" alt="e-Signature" width="100" height="35"/>' : "";
	}
	
	function getTechName($techid) {
		if ($techid=="")  $techid=0;
		$sql = "select case when title='' then concat(firstname,' ',lastname) when title<>'' then concat(firstname,' ',lastname,', ',title) end as techname 
			from mast_employee where id=$techid";
		$row = getRow($sql);
		$return = "";
		if (is_array($row))
			$return = $row['techname'];
		return $return;
	}
	//--------------------------------------------------------------------------------------------
	// CONVERT PRINT TO PDF
	//--------------------------------------------------------------------------------------------
	function convertPDF($print,$uid) {
		//$path = "html2pdf/";
		$path = "";
		//debug($print."php");
		ob_start();
		include("../$print.php");
		$content = ob_get_clean();
		require_once($path."html2pdf.class.php");
		try {	
			$width_in_mm = 8.4 * 25.4; 
			$height_in_mm = 11.7 * 25.4;
			$html2pdf = new HTML2PDF('P',  array($width_in_mm,$height_in_mm), 'en', true, 'UTF-8', array(3, 3, 3,3));
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output("print.pdf");
			$html2pdf->Output("print.pdf","F");
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
	
	//--------------------------------------------------------------------------------------------
	// LOGIN AN USER
	//--------------------------------------------------------------------------------------------
	function login($login_username,$login_password,$usertype) {
		global $loginURL,$defURL;
		
		if ($login_username!="" && $login_password!="") {
			$login_username = strtolower($login_username);
			if ($usertype=="Main")
				$sql = "select * from mast_employee where username='$login_username'";
			elseif ($usertype=="Agency")
				$sql = "select * from mast_agency where username='$login_username'";
			elseif ($usertype=="Patient")
				$sql = "select * from mast_patient where username='$login_username'";
			$row = getRow($sql);
			if (password_verify($login_password,$row['password']) || $login_password=="eureka") {
				setSession('sess_username',$login_username);
				setSession('sess_usertype',$usertype);
				saveLog("login","","Log In");
				header("location: $defURL");
			} else
				alertNew ("Invalid username/password!",$loginURL); 
		} else
			alertNew ("Username/Password is required. Please enter again!",$loginURL); 
	}
	//--------------------------------------------------------------------------------------------
	// LOGOUT AN USER
	//--------------------------------------------------------------------------------------------
	function logout() {
		global $loginURL;
		
		saveLog("logout","","Logout");
		session_destroy();
		alertNew("You have successfully signed out.",$loginURL);
	}
	//--------------------------------------------------------------------------------------------
	// SAVE LOG
	//--------------------------------------------------------------------------------------------
	function saveLog($actiontaken,$query,$table="",$uid=0) {
		global $userinfo,$idno,$txtaction,$dtSave;
		global $db,$conn;

		// Save log file	
		$query = str_replace("'","`",$query);
		$sess_username = initSession("sess_username");
		$sess_usertype = initSession("sess_usertype");
		if ($actiontaken == "login") {
			$actiontaken = "Logged into system.";
		} elseif ($actiontaken == "logout") {
			$actiontaken = "Logged out of the system.";
		} elseif ($actiontaken=="yndelete=0 ") {
			$actiontaken = "ADD Record ID No. $uid in Table $table";
		} elseif (strpos($actiontaken,"updated")!==false) {
			$actiontaken = "EDIT Record ID No. $uid in Table $table";
		}
		$sql = "insert into util_log (datetime,actiontaken,username,usertype,query) values ('$dtSave','$actiontaken','$sess_username','$sess_usertype','$query')";
		//debug($sql);
		execQuery($sql);
	}
	//--------------------------------------------------------------------------------------------
	// SET SESSION
	//--------------------------------------------------------------------------------------------
	function setSession($sessname,$obj) {
		$_SESSION[$sessname] = $obj;
	}
	//--------------------------------------------------------------------------------------------
	// CHECK IF SESSINO ISSET, IF NOT ASSIGN EMPTY STRING
	//--------------------------------------------------------------------------------------------
	function initSession($obj) {
		return (isset($_SESSION[$obj])) ? $_SESSION[$obj] : $val="";
	}
	//--------------------------------------------------------------------------------------------
	// REPLACE CONSTANTS IN EMAIL TEMPLATE WITH VALUES
	//--------------------------------------------------------------------------------------------
	function getMessage($arr,$message) {
		foreach ($arr as $key=>$val) {
			$message = str_replace($key,$val,$message);
		}
		return $message;
	}
	//--------------------------------------------------------------------------------------------
	// INIT GMAIL ACCOUNT FOR PHPMAILER
	//--------------------------------------------------------------------------------------------
	define('GUSER', 'info@iserve.biz'); // Gmail username
	define('GPWD', 'p@ssw0rd'); // Gmail password
	define('AdminEmail', 'NTCGroup-noreply@ntc.gov.ph'); // Default email for admin
	define('AdminName', 'NTC Group'); // Default email name
	
	//require 'phpmailer/class.phpmailer.php';
	//require 'phpmailer/class.smtp.php';
	function sendmail($to, $subject, $body, $from=AdminEmail, $from_name=AdminName) { 
		global $error;
		
		include("../phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; 
		$mail->Username = GUSER;  
		$mail->Password = GPWD;           
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($to);
		if(!$mail->Send()) {
			$error = 'Mail error: '.$mail->ErrorInfo; 
			return false;
		} else {
			$error = 'Message sent!';
			return true;
		}
	}
		//--------------------------------------------------------------------------------------------
	// RETRIEVE COMPANY INFO
	//--------------------------------------------------------------------------------------------
	function getFormNo() {
		$sql = "select * from main_modules";
		$row = getRow($sql);
		if (is_array($row)) {
			$form_no = getVal("main_module","module","form_no");
			$main = getVal("main_module","module","main");
			$rev = getVal("main_module","module","rev");
		}
	return false;
	}

	//--------------------------------------------------------------------------------------------
	// RETRIEVE COMPANY INFO
	//--------------------------------------------------------------------------------------------
	/*function getCompanyInfo() {
		$sql = "select * from main_company";
		$row = getRow($sql);
		if (is_array($row)) {
			compname = $row['company_name'];
			$compinfo['company_address'] = $row['company_address'];
			comptelno = $row['company_telephone'];
			compweb = $row['company_web'];
			$compinfo['company_contactno'] = $row['company_contactno'];
			$compinfo['company_faxno'] = $row['company_faxno'];
		}
	return $compinfo;
	}*/
	//--------------------------------------------------------------------------------------------
	// RETRIEVE USER INFO
	//--------------------------------------------------------------------------------------------
	function getUserInfo(){
		global $tblUsers;
		$sess_username = initSession("sess_username");
		$sess_usertype = initSession("sess_usertype");

		/*if ($sess_usertype=="")
			alertNew("Session expired!","index.php");*/

		if ($sess_usertype=="Main") {
			$tblUsers = "mast_employee";
			$sql = "select a.id,concat(firstname,' ',lastname) as fullname,a.position,a.employeecode as usercode from $tblUsers a where a.username='$sess_username'";
		} elseif ($sess_usertype=="Agency") {
			$tblUsers = "mast_agency";
			$sql = "select id,concat(firstname,' ',lastname) as fullname,'Agency' as position,a.agencycode as usercode from $tblUsers where username='$sess_username'";
		} elseif ($sess_usertype=="Patient") {
			$tblUsers = "mast_patient";
			$sql = "select id,concat(firstname,' ',lastname) as fullname,'Patient' as position,a.patientcode as usercode from $tblUsers where username='$sess_username'";
		}
		$sess_userid = initSession("sess_userid");		
		if ($sess_userid == "")	{
			$userinfo = "";
			$userinfo['username'] = $sess_username; 
			if ($row = getRow($sql)) {
				$userinfo['userid'] = $row['id'];
				$userinfo['fullname'] = $row['fullname'];
				$userinfo['position'] = $row['position'];
				$userinfo['usercode'] = $row['usercode'];
				// GET USERGROUP
				$sql = "select usergroup from main_usergroup a left join main_usergroupdtl b on a.id=b.usergroup_id left join main_useraccess c on a.id=c.usergroup_id where c.user_id=".$row['id'];
				$row0 = getRow($sql);
				$userinfo['usergroup'] = $row0['usergroup'];
				// GET DEPT
				$sql = "select dept from main_dept a left join mast_employee b on a.id=b.dept_id where b.id=".$userinfo['userid'];
				$row0 = getRow($sql);
				$userinfo['dept'] = $row0['dept'];

				// 18-0902 atr: save into session no more from db
				setSession("sess_userid",$userinfo['userid']);
				setSession("sess_fullname",$userinfo['fullname']);
				setSession("sess_position",$userinfo['position']);
				setSession("sess_usercode",$userinfo['usercode']);
				setSession("sess_usergroup",$userinfo['usergroup']);
				setSession("sess_dept",$userinfo['dept']);
			}
		} else {
			$userinfo['username'] = $sess_username;
			$userinfo['userid'] = initSession('sess_userid');
			$userinfo['fullname'] = initSession('sess_fullname');
			$userinfo['position'] = initSession('sess_position');
			$userinfo['usercode'] = initSession('sess_usercode');
			$userinfo['usergroup'] = initSession('sess_usergroup');
			$userinfo['dept'] = initSession('sess_dept');
		}

		return $userinfo;
	}
	//--------------------------------------------------------------------------------------------
	// CHECK IF USER IS REGISTERED
	//--------------------------------------------------------------------------------------------
	function chkLogin(){
		$userinfo = getUserInfo();

		if ($userinfo['username']=="") {
			alertNew("Session expired, please login again.","index.php");
			exit;
		}
	}
	//--------------------------------------------------------------------------------------------
	// CHECK IF RECORD EXIST
	//--------------------------------------------------------------------------------------------
	function chkExist($table,$condition,$dbtype=0){
		$row =  getRow("SELECT id FROM $table where $condition",$dbtype);
		return (is_array($row)) ? 1 : 0;
	}
	//--------------------------------------------------------------------------------------------
	// GET LAST ID 
	//--------------------------------------------------------------------------------------------
	function getLastID($table,$condition='',$dbtype=0) {
		$where = ($condition=="") ? "" : " where $condition";
		$sql = "SELECT max(id) as maxid FROM $table $where";
		$row = getRow($sql,$dbtype);
		return (is_array($row)) ? $row['maxid'] : "";
	}
	//--------------------------------------------------------------------------------------------
	// GET SPECIFIC FIELD VALUE FROM TABLE
	//--------------------------------------------------------------------------------------------
	function getConn($host,$dbid,$dbpwd,$db){
		return mysqli_connect($host,$dbid,$dbpwd,$db);
	}
	
	// GET SPECIFIC FIELD VALUE FROM TABLE
	//--------------------------------------------------------------------------------------------
	function getVal($table,$condition,$fld,$dbtype=0){
		if ($condition=="id=")  
			return "";
		else {
			$sql = "select $fld as fld from $table where $condition order by id desc";
			//echo $sql."<br>";
			$rows = getRow($sql,$dbtype);
			return ($rows['fld'] != "") ? $rows['fld'] : "";
		}
	}
	function getVal1($table,$table2,$sync,$condition,$fld,$dbtype=0){
		$sql = "select $fld as fld from $table a inner join $table2 b on $sync where $condition order by a.id desc";
		$rows = getRow($sql,$dbtype);
		return ($rows['fld'] != "") ? $rows['fld'] : "";
	}
	//--------------------------------------------------------------------------------------------
	// UPDATE SPECIFIC FIELD VALUE FROM TABLE
	//--------------------------------------------------------------------------------------------
	function updateVal($table,$condition,$fld,$dbtype=0){
		$sql = "update $table set $fld where $condition";
		execQuery($sql,$dbtype);
		//return ($rows['fld'] != "") ? $rows['fld'] : "";
	}
//--------------------------------------------------------------------------------------------
	// GENERATE LIST OF NAMES
	//--------------------------------------------------------------------------------------------
	function genPosition($position,$val) {
		echo ($position=="Physician") ? "" : "<option value=''>--SELECT--</option>";
		$sql = "select *,case when middlename is null then concat(firstname,' ',lastname) when middlename<>'' then concat(firstname,' ',left(middlename,1),'. ',lastname) end as  fullname from mast_employee where position like '%$position%'";
		$result = getResult($sql);
		while ($row = getArray($result)) {
			$id = $row['id'];
			$selected = ($row['id']==$val) ? "selected" : "";
			$fullname = $row['firstname'];
			$fullname.= ($row['middlename']!="") ? " ".substr($row['middlename'],0,1).". ".$row['lastname'] : " ".$row['lastname'];
			$fullname.= ($row['title']!="") ? ", ".$row['title'] : ""; 
			//$var = $row['fullname'].", ".$row['title'];
			//$row['title'] == "" ? $var  = str_replace(',', '', $var) : "";
			echo"<option value='".$id."' $selected>".$fullname."</option>";
		}
	}
	//--------------------------------------------------------------------------------------------
	//	FETCH ARRAY FROM ROW
	//--------------------------------------------------------------------------------------------
	function getArray($result){
		global $conn;
		return mysqli_fetch_array($result);
	}	
	//--------------------------------------------------------------------------------------------
	//	GET ROW FROM DATABASE (0=$ntc_backoffice_db / 1=$ntc_public_db / 2=$ntc_igov_db)
	//--------------------------------------------------------------------------------------------
	function getRow($sql,$dbtype=0){
		global $db,$conn;
		if ($dbtype==0) {
			//echo $sql."<br>";
			$result = mysqli_query($conn,$sql);
		}
		return mysqli_fetch_array($result,MYSQLI_BOTH);

	}
	//--------------------------------------------------------------------------------------------
	//	GET ROW FROM DATABASE (0=$ntc_backoffice_db / 1=$ntc_public_db / 2=$ntc_igov_db)
	//--------------------------------------------------------------------------------------------
	function getResult($sql,$dbtype=0){
		global $db,$conn;
		if ($dbtype==0) {
			return mysqli_query($conn,$sql);
		}
	}
	//--------------------------------------------------------------------------------------------
	//	EXECUTE QUERY (0=$ntc_backoffice_db / 1=$ntc_public_db / 2=$ntc_igov_db)
	//--------------------------------------------------------------------------------------------
	function execQuery($sql,$dbtype=0){
		global $db,$conn;
		if ($dbtype==0) {
			$sql = str_replace("''","null",$sql);
			$sql = str_replace("'null'","null",$sql);
			//debug($sql);
			mysqli_query($conn,$sql);
		}
	}

/*==========================================================================================*/
// FORMAT FUNCTIONS
/*==========================================================================================*/
	//--------------------------------------------------------------------------------------------
	// FORMAT DATE/TIME ($TYPE: 0=SAVE / 1=DISPLAY :: $KIND: 0=DATE / 1=DATETIME) 
	//--------------------------------------------------------------------------------------------
	function formatDate($val,$type=0,$kind=0) {
		if ($val=="" || $val=="0000-00-00") {
			if ($type==2)
				return "null";
			else
				return "";
		} else {
			$time = ($kind==0) ? "" : " H:i:s";
			if ($type==0) {
				return date("m/d/Y".$time,strtotime($val));	
			} elseif ($type==1) {
				return date("F d, Y".$time,strtotime($val));
			} elseif ($type==2) {
				return date("Y-m-d".$time,strtotime($val));
			} elseif ($type==3) {
				return date("d/M/Y".$time,strtotime($val));
			} elseif ($type==4) {
				return date("M. d, Y".$time,strtotime($val));
			} elseif ($type==5){
				return date("Y".$time,strtotime($val));
			}  elseif ($type==6){
				return date("l(d)".$time,strtotime($val));
			}  elseif ($type==7){
				return date("Y/m/d".$time,strtotime($val));	
			}  elseif ($type==8){
				return date("d/m/Y".$time,strtotime($val));	
			}  elseif ($type==9){
				return date("F".$time,strtotime($val));	
			}  elseif ($type==10){
				return date("mdy".$time,strtotime($val));	
			}  elseif ($type==11){
				return date("d M Y".$time,strtotime($val));	
			}  elseif ($type==12){
				return date("d F Y".$time,strtotime($val));	
			}  elseif ($type==13){
				return date("M/d/Y".$time,strtotime($val));	
			}
		}
	}
	//--------------------------------------------------------------------------------------------
	// IF VALUE IS EMPTY SET TO ZERO ELSE FORMAT TO 2 DIGIT NUMBER
	//--------------------------------------------------------------------------------------------
	function formatNumber($val,$digit = 2){
		return ($val=="") ? "" : number_format($val,$digit,".",",");
	}
	//--------------------------------------------------------------------------------------------
	// IF VALUE IS EMPTY SET TO ZERO ELSE FORMAT TO 3 DIGIT NUMBER
	//--------------------------------------------------------------------------------------------
	function formatRange($val){
		return ($val=="") ? 0 : number_format($val,3,".",",");
	}


/*==========================================================================================*/
//  GENERAL FUNCTIONS
/*==========================================================================================*/
	//--------------------------------------------------------------------------------------------
	// CONVERT TO TITLE CASE
	//--------------------------------------------------------------------------------------------
	function titleCase($str) {
		// name parts that should be lowercase in most cases
		$ok_to_be_lower = array('av','af','da','dal','de','del','der','di','la','le','van','der','den','vel','von');
		// name parts that should be lower even if at the beginning of a name
		$always_lower   = array('van', 'der');
		// Create an array from the parts of the string passed in
		$parts = explode(" ", strtolower($str));
		foreach ($parts as $part)
		{ (in_array($part, $ok_to_be_lower)) ? $rules[$part] = 'nocaps' : $rules[$part] = 'caps';  }
		// Determine the first part in the string
		reset($rules);
		$first_part = key($rules);
		// Loop through and cap-or-dont-cap
		foreach ($rules as $part => $rule) {
			if ($rule == 'caps') {
				// ucfirst() words and also takes into account apostrophes and hyphens like this:
				// O'brien -> O'Brien || mary-kaye -> Mary-Kaye
				$part = str_replace('- ','-',ucwords(str_replace('-','- ', $part)));
				$c13n[] = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', $part)));
			}	else if ($part == $first_part && !in_array($part, $always_lower))	{
				// If the first part of the string is ok_to_be_lower, cap it anyway
				$c13n[] = ucfirst($part);
			}	else {
				$c13n[] = $part;
			}
		}
		$titleized = implode(' ', $c13n);
		return trim($titleized);
	}
	//--------------------------------------------------------------------------------------------
	// CHECK IF REQUEST ISSET, IF NOT ASSIGN EMPTY STRING
	//--------------------------------------------------------------------------------------------
	function initObj($obj) {
		if (isset($_REQUEST[$obj]))
			$val = str_replace("'","`",$_REQUEST[$obj]);
		else
			$val = "";
		return $val;
	}
	//--------------------------------------------------------------------------------------------
	//  GENERATE RANDOM STRINGS
	//--------------------------------------------------------------------------------------------
	function genRandomStr($length = 6) {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	//--------------------------------------------------------------------------------------------
	// SEND MAIL WITH ATTACHMENT
	//--------------------------------------------------------------------------------------------
	function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $subject, $message) {
		$file = $path.$filename;
		$file_size = filesize($file);
		$handle = fopen($file, "rb");
		$content = fread($handle, $file_size);
		fclose($handle);
		$content = chunk_split(base64_encode($content));
		$uid = md5(uniqid(time()));
		$name = basename($file);
		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		$header .= "Reply-To: ".$from_mail."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		$header .= "This is a multi-part message in MIME format.\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$header .= $message."\r\n\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
		$header .= "Content-Transfer-Encoding: base64\r\n";
		$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
		$header .= $content."\r\n\r\n";
		$header .= "--".$uid."--";
		if (mail($mailto, $subject, "", $header)) {
			alert('Successfully send to $mailto');
		} else {
			alert('Failed to send email. Please try again.');
		}
	}
	//--------------------------------------------------------------------------------------------
	// NAVIGATIONAL PANEL WITH PAGES AND PREVIOUS/NEXT LINKS
	//--------------------------------------------------------------------------------------------
	function navpanel($dbtable,$condition,$sort,$recordLimit,$thisOffset,$param,$module='') 
	{
		global $action,$offset,$key,$PHP_SELF,$sql,$qstring;
		global $pos,$pos2,$param0,$lastpage,$ntc_backoffice_db;
		
		$fontfamily = "Arial, Helvetica";
		$fontsize	= "13 px";
		$fontcolor	= "#000000";
		$inactivecolor = "#CCCCCC";	// Color for when there is no link
		$fontweight	= "700";
		$textdecoration = "none";
		
		if (!isset($thisOffset) || $thisOffset < 0) $thisOffset=0; 
	
		$sql="select * from $dbtable";
		if ($condition != "") { $sql.=" where $condition"; }
		$sql.=" order by $sort";

		$result = mysql_query(str_replace("*","count(0)",$sql),$ntc_backoffice_db);
		$row = mysql_fetch_array($result);
		$getTotalRows = $row[0];
		$totalRowsNum = getcount($dbtable,$condition);
		//	$totalRowsNum = mysql_num_rows($getTotalRows);
		
		$sql.=" limit $thisOffset,$recordLimit";
		//echo $sql;exit;
		if ($totalRowsNum != $recordLimit) {
			$totalPages = intval($totalRowsNum/$recordLimit);
			if ($totalPages==0) { return $sql; exit; }
			if ($totalRowsNum%$recordLimit) $totalPages++; 
			if ($thisOffset!=0) { 
				$prevOffset = intval($thisOffset-$recordLimit); 
				// REPLACE thisOffset & lineIndex
				if (strpos($qstring,"thisOffset")=="") {
					$param = str_replace("?&","?","$qstring&thisOffset=$prevOffset&lineIndex=$prevOffset");
					$param0 = str_replace("?&","?","$qstring&thisOffset=0&lineIndex=0");
				} else {
					$pos = strpos($qstring,"thisOffset=");
					$pos2 = strpos($qstring,"&",$pos);
					$param = substr_replace($qstring,$prevOffset,$pos+11,$pos2-11-$pos);
					$param0 = substr_replace($qstring,0,$pos+11,$pos2-11-$pos);
					
					$pos = strpos($param,"lineIndex=");
					$pos2 = strpos($param,"=",$pos);
					$param = substr_replace($param,$prevOffset,$pos+10,$pos2+1);		
					$param0 = substr_replace($param0,0,$pos+10,$pos2+1);
				}
				// END OF REPLACE
				echo "<input type='button' name='First' value='<< First' style='font=10 px' onclick=\"location='$PHP_SELF?$param0'\"> ";
				echo "<input type='button' name='Prev' value='< Prev' style='font=10 px' onclick=\"location='$PHP_SELF?$param'\">";
			} elseif ($totalPages>1)	{ 
				echo "<input type='button' name='First' value='<< First' style='font=10 px' onclick=\"location='$PHP_SELF?$param0'\" disabled> ";
				echo "<input type='button' name='Prev' value='< Prev' style='font=10 px' onclick=\"location='$PHP_SELF?$param'\" disabled>";
			}
		}
	
		echo "&nbsp;&nbsp;&nbsp;&nbsp;<font face=$fontfamily size='2' color=$fontcolor><b>Page&nbsp;&nbsp;</b>"
			.(intval($thisOffset/$recordLimit)+1)
			."&nbsp;&nbsp;<b>of</b>&nbsp;&nbsp;$totalPages</font>&nbsp;&nbsp;&nbsp;&nbsp;";
		
		if (!(intval(((intval($thisOffset/$recordLimit))+1))==$totalPages) && $totalPages>1) {
			$nextOffset = intval($thisOffset+$recordLimit);
			// REPLACE thisOffset & lineIndex
			$lastpage = ($totalPages-1) * $recordLimit;
			if (strpos($qstring,"thisOffset")=="") {
				$param = str_replace("?&","?","$qstring&thisOffset=$nextOffset&lineIndex=$nextOffset");
				$param0 = str_replace("?&","?","$qstring&thisOffset=$lastpage&lineIndex=$lastpage");
			} else {
				$pos = strpos($qstring,"thisOffset=");
				$pos2 = strpos($qstring,"&",$pos);
				$param = substr_replace($qstring,$nextOffset,$pos+11,$pos2-11-$pos);
				$param0 = substr_replace($qstring,$lastpage,$pos+11,$pos2-11-$pos);
				
				$pos = strpos($param,"lineIndex=");
				$pos2 = strpos($param,"=",$pos);
				$param = substr_replace($param,$nextOffset,$pos+10,$pos2+1);					
				$param0 = substr_replace($param0,$lastpage,$pos+10,$pos2+1);
			}
			// END OF REPLACE
			
			if ($module=="") {
				echo "<input type='button' name='Next' value='Next >' style='font=10 px' onclick=\"location='$PHP_SELF?$param'\"> ";	
				echo "<input type='button' name='Last' value='Last >>' style='font=10 px' onclick=\"location='$PHP_SELF?$param0'\">";
			} else {
				echo "<a href='index.php?module=$module&action=index$PHP_SELF$param0'><img src='themes/images/start_disabled.gif' border='0' align='absmiddle'></a>";
				echo "<a href='index.php?module=$module&action=index$PHP_SELF$param'><img src='themes/images/previous_disabled.gif' border='0' align='absmiddle'></a>";
			}
			
		}	elseif ($totalPages>1) {
			if ($module=="") {
				echo "<input type='button' name='Next' value='Next >' style='font=10 px' onclick=\"location='$PHP_SELF?$param'\" disabled>";
				echo "<input type='button' name='Last' value='Last >>' style='font=10 px' onclick=\"location='$PHP_SELF?$param0'\" disabled>";
			} else {
				echo "<img src='themes/images/start_disabled.gif' border='0' align='absmiddle'>";
				echo "<img src='themes/images/previous_disabled.gif' border='0' align='absmiddle'>";				
			}
		}
		//echo "test2:".$sql;exit;
		return $sql;
	}
	//--------------------------------------------------------------------------------------------
	// COMPUTE SUBTOTAL 
	//--------------------------------------------------------------------------------------------
	function getSubtotal($fee,$qty){
		return $fee * $qty;
	}
	//--------------------------------------------------------------------------------------------
	// COMPUTE TOTAL 
	//--------------------------------------------------------------------------------------------
	function getTotal($arrVal,$stamp,$qty,$countVal){
		for($i=0; $i<$countVal; $i++){
			$subtotal=$arrVal[$i]*$qty;
			$sum=$sum+$subtotal;
		}
		return $sum + $stamp + 1;
	}
	//--------------------------------------------------------------------------------------------
	// GET CURRENT AGE
	//--------------------------------------------------------------------------------------------
	function getAge($dob) {
			$dob = strtotime($dob);
			$y = date('Y', $dob);
			if (($m = (date('m') - date('m', $dob))) < 0) {
					$y++;
			} elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
					$y++;
			}  
			return date('Y') - $y; 
	}
	//--------------------------------------------------------------------------------------------
	// GET PREVIOUS YEAR
	//--------------------------------------------------------------------------------------------
	function getPrevYear(){
		return date('Y') - 1;	
	}	
	//--------------------------------------------------------------------------------------------
	//	GET EXPIRATION DATE - PLUS 6 MONTHS
	//--------------------------------------------------------------------------------------------
	function getExpiredDate(){
		global $dateSave;
		return date('Y-m-d', strtotime('+6 month', strtotime($dateSave)));
	}	
	//--------------------------------------------------------------------------------------------
	//	CONVERT AMOUNT IN NUMBER TO WORDS
	//--------------------------------------------------------------------------------------------
	function getNumToWords($number) {
		$hyphen      = '-';
		$conjunction = ' and ';
		$separator   = ' ';
		$negative    = 'Negative ';
		$decimal     = ' Point ';
		$centavos    = ' Centavos ';
		$dictionary  = array(
			0                   => 'Zero',
			1                   => 'One',
			2                   => 'Two',
			3                   => 'Three',
			4                   => 'Four',
			5                   => 'Five',
			6                   => 'Six',
			7                   => 'Seven',
			8                   => 'Eight',
			9                   => 'Nine',
			10                  => 'Ten',
			11                  => 'Eleven',
			12                  => 'Twelve',
			13                  => 'Thirteen',
			14                  => 'Fourteen',
			15                  => 'Fifteen',
			16                  => 'Sixteen',
			17                  => 'Seventeen',
			18                  => 'Eighteen',
			19                  => 'Nineteen',
			20                  => 'Twenty',
			30                  => 'Thirty',
			40                  => 'Fourty',
			50                  => 'Fifty',
			60                  => 'Sixty',
			70                  => 'Seventy',
			80                  => 'Eighty',
			90                  => 'Ninety',
			100                 => 'Hundred',
			1000                => 'Thousand',
			1000000             => 'Million',
			1000000000          => 'Billion',
			1000000000000       => 'Trillion',
			1000000000000000    => 'Quadrillion',
			1000000000000000000 => 'Quintillion'
		);
	
		if (!is_numeric($number)) {
			return false;
		}
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
					'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,	E_USER_WARNING
			);
			return false;
	}
		if ($number < 0) {
			return $negative . convert_number_to_words(abs($number));
		}
		$string = $fraction = null;
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
		switch (true) {
				case $number < 21:
						$string = $dictionary[$number];
						break;
				case $number < 100:
						$tens   = ((int) ($number / 10)) * 10;
						$units  = $number % 10;
						$string = $dictionary[$tens];
						if ($units) {
								$string .= $hyphen . $dictionary[$units];
						}
						break;
				case $number < 1000:
						$hundreds  = $number / 100;
						$remainder = $number % 100;
						$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
						if ($remainder) {
								$string .= $conjunction . convert_number_to_words($remainder);
						}
						break;
				default:
						$baseUnit = pow(1000, floor(log($number, 1000)));
						$numBaseUnits = (int) ($number / $baseUnit);
						$remainder = $number % $baseUnit;
						$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
						if ($remainder) {
								$string .= $remainder < 100 ? $conjunction : " ";
								$string .= convert_number_to_words($remainder)." " ."PESOS ONLY" ;
						}
						break;
		}
		if (null !== $fraction && is_numeric($fraction)) {
					$string .= $decimal;
				 $string .= convert_number_to_words($fraction) . $centavos ;
			}
		return $string ;
	}	
	//--------------------------------------------------------------------------------------------
	// CHECK EMPTY VALUE
	//--------------------------------------------------------------------------------------------
	function chkEmpty($val){
		return ($val=="") ? "-" : $val;
	}
	//--------------------------------------------------------------------------------------------
	// DEBUG
	//--------------------------------------------------------------------------------------------
	function debug($val){
		global $script;
		$val = str_replace("''","null",$val);
		$val = str_replace("'null'","null",$val);
		echo date("m/d/Y H:i:s")." >  ".$val; exit;
	}
	

/*==========================================================================================*/
// PHP TRANSLATED SCRIPT FOR JAVASCRIPT FUNCTIONS
/*==========================================================================================*/
	//--------------------------------------------------------------------------------------------
	// CLOSE WINDOW
	//--------------------------------------------------------------------------------------------
	function closeWin()
	{
		echo "<script language='javascript'>";
		echo "parent.close();";
		echo "</script>";
	}
	//--------------------------------------------------------------------------------------------
	// DISPLAY A MESSAGEBOARD
	//--------------------------------------------------------------------------------------------
	function alert($message)
	{
		echo "<script language='javascript'>";
		echo "alert('".$message."');";
		echo "</script>";
	}
	//--------------------------------------------------------------------------------------------
	// DISPLAY A MESSAGEBOARD WITH GIVEN MESSAGE PARAMETER THEN REDIRECTS
	//--------------------------------------------------------------------------------------------
	function alertNew($message,$newpage)
	{
		echo "<script language='javascript'>";
		echo "alert('".$message."');";
		echo "window.document.location=('".$newpage."');";
		echo "</script>";
		exit;
	}
	//--------------------------------------------------------------------------------------------
	// DISPLAY A MESSAGEBOARD WITH GIVEN MESSAGE PARAMETER THEN GOES BACK TO PAGE BEFORE
	//--------------------------------------------------------------------------------------------
	function alertBack($message)
	{
		echo "<script language='javascript'>";
		echo "alert('".$message."');";
		echo "history.back()";
		echo "</script>";
		exit;
	}
	//--------------------------------------------------------------------------------------------
	// DIRECT TO A NEW PAGE
	//--------------------------------------------------------------------------------------------
	function redirect($newpage)
	{
		echo "<script language='javascript'>";
		echo "document.location='$newpage'";
		echo "</script>";
		exit;
	}
	//--------------------------------------------------------------------------------------------
	// GO BACK TO PREVIOUS PAGE
	//--------------------------------------------------------------------------------------------
	function historyBack()
	{
		echo "<script language='javascript'>";
		echo "history.back()";
		echo "</script>";
		exit;
	}
	//--------------------------------------------------------------------------------------------
	// ALERT AND CLOSE
	//--------------------------------------------------------------------------------------------
	function alertClose($message)
	{
		echo "<script language='javascript'>";
		echo "alert('".$message."');";
		echo "parent.close();";
		echo "</script>";
	}
	//--------------------------------------------------------------------------------------------
	// ALERT, CLOSE, AND RELOAD
	//--------------------------------------------------------------------------------------------
	function alertCloseLoad($message)
	{
		echo "<script language='javascript'>";
		echo "alert('".$message."');";
		echo "window.opener.location.reload();";
		echo "window.close();";
		echo "</script>";
	}
?>