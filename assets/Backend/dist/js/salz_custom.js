
function initSidebarMenu(){
	/*** add active class and stay opened when selected ***/
	var url = window.location;

	// for sidebar menu entirely but not cover treeview
	$('ul.nav-sidebar a').filter(function() {
		if (this.href) {
			return this.href == url || url.href.indexOf(this.href) == 0;
		}
	}).addClass('active');

	// for the treeview
	$('ul.nav-treeview a').filter(function() {
		if (this.href) {
			return this.href == url || url.href.indexOf(this.href) == 0;
		}
	}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
}


function setBreadcrumb() {
	var url = window.location;
	//location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
	var currentItem = $(".items").find("[href$='" + url + "']");
	var path = "Home";
	$(currentItem.parents("li").get().reverse()).each(function () {
		path += "/" + $(this).children("a").text();
	});
	$(".breadcrumb").html(path);
}

function initbreadCrumb() {

	var navClass = '.nav-sidebar';
	var sidebarClass = '.sidebar-menu';
	var menuClass = '';

	if ($(navClass).length != 0) {
		menuClass = navClass;
	} else {
		menuClass = sidebarClass;
	}

	$(menuClass + ' li a').filter(function (e) {

		var $this = $(this);
		// console.log($this);

		// var icon_val = $($this[0]).find('i').attr('class');
		// var icon_html = $($this[0]).find('i')[0];
		// console.log(icon_val);
		// console.log(icon_html);
		var judultxt = $this[0].textContent.trim();
		// var icon_txt = '<i class="'+icon_val+'"></i>';
		// console.log(icon_txt);
		if ($this[0].attributes[1] !== undefined) {
			$('.breadcrumb').html('');
			$('.content-header h1').html('');
			$bc = $('.breadcrumb-item');
			$hd = $('.content-header h1');
			// $bc = $('<div class="item"></div>');
			// $bc = $('<ol class="breadcrumb"></ol>');
			// if(judultxt == 'Dashboard'){
			//   // $bc.prepend('<li><a href="#"><i class="fa fa-dashboard"> Dashboard</i></a></li>');
			//   $bc.prepend('<li><a href="#"><i class="fa fa-dashboard"> Dashboard</i></a></li>');
			//   $hd.prepend('' + judultxt + ' ');
			// }else{
			$this.parents('li').each(function (n, li) {
				var $a = $(li).children('a').clone(true).off();
				// var $a = $(li).children('a').clone();
				var judul = $a[0].textContent.trim();
				var icon_html = $($a[0]).find('i')[0];
				var icon_val = $($a[0]).find('i').attr('class');
				var icon_txt = '<i class="' + icon_val + '"></i> ';
				// console.log(icon_html);
				if ($a[0].attributes[1] !== undefined) {
					var z = '<li class="active">' + icon_txt + judul + '</li>';
					$(li).addClass('active');
				} else {
					var z = '<li>' + icon_txt + judul + '</li>';
				}
				// console.log($a[0].attributes[1]);
				$bc.prepend(z);
				$hd.prepend('' + judul + ' - ');
				// $bc.prepend(' / ', z);
				// $bc.prepend(' / ', $a);
				// $('.content-header h1').text(judul);
			});
			// $bc.prepend('<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>');
			// }
			// var txt = $bc.prepend('<li><a href="#"><i class="fa fa-dashboard"> Dashboard</i></a></li>');
			// $('.breadcrumb').html( txt );
			// console.log(txt[0].children);
		}
		return false;


		// return this.data_menu == menu_callback;
	});

	// breadcrumb
	// $(menuClass).on('click', 'a', function() {});

	// $('.sidebar-menu').on('click', 'a', function(){
	//   var $this = $(this);
	//   // $('.sidebar-menu').find('.active').removeClass('active');
	//   if($('.sidebar-menu').find('.menu-open').length > 0){
	//     $('.sidebar-menu').find('.menu-open').removeClass('menu-open');
	//     // $this.parents('li').removeClass('menu-open');
	//   }else{
	//     // $('.sidebar-menu').find('.menu-close').removeClass('menu-close').addClass('menu-open').addClass('active');
	//     $this.parents('li').addClass('menu-open').addClass('active');
	//   }
	//   // $this.parents('li').addClass('menu-open').addClass('active');
	// });
}

$(function(){
	initSidebarMenu();
});
