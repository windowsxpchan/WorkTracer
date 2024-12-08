<html>
<head>
<title>Availability</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$font="Arial";
$bgcol="FFFFFF";
$tacol="E8E8E8";
$txcol="000000";
if($f1=@fopen("options.dat","r")){
   $font=fgets($f1,16);
   $bgcol=fgets($f1,7);
   $tacol=fgets($f1,7);
   $txcol=fgets($f1,7);
   fclose($f1);
}
$curr="";
if($f1=@fopen("currency.dat","r")){
   $curr=fgets($f1,5);   
   fclose($f1);
   $curr=trim($curr);
}
print "<body BGCOLOR=#$bgcol>\n";
print "<CENTER><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>";

$stockno = $_POST['stock'];
$type=$_POST['type'];

if(strcmp($stock,"Select")==0){
   print "<BR><BR><H3>You have not selected the stock</H3><P>";
   print "<form name=form method=post action=stock_1.php>";
   print "<input type=hidden name=type value=\"$type\">";
   print "<P><CENTER><input type=submit name=Submit value=\"Back\"></CENTER>"; 
   print "</body></html>";
   exit;
}

if($f1=@fopen("webstock.dat","r")){
while(!feof($f1)){
   $sno=fgets($f1,15);
   $sdesc=fgets($f1,31);
   $sunit=fgets($f1,17);
   $sprice=fgets($f1,11);
   $sqty=fgets($f1,9);
   $cat=fgets($f1,21);
   $dum=fgets($f1,2);
   if($stockno==$sno){
      $desc=$sdesc;
      $unit=$sunit;
      $price=$sprice;
      $qty=$sqty;
   }
   
}
fclose($f1);
}

print "<BR><BR><H3>Availability</H3></FONT>";

print "<TABLE BGCOLOR=#$tacol CELLPADDING=8 BORDER=1><TR><TD>\n";
print "<TABLE CELLPADDING=2>\n";

print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Description:</FONT></TD>\n";
print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>";
print "$desc";
print "</FONT></TD></TR>";

print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Qty in stock:</FONT></TD>\n";
print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>";
$qty=$qty." ";
$l=strlen($unit);
$unit=trim($unit);
$sunit=$unit;
if($unit[$l]!='s'){
   $unit=$unit."s";
}
$qty=$qty.$unit;
print "$qty";
print "</FONT></TD></TR>";

print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Price:</FONT></TD>\n";
print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>";
$cost=$curr;
$cost=$cost.$price;
$cost=$cost." per ";
$cost=$cost.$sunit;
print "$cost";
print "</FONT></TD></TR></TABLE>";


$file=trim($stockno);
$file=$file.".jpg";
if($f1=@fopen($file,"r")){
   fclose($f1);
   print "<P><CENTER><IMG SRC=$file BORDER=1></CENTER>";
}
print "</TD></TR></TABLE>";
print "<FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>";
?>
<P><B><A HREF=stock.php>Check availability of another item</A></B>
</FONT>
</CENTER>
</body>
</html>
