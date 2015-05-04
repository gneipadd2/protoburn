<?php  
header("Content-type:application/json; charset=UTF-8");            
header("Cache-Control: no-store, no-cache, must-revalidate");           
header("Cache-Control: post-check=0, pre-check=0", false);      
//include("db_connect.php"); // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล  
//$mysqli = connect(); // เชื่อมต่อกับฐานข้อมูล      

$servername = "127.0.0.1";
$username = "root";
$password = "123456";

// Create connection
$mysqli = mysql_connect($servername, $username, $password);

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysql_error());
} 
$db_selected = mysql_select_db('events',$mysqli);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
    }
if($_GET['gData']){    
    $q="SELECT * FROM tbl_event WHERE date(event_start)>='".$_GET['start']."'  ";    
    $q.=" AND date(event_end)<='".$_GET['end']."' ORDER by event_id";      
   $result = mysql_query($q,$mysqli);
   
//ดึงข้อมูลอีเวนต์จากฐานข้อมูล
  /*  while($rs=mysql_fetch_array($result,MYSQL_ASSOC)){  
        $json_data[]=array(   
            "id"=>$rs["event_id"], 
            "title"=>$rs["event_title"],  
          "start"=>$rs["event_start"],  
            "end"=>$rs["event_end"],  
            "url"=>$rs["event_url"],  
            "allDay"=>($rs["event_allDay"]==true)?true:false        
            // กำหนด event object property อื่นๆ ที่ต้องการ  
        );  
    }  */  
//ทดลองแบบใส่ตรงไม่ต้องดึงจากฐานข้อมูล
$json_data[]=array(   
            "id"=>1, //รหัสอีเวนต์
            "title"=>อีเวนต์ตรง,  //ชื่ออีเวนต์
          "start"=>"2015-05-02T08:35:12",  //วันเริ่ม
            "end"=>"2015-05-09T18:22:54",  //วันสิ้นสุด
            "url"=>"event.html",  //ลิงค์เมื่อกดบนปฏิทินแล้วต้องการให้redirect
            "allDay"=>($rs["event_allDay"]==true)?true:false    //อีเวนต์เป็นแบบเต็มวัน    
            // กำหนด event object property อื่นๆ ที่ต้องการ  
        );     
 
}  
//ส่งกลับอีเวนต์ที่เรียกได้จากฐานข้อมูลให้กับไฟล์ calendar.html
$json= json_encode($json_data);    
if(isset($_GET['callback']) && $_GET['callback']!=""){    
echo $_GET['callback']."(".$json.");";        
}else{    
echo $json;    
}   
 
?>
