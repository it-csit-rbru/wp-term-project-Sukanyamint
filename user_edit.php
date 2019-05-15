<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1">
        <title>Project 6015261023</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include indivIDual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>แก้ไขข้อมูลผู้ใช้</h4>
                    <?php
                        $u_id = $_REQUEST['u_id'];
                        if(isset($_GET['submit'])){
                            $u_id = $_GET['u_id'];
                            $u_sid = $_GET['u_sid'];
                            $u_ttl_id = $_GET['u_ttl_id'];
                            $u_rm_id = $_GET['u_rm_id'];
                            $u_rm_idc = $_GET['u_rm_idc'];
                            $u_fname = $_GET['u_fname'];
                            $u_lname = $_GET['u_lname'];
                            $fu_email = $row2['u_email'];
                            $u_tel = $_GET['u_tel'];
                            $u_ad = $_GET['u_ad'];
                            $u_date = $_GET['u_date'];
                            $sql = "update user set ";
                            $sql .= "u_fname='$u_fname',u_lname='$u_lname',u_id='$u_id',u_sid='$u_sid',u_ttl_id='$u_ttl_id',u_date='$u_date',u_tel='$u_tel',u_ad='$u_ad',u_rm_id='$u_rm_id',u_rm_idc='$u_rm_idc',u_email='$u_email' ";
                            $sql .="where u_id='$u_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลผู้ใช้  $u_id $u_sid $u_ttl_id $u_fname $u_lname $u_date $u_tel $u_ad $u_rm_id $u_rm_idc เรียบร้อยแล้ว<br>";
                            echo '<a href="user_list.php">แสดงรายชื่อผู้ใช้ทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="user_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hIDden" name="u_id" ID="u_id" value="<?php echo "$u_id";?>">
                            <label for="u_ttl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="u_ttl_id" ID="u_ttl_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from userr where u_id='$u_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fu_sid = $row2['u_sid'];
                                    $fu_fname = $row2['u_fname'];
                                    $fu_lname = $row2['u_lname'];
                                    $fu_date = $row2['u_date'];
                                    $fu_tel = $row2['u_tel'];
                                    $fu_ad = $row2['u_ad'];
                                    $fu_email = $row2['u_email'];
                                    $fu_rm_id = $row2['u_rm_id'];
                                    $fu_rm_idc = $row2['u_rm_idc'];
                                    $fu_ttl_id = $row2['u_ttl_id'];
                                    $sql =  "SELECT * FROM title order by ttl_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'].'"';
                                        if($row['ttl_id']==$fu_ttl_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_sid" class="col-md-2 col-lg-2 control-label">รหัสลูกค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_sid" ID="u_sid" class="form-control" 
                                       value="<?php echo $fu_sid;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_fname" ID="u_fname" class="form-control" 
                                       value="<?php echo $fu_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="u_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_lname" ID="u_lname" class="form-control" 
                                       value="<?php echo $fu_lname;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="varchar" name="u_tel" ID="u_tel" class="form-control" 
                                       value="<?php echo $fu_tel;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_ad" ID="u_ad" class="form-control" 
                                       value="<?php echo $fu_ad;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_email" class="col-md-2 col-lg-2 control-label">email</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_email" ID="u_email" class="form-control" 
                                       value="<?php echo $fu_email;?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_date" class="col-md-2 col-lg-2 control-label">วันที่เข้าจอง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_date" ID="u_date" class="form-control" 
                                       value="<?php echo $fu_date;?>">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <input type="hIDden" name="u_id" ID="u_id" value="<?php echo "$u_id";?>">
                            <label for="u_rm_id" class="col-md-2 col-lg-2 control-label">เลขห้อง</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="u_rm_id" ID="u_rm_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from user where u_id='$u_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fu_rm_id = $row2['u_rm_id'];
                                    $sql =  "SELECT * FROM room order by rm_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['rm_id'].'"';
                                        if($row['rm_id']==$fu_rm_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['rm_num'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <input type="hIDden" name="u_id" ID="u_id" value="<?php echo "$u_id";?>">
                            <label for="u_rm_idc" class="col-md-2 col-lg-2 control-label">ระดับห้อง</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="u_rm_idc" ID="u_rm_idc" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from user where u_id='$u_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fu_rm_id = $row2['u_rm_idc'];
                                    $sql =  "SELECT * FROM room2 order by rm_idc";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['rm_idc'].'"';
                                        if($row['rm_idc']==$fu_rm_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['rm_class'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะคอมพิวเตอร์ศึกษาปี 2 </address>
            </div>
        </div>    
    </body>
</html>