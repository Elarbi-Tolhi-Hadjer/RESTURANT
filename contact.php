<?php
include('include/currentPage_header.php');
include('include/dbConnect.php');
?>
<section id="contact" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg p-4">
                    <div class="message"></div>
					<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title text-center text-primary text-uppercase">Contact Us</h5>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Contact</span> For Any Query</h1>
                </div>
                    
                    <div class="row text-center mb-4">
                        <div class="col-md-4">
                            <h6 class="text-primary">Booking</h6>
                            <p><i class="fa fa-phone text-primary me-2"></i>+<?php echo $general_setting['Phone_number']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-primary">General</h6>
                            <p><i class="fa fa-print text-primary me-2"></i>+<?php echo $general_setting['Telephone_number']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-primary">Technical</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i><?php echo $general_setting['Email']; ?></p>
                        </div>
                    </div>
                    
                    <form id="contact-form" action="functions.php" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="FirstName">First Name</label>
                                <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="LastName">Last Name</label>
                                <input type="text" class="form-control" id="LastName" name="LastName" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Email">Email Address</label>
                            <input type="email" class="form-control" id="Email" name="Email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Message">Message</label>
                            <textarea class="form-control" id="Message" name="Message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <div class="rounded shadow-lg overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103667.75630823961!2d-0.7211077196494331!3d35.711032034910936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7e891088dc111b%3A0xe64ee477c4d59bc0!2sThe%20Adress%20Residence!5e0!3m2!1sfr!2sdz!4v1734993838651!5m2!1sfr!2sdz" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('#contact-form').on('submit', function(e){
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "functions.php",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var json = JSON.parse(response);
                    if (json['error']) {
                        $('.message').html(`<div class="alert alert-danger">${json['error']}</div>`);
                    } else {
                        $('.message').html(`<div class="alert alert-success">${json['msg']}</div>`);
                        $('#contact-form')[0].reset();
                    }
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        });
    });
</script>

<?php include('include/footer.php'); ?>
