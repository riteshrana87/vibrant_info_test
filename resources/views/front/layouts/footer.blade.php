  <!-- Start Footer Area -->
  <footer class="footer section">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-about">
                                <div class="logo">

                                    <a href="{{url('/front/dashboard')}}">
                                        <img src="{{ asset('front/images/logo/Logo.jpg') }}" alt="#">
                                    </a>
                                </div>
                                <!-- <p> Terms of Use, Privacy Policy, Cookies Policy and Acceptable Use Policy.</p> -->
                                <p class="copyright-text">Create My Contract is not a law firm and cannot provide legal advice.</p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Solutions</h3>
                                
                                <ul>
                                        <li><a href="">Terms and conditions</a></li>
                                        <li><a href="">Privacy policy</a></li>
                                        <li><a href="">Acceptable use policy</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Support</h3>
                                <ul>
                                    
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                        
                            <!-- End Single Widget -->
                        </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('front/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/wow.min.js') }}"></script>
    <!-- <script src="{{ asset('front/js/tiny-slider.js') }}"></script> -->
    <script src="{{ asset('front/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/js/count-up.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/js/my-custom.js') }}"></script>
    <script src="{{ asset('front/js/jquery.validate.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    
    <script src="{{ asset('front/js/sweetalert.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    
    <script type="text/javascript">
        var baseurl = <?php echo "'".url('/')."';"; ?>;
        var csrf_token = <?php echo "'".csrf_token()."';"; ?>
</script>
    @yield("js_section")
    <?php
/*
  @Author : Ritesh Rana
  @Desc   : Used for the custom js initilization just pass array of the scripts with links
  @Input  :
  @Output :
  @Date   : 15/05/2021
 */
if (isset($footerJs) && count($footerJs) > 0) {
foreach ($footerJs as $js) {?>
<script src="{{ asset($js) }}" ></script>
<?php }
} ?>
    











