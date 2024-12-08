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

$nc=0;
$categ=array();
if($f1=@fopen("webstock.dat","r")){
while(!feof($f1)){
   $dum=fgets($f1,79);
   $cat=fgets($f1,21);
   $dum=fgets($f1,2);
   if(!feof($f1)){
   $trip=0;
   for($i=1;$i<=$nc;$i++){
      if(strcmp($cat,$categ[$i])==0){
         $trip=1;
      }
   }
   if($trip==0){
      $nc++;
      $categ[$nc]=$cat;
   }   
   }
}
fclose($f1);
}
else{
   print "<CENTER><FONT FACE=\"$font\" COLOR=#$txcol><BR><BR><H3>NO STOCK FOUND</H3></CENTER>";
   exit;
}
?>
<html>
<head>
<title>Select stock category</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
print "<body BGCOLOR=#$bgcol>\n";
?>
<div>


<CENTER>
<?php
print "<FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>\n";
?>
<BR><BR><H3>Select Stock Category</H3></FONT>
<?php
print "<FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>\n";
?>
<P>
<form name="form" method="post" action="stock_1.php">
<?php
print "<TABLE BGCOLOR=#$tacol CELLPADDING=8 BORDER=1><TR><TD>\n";
print "<TABLE CELLPADDING=2>\n";

print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Stock category:</FONT></TD>\n";
print "<TD><select name=type>\n";

print "<option>Select\n";
for($i=1;$i<=$nc;$i++){
     print "<option ";    
     print "value =\"$categ[$i]\">$categ[$i]\n";
   
}
?>
</select>
</TD></TR>

</TABLE>
<P><CENTER><input type="submit" name="Submit" value="Check availability"></CENTER>
</TD></TR></TABLE>
</form></FONT>
</CENTER>


</div>
</body>
</html>