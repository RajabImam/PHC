<?php include 'includes/header.php'; ?>
<?php include 'includes/navigation.php'; ?>

<div class="container">
           <h3 class="text-primary">Welcome to Rajab Calendar 2017 - Database Application Development - Mr. Daniel Moune</h3>
            <hr>

<div class="col-lg-12">

<div class="col-lg-6">
<?php
//echo "Welcome to Raj Calender 2017";
$month=date('n');
$year=date('Y');
$day=date('d');
$months=array('January','February','March','April','May','June','July','August','September','October','November','December');

echo '<table border=0 width=550>';
echo '<th colspan=4 align=center style="font-family:Verdana; font-size:18pt; color:#3399FF;">'.$year.' - ICT University Cameroon</th>';

for ($reihe=1; $reihe<=3; $reihe++) {
	echo '<tr>';
	for ($spalte=1; $spalte<=4; $spalte++) {
		$this_month=($reihe-1)*4+$spalte;
		$erster=date('w',mktime(0,0,0,$this_month,1,$year));
		$insgesamt=date('t',mktime(0,0,0,$this_month,1,$year));
		if ($erster==0) $erster=7;
		echo '<td width="25%" valign=top>';
		echo '<table border=0 align=center style="font-size:8pt; font-family:Verdana">';
		echo '<th colspan=7 align=center style="font-size:12pt; font-family:Arial; color:#0099CC;">'.$months[$this_month-1].'</th>';
		echo '<tr><td style="color:#666666"><b>Mo</b></td><td style="color:#666666"><b>Tu</b></td>';
		echo '<td style="color:#666666"><b>We</b></td><td style="color:#666666"><b>Th</b></td>';
		echo '<td style="color:#666666"><b>Fr</b></td><td style="color:#0000cc"><b>Sa</b></td>';
		echo '<td style="color:#cc0000"><b>Su</b></td></tr>';
		echo '<tr><br>';
		$i=1;
		while ($i<$erster) {
			echo '<td> </td>';
			$i++;
		}
		$i=1;
		while ($i<=$insgesamt) {
			$rest=($i+$erster-1)%7;
			if (($i==$day) && ($this_month==$month)) {
				echo '<td style="font-size:8pt; font-family:Verdana; background:#ff0000;" align=center>';
			} else {
				echo '<td style="font-size:8pt; font-family:Verdana" align=center>';
			}
			if (($i==$day) && ($this_month==$month)) {
				echo '<span style="color:#ffffff;">'.$i.'</span>';
			}	else if ($rest==6) {
				echo '<span style="color:#0000cc">'.$i.'</span>';
			} else if ($rest==0) {
				echo '<span style="color:#cc0000">'.$i.'</span>';
			} else {
				echo $i;
			}
			echo "</td>\n";
			if ($rest==0) echo "</tr>\n<tr>\n";
			$i++;
		}
		echo '</tr>';
		echo '</table>';
		echo '</td>';
	}
	echo '</tr>';
}

echo '</table>';
?> 
</div>

<?php include 'includes/dashboard.php'; ?>
</div>
</div>
<?php include 'includes/footer.php'; ?>