<?php 
    // custom php code

function getConn($host,$dbid,$dbpwd,$db){
    return mysqli_connect($host,$dbid,$dbpwd,$db);
    }
    
    function getResult($sql,$dbtype=0){
    if ($dbtype==0) {
    $host = env('DB_HOST');;
    $db = env('DB_DATABASE');
    $dbid = env('DB_USERNAME');
    $dbpwd = "";
    $conn = mysqli_connect($host,$dbid,$dbpwd,$db);
    return mysqli_query($conn,$sql);
    }
    }
    
    function getArray($result){
    global $conn;
    return mysqli_fetch_array($result);
    }
    
    function initOptionTbl($table,$optval,$optlabel,$val,$withselect=1) {
    if ($withselect==1) echo "<option value=''>--SELECT--</option>";
    $result0 = getResult("select * from $table");
    while ($row0 = getArray($result0)) {
    $selected = ($row0[$optval]==$val) ? "selected" : "";
    echo "<option value='".$row0[$optval]."' $selected>".$row0[$optlabel]."</option>";
    }
    
    function genPosition($position,$val) {
    echo ($position=="Physician") ? "" : "<option value=''>--SELECT--</option>";
    $sql = "select *,case when middlename is null then concat(firstname,' ',lastname) when middlename<>'' then
        concat(firstname,' ',left(middlename,1),'. ',lastname) end as fullname from mast_employee where position like
        '%$position%'";
        $result = getResult($sql);
        while ($row = getArray($result)) {
        $id = $row['id'];
        $selected = ($row['id']==$val) ? "selected" : "";
        $fullname = $row['firstname'];
        $fullname.= ($row['middlename']!="") ? " ".substr($row['middlename'],0,1).". ".$row['lastname'] : "
        ".$row['lastname'];
        $fullname.= ($row['title']!="") ? ", ".$row['title'] : "";
        //$var = $row['fullname'].", ".$row['title'];
        //$row['title'] == "" ? $var = str_replace(',', '', $var) : "";
        echo"<option value='".$id."' $selected>".$fullname."</option>";
        }
        }
    
        }
?>