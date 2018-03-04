<?php
 require_once("../../../../../dompdf/dompdf_config.inc.php");

$html =
  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="profilestyle.css" type="text/css" />
<title>AAAA</title>
</head>
<body>
<!-- Cat Information-->
<table width="100%" border="0">
  <tr>
   <td class="cat-profiles-data" align="left" valign="top">
   <p>
   <table width="100%" border="0">
        <tr>
		  <td width="12px"><span class="profile-attr-yes">&#10004;</span></td>
          <td>Quiet home</td>
        </tr>
		<tr>
          <td><span class="profile-attr-yes">&#10004;</span></td>
          <td>Active home</td>
        </tr>
        <tr>
          <td><span class="profile-attr-yes">&#10004;</span></td>
          <td>Adult home</td>
        </tr>
        <tr>
          <td><span class="profile-attr-no">&#10008;</span></td>
          <td>Children under 12</td>
        </tr>
        <tr>
          <td><span class="profile-attr-maybe">?</span></td>
          <td>Children over 12</td>
        </tr>
        <tr>
          <td width="12px"><span class="profile-attr-yes">&#10004;</span></td>
          <td>Other cats</td>
        </tr>
        <tr>
          <td width="12px"><span class="profile-attr-maybe">?</span></td>
          <td>Dogs (passive)</td>
        </tr>
        <tr>
          <td><span class="profile-attr-yes">&#10004;</span></td>
          <td>Indoors only</td>
        </tr>
      </td>
	</table>
	    <span id="catname">BOO</span><br />
        MALE<br />
        Born: <br />
        Colour: Champagne & White<br />
        Eyes: Gold<br />
        Neutered &#38; Vaccinated<br />
	</p>
   </td>
    <td align="right" valign="top"><img alt="Cat Image" src="imagecrop.jpg" /></td>
  </tr>
</table>
</body>
</html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

?>