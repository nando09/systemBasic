<?php
// mais uma vez, mantendo a sessão aberta
session_start();

// função do gd, para criar uma imagem, com o tamanho definido
// largura, altura
$tamx   = 138;
$tamy   = 38;
$imagem = imagecreate($tamx, $tamy);

// função que define a cor de fundo da imagem gerada pelo gd
//$fundo = imagecolorallocate($imagem, 168, 187, 204);
$fundo = imagecolorallocate($imagem, 255, 255, 255);
$colorwhite = imagecolorallocate($imagem, 255, 255, 255);

// função que define a cor da fonte.
$fonte = imagecolorallocate($imagem, 0, 0, 0);
$colorblack = imagecolorallocate($imagem, 0, 0, 0);

$array_fonte[] = imagecolorallocate($imagem, 0, 0, 0);
//XX$array_fonte[] = imagecolorallocate($imagem, 105, 105, 105);
//XX$array_fonte[] = imagecolorallocate($imagem, 49, 79, 79);
$array_fonte[] = imagecolorallocate($imagem, 0, 0, 128);
$array_fonte[] = imagecolorallocate($imagem, 0, 100, 0);
//XX$array_fonte[] = imagecolorallocate($imagem, 184, 134, 11);
//XX$array_fonte[] = imagecolorallocate($imagem, 178, 34, 34);
$array_fonte[] = imagecolorallocate($imagem, 255, 69, 0);
$array_fonte[] = imagecolorallocate($imagem, 255, 0, 0);
$array_fonte[] = imagecolorallocate($imagem, 0, 0, 255);
$array_fonte[] = imagecolorallocate($imagem, 176, 48, 96);
//$fonte = $array_fonte[mt_rand(0, 6)];
$fonte = $array_fonte[1];

$x1 = mt_rand(0, $tamx/2);
$y1 = mt_rand(0, $tamy/2);
$x2 = mt_rand(($tamx/2)+1, $tamx);
$y2 = mt_rand(($tamy/2)+1, $tamy);
$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imageline($imagem, $x1, $y1, $x2, $y2, $color);

$x1 = mt_rand(0, $tamx/2);
$y1 = mt_rand(0, $tamy/2);
$x2 = mt_rand(($tamx/2)+1, $tamx);
$y2 = mt_rand(($tamy/2)+1, $tamy);
//$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imageline($imagem, $x1, $y1, $x2, $y2, $colorblack);
$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imageline($imagem, $x1 + 10, $y1 + 10, $x2 + 10, $y2 + 10, $color);
$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imageline($imagem, $x1 - 10, $y1 - 10, $x2 - 10, $y2 - 10, $color);

$x1 = mt_rand(0, ($tamx/2));
$y1 = mt_rand(($tamy/2)+1, $tamy);
$x2 = mt_rand(($tamx/2)+1, $tamx);
$y2 = mt_rand(0, ($tamy/2));
//$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imageline($imagem, $x1, $y1, $x2, $y2, $colorblack);
$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imageline($imagem, $x1 + 10, $y1 + 10, $x2 + 10, $y2 + 10, $color);
$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imageline($imagem, $x1 - 10, $y1 - 10, $x2 - 10, $y2 - 10, $color);

$x1 = mt_rand(0, $tamx-1);
$y1 = mt_rand(0, $tamy-1);
$x2 = $x1 + 2;
$y2 = $y1 + 2;
//$color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
imagefilledrectangle($imagem, $x1, $y1, $x2, $y2, $colorblack);
for ($i = 0; $i < 15; $i++) {
   $x1 = mt_rand(0, $tamx-1);
   $y1 = mt_rand(0, $tamy-1);
   $tamrect = mt_rand(1, 3);
   $x2 = $x1 + $tamrect;
   $y2 = $y1 + $tamrect;
   $color = imagecolorallocate($imagem, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
   imagefilledrectangle($imagem, $x1, $y1, $x2, $y2, $color);
}

// desenhando a imagem, baseada nos padrões informados acima
// verificando a sessão aberta, para informar ao formulário o que foi digitado
//$font = 5;
//$font = imageloadfont("chiller.gdf");
//imagestring($imagem, $font, $xini, $yini, $_SESSION['autenticagd'], $fonte);
$angulo = mt_rand(-15, 15);
if ($angulo < 0) {
   if ($angulo >= -5) {
      $y1 = 28;
   } else {
      $y1 = 18;
   }
} else {
   if ($angulo <= 5) {
      $y1 = 28;
   } else {
      $y1 = 38;
   }
}
//imagettftext($imagem, mt_rand(15, 17), $angulo, 30, $y1, $fonte, 'ITCKRIST.TTF', $_SESSION['autenticagd']);
imagettftext($imagem, mt_rand(16, 17), $angulo, 30, $y1, $fonte, 'ITCKRIST.TTF', $_SESSION['autenticagd']);

// header, necessário
header("Content-type: image/png");

// formato da imagem, no meu caso utilizei PNG.
// vc pode usar imagejpeg, imagegif, etc. Veja as referências no manual do php
imagepng($imagem);
?>
