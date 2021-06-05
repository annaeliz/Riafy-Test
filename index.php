<HTML>
	<BODY>
		<CENTER>
		<H1>Login</H1>
		<?php
		if(isset($_GET['msg']))
			$msg = $_GET['msg'];
		else
			$msg = 0;

		switch ($msg) {
			case 0:
				$message = "Please Login Here.";
				$border_col = "#999";
				$bg_col     = "#EEE";
				break;
			
			case 1:
				$message = "You Must Login First.";
				$border_col = "#F00";
				$bg_col     = "#FEE";
				break;
			
			case 2:
				$message = "Invalid Username/Password";
				$border_col = "#F00";
				$bg_col     = "#FEE";
				break;
			
			case 3:
				$message = "Logout Successful";
				$border_col = "#0F0";
				$bg_col     = "#EFE";
				break;

			case 4:
				$message="Username and Password are both required";
				$border_col = "#F00";
				$bg_col     = "#FEE";
				break;
			
			case 5:
				$message="Registration Successful. You may login now.";
				$border_col = "#0F0";
				$bg_col     = "#EFE";
				break;
			
			default:
				# code...
				break;
		}

		print "<DIV STYLE = \"border: 1px solid $border_col; background: $bg_col; padding: 10px; margin: 20px;\">$message</DIV>";
		?>

		<FORM METHOD = "POST" ACTION = "verify.php">
		<TABLE>
			<TR>
				<TD>Username</TD>
				<TD><INPUT TYPE = "TEXT" NAME = "username" required></TD>
			</TR>
			<TR>
				<TD>Password</TD>
				<TD><INPUT TYPE = "PASSWORD" NAME = "password" required></TD>
			</TR>
			<TR>
				<TD></TD>
				<TD><INPUT TYPE = "SUBMIT" VALUE = " Login "></TD>
			</TR>
		</TABLE>
		</FORM>

		<A HREF = "resgister.php">Register</A>
		<CENTER> 
	</BODY>
</HTML>
