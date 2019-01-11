<?php 
//echo "系統當前時間戳為：";
echo "";
echo time();
echo "<br>";
//<!--JS 頁面自動刷新 -->
echo ("<script type=\"text/javascript\">");
echo ("function fresh_page()"); 
echo ("{");
echo ("window.location.reload();");
echo ("}"); 
echo ("setTimeout('fresh_page()',1000);"); 
echo ("</script>");
?>