<?php
session_start();
?>
<HTML>
	<BODY>
		<CENTER>
		<H1>Register</H1>
		
		<?php
		if(isset($_GET['msg']))
			$msg = $_GET['msg'];
		else
			$msg = 0;

		switch ($msg) {
			case 0:
				$message = "Please Register Here.";
				$border_col = "#999";
				$bg_col     = "#EEE";
				break;
			
			case 1:
				$message = "Passwords Dont Match.";
				$border_col = "#F00";
				$bg_col     = "#FEE";
				break;
			
			case 2:
				$message = "Username already Taken! Try Something Else.";
				$border_col = "#F00";
				$bg_col     = "#FEE";
				break;
			
			case 3:
				$message = "Email ID is already Taken, Try Another or Login";
				$border_col = "#0F0";
				$bg_col     = "#EFE";
				break;

			case 4:
				$message="xxx";
				$border_col = "#F00";
				$bg_col     = "#FEE";
				break;
			
			default:
				# code...
				break;
		}

		print "<DIV STYLE = \"border: 1px solid $border_col; background: $bg_col; padding: 10px; margin: 20px;\">$message</DIV>";
		?>
		<FORM METHOD = "POST" ACTION = "register_response.php">
		<TABLE>
			<TR>
				<TD>Full Name</TD>
				<TD><INPUT TYPE = "TEXT" NAME = "fullname" required VALUE = "<?php 
if( isset($_SESSION['saved_form']) ) { print $_SESSION['saved_form']['fullname']; }
?>"></TD>
			</TR>
			<TR>
				<TD>Email</TD>
				<TD><INPUT TYPE = "TEXT" NAME = "email" required VALUE = "<?php 
if( isset($_SESSION['saved_form']) ) { print $_SESSION['saved_form']['email']; }
?>"></TD>
			</TR>
			<TR>
				<TD>Username</TD>
				<TD><INPUT TYPE = "TEXT" NAME = "username" required VALUE = "<?php 
if( isset($_SESSION['saved_form']) ) { print $_SESSION['saved_form']['username']; }
?>"></TD>
			</TR>
			<TR>
				<TD>Password</TD>
				<TD><INPUT TYPE = "PASSWORD" NAME = "password" required VALUE = "<?php 
if( isset($_SESSION['saved_form']) ) { print $_SESSION['saved_form']['password']; }
?>"></TD>
			</TR>
			<TR>
				<TD>Confirm Password</TD>
				<TD><INPUT TYPE = "PASSWORD" NAME = "password2" required VALUE = "<?php 
if( isset($_SESSION['saved_form']) ) { print $_SESSION['saved_form']['password2']; }
?>"></TD>
			</TR>
			<TR>
				<TD></TD>
				<TD><INPUT TYPE = "SUBMIT" VALUE = " Register "></TD>
			</TR>
		</TABLE>
		</FORM>

		<A HREF = "index.php">Login</A>
		<CENTER> 
	</BODY>
</HTML>
<?php
unset($_SESSION['saved_form']);
?>