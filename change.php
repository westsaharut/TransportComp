<?php
 require "header.php";
 require("config/connection.php");
 if(isset($_POST["money"])){
   $moneyIn = $_POST["money"];
   $price = $_POST["price"];
   $id = $_POST["id"];
   $sql = "SELECT * FROM `History`, `Users` WHERE `History`.`UseID` = `Users`.`UseID` AND `HisID` = " .$id;
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $discount = 0;
   if($row["UseType"]=="silver"){
     $discount = 10;
   }else if($row["UseType"]=="gold"){
     $discount = 25;
   }else if($row["UseType"]=="premium"){
     $discount = 35;
   }
   $price = ($row["Price"]*(100-$discount))/100;

   $money =  $moneyIn-$price;
?>
<?php require "menu.php" ;?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
 <div class="row">
   <div class="col-lg-12">
     <h1 class="page-header">Change</h1>
   </div>
 </div>
 <div class="row">
   <div class="col-md-12">
     <div class="panel panel-default">
       <div class="panel-body">
         <hr>
         <h1 class="page-header">เงิน</h1>
               Car No : <?=$row["HisCarNo"]?><br>
               Car Type : <?=$row["HisCarType"]?><br>
               Date In : <?=$row["HisDateIn"]?><br>
               Date Out : <?=$row["DateOut"]?><br>
               Type : <?=$row["UseType"]?> (<?=$discount?> %)<br>
               Price : <?=$row["Price"]?> ฿<br>
               Discount : <?=$row["Price"]-($row["Price"]*(100-$discount))/100?> ฿<br>
               Money to pay : <?=$price?> ฿<br>
               Money received : <?=$moneyIn?> ฿<br>
               Change : <?=$money?> ฿<br><br>
               <hr>
         <h1 class="page-header">เงินที่ต้องทอน</h1>
         <?php
                    if($money>=1000){
                      $sum1=$money/1000;
                      $sum1s=floor($sum1)*1000;
                      $money=$money-$sum1s;
                      echo "มีจำนวนธนบัตร 1,000 บาท = ".floor($sum1)." ใบ"."<br>";
                    }
                    if($money>=500){
                      $sum2=$money/500;
                      $sum2s=floor($sum2)*500;
                      $money=$money-$sum2s;
                      echo "มีจำนวนธนบัตร 500 บาท = ".floor($sum2)." ใบ"."<br>";
                    }
                    if($money>=100){
                      $sum3=$money/100;
                      $sum3s=floor($sum3)*100;
                      $money=$money-$sum3s;
                      echo "มีจำนวนธนบัตร 100 บาท = ".floor($sum3)." ใบ"."<br>";
                    }
                    if($money>=50){
                      $sum4=$money/50;
                      $sum4s=floor($sum4)*50;
                      $money=$money-$sum4s;
                      echo "มีจำนวนธนบัตร 50 บาท = ".floor($sum4)." ใบ"."<br>";
                    }if($money>=20){

                      $sum5=$money/20;
                      $sum5s=floor($sum5)*20;
                      $money=$money-$sum5s;
                      echo "มีจำนวนธนบัตร 20 บาท = ".floor($sum5)." ใบ"."<br>";
                    }if($money>=10){
                      $sum51=$money/10;

                      $sum51s=floor($sum51)*10;
                      $money=$money-$sum51s;
                      echo "มีจำนวนเหรียญ 10 บาท บาท = ".floor($sum51)." เหรียญ"."<br>";
                    }
                    if($money>=5){
                      $sum6=$money/5;
                      $sum6s=floor($sum6)*5;
                      $money=$money-$sum6s;
                      echo "มีจำนวนเหรียญ 5 บาท บาท = ".floor($sum6)." เหรียญ"."<br>";
                    }
                    if($money>=2){
                      $sum7=$money/2;
                      $sum7s=floor($sum7)*2;
                      $money=$money-$sum7s;
                      echo "มีจำนวนเหรียญ 2 บาท บาท = ".floor($sum7)." เหรียญ"."<br>";
                    }
                    if($money>=1){
                      $sum8=$money/1;
                      $sum8s=floor($sum8)*1;
                      $money=$money-$sum8s;
                      echo "มีจำนวนเหรียญ 1 บาท บาท = ".floor($sum8)." เหรียญ"."<br>";
                    }
                    if($money>=0.50){
                      $money=$money-0.50;
                      echo "มีจำนวนเหรียญ 50 สตางค์ = 1 เหรียญ"."<br>";
                    }
                    if($money>=0.25){
                      echo "มีจำนวนเหรียญ 25 สตางค์ = 1 เหรียญ"."<br>";
                      $money=$money-0.25;
                    }

?>               <br>
               <div class="form-group">
                 <div class="col-lg-9 ">
                   <a href="index.php" class="btn btn-info btn-sm">Submit.</a>
                 </div>
               </div>
       </div>
     </div>
   </div>
 </div><!--/.row-->
</div>	<!--/.main-->

<?php
   require"footer.php" ;
 }
?>

</body>
</html>
