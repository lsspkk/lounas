<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>3 lounasta</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

  <style>
  body { font-family: 'Lato', sans-serif; }
  article p { text-align: left !important;}
  #food-column {  width: 30%;  margin: 60px 1.4%;  display:block;  float: left;}
  #content h1 { font-size: 110%; }
  .menu-row { clear: both; margin: 20px 0; }
  .menu-food p { margin: 0; }
  .menu-food { display: block;  float: left;  margin-right: 10px; }
  </style>
</head>
<body>

<?php
$em = '';
$html = file_get_contents("https://panchovilla.fi/tampere-lielahti");
if( !empty($html) ) {
  $dom = new DOMDocument();
  $dom->loadHTML($html);
  $finder = new DomXPath($dom);
  $items = $finder->query("//h3[contains(., 'Lounas')]");
  if( !empty($items) ) {
    $em = $dom->saveHTML($items[0]->parentNode);
  }
}
?>
<div id='food-column'><h1>PANCHO</h1>
<?php
echo $em;
echo "</div>";


  
$em = '';
$html = file_get_contents("http://brander.fi/kahvila-konditoria/lielahden-lounaslista/");
if( !empty($html) ) {
  $html2 = str_replace('***<br />', " ", $html);
  $html = str_replace('***<br/>', " ", $html2);
  $dom = new DOMDocument();
  $dom->loadHTML($html2);
  $em = $dom->saveHTML($dom->getElementById('sisalto'));
}
?>
<div id='food-column'><h1>BRANDER</h1>
<?php
echo $em;
echo "</div>";


$em = '';
$html = file_get_contents("http://www.ninankeittio.fi/lielahti");
if( !empty($html) ) {
  $html2 = str_replace("<section class='menu-section'>", "<div id='ruokalista'>", $html);
  $html3 = str_replace("</article>\n</div>\n</section>", "</article>\n</div>\n</div>", $html2);
  $html = preg_replace("/<img[^>]+\>/i", "", $html3);
  $dom = new DOMDocument();
  $dom->loadHTML($html);
  $em = $dom->saveHTML($dom->getElementById('ruokalista'));
}
?>
<div id='food-column'><h1>NINA</h1>
<?php
echo $em;
echo "</div>";


?>
