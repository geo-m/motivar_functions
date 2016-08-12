(function($) {
  "use strict";
  $(document).ready(function() {
    $(window).resize(function() {
      myresize();
    });

if ($('.onlyone').length>0)
	{
		$('.onlyone').on('click',function()
		{
			var idd=$(this).attr('id');
			if ($(this).is(":checked"))
			{
			$('.onlyone').each(function()
				{
				if ($(this).attr('id')!=idd)
					{
					$(this).attr('checked', false);
					}
				});
			}
		});
	}


  });

  function myresize() {

  }

   })(jQuery);
