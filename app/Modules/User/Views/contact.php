<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Contact US</h1>

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">

            <div class="ltn__contact-address-area mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                                <div class="ltn__contact-address-icon">
                                    <i class="icon-location-pin"></i>
                                </div>
                                <h3>Email Address</h3>
                                <p>falahisnain0@gmail.com<br>
                                    1911016210008@mhs.ulm.ac.id</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                                <div class="ltn__contact-address-icon">
                                    <i class="icon-phone"></i>
                                </div>
                                <h3>Phone Number</h3>
                                <p>+6282252109034 <br>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="ltn__contact-address-item ltn__contact-address-item-4 box-shadow">
                                <div class="ltn__contact-address-icon">
                                    <i class="icon-speedometer"></i>
                                </div>
                                <h3>Opening Hours</h3>
                                <p>Fri to Wed: 6:00 Am to 8:00 Pm <br>
                                    Thursday - Off</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ltn_google-map-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="831" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=sman%201%20kuala&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>

</div>
</div>
<?= $this->endSection();  ?>