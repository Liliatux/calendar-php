<?php 
	$month = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	$day = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
	

	
	function calendar () {
		$dayInMonth = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);
	
		//Augmenter les jours jusqu'à la fin du mois
		for ($i = 1; $i <= $dayInMonth; $i++) {
			$week = cal_to_jd(CAL_GREGORIAN, $_POST['month'], $i, $_POST['year']);
			$dayWeek = JDDayOfWeek($week); 

			//Quand le mois commence:
			if ($i === 1){
				//Changer le dimanche en 7 pour qu'il soit en fin de semaine
				if ($dayWeek === 0):
					$dayWeek = 7;
				//Quand c'est le premier jour de la semaine (lundi), ouvrir une ligne
				elseif ($dayWeek === 1):
					echo "<tr>";
				//Quand c'est la fin de semaine (dimanche), fermer la ligne
				elseif ($dayWeek === 7):
					echo "</tr>";
				endif;

				//Pour les jours qui ne sont pas présents dans la semaine, laisser vide
				for ($k = 1; $k != $dayWeek; $k++){
					echo "<td></td>";
				}
				
				//Pour les autres jours de la semaine, faire des colones
				echo "<td class='coloneBody'>$i</td>";
			}
			
			//Pour les autres jours du mois
			else {
				//Changer le dimanche en 7 pour qu'il soit en fin de semaine
				if ($dayWeek === 0):
					$dayWeek = 7;
				//Quand c'est le premier jour de la semaine (lundi), ouvrir une ligne
				elseif ($dayWeek === 1):
					echo "<tr>";
				//Quand c'est la fin de semaine (dimanche), fermer la ligne
				elseif ($dayWeek === 7):
					echo "</tr>";
				endif;

				//Pour les autres jours de la semaine, faire des colones
				echo "<td class='coloneBody'>$i</td>";	
			}
		}
	}

?>