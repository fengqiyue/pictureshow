<?php 
function redirect_to($dest="/"){
      header("HTTP/1.1 301 Moved Permanently");
      header("Location:$dest");
}

if ((($_FILES["file"]["type"] == "image/gif") 
|| ($_FILES["file"]["type"] == "image/jpeg") 
|| ($_FILES["file"]["type"] == "image/jpg") 
|| ($_FILES["file"]["type"] == "image/png") 
|| ($_FILES["file"]["type"] == "image/pjpeg")) 
) 
{ 
      if ($_FILES["file"]["error"] > 0) 
      { 
            echo "夭寿啦,出现错误啦: " . $_FILES["file"]["error"] . "<br />"; 
      } 
      else 
      { 
             $name = $_FILES['file']['name'];
             $path = "upload/".$name;  //the img Route
             $imgupdate = date("Y-m-d H:i:s");

             $dir ='upload';  //存放图片的文件夹路径
             $pictureNum = count(scandir($dir)) -1 ;   //当前文件夹下的照片数
             
             $new_name_url = "upload/".$pictureNum.".JPG" ;
             move_uploaded_file($_FILES['file']['tmp_name'], $new_name_url);
             echo $pictureNum;

            //------------------------------ 连接数据库---------------------------
            //$con = mysql_connect("php502","root","tiger");
            $con = mysql_connect("localhost","root","123456");
            if (!$con)
            {
                   die('Could not connect: ' . mysql_error());
            }

            mysql_select_db("plat", $con);

            mysql_query("INSERT INTO img (image_name, image_src, image_time) VALUES ('$name', '$new_name_url','$imgupdate')");

            mysql_close($con);

            redirect_to('index.php');
           
      } 
} 

else 
{ 
      echo "文件类型错误"; 
} 

?>