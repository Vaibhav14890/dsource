

<?php
/*
include 'connect.php';
$data1=$_POST['data'];
$result=mysql_query("SELECT title FROM node where (type='courses' or type='gallery_img') and title LIKE '%$data1%' LIMIT 10");
$data=array();
while($response=mysql_fetch_array($result)){
    array_push($data,$response['title']);
}
//for author
$result1=mysql_query("SELECT field_prof_name_title as 'prof' FROM field_data_field_prof_name where field_prof_name_title LIKE '%$data1%' UNION SELECT field_name_title as 'prof' FROM field_data_field_name where field_name_title LIKE '%$data1%' LIMIT 10");
while($response1=mysql_fetch_array($result1)){
    array_push($data,$response1['prof']);
}
// For sub-title
$result2=mysql_query("SELECT field_intro_names2_value as 'subtitle' FROM field_data_field_intro_names2 where field_intro_names2_value LIKE '%$data1%' UNION SELECT field_sub_title_value as 'subtitle' FROM field_data_field_sub_title where bundle='gallery_img' AND field_sub_title_value LIKE '%$data1%' LIMIT 10");
while($response2=mysql_fetch_array($result2)){
    array_push($data,$response2['subtitle']);
}
echo json_encode($data);
?>


