<?php 
	require __DIR__ . '/php/calendar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<title>Calendrier</title>
</head>
<body>
	<h1 class="title">Calendrier PHP</h1>
	<div class="container">
		<div class="calendar">
			<h3>Selectionez une date:</h3>
			<form action="index.php" method="post">
				<label for="month">Mois</label>
				<select class="styleForm" name="month" id="month">
					<?php foreach ($month as $key => $value): ?>
						<option value="<?= $key; ?>"><?= $value; ?></option>
					<?php endforeach; ?>
				</select>
				<label for="year">Année</label>
				<select class="styleForm" name="year" id="year">
					<option value="0"></option>
					<?php for ($year = 2017; $year >= 1970; $year--) { ?>
						<option value="<?= $year; ?>"><?= $year; ?></option>
					<?php } ?>
				</select>
				<input class="styleForm" type="submit">
			</form>
		<h2 class="date"><?= $_POST['month']." ".$_POST['year']; ?></h2>
		</div>
		<div class="calendar">
			<table>
				<thead>
					<tr>
						<?php foreach ($day as $value): ?>
							<td class="coloneHead"><?= $value; ?></td>					
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<?= calendar(); ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>