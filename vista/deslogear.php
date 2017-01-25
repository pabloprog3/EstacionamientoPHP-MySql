<?

if (isset($_COOKIE['perfil'])) 
{
	//unset($_COOKIE['perfil']);
	setcookie('perfil', 'perfil', time()-1000);
}

echo "deslogeado correctamente";


?>