<?php
require_once('include/menu.php');
entete();
menu();
?>
<FORM action="VerifId.php" method=POST>
<table border=0 height=100% align=center>
<tr height=100% valign="middle">
<td valign=top><img src='images/nuts.png' ></td>
<td>
	<table align=center>
	<tr>
	<td><?php echo $IDENTIFIANT;?></td>
	</tr>
	<tr>
        <td><input type=text Name="Login" placeholder="Login"   required size="60"></td>
        </tr>
	<tr>
      <td><?php echo $MOTDEPASSE;?></td>
        </tr>
	 <tr>
        <td><input type=password Name="Password" placeholder="Password" required size="60"></td>
        </tr>
	 <tr>
        <td><input type="submit" width=30 class='bouton_auth'></td>
        </tr>
	</table>
</td>
</tr>
</table>
	</form>
	<table height=100% width=100% align=center valign=center>
			<tr valign=center width=600>
				<td valign=center width=600><img src='/images/menu/datalake.png' width=600></td>
			</tr>
			<tr valign=center width=600>
				<td valign=center width=600>Cette partie est réservée à la communauté Nuts <br>Souhaitez-vous participer au BeMa DataLake Digital Ecologist ?<br> ping @ be-ma.fr</td>
			</tr>
	</table>
<?php footer();?>
