<?php
			// echo "<br />";
			// // Obtém e/ou define o caminho para armazenamento da sessão atual
			// echo "A".session_save_path() . "<br>";
			// // Obtém e/ou define o id de sessão atual
			// echo "B".$sessid . "<br>";
			// // Pega o caminho que armazena a sessão e concatena com o id da session e ver se existe esse arquivo
			// echo "C";
			// echo (file_exists(session_save_path().'/sess_'.session_id()) ? 1 : 0);
			// echo "<br />";

			// echo "<br />";

			// mysqli_thread_id para PHP7
			// Lista os processos MySQL que retorno o usuario banco etc.
			// $result = mysql_list_processes($db);
			// while ($row = mysql_fetch_assoc($result)){
			// 	 printf("%s %s %s %s %s %s\n", $row["Id"], $row["User"], $row["Host"], $row["db"],
			// 					$row["Time"], $row["Command"]);
			// 	 if ($row["Time"] > $C_TempoExpiracao) {
			// 			printf(" [Exclu&iacute;do]");
			// 			$upd = "KILL " . $row["Id"];
			// 			$query_updt=mysql_query($upd);
			// 	 }
			// 	 print("<br>");
			// }

			// mysqli_free_result PHP7
			// Libera a memória associada ao resultado
			// mysql_free_result($result);

			// echo "<br />";

			// // mysqli_stat PHP7
			// // Obtem o status atual de sistema
			// $array = explode("  ", mysql_stat());
			// foreach ($array as $value){
			// 	 echo $value . "<br />";
			// }
			// echo "<br />";

			echo "
<span style='font-size= 0.8em'>
<p>
	 o   Uptime<br>
			 The number of seconds the MySQL server has been running.
</p>

<p>
	 o   Threads<br>
			 The number of active threads (clients).
</p>

<p>
	 o   Questions<br>
			 The number of questions (queries) from clients since the server was
			 started.
</p>

<p>
	 o   Slow queries<br>
			 The number of queries that have taken more than long_query_time
			 seconds. (MySQL DOSC 'The Slow Query Log' section).
</p>

<p>
	 o   Opens<br>
			 The number of tables the server has opened.
</p>

<p>
	 o   Flush tables<br>
			 The number of flush-*, refresh, and reload commands the server has
			 executed.
</p>

<p>
	 o   Open tables<br>
			 The number of tables that currently are open.
</p>
</span>
					 ";

 ?>