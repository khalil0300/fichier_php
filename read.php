<?php
// -------------------------Lire-------------------------

/* 
lire tous le fichier
echo readfile("khalil.txt");


$myfile = fopen("khalil.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize('khalil.txt'));
echo fread($myfile,10);


// Le premier paramètre de fread()contient 
// le nom du fichier à lire et le deuxième paramètre spécifie le nombre maximum d'octets à lire
fclose($myfile);
$file=fopen("khalil.txt",'r');
echo fgets($file); // ecris une line de fichier la pemière ligne
fclose($file);


$myfile = fopen("khalil.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";// pour lit ligne après ligne
}
fclose($myfile);



$myfile = fopen("khalil.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgetc($myfile) . "<br>";// pour lit caractère par caractère
}
fclose($myfile);
 */

// -------------------------Ecrire-------------------------
$file=fopen('creer_une_fichier.txt','w');
$besion="je passerai le tcf la prochaine mois c'est octobre à la fin de mois Inchaallah \n";
fwrite($file,$besion);
$besion="je passerai le tcf la prochaine mois c'est octobre à la fin de mois Inchaallah \n";
fwrite($file,$besion);
$besion="je passerai le tcf la prochaine mois c'est octobre à la fin de mois Inchaallah \n";
fwrite($file,$besion);

fclose($file);

$file=fopen('creer_une_fichier.txt','r');
while(!feof($file))
{;
    echo fgets($file) ."<br>";
}

fclose($file);


?>