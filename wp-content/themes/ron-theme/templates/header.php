<div class="body-wrap">
<header class="banner">
  <div class="container">
    <div class="content">

      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
        <span>Ron Pasillas</span>
        <span><?php echo get_bloginfo('description'); ?></span>   
      </a>

      <span class="nav-trigger trigger-open" role="button">Open Navigation</span>
     

      <div class="navs">
        <span class="nav-trigger trigger-close" role="button">Close Navigation</span>

        <nav class="nav-primary">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
          endif;
          ?>
        </nav>

        <div class="nav-secondary">
          <ul>
            <li><a href="https://github.com/rpasillas" target="_blank"><svg version="1.1" id="github-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="36.385px" viewBox="0 0 35 36.385" enable-background="new 0 0 35 36.385" xml:space="preserve">
<path fill-rule="evenodd" clip-rule="evenodd" fill="#191717" d="M17.499,1.128c-9.662,0-17.496,7.833-17.496,17.498
  c0,7.729,5.014,14.287,11.967,16.601c0.875,0.161,1.195-0.379,1.195-0.843c0-0.416-0.016-1.516-0.025-2.976
  c-4.865,1.058-5.893-2.347-5.893-2.347c-0.795-2.021-1.943-2.559-1.943-2.559c-1.588-1.086,0.119-1.063,0.119-1.063
  c1.756,0.124,2.682,1.803,2.682,1.803c1.561,2.674,4.096,1.902,5.092,1.454c0.158-1.131,0.609-1.902,1.111-2.339
  c-3.887-0.441-7.971-1.943-7.971-8.647c0-1.91,0.682-3.473,1.801-4.695c-0.18-0.442-0.779-2.222,0.172-4.631
  c0,0,1.469-0.47,4.811,1.795c1.396-0.389,2.893-0.584,4.381-0.59c1.486,0.006,2.982,0.201,4.379,0.59
  c3.342-2.265,4.809-1.795,4.809-1.795c0.955,2.409,0.354,4.188,0.174,4.631c1.121,1.223,1.799,2.785,1.799,4.695
  c0,6.722-4.09,8.2-7.988,8.634c0.627,0.539,1.188,1.607,1.188,3.24c0,2.339-0.021,4.226-0.021,4.8c0,0.468,0.314,1.012,1.203,0.841
  c6.945-2.317,11.955-8.872,11.955-16.599C34.997,8.961,27.163,1.128,17.499,1.128z"></path>
</svg></a></li>
            <li><a href="http://www.linkedin.com/pub/ron-pasillas/22/8a6/660/" target="_blank"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
<path fill="#1387C8" d="M17.5,1.25c-9.395,0-17.008,7.615-17.008,17.008c0,9.393,7.613,17.008,17.008,17.008
  s17.008-7.615,17.008-17.008C34.508,8.865,26.895,1.25,17.5,1.25z M12.74,25.371H9.424V14.762h3.316V25.371z M10.997,13.435h-0.024
  c-1.199,0-1.977-0.811-1.977-1.838c0-1.048,0.801-1.842,2.024-1.842c1.223,0,1.976,0.792,1.999,1.839
  C13.02,12.621,12.243,13.435,10.997,13.435z M26.004,25.371h-3.76v-5.49c0-1.438-0.588-2.417-1.881-2.417
  c-0.989,0-1.539,0.662-1.795,1.3c-0.096,0.229-0.081,0.547-0.081,0.867v5.74h-3.724c0,0,0.048-9.725,0-10.609h3.724v1.665
  c0.22-0.728,1.409-1.767,3.31-1.767c2.355,0,4.207,1.526,4.207,4.812V25.371z"></path>
</svg></a></li>
            <li><a href="https://twitter.com/rpasillas" target="_blank"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
<path fill="#66CBEE" d="M17.354,1.25c-9.393,0-17.008,7.615-17.008,17.008c0,9.394,7.615,17.008,17.008,17.008
  c9.394,0,17.008-7.614,17.008-17.008C34.362,8.865,26.748,1.25,17.354,1.25z M24.144,15.612c0.007,0.149,0.01,0.3,0.01,0.452
  c0,4.62-3.515,9.945-9.945,9.945c-1.973,0-3.811-0.579-5.357-1.569c0.273,0.032,0.552,0.048,0.834,0.048
  c1.637,0,3.145-0.559,4.341-1.497c-1.53-0.026-2.82-1.037-3.265-2.426c0.213,0.041,0.432,0.062,0.657,0.062
  c0.319,0,0.628-0.041,0.921-0.123c-1.6-0.32-2.805-1.733-2.805-3.428v-0.043c0.473,0.26,1.012,0.419,1.584,0.437
  c-0.938-0.627-1.555-1.698-1.555-2.909c0-0.641,0.172-1.241,0.473-1.759c1.726,2.116,4.301,3.506,7.205,3.652
  c-0.061-0.255-0.09-0.521-0.09-0.796c0-1.93,1.564-3.495,3.494-3.495c1.006,0,1.915,0.424,2.551,1.104
  c0.798-0.156,1.545-0.447,2.221-0.847c-0.26,0.816-0.814,1.5-1.537,1.933c0.707-0.084,1.381-0.272,2.008-0.55
  C25.421,14.503,24.827,15.119,24.144,15.612z"></path>
</svg></a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</header>
