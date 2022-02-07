<?php
// This script and data application were generated by AppGini 5.70
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/feescollection.php");
	include("$currDir/feescollection_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('feescollection');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "feescollection";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`feescollection`.`id`" => "id",
		"IF(    CHAR_LENGTH(`students1`.`FullName`) || CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`FullName`, ' :RegNo: ', `students1`.`RegNo`), '') /* Student */" => "Student",
		"IF(    CHAR_LENGTH(`classes1`.`Name`) || CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `classes1`.`Name`, ' :Stream ', `streams1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`) || CHAR_LENGTH(`sessions1`.`Term`), CONCAT_WS('',   `sessions1`.`Year`, ' :Term ', `sessions1`.`Term`), '') /* Session */" => "Session",
		"`feescollection`.`PaidAmount`" => "PaidAmount",
		"IF(    CHAR_LENGTH(`students1`.`Balance`), CONCAT_WS('',   `students1`.`Balance`), '') /* Balance (Ksh) */" => "Balance",
		"IF(    CHAR_LENGTH(`branch1`.`Name`) || CHAR_LENGTH(`branch1`.`AccountNumber`), CONCAT_WS('',   `branch1`.`Name`, ' :Acc.No:  ', `branch1`.`AccountNumber`), '') /* Branch */" => "Branch",
		"if(`feescollection`.`Date`,date_format(`feescollection`.`Date`,'%m/%d/%Y'),'')" => "Date",
		"`feescollection`.`Remarks`" => "Remarks"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`feescollection`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => '`feescollection`.`PaidAmount`',
		6 => '`students1`.`Balance`',
		7 => 7,
		8 => '`feescollection`.`Date`',
		9 => 9
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`feescollection`.`id`" => "id",
		"IF(    CHAR_LENGTH(`students1`.`FullName`) || CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`FullName`, ' :RegNo: ', `students1`.`RegNo`), '') /* Student */" => "Student",
		"IF(    CHAR_LENGTH(`classes1`.`Name`) || CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `classes1`.`Name`, ' :Stream ', `streams1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`) || CHAR_LENGTH(`sessions1`.`Term`), CONCAT_WS('',   `sessions1`.`Year`, ' :Term ', `sessions1`.`Term`), '') /* Session */" => "Session",
		"`feescollection`.`PaidAmount`" => "PaidAmount",
		"IF(    CHAR_LENGTH(`students1`.`Balance`), CONCAT_WS('',   `students1`.`Balance`), '') /* Balance (Ksh) */" => "Balance",
		"IF(    CHAR_LENGTH(`branch1`.`Name`) || CHAR_LENGTH(`branch1`.`AccountNumber`), CONCAT_WS('',   `branch1`.`Name`, ' :Acc.No:  ', `branch1`.`AccountNumber`), '') /* Branch */" => "Branch",
		"if(`feescollection`.`Date`,date_format(`feescollection`.`Date`,'%m/%d/%Y'),'')" => "Date",
		"`feescollection`.`Remarks`" => "Remarks"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`feescollection`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`students1`.`FullName`) || CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`FullName`, ' :RegNo: ', `students1`.`RegNo`), '') /* Student */" => "Student",
		"IF(    CHAR_LENGTH(`classes1`.`Name`) || CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `classes1`.`Name`, ' :Stream ', `streams1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`) || CHAR_LENGTH(`sessions1`.`Term`), CONCAT_WS('',   `sessions1`.`Year`, ' :Term ', `sessions1`.`Term`), '') /* Session */" => "Session",
		"`feescollection`.`PaidAmount`" => "PaidAmount (Ksh)",
		"IF(    CHAR_LENGTH(`students1`.`Balance`), CONCAT_WS('',   `students1`.`Balance`), '') /* Balance (Ksh) */" => "Balance (Ksh)",
		"IF(    CHAR_LENGTH(`branch1`.`Name`) || CHAR_LENGTH(`branch1`.`AccountNumber`), CONCAT_WS('',   `branch1`.`Name`, ' :Acc.No:  ', `branch1`.`AccountNumber`), '') /* Branch */" => "Branch",
		"`feescollection`.`Date`" => "Date",
		"`feescollection`.`Remarks`" => "Remarks"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`feescollection`.`id`" => "id",
		"IF(    CHAR_LENGTH(`students1`.`FullName`) || CHAR_LENGTH(`students1`.`RegNo`), CONCAT_WS('',   `students1`.`FullName`, ' :RegNo: ', `students1`.`RegNo`), '') /* Student */" => "Student",
		"IF(    CHAR_LENGTH(`classes1`.`Name`) || CHAR_LENGTH(`streams1`.`Name`), CONCAT_WS('',   `classes1`.`Name`, ' :Stream ', `streams1`.`Name`), '') /* Class */" => "Class",
		"IF(    CHAR_LENGTH(`sessions1`.`Year`) || CHAR_LENGTH(`sessions1`.`Term`), CONCAT_WS('',   `sessions1`.`Year`, ' :Term ', `sessions1`.`Term`), '') /* Session */" => "Session",
		"`feescollection`.`PaidAmount`" => "PaidAmount",
		"IF(    CHAR_LENGTH(`students1`.`Balance`), CONCAT_WS('',   `students1`.`Balance`), '') /* Balance (Ksh) */" => "Balance",
		"IF(    CHAR_LENGTH(`branch1`.`Name`) || CHAR_LENGTH(`branch1`.`AccountNumber`), CONCAT_WS('',   `branch1`.`Name`, ' :Acc.No:  ', `branch1`.`AccountNumber`), '') /* Branch */" => "Branch",
		"if(`feescollection`.`Date`,date_format(`feescollection`.`Date`,'%m/%d/%Y'),'')" => "Date",
		"`feescollection`.`Remarks`" => "Remarks"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'Student' => 'Student', 'Session' => 'Session', 'Branch' => 'Branch');

	$x->QueryFrom = "`feescollection` LEFT JOIN `students` as students1 ON `students1`.`id`=`feescollection`.`Student` LEFT JOIN `sessions` as sessions1 ON `sessions1`.`id`=`feescollection`.`Session` LEFT JOIN `branch` as branch1 ON `branch1`.`id`=`feescollection`.`Branch` LEFT JOIN `classes` as classes1 ON `classes1`.`id`=`students1`.`Class` LEFT JOIN `streams` as streams1 ON `streams1`.`id`=`students1`.`Stream` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "feescollection_view.php";
	$x->RedirectAfterInsert = "feescollection_view.php?SelectedID=#ID#";
	$x->TableTitle = "FeesCollection";
	$x->TableIcon = "resources/table_icons/account_balances.png";
	$x->PrimaryKey = "`feescollection`.`id`";
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Student", "Class", "Session", "PaidAmount (Ksh)", "Balance (Ksh)", "Branch", "Date", "Remarks");
	$x->ColFieldName = array('Student', 'Class', 'Session', 'PaidAmount', 'Balance', 'Branch', 'Date', 'Remarks');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7, 8, 9);

	// template paths below are based on the app main directory
	$x->Template = 'templates/feescollection_templateTV.html';
	$x->SelectedTemplate = 'templates/feescollection_templateTVS.html';
	$x->TemplateDV = 'templates/feescollection_templateDV.html';
	$x->TemplateDVP = 'templates/feescollection_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `feescollection`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='feescollection' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `feescollection`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='feescollection' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`feescollection`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: feescollection_init
	$render=TRUE;
	if(function_exists('feescollection_init')){
		$args=array();
		$render=feescollection_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: feescollection_header
	$headerCode='';
	if(function_exists('feescollection_header')){
		$args=array();
		$headerCode=feescollection_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: feescollection_footer
	$footerCode='';
	if(function_exists('feescollection_footer')){
		$args=array();
		$footerCode=feescollection_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>