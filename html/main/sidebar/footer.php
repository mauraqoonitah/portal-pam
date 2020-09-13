<?php
 $sidebar = getsidebar();
 $template_path = $config['baseurl'] . 'themes/pam/';
  $image = $config['baseurl'].'images/header/'; 
   ?>


 <div class="opener text-center">
        <span><a id="togg" href="#foo" onclick="toggle_visibility('foo');">hide footer</a></span>
    </div>

    <footer class="footer" id="foo">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="info1">
              <h4>Powerful Info</h4>
              <div class="addr">
                <p>Etiam non tellus facilisis, scelerisque est sed, aliquet metus. In arcu sapien, hendrerit eu lectus et, interdum fringilla urna. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a>.</p>
                <ul>
                  <li><i class="fa fa-map-marker"></i>450 Aenean ut sagittis 11220</li>
                  <li><i class="fa fa-mobile-phone"></i>010-020-0120</li>
                  <li><i class="fa fa-globe"></i><a rel="nofollow" href="http://www.example.com">www.example.com</a></li>
                  <li><i class="fa fa-envelope"></i>info@company.com</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info2">
              <h4>Flickr Feed</h4>
              <div class="row">
                <div class="col-xs-4">
                  <a href="#"><img class="img-responsive" alt="flickr" src="<?php echo $template_path;?>assets/images/feed/image1.jpg"></a>
                </div>
                <div class="col-xs-4">
                  <a href="#"><img class="img-responsive" alt="flickr" src="<?php echo $template_path;?>assets/images/feed/image2.jpg"></a>
                </div>
                <div class="col-xs-4">
                  <a href="#"><img class="img-responsive" alt="flickr" src="<?php echo $template_path;?>assets/images/feed/image3.jpg"></a>
                </div>
                <div class="col-xs-4">
                  <a href="#"><img class="img-responsive" alt="flickr" src="<?php echo $template_path;?>assets/images/feed/image4.jpg"></a>
                </div>
                <div class="col-xs-4">
                  <a href="#"><img class="img-responsive" alt="flickr" src="<?php echo $template_path;?>assets/images/feed/image5.jpg"></a>
                </div>
                <div class="col-xs-4">
                  <a href="#"><img class="img-responsive" alt="flickr" src="<?php echo $template_path;?>assets/images/feed/image6.jpg"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info3">
              <h4>Stay Tuned</h4>
              <p>You may sign up our monthly newsletter to receive updates or news from our team.</p>
              <form role="form">
                <div class="form-group">
                  <input type="email" class="form-control" id="email_newsletter" placeholder="Your Email">
                </div>
                <div><button type="button" class="btn btn-primary">Send</button></div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </footer>

      <div id="back-top" class="gotop text-center">
        <a href="">Back to top</a>
      </div>