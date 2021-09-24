/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

//Partie Menu  --------------------------------------------------

( function() {
	const desktopBreakpoint = 1025;
	const siteNavigation = document.getElementById( 'site-navigation' );


	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = document.getElementById( 'menu-button' );

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	const menus = menu.getElementsByClassName('menu-item-has-children');
	const submenus = menu.getElementsByClassName('sub-menu');


	//Comportement du boutton pour l'ouverture du menu sur mobile
	button.addEventListener( 'click', function() {
		if (menu.classList.contains('open-menu')){
			button.classList.remove('toggled');
			menu.classList.remove( 'open-menu' );
			removeClassOpenMenuOfMenus(menus);
		} else {
			button.classList.add('toggled');
			menu.classList.add( 'open-menu' );
		}
	} );

	if (window.innerWidth < desktopBreakpoint){
		triggerMenuMobile(menus);
		addLiCloseAndTitle(submenus);
	}

	window.addEventListener('resize', function () {
		if (window.innerWidth < desktopBreakpoint){
			triggerMenuMobile(menus);
			addLiCloseAndTitle(submenus);
		}
	})

	//Comportement des menus sur mobile
	function triggerMenuMobile(menus) {

		[].slice.call(menus).forEach(function (menu) {

			menu.addEventListener( 'click', function(event) {
				event.stopPropagation();

				menu.childNodes[2].classList.add( 'open-menu' );
			});

		});
	}


	//fonction qui enlève la classe open-menu sur tout les sous menu
	function removeClassOpenMenuOfMenus(menus){
		[].slice.call(menus).forEach(function (menu) {
			menu.getElementsByTagName('ul')[0].classList.remove( 'open-menu' );
		});
	}

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			menu.classList.remove( 'open-menu' );
			button.classList.remove( 'toggled' );
			removeClassOpenMenuOfMenus(menus)
		}
	} );


	//	Ajout des li close et du titre sur les menus de deuxième et troisième niveau

	function addLiCloseAndTitle(submenus) {

		[].slice.call(submenus).forEach(function (submenu) {
			if (submenu.getElementsByClassName('li-close').length === 0) {
				let liClose = document.createElement('li');
				liClose.classList.add('material-icons', 'li-close');

				liClose.addEventListener('click', function (event) {
					event.stopPropagation();
					let parent = liClose.parentNode;
					parent.classList.remove('open-menu');
				})

				let liTitle = document.createElement('li');
				liTitle.classList.add('submenu-title');
				liTitle.innerText = submenu.parentNode.firstChild.textContent

				submenu.insertBefore(liTitle, submenu.firstChild);
				submenu.insertBefore(liClose, submenu.firstChild);
			}
		});
	}

	function removeLiCloseAndTitle(submenus) {

		[].slice.call(submenus).forEach(function (submenu) {
			if (submenu.getElementsByClassName('li-close').length > 0) {

				let liCloses = submenu.getElementsByClassName('li-close');
				[].slice.call(liCloses).forEach(function (liClose) {
					liClose.parentNode.removeChild(liClose);
				})
			}
			if (submenu.getElementsByClassName('submenu-title').length > 0){

				let liTitles = submenu.getElementsByClassName('submenu-title');
				[].slice.call(liTitles).forEach(function (liTitle) {
					liTitle.parentNode.removeChild(liTitle);
				})
			}
		});
	}

//	--------------------------------------------------------------------------------------
//	Partie Search

	const searchForm = document.getElementsByClassName('search-form')[0];
	const searchFormSubmitButton = searchForm.getElementsByClassName('search-submit')[0];
	const searchFormField = searchForm.getElementsByClassName('search-field')[0];
	const searchFormCloseButton = searchForm.getElementsByClassName('close-search-form')[0];
	const searchFormPusher = document.getElementsByClassName('search-form-pusher')[0];

	searchFormSubmitButton.addEventListener('click', function (event) {
		if (!searchForm.classList.contains('toggled')) {
			event.preventDefault();
			searchForm.classList.add('toggled');
			searchFormPusher.classList.add('push');
		} else if (searchForm.classList.contains('toggled') && searchFormField.value === ''){
			event.preventDefault();
			searchForm.classList.remove('toggled');
			searchFormPusher.classList.remove('push');
		}
	})

	searchFormCloseButton.addEventListener('click', function () {
		searchForm.classList.remove('toggled');
		searchFormPusher.classList.remove('push');
	})

//	Partie desktop
	const itemsNavbar = menu.children;

	//Si on est sur grand ecran déclenche le comportement du menu desktop
	if(window.innerWidth >= desktopBreakpoint){
		triggerMenuDesktop(itemsNavbar, menus, submenus);
	}

	window.addEventListener('resize', function () {
		if(window.innerWidth >= desktopBreakpoint){
			triggerMenuDesktop(itemsNavbar, menus, submenus);
		}
	})

		function triggerMenuDesktop(itemsNavbar, menus, submenus){

			[].slice.call(itemsNavbar).forEach(function (item) {

				removeLiCloseAndTitle( submenus );

				let clone = item.cloneNode(true);
				item.parentNode.replaceChild(clone, item);

				clone.addEventListener( 'click', function () {

					if (clone.children[1] === undefined ||
						clone.children[1].classList.contains('open-menu')){
						removeClassOpenMenuOfMenus(menus)
					} else {
						removeClassOpenMenuOfMenus(menus)
						clone.children[1].classList.add( 'open-menu' );
					}
				});
			});
		}

//	Partie Coordonnées & Horaires
	const topHoraireButton = document.getElementById('tophoraire-button');
	const topHoraireContainer = document.getElementById('tophoraire-text-container');

	topHoraireButton.addEventListener('click', function () {
		if (topHoraireContainer.classList.contains('open-menu')){
			topHoraireContainer.classList.remove('open-menu');
		} else {
			topHoraireContainer.classList.add('open-menu');
		}
	})

	document.addEventListener('click', function (event) {
		if (topHoraireContainer.contains(event.target) ||
			topHoraireButton.contains(event.target)){
		} else {
			topHoraireContainer.classList.remove('open-menu');
		}
	})





}() );
