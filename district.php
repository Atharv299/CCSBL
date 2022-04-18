<?php
require('vendor/autoload.php');
$con=mysqli_connect('localhost','root','','district');
$chk=$_POST["chk1"];
$catt=$_POST["cat"];
$dd=$_POST["dis"];
$trr=$_POST["trr"];
$trt=(float)$trr;
if ($catt=="1")
{
    $trtt=$trt*13.46;
}
else{
    $trtt=$trt*1.4;
}
$tr=(string)$trtt;

$res=mysqli_query($con,"select * from ert");

if(mysqli_num_rows($res)>0){
	$html='<style></style><h1 style="padding-left:40%">Report</h1><br><table style="width:100%">';
		//$html.='<tr><td>District Name</td><td>Factories</td><td>Population count</td><td>Vehicles count</td><td>Oxygen level</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
            if ($row['District_name']==$dd)
            {
              $fac=(int)$row['District_factories'];
              $vehi=(int)$row['District_vheical'];
              $facc=$fac*69.31;
              $vehii=0.016*$vehi;
              $tot=$facc+$vehii;
              $stat=$tot-50000;
              if ($stat<0){
                $bot="Healthy and moderate";
              }
              else{
                $bot="Unhealthy and Hazardous";
              }


			    $html.='<tr><td>District Name:</td><td>'.$row['District_name'].'</td></tr>
                <tr><td>District Factories:</td><td>'.$row['District_factories'].'</td></tr>
                <tr><td>District Population:</td><td>'.$row['District_population'].'</td></tr>
                <tr><td>District Vehicles:</td><td>'.$row['District_vheical'].'</td></tr>
                <tr><td>District Trees:</td><td>'.$trr.'</td></tr>
                <tr><td>District Trees Category:</td><td>'.$catt.'</td></tr>
                <tr><td>Oxygen production by trees in a day(in grams):</td><td>'.$tr.'</td></tr>'; 
            }
                
		}
	$html.='</table>';
    $score=(int)$trr;
    if (($score> 380 and $chk=="Urban") or ($score >280 and $chk=="Rural")) {
        $bed="A";
        if(k==0)
        $grade = "Congratulations! your envoirnmental health is very good, No more trees need to plant Your area contains oxygen rich trees";
        else
        $frade = "Congratulations! your envoirnmental health is very good, No more trees need to plant Your area contains low oxygen rich trees,so planting trees from category1 is recommended";
    

        $score=0;
      } else if (($score > 280 and $score<=380 and $chk=="Urban") or ($score>200 and $chk=="Rural")) {
        $bed="B";
        if(k==0)
        $grade = "Your envoirmental health is good ,but planting more trees will be required Your area contains oxygen rich trees .You can plant the trees from either of the above category";
        else
        $frade = "Your envoirmental health is good ,but planting more trees will be required.Your area contains low oxygen rich trees,so planting trees from category1 is recommended";
        
        $score=0;
      } else if (($score > 180 and $score<=280 and $chk=="Urban") or ($score>120 and $chk=="Rural")) {
        $bed="C";
        if(k==0)
        $grade = "Your envoirmental health is not good but planting more trees will be required. Your area contains oxygen rich trees ,planting maximum trees from category1 is recommended although you can plant from category2";
        else
        $frade = "Your envoirmental health is not good but planting more trees will be required. Your area contains low oxygen rich trees ,planting maximum trees from category1 is recommended";
        $score=280-$score;
        
      } else if (($score > 50 and $score<=180 and $chk=="Urban") or ($score>50 and $chk=="Rural")) {
        $bed="D";
        if(k==0)
        $grade = "you are in danger,you have to grow more trees.Your area contains oxygen rich trees ,planting maximum trees from category1 is recommended.";
        else
        $frade = "you are in danger,you have to grow more trees.Your area contains low oxygen rich trees ,planting maximum trees from category1 is recommended.";
        $score=280-$score;
        

      } else {
        $bed="F";
        if(k==0)
        $grade = "you are in danger,you have to grow more trees.Your area contains oxygen rich trees ,planting maximum trees from category1 is recommended.";
        else
        $frade = "you are in danger,you have to grow more trees.Your area contains low oxygen rich trees ,planting maximum trees from category1 is recommended.";
        $score=280-$score;
    
      }
      $final= "Your Envoirnment Health grade is ".$bed.$grade.".".$frade."( around ".$score." or more)";
      $html.="<br><br><strong><h3>CO2 emmision in your district per day:</h3></strong><hr><ul>
      <li>CO2 Emmision due to factories(in tonnes): $facc</li>
      <li>CO2 Emmision due to automobiles(in tonnes): $vehii</li>
      <li>Total CO2 emmision(in tonnes): $tot</li>
      <li>Maximum allowed CO2 emmision(in tonnes): 50,000</li>
      <li>District's Atmospheric Health status: <strong><u>$bot</u></strong></li></ul>


      <br><br><strong><h3>Analysis:</h3></strong><hr><ul>
      <li>Your Envoirnment Health grade is $bed</li>
      <li>$grade.$frade</li>
      <li>Plant more trees(around $score or more)</li>
    </ul><br><br><strong><h3>Criteria of analysis:</h3></strong><hr>
    <ul>
    <li>Health Grade A ,if trees count is more than 380 for urban area and more than 280 for rural area</li>
    <li>Health Grade B ,if trees count is between 280-380 for urban area and between 200-280 for rural area</li>
    <li>Health Grade C ,if trees count is between 180-280 for urban area and between 120-200 for rural area</li>
    <li>Health Grade D ,if trees count is between 50-180 for urban area and between 50-120 for rural area</li>
    <li>Health Grade E ,if trees count is less 50 for either of the area</li>
    </ul>";































}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S
?>
