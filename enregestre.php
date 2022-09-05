<?php
use function PHPSTORM_META\type;
$nom=$prenom=$age='';
$pers="";
$tab_Per=[];
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['ajouter']))
    {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']))
        {
            $Per=$_POST['nom'].";".$_POST['prenom'].";".$_POST['age']."\n";
            $file=fopen('Personnes.txt',"a");
            fwrite($file,$Per);        
            fclose($file);
        }
        else
        {
            echo "<script>alert('saisez tous les champs');</script>";
        }
    }
    if(isset($_POST['afficher']))
    {
        
            $file=fopen('Personnes.txt',"r");
            
            while(!feof($file))       
            {
                $pers.=fgets($file);
            }
            fclose($file);
        
    }
    if(isset($_POST['sup']))
    {
        if(!empty($_POST['nom']))
        {
            $Perns=Recuperer();
            $nom=$_POST['nom'];
            $p="";
            for ($i=0; $i <count($Perns); $i++) { 
                if($nom==$Perns[$i][0])
                {
                    
                    array_splice($Perns,$i,$i+1);
                    break;
                }
                else{
                    $file=fopen('Personnes.txt',"w");
                    $p=$Perns[$i][0].";".$Perns[$i][1].";".$Perns[$i][2]."\n";
                    fwrite($file,$p);
                    fclose($file);
                }
                
            }     
        }else{
            echo "<script>alert('saisez le champ  du nom pour supprimer.');</script>";
        }

    }


}
function Recuperer()
{
    $perse=[];
    $tb_per=[];
    $file=fopen('Personnes.txt',"r");
    $i=0;
    while(!feof($file))       
    {
        array_push($perse,fgets($file));
        array_push($tb_per,explode(';',$perse[$i]));
        $i++;
    }
    array_pop($tb_per);
    fclose($file);
    return $tb_per;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personne</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
       Saisez votre nom    : <input type="text"  name='nom'><br>
       Saisez votre prenom :<input type="text"  name='prenom'><br>
       Saisez votre age    :<input type="text"  name='age'><br>
       <input type="submit" name='ajouter'>
       <input type="submit" value="Afficher" name='afficher'>
       <input type="submit" value="supprimer" name="sup"><br><br>
       <textarea name="per"cols="20" rows="5"  readonly><?=$pers?></textarea>

    </form>
    <!-- value="<?=$nom?>"
value="<?=$prenom?>"
value="<?=$age?>" -->
</body>
</html>
