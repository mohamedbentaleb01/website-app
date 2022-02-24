<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>{{ config('app.name', 'laravel')}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <!-- icons for social media -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/social/social-circles.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- vueJs integration -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- adding swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>
  </head>

  <body>
    {{-- navmenu --}}
    <x-navmenu></x-navmenu>
    
    {{-- slider --}}
    <x-slider></x-slider>
    <!-- partie evenements -->
    <x-event-section></x-event-section>

  <!-- fin partie evenements -->
    <x-cotisation-section></x-cotisation-section>
  <!-- qui somme nous -->
    <div class="us">
      <hr style="color: #082c3e;">
        <h1 align="center" class="titleus text-4xl" data-aos="fade-down-right" data-aos-duration="1400">Qui somme-nous ?</h1>
        <!-- video  -->
        <div class="video-container" data-aos="flip-up" data-aos-duration="1660">
          <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/-Vv303sK3WA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
          </iframe>
        </div>
        <hr style="color:grey">
        <!-- end video  -->
    </div>
  <!-- fin partie qui somme nous -->
  <!-- partie membres -->
    <x-membres></x-membres>
  <!-- become member -->
    <x-member-form></x-member-form>
  <!-- social media icons part -->
    <x-followicons></x-followicons>
  <!-- social media icons end part -->

    <x-footer></x-footer>

    <a href="#" class="to-top">
      <span class="material-icons">
      expand_less
      </span>
    </a>
    
    <script src="{{ asset('js/app.js') }}"></script>   
      <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
      <script>
        AOS.init();
      </script>


    <script>
    
    function openNav() {
        document.getElementById("mySidebar").style.width= "400px";
        document.getElementById("main").style.marginLeft = "400px";
      }
      
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }

    </script>
    <!-- swiper JS -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 2000,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
    </script>
  </body>
  
</html>