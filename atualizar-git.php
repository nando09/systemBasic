<?php
	
	// Diretorio dos repositorios
	$repo_path = '/Users/angelitogoulart/Sites/';

	// Lista de repositorios a serem atualizados
	$repo_list = array('repo1', 'repo2', 'repo3');

	// Percorre os repositorios
	foreach ($repo_list as $repo)
	{

		// Entra no diretorio que deve ser executado o git pull
		chdir($repo_path . $repo);

		// Executa o git pull. Altere a URL com os dados do seu usuario/repositorio
		echo '<pre>' . shell_exec('git pull https://usuario:senha@bitbucket.org/usuario/repositorio.git') . '</pre>';

	}

?>