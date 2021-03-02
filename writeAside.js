// var SCRIPT = SCRIPT || (function()
// {
// 	return {
// 		pass : function(args)
// 		{
// 			leagues = args;
// 		}
// 	};
// }());

function writeAside(loggedIn)
{
	if (loggedIn)
	{
		document.write('<aside>');
		document.write('	<ul class="asideNav">');
		/*for (var i = 0; i < leagues.length; i++)
		{
			document.write('		<li><a href="viewLeague.php">' + leagues[i] + '</a></li>');
		}*/
		document.write('		<li><a href="viewLeague.php">League 1</a></li>');
		document.write('		<li><a href="viewTable.php">Table</a></li>');
		document.write('		<li><a href="viewFixtures.php">Fixtures</a></li>');
		document.write('		<li><a href="viewResults.php">Results</a></li>');
		document.write('		<li><a href="createLeague.php">Create New League</a></li>');
		document.write('		<li><a href="joinLeague.php">Join League</a></li>');
		document.write('	</ul>');
		document.write('</aside>');
	}
}

// var leagues = {};
writeAside(true);