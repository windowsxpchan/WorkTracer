<html>
<head>
<title>Status of Repair Ticket</title>
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
$f1=fopen("sname.dat","r");
$sname=fgets($f1,21);
fclose($f1);
print "<body BGCOLOR=#$bgcol>\n";
print "<CENTER><BR><BR><BR><BR>";
print "<FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol><H3>Status of Repair Ticket</H3></FONT>\n";
print "<FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>\n";
print "<P><form name=form method=post action=result.php>\n";
print "<TABLE BGCOLOR=#$tacol CELLPADDING=8 BORDER=1><TR><TD>\n";
print "<TABLE CELLPADDING=2>\n";

print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Please enter your ticket number:</FONT></TD>\n";
print "<TD><INPUT TYPE=text NAME=ticket SIZE=8 MAXLENGTH=8></TD></TR>\n";
print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>or the equipment's $sname</FONT></TD>\n";
print "<TD><INPUT TYPE=text NAME=serial SIZE=12 MAXLENGTH=20></TD></TR>\n";
print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>& last 4 digits of phone number:</FONT></TD>\n";
print "<TD><INPUT TYPE=text NAME=phone SIZE=4 MAXLENGTH=4></TD></TR>\n";
?>
</TABLE>
<P><CENTER><input type="submit" name="Submit" value="GO"></CENTER>
</TD></TR></TABLE>
</form></FONT>
</CENTER>
</body>
</html>