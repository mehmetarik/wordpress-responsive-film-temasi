<script type="text/javascript">
		/*
		* Author: Ryan Sutana
		* Author URI: http://www.sutanaryan.com/
		* Description: This snippet add more site functionality.
		*/

		var _rys = jQuery.noConflict();
		_rys("document").ready(function(){
		
			_rys(window).scroll(function () {
				if (_rys(this).scrollTop() > 1) {
					_rys('#topnavbar').addClass("f-nav");
				} else {
					_rys('#topnavbar').removeClass("f-nav");
				}
			});

		});
			</script>
			<script type="text/javascript">
		/*
		* Author: Ryan Sutana
		* Author URI: http://www.sutanaryan.com/
		* Description: This snippet add more site functionality.
		*/

		var _rys = jQuery.noConflict();
		_rys("document").ready(function(){
		
			_rys(window).scroll(function () {
				if (_rys(this).scrollTop() > 1) {
					_rys('.ustnav').addClass("f-nav2");
				} else {
					_rys('.ustnav').removeClass("f-nav2");
				}
			});

		});
			</script>