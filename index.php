<!DOCTYPE html>
<html>
<head>
              <title>照片墙</title>
              <meta charset = "utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1" />
              <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
              <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
              <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>

<body>
        <!--______________________________________main page__________________________________-->
        <div data-role="page" id="pageone"  data-dom-cache="true">
              <div data-role="header" >
                            <h1>校园祭</h1>
                            <a href="#upload" data-rolr = button data-icon="star" class="ui-btn-right"  data-transition="slide" >上传图片</a>
               
                                 <ul data-role="listview" >
                                                <li data-role="list-divider">照片墙
                                                 <?php
                                                       $con = mysql_connect("localhost","root","123456");

                                                        mysql_select_db("plat", $con);

                                                       $query = "select image_src from image order by image_time desc" ;  
                                                       $result = mysql_query($query, $con);
                                                       $num = mysql_num_rows($result);  
                                                       echo '<span class="ui-li-count">'.$num.'</span>';  
                                                 ?>          
                                                </li>
                                </ul>               
              </div>


              <div data-role="content">
              <?php
                      $con = mysql_connect("localhost","root","123456");

                     mysql_select_db("plat", $con);

                     $query = "select image_src from image order by image_time desc" ;  
                     $result = mysql_query($query, $con);    
                     $num = mysql_num_rows($result);    

                     $row = $rows =array();
                     while($row = mysql_fetch_object($result)){
                          $imgurl = $row -> image_src;
                          echo '<img src=" '.$imgurl.' " width="100%" heigth="auto" />';
                     }
                     mysql_close($con);
              ?>      
              </div>


              <div data-role="footer" data-position="fixed" data-fullscreen="true">
                              <h1>创新实验</h1>
              </div>
        </div> 

        <!--________________________________________upload page_______________________________________
        <div data-role="page" id="upload" >
             <div data-role="header"  >
                              <h1>校园祭</h1>
                              <a href="#pageone" data-rolr = button data-icon="home" class="ui-btn-left"  data-transition="slide"  data-direction="reverse">首页</a>
              </div>
             
              <div data-role="content" >
              <form action="upload_file.php" method="post" enctype="multipart/form-data" data-ajax="false">
                              <input  id="uploadimg" name="file"  type="file"  runat="server" method="post" 
                                             enctype="multipart/form-data" data-inline="true"  data-ajax="false" /> 
                              <center><button  data-inline="true"  >上传</button></center>
              </form>          
              </div>
              
              <div data-role="footer" data-position="fixed" data-fullscreen="true">
                              <h1>创新实验</h1>
              </div>
     </div>-->
</body>
</html>
