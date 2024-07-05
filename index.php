<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <link rel="icon" href="cat-avatar.png">
</head>

<body>
    <br />
    <br />
    <div>
    <fieldset>
        <legend>
            <h1>Login</h1>
        </legend>

	<form autocomplete="off" action="dbconnect.php" method="post">
	
    <input type="text" name="servername" id="servername" placeholder="servername"/>
	<br/><br/>

    <input type="text" name="database" id="database" placeholder="database"/>
	<br/><br/>

	<input type="text" name="username" id="username" placeholder="username"/>
	<br/><br/>

	<input type="password" name="password" id="password" placeholder="password"/>
	<br/><br/>

	<input type="submit" name="login" value="Submit"/>

	</form>

    </fieldset>
    </div>
	<div>
	</div>
	<div class="footer">
        <hr />
		<footer>GNU General Public License v2.0</footer>
        <hr />
	</div>

</body>

</html>
