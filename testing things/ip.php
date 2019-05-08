<?php 
	function getRealIpAddr()
{
if (!empty($_SERVER['HTTP_CLIENT_IP']))
//check ip from share internet
{
$ip=$_SERVER['HTTP_CLIENT_IP'];
}
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;

}
echo "<p>ip address is</P>";
echo getRealIpAddr(); 
 ?>

 <?php 
 	function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}
echo "<hr >";
echo "ip address";
echo get_client_ip_env();

 ?>