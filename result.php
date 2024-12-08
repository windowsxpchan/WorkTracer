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

print "<CENTER><FONT FACE=\"$font\" COLOR=#$txcol SIZE=2><BR><BR><BR><BR>\n";

$ticket = $_POST['ticket'];
$phone = $_POST['phone'];
$ser = $_POST['serial'];

if(strlen($ticket)>0&&strlen($ser)>0){
   print "<B>Please enter the ticket number <I>or</I> the serial number</B>";
   print "<P><form><input type=button value=BACK onclick=history.back()></form>";
   print "</FONT></CENTER></body></html>";
   exit;
}
if(strlen($ticket)==0&&strlen($ser)==0){
   print "<B>Please enter the ticket number or the serial number</B>";
   print "<P><form><input type=button value=BACK onclick=history.back()></form>";
   print "</FONT></CENTER></body></html>";
   exit;
}
if(strlen($phone)==0){
   print "<B>Please enter the phone number</B>";
   print "<P><form><input type=button value=BACK onclick=history.back()></form>";
   print "</FONT></CENTER></body></html>";
   exit;
}


$tem=$ticket;
$lens=strlen($ser);
if(strlen($ticket)==7){
   $tem="0";
   $tem.=$ticket;
}
if(strlen($ticket)==6){
   $tem="00";
   $tem.=$ticket;
}
if(strlen($ticket)==5){
   $tem="000";
   $tem.=$ticket;
}
if(strlen($ticket)==4){
   $tem="0000";
   $tem.=$ticket;
}
if(strlen($ticket)==3){
   $tem="00000";
   $tem.=$ticket;
}
if(strlen($ticket)==2){
   $tem="000000";
   $tem.=$ticket;
}
if(strlen($ticket)==1){
   $tem="0000000";
   $tem.=$ticket;
}
$ticket=$tem;



$nm=0;
$f1=fopen("upload.dat","r");

while(!feof($f1)){
   $length=fgets($f1,4);
   $trans=fgets($f1,9);
   $sdate=fgets($f1,9);
   $amt=fgets($f1,11);
   $name=fgets($f1,31);
   $description=fgets($f1,41);
   $serno=fgets($f1,21);
   $status=fgets($f1,21);
   $date=fgets($f1,9);
   $time=fgets($f1,9);
   $tel=fgets($f1,5);
   $coll=fgets($f1,21);
   $notes=fgets($f1,$length+10);
   
   if(!feof($f1)){ 
      if((strcmp($ticket,$trans)==0||($lens>0&&strncmp($serno,$ser,$lens)==0))
	  &&strcmp($tel,$phone)==0&&strcmp($tel,"    ")!=0){
	  $nm=1;
	  print "<H3>Status of Work Ticket</H3><P>";
          print "<TABLE BGCOLOR=#$tacol CELLPADDING=8 BORDER=1><TR><TD>\n";	  
          print "<TABLE CELLPADDING=2>\n";
          print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$sname</FONT></TD>\n";
	  print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$serno</FONT></TD></TR>\n";

          print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Received</FONT></TD>\n";
	  print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$sdate</FONT></TD></TR>\n";
          
          print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Repair:</FONT></TD>\n";
	  print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$description</FONT></TD></TR>\n";

          print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Status:</FONT></TD>\n";
	  print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$status</FONT></TD></TR>\n";

          print "<TR><TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Current cost:</FONT></TD>\n";
	  print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$amt</FONT></TD></TR>\n";

          if(!strstr($date,' ')){
             print "<TR><TD VALIGN=top><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$coll</FONT></TD>\n";
	     print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$date at $time</FONT></TD></TR>\n";
	  }

          print "<TR><TD VALIGN=top><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>Notes:</FONT></TD>\n";
	  print "<TD><FONT FACE=\"$font\" SIZE=2 COLOR=#$txcol>$notes</FONT></TD></TR>\n";
	  
          print "</TABLE></TD></TR></TABLE>";
	  print "<P><CENTER><form><input type=button value=BACK onclick=history.back()></form></CENTER>";
                
      }
   }
}
fclose($f1);
if($nm==0){
   print "<B>No matching ticket found</B>";
   print "<P>Click <A HREF=query.php>here</A> to return to the previous page";
   print "</FONT></CENTER></body></html>";
   exit;
}
   
?>

</FONT></CENTER>

</body>
</html>