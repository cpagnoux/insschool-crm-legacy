/*
 * Drop-down menu
 */
function showMenu()
{
	document.getElementById('dropdown-toggle').classList.toggle(
			'highlight');
	document.getElementById('dropdown-menu').classList.toggle('show');
}

window.onclick = function(event)
{
	if (!event.target.matches('.dropdown-toggle')) {
		var dropdownToggles = document.getElementsByClassName(
				'dropdown-toggle');
		var dropdowns = document.getElementsByClassName(
				'dropdown-menu');
		var i;

		for (i = 0; i < dropdownToggles.length; i++) {
			if (dropdownToggles[i].classList.contains('highlight'))
				dropdownToggles[i].classList.remove(
						'highlight');
		}

		for (i = 0; i < dropdowns.length; i++) {
			if (dropdowns[i].classList.contains('show'))
				dropdowns[i].classList.remove('show');
		}
	}
}

/*
 * Hidden content
 */
function showContent()
{
	document.getElementById('hidden-content').classList.add('show');
}

function hideContent()
{
	document.getElementById('hidden-content').classList.remove('show');
}
