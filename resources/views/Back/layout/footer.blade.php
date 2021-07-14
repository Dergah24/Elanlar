
  <!-- Footer -->
  <footer class="site-footer"> 
    {{-- @jquery
@toastr_js
@toastr_render --}}

    <div class="site-footer-legal">© {{ date('Y') }} <a href="https://jedai.az/az">{{ config('app.name') }}</a></div>
    <div class="site-footer-right">
      Crafted with <i class="red-600 wb wb-heart"></i> by <a href="https://jedai.az/az">JedaAi</a>
    </div>
  </footer>
  <!-- Core  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('Back/global/vendor/babel-external-helpers/babel-external-helpers599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/jquery/jquery.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/popper-js/umd/popper.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/bootstrap/bootstrap.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/animsition/animsition.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/mousewheel/jquery.mousewheel599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/asscrollbar/jquery-asScrollbar.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/asscrollable/jquery-asScrollable.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js') }}"></script>

  <!-- Plugins -->
  <script src="{{ asset('Back/global/vendor/switchery/switchery.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/intro-js/intro.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/screenfull/screenfull599c.js') }}"></script>
  <script src="{{ asset('Back/global/vendor/slidepanel/jquery-slidePanel.min599c.js') }}"></script>

  <!-- Scripts -->
  <script src="{{ asset('Back/global/js/Component.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/js/Plugin.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/js/Base.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/js/Config.min599c.js') }}"></script>

  <script src="{{ asset('Back/base/assets/js/Section/Menubar.min599c.js') }}"></script>
  <script src="{{ asset('Back/base/assets/js/Section/GridMenu.min599c.js') }}"></script>
  <script src="{{ asset('Back/base/assets/js/Section/Sidebar.min599c.js') }}"></script>
  <script src="{{ asset('Back/base/assets/js/Section/PageAside.min599c.js') }}"></script>
  <script src="{{ asset('Back/base/assets/js/Plugin/menu.min599c.js') }}"></script>

  <!-- Config -->
  <script src="{{ asset('Back/global/js/config/colors.min599c.js') }} "></script>
  <script src="{{ asset('Back/base/assets/js/config/tour.min599c.js') }}"></script>
  <script>
    Config.set('assets', 'base/assets');
  </script>

  <!-- Page -->
  <script src="{{ asset('Back/base/assets/js/Site.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/js/Plugin/asscrollable.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/js/Plugin/slidepanel.min599c.js') }}"></script>
  <script src="{{ asset('Back/global/js/Plugin/switchery.min599c.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"   > </script>

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>



</body>


</html>
