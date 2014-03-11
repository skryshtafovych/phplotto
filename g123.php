<?php 
  //usage:  http://127.0.0.1:8585/api/luckyretailers.php?
	//        http://127.0.0.1:8585/api/luckyretailers.php?testcase=1 
	
  $fileIO = 'canwrite/config.txt';
	$configContent = file_get_contents($fileIO, FILE_USE_INCLUDE_PATH);
	list($testcase, $wait, $extra) = preg_split("/;/", $configContent);
	
  $fileAry = array("./jsonDrawGames_case1.txt" , "./jsonDrawGames_case2.txt" ,
	                 "./jsonDrawGames_case3.txt" , "./jsonDrawGames_case4.txt" ,
	                 "./jsonDrawGames_case5.txt" , "./jsonDrawGames_case6.txt" ,
									 "./jsonDrawGames_case7.txt" , "./jsonDrawGames_case8.txt" ,
	                 "./jsonDrawGames_case9.txt" , "./jsonDrawGames_case10.txt" 
	                 
									);


		
	if(isset($_REQUEST["testcase"])) {
	    $testcase = $_REQUEST["testcase"];
	  	if($testcase > 10 || $testcase < 1) { 
				$testcase = 1; 
			}
			
			//echo " user request set testcaseid = $testcase ;";
	}

	
	
	if(isset($_REQUEST["wait"])) {
	    $wait = $_REQUEST["wait"];
	  	if($wait > 180 || $wait < 1) { 
				$wait = 0; 
			}	
			
	}

	if($wait > 0) {	sleep($wait); }
	
	//echo " before calling get contents testcase = $testcase ;";
	
	$file = file_get_contents($fileAry[$testcase-1], FILE_USE_INCLUDE_PATH);
	echo $file;

	$configContent = $testcase.';'.$wait . ';9999999';
	file_put_contents($fileIO, $configContent, FILE_USE_INCLUDE_PATH | LOCK_EX );
	

?>

