<?php
include("admin/cn.php");
$result = mysql_query("Select * from categories",$link);
$num = mysql_num_rows($result);
$n = 0;
?>

<HTML>
<HEAD>
<TITLE>php-cms</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
</HEAD>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<TABLE WIDTH=780 BORDER=0 align="center" CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD COLSPAN=2>
			<IMG SRC="images/php-cms_01.gif" WIDTH=780 HEIGHT=112 ALT=""></TD>
	</TR>
	
  <TR valign="top"> 
    <TD COLSPAN=2><table width="100%" border="0">
        <tr> 
          <td><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              </font></div></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr> 
          <td><h3><font face="Verdana, Arial, Helvetica, sans-serif">PHP-CMS Project</font></h3>
            <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">PHP-CMS 
              Project is aimed to be a good easy to use and manage web based content 
              management system. It will include all possible features that a 
              web application can have like a web portal. It will have good administration 
              features.</font> </p>
            <table width="92%" border="1" cellpadding="1" cellspacing="1" bordercolor="#000000">
              <tr bgcolor="#CCCCCC"> 
                <td width="18%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Record</strong></font></td>
                <td width="82%"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Description</font></strong></td>
              </tr>
              <?php while($row = mysql_fetch_array($result, MYSQL_BOTH)){
$n++;
?>
              <tr> 
                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row['catname'];?></font></td>
                <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row['catdesc'];?></font></td>
              </tr>
              <?php

 }?>
              <tr> 
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <table width="100%" border="0">
              <tr> 
                <td><a href="http://sourceforge.net/projects/asp-cms"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">ASP-CMS 
                  Project </font></strong></a></td>
                <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="http://sourceforge.net/projects/php-cms-project">PHP-CMS 
                  Project</a></font></strong></td>
                <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="http://sourceforge.net/projects/aspnet-cms/">ASP.NET-CMS 
                  Project</a></font></strong></td>
              </tr>
            </table></td>
        </tr>
      </table></TD>
	</TR>
	<TR>
		<TD>
			<IMG SRC="images/php-cms_03.gif" WIDTH=17 HEIGHT=21 ALT=""></TD>
		<TD>
			<IMG SRC="images/php-cms_04.gif" WIDTH=763 HEIGHT=21 ALT=""></TD>
	</TR>
</TABLE>
</BODY>
</HTML>