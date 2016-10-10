/*
 * Drop-down menu
 */
function showMenu()
{
	var toggle = document.getElementById('dropdown-toggle');
	toggle.classList.toggle('highlight');

	var menu = document.getElementById('dropdown-menu');
	menu.classList.toggle('show');
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
function showContent(id)
{
	var element = document.getElementById(id);
	element.classList.add('show');
}

function hideContent(id)
{
	var element = document.getElementById(id);
	element.classList.remove('show');
}
