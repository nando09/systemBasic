<?php
 function img($foto,$larguram,$alturam){




				    $imagem = "$foto";
				    $x = getimagesize("$imagem");
				    $largurai = $x[0];
				    $alturai=$x[1];

					$imagem_orig = ImageCreateFromJPEG($imagem);
					$pontoX = ImagesX($imagem_orig);
					$pontoY = ImagesY($imagem_orig);

				    if($larguram>=$alturam){
				      $larg=$larguram;
				      $altc=($larguram*$alturai)/$largurai;

				      if($altc>$alturam){
				       $altb=$alturam;
				       $largb=($altb*$larg)/$altc;

				      } else {
				       $largb=$larg;
				       $altb=$altc;
				      }



				    } else {

				      $alt=$alturam;
				      $largc=($alturam*$largurai)/$alturai;

				      if($largc>$larguram){

				       $largb=$larguram;
				       $altb=($largb*$alt)/$largc;

				      } else {
				       $altb=$alt;
				       $largb=$largc;
				      }


				    }

					$imagem_fin = ImageCreateTrueColor($largb,$altb);

					ImageCopyResampled($imagem_fin, $imagem_orig, 0, 0, 0, 0,$largb,$altb,$largurai,$alturai);

					ImageJPEG($imagem_fin, $imagem, 100);

					ImageDestroy($imagem_orig);
					ImageDestroy($imagem_fin);
				    //$oi="$largurai - $alturai<br>$largb - $altb";
				    //echo $oi;


	 }
?>