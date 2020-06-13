    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>DotEightInc. A tech hub dedicated towards building online campus solutions</p>
              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Quick Link</h2>
                <ul class="list-unstyled">
                  <li><a href="./about">About Us</a></li>
                  <li><a href="./careers">careers</a></li>
                  <li><a href="./product">Products</a></li>
                  <li><a href="./covid-19">COVID-19</a></li>
                  <li><a href="./contact">Contact Us</a></li>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-4 ml-auto">

            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form action="#" method="post" name="myForm" onsubmit="return validateForm()" class="footer-suscribe-form">
                <div class="input-group mb-3">
                  <input type="email" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2" required>
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="submit" id="button-addon2">Subscribe</button>
                  </div>
                </div>
            </div>


            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a target="_blank" href="https://web.facebook.com/DotEightInc/" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
            <a target="_blank" href="https://twitter.com/doteight" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a target="_blank" href="https://github.com/DotEightInc" class="pl-3 pr-3"><span class="icon-github"></span></a>
            <a target="_blank" href="https://linkedin.com/company/DotEightInc" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            Copyright &copy; DotEightInc <script>document.write(new Date().getFullYear());</script> 
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
 <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: #ff5533; color: white;" class="modal-content">
                <div class="modal-body">
                    <div id="msg" class="text-center"></div>
                </div>
            </div>
        </div>
    </div> 

     <!-- Modal -->
    <div class="modal fade" style="z-index: 1999px;" id="exampleModal">
        <div class="modal-dialog modal-xl modal-dialog-centered" style="z-index: 1999px;" role="document">
            <div style="background: #1c2d37; color: white" class="modal-content">
               <div class="modal-header">
        <button style="color: white" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
                <div style="z-index: 1999px;" class="modal-body">
        
    
        <div class="row justify-content-center text-center mb-5 section-2-title">
        </div>
        <div class="row align-items-stretch">

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100">
              <a href="#">
                <img src="images/ola.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                <span class="meta">COVID-19</span>
                <h2>Learn Basic Website Design</h2><br/>
                <a href="./covid-19"><p align="center" style="color: red"> Enroll for the course</p></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100">
              <a href="#">
                <img src="images/chh.jpg"  alt="Image"
                 class="img-fluid">
              </a>
             <div class="post-entry-1-contents">
                <span class="meta">COVID-19</span>
                <h2>Learn Chatbots Development</h2><br/>
                <a href="./covid-19"><p align="center" style="color: red"> Enroll for the course</p></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100">
              <a href="#">
                <img src="images/pay.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                <span class="meta">COVID-19</span>
                <h2>Setting a Payment Gateway</h2><br/>
                <a href="./covid-19"><p align="center" style="color: red"> Enroll for the course</p></a>
              </div>
            </div>
          </div>

        </div>
      </div>
  
                </div>
               
            </div>
        </div>

    
     <script>
  if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('service-worker.js')
      .then(function(reg){
        console.log("Yes, it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
  }
</script>
<script src="service-worker.js">
        // Service worker for Progressive Web App
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js', {
            scope: '.' // THIS IS REQUIRED FOR RUNNING A PROGRESSIVE WEB APP FROM A NON_ROOT PATH
        }).then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
        });
    }
</script>
<script>
  var div = document.createElement('div');
  div.className = 'fb-customerchat';
  div.setAttribute('page_id', '106178324462388');
  div.setAttribute('ref', '');
  document.body.appendChild(div);
  window.fbMessengerPlugins = window.fbMessengerPlugins || {
    init: function () {
      FB.init({
        appId            : '1678638095724206',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v3.3'
      });
    }, callable: []
  };
  window.fbAsyncInit = window.fbAsyncInit || function () {
    window.fbMessengerPlugins.callable.forEach(function (item) { item(); });
    window.fbMessengerPlugins.init();
  };
  setTimeout(function () {
    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) { return; }
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  }, 0);
</script>