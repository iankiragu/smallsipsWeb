<footer class="footer">
    <div class="footer__inner">
        <div class="container">
            @yield('footer-option')

            <div class="row">
                <div class="col-sm-4">
                    <section class="footer__section">
                        <h2 class="footer__title">About Tribore Health</h2>
                        <i class="decor-brand decor-brand_footer"></i>
                        <p>We provide you with access to Psychiatric Services remotely and at the comfort of your house.</p>
                        <address class="footer__contacts">
                        </address>
                        <p class="footer__contacts"><i class="footer__icon icon-call-in color_primary"></i>+522 234 56789  / +522 234 56780</p>
                        <p class="footer__contacts"><i class="footer__icon icon-envelope-open color_primary"></i>info@healthcare-agency.org</p>
                    </section>
                </div>
                <section class="footer__section col-sm-4">

                </section>
                <section class="footer__section col-sm-4">
                    <h2 class="footer__title">Opening Hours</h2>
                    <i class="decor-brand decor-brand_footer"></i>
                        <table class="footer__table">
                            <tbody>
                            <tr>
                                <td>Monday - Friday</td>
                                <td>08:00am - 10:00pm</td>
                            </tr>
                            <tr>
                                <td>Saturday - Sunday</td>
                                <td>09:00am - 06:00pm</td>
                            </tr>
                            <tr>
                                <td>Emergency Services</td>
                                <td>24 hours Open</td>
                            </tr>
                            </tbody>
                        </table>
                </section>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end footer__inner -->
</footer>
</div>
<!-- end layout-theme -->

<span class="scroll-top bg-color_second"> <i class="fa fa-angle-up"> </i></span>

<!--HOME SLIDER-->
<script src="{{asset('website/plugins/iview/js/iview.js')}}"></script>
<script src="{{asset('website/plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

<!-- SCRIPTS -->
<script type="text/javascript" src="{{asset('website/plugins/isotope/jquery.isotope.min.js')}}"></script>
<script src="{{asset('website/js/waypoints.min.js')}}"></script>
<script src="{{asset('website/plugins/bxslider/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('website/plugins/prettyphoto/js/jquery.prettyPhoto.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{asset('website/plugins/datetimepicker/jquery.datetimepicker.js')}}"></script>
<script src="{{asset('website/plugins/jelect/jquery.jelect.js')}}"></script>
<script src="{{asset('website/plugins/nouislider/jquery.nouislider.all.min.js')}}"></script>

<!-- Loader -->
<script src="{{asset('website/plugins/loader/js/classie.js')}}"></script>
<script src="{{asset('website/plugins/loader/js/pathLoader.js')}}"></script>
<script src="{{asset('website/plugins/loader/js/main.js')}}"></script>
<script src="{{asset('website/js/classie.js')}}"></script>
<!--THEME-->
<script src="{{asset('website/js/cssua.min.js')}}"></script>
<script src="{{asset('website/js/wow.min.js')}}"></script>
<script src="{{asset('website/js/custom.js')}}"></script>
<script src="{{ asset('backend/js/notifications/toastr/toastr.js') }}"></script>
<script src="{{asset('backend/js/notifications/sweetalert2/sweetalert2.bundle.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
    function isEmpty(value){
        return (value == null || value.length === 0);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(()=>{

        $("#appointment-link").on('click',function (event) {
            event.preventDefault();
            let is_logged_in = {{Auth::check() ? 'true' : 'false'}};
            if(is_logged_in === false){
                window.location.replace("{{ route('register') }}");
            }else{
                window.location.replace("{{ route('website.appointments') }}");
            }
        });

        let contact_form = $('#contactForm');

        $('#send-contact').on('click',function (event) {
            event.preventDefault();
            let name = $('input[name=name]').val();
            let email = $('input[name=email]').val();
            let phone = $('input[name=phone]').val();
            let message = $('#message').val();
            let errorDiv = $('#contact-error');
            let url = "{{ route('website.process.contact') }}";
            let data = {name:name,email:email,phone:phone,message:message};

            if(isEmpty(name)){
                errorDiv.removeClass('hidden').html('Name is required');
            }else if(isEmpty(email)){
                errorDiv.removeClass('hidden').html('Email is required');
            }else if(isEmpty(phone)){
                errorDiv.removeClass('hidden').html('Phone number is required');
            }else if(isEmpty(message)){
                errorDiv.removeClass('hidden').html('Message is required');
            }else{
                $.ajax({
                    url:url,
                    data:data,
                    type: 'POST',
                    success:function (res) {
                        if(res.ok){
                            errorDiv.removeClass('hidden alert-error')
                                .addClass('alert-success').html('Your email has been sent successfully');
                        }
                    }
                })
            }
        });
    });
</script>
</body>
</html>
