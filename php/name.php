<!DOCTYPE html>
<html>
<style>
/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
	<head>
	<title>f4 Demo</title>
	<nav class="nav">
	<span id="messageAlert"><?php echo $message; ?></span>
	<ul>
		<h2>Simple App</h2>
		<div class="tab">
		  <button class="tablinks" onclick="openTab(event, 'nameDiv')">Insert</button>
		  <button class="tablinks" onclick="openTab(event, 'searchDiv')">Search</button>
		   <button class="tablinks" onclick="openTab(event, 'displayDiv')">Display</button>
		</div>
		<div id="nameDiv" class="tabcontent">
		<form method="post">
			Name: <br>
			<input type="text" name="name" placeholder="Enter real name" required/><br />
			Gamer Name: <br>
			<input type="text" name="gameName" placeholder="Enter gamer name" required/><br />
			<input type="submit" name="submit" value="Submit" />
		</form>
		</div>
	</ul>
	</nav>
</html>
