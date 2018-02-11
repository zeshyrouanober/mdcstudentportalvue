<template lang="html">
  <div class="help-container">
    <div class="header-container  white z-depth-1">
      <label class="blue-text">My pleasure to help you dear</label>
      <div class="row">
        <div id="sticky-anchor"></div>
        <div class="col hide-on-small-only m3 l2 white z-depth-1" id="sticky">
          <ul class="section table-of-contents">
            <li class="customized"><a href="#system-header">Portal Overview</a></li>
            <li class="customized"><a href="#system-content">Portal Faqs</a></li>
            <li class="customized"><a href="#system-tips">Portal Tips</a></li>
            <li class="customized"><a href="#school-header">The college seal</a></li>
            <li class="customized"><a href="#school-content">School Faqs</a></li>
          </ul>
        </div>
      </div>
    </div><br><br><br>

    <div class="help-content-container white">
      <div class="help-content">
        
      </div>
    </div>


  </div>
</template>

<script>

$(function () // on document.ready()
{
    if ($('.help-container').length > 0)
    {
      function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var div_top = $('#sticky-anchor').offset().top;
        if (window_top > div_top) {
            $('#sticky').addClass('stick');
        } else {
            $('#sticky').removeClass('stick');
        }
      }

      $(function() {
        $(window).scroll(sticky_relocate);
        sticky_relocate();
      });

    }
});


export default {
}
</script>
