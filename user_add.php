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
                    <h4>เพิ่มข้อมูลผู้ใช้</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $u_sid = $_GET['u_sid'];
                            $u_ttl_id = $_GET['u_ttl_id'];                          
                            $u_fname = $_GET['u_fname'];
                            $u_lname = $_GET['u_lname'];
                            $u_tel = $_GET['u_tel'];
                            $u_ad = $_GET['u_ad'];
                            $u_email = $_GET['u_email'];
                            $u_date = $_GET['u_date'];
                            $u_rm_id = $_GET['u_rm_id'];
                            $u_rm_idc = $_GET['u_rm_idc'];
                            $sql = "insert into user";
                            $sql .= " values (null ,'$u_fname','$u_lname','$u_ttl_id','$u_sid','$u_tel','$u_ad','$u_email','$u_date','$u_rm_id','$u_rm_idc',)";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มผู้ใช้  $u_sid $u_ttl_id $u_fname $u_lname $u_tel $u_ad $u_email $u_date $u_rm_id $u_rm_idc เรียบร้อยแล้ว<br>";
                            echo '<a href="user_list.php">แสดงรายชื่อผู้ใช้ทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="user_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="u_ttl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="u_ttl_id" ID="u_ttl_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM title order by ttl_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'] . '">';
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_sid" class="col-md-2 col-lg-2 control-label">รหัสสมาชิก</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_sid" ID="u_sid" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_fname" ID="u_fname" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="u_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_lname" ID="u_lname" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_email" class="col-md-2 col-lg-2 control-label">Email</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_email" ID="u_email" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_tel" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_tel" ID="u_tel" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_ad" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_ad" ID="u_ad" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="u_date" class="col-md-2 col-lg-2 control-label">วันที่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="u_date" ID="u_date" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_rm_id" class="col-md-2 col-lg-2 control-label">เลขห้อง</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="u_rm_id" ID="u_rm_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM room order by rm_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['rm_id'] . '">';
                                        echo $row['rm_num'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="u_rm_idc" class="col-md-2 col-lg-2 control-label">ระดับห้อง</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="u_rm_idc" ID="u_rm_idc" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM room2 order by rm_idc';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['rm_idc'] . '">';
                                        echo $row['rm_class'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
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