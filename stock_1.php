<html>
<head>
<title>Select stock item</title>
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
print "<body BGCOLOR=#$bgcol>\n";
print "<CENTER><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>";

$type = $_POST['type'];

if(strcmp($type,"Select")==0){
   print "<BR><BR><H3>You have not selected a stock category</H3><P>";
   print "<B><A HREF=stock.php>BACK</A></B>";   
   print "</FONT></CENTER></body></html>";
   exit;
}
$ns=0;
$stock=array();
$stockno=array();
if($f1=@fopen("webstock.dat","r")){
while(!feof($f1)){
   $sno=fgets($f1,15);
   $sdesc=fgets($f1,31);
   $sunit=fgets($f1,17);
   $price=fgets($f1,11);
   $qty=fgets($f1,9);
   $cat=fgets($f1,21);
   $dum=fgets($f1,2);
   if($cat==$type){
      $ns++;
      $stock[$ns]=$sdesc;
      $stockno[$ns]=$sno;
   }
   
}
fclose($f1);
}
?>
<html>
<head>
<title>Select stock</title>
</head>
<?php
print "<body BGCOLOR=#$bgcol>\n";
?>
<CENTER>
<?php
print "<FONT FACE=\"$font\" COLOR=#$txcol>\n";
?>
<BR><BR><H3>Select Stock</H3></FONT>
<?php
print "<FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>\n";
?>
<P>
<form name="form" method="post" action="stock_2.php">
<?php
print "<input type=hidden name=type value=\"$type\">";
print "<TABLE BGCOLOR=#$tacol CELLPADDING=8 BORDER=1><TR><TD>\n";
print "<TABLE CELLPADDING=2>\n";

print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Stock:</FONT></TD>\n";
print "<TD><select name=stock>\n";

print "<option>Select\n";
for($i=1;$i<=$ns;$i++){
     print "<option ";    
     print "value =\"$stockno[$i]\">$stock[$i]\n";
   
}
?>
</select>
</TD></TR>

</TABLE>

<P><CENTER><input type="submit" name="Submit" value="Check availability"></CENTER>
</TD></TR></TABLE>
</form></FONT>
</CENTER>
</body>
</html>