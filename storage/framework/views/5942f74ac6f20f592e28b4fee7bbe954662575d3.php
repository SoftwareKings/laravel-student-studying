<style>
    #contact-area{
        background-color: #0000ff;
    }

    .section-title .subtitle:before,.section-title .subtitle:after{
        color: #fff;
        text-shadow: 15px 0 #fff;
        /* border-radius: 100%; */
        content: "o";
        font-size: 10px;
        top: 7px;
    }

    .section-title .subtitle:before{
        left: -40px;
    }

    .contact-area-section .section-title span{
        font-size: 18px;
    }

    .contact-area-section .section-title h2{
        margin-top: 5px;
    }
    
    .contact-area-section .section-title .short_text p{
        margin-top: 8px;
    }

    .social-icons svg{
        height: 55px;
        margin: 0px -15px;
    }

    .copy-right-text{
        text-align: center;
        color: white;
        font-size: 18px;
        font-weight: 650;
    }
</style>
<section id="contact-area" class="contact-area-section backgroud-style">
    <div class="container">
        <div class="contact-area-content">
            <div class="row">
                <?php if(config('contact_data') != ""): ?>
                    <?php
                        $contact_data = contact_data(config('contact_data'));
                    ?>
                    <div class="col-md-6">
                        <div class="contact-left-content ">
                            <div class="section-title  mb45 headline text-left">
                                <span class="subtitle ml42  text-uppercase"><?php echo app('translator')->get('labels.frontend.layouts.partials.contact_us'); ?></span>
                                <div class="d-flex short_text">
                                    <h2 class="mr-2"><span><?php echo app('translator')->get('labels.frontend.layouts.partials.get_in_touch'); ?></span></h2>
                                    <p>
                                        <?php echo e($contact_data["short_text"]["value"]); ?>

                                    </p>
                                </div>
                                
                            </div>

                            <div class="contact-address">
                                

                                <?php if(($contact_data["primary_phone"]["status"] == 1) || ($contact_data["secondary_phone"]["status"] == 1)): ?>
                                    <div class="contact-address-details">
                                        <div class="address-icon relative-position text-center float-left">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="address-details ul-li-block">
                                            <ul>
                                                <?php if($contact_data["primary_phone"]["status"] == 1): ?>
                                                    <li>
                                                        <span><?php echo app('translator')->get('labels.frontend.layouts.partials.my_label_contact_phone'); ?>:</span> <?php echo e($contact_data["primary_phone"]["value"]); ?>

                                                    </li>
                                                <?php endif; ?>

                                                <?php if($contact_data["secondary_phone"]["status"] == 1): ?>
                                                    <li>
                                                        <span><?php echo app('translator')->get('labels.frontend.layouts.partials.my_label_contact_phone'); ?>:</span> <?php echo e($contact_data["secondary_phone"]["value"]); ?>

                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(($contact_data["primary_email"]["status"] == 1) || ($contact_data["secondary_email"]["status"] == 1)): ?>
                                    <div class="contact-address-details">
                                        <div class="address-icon relative-position text-center float-left">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="address-details ul-li-block">
                                            <ul>
                                                <?php if($contact_data["primary_email"]["status"] == 1): ?>
                                                    <li>
                                                        <span><?php echo app('translator')->get('labels.frontend.layouts.partials.my_label_contact'); ?>: </span></br><?php echo e($contact_data["primary_email"]["value"]); ?>

                                                    </li>
                                                <?php endif; ?>

                                                <?php if($contact_data["secondary_email"]["status"] == 1): ?>
                                                    <li>
                                                        <span><?php echo app('translator')->get('labels.frontend.layouts.partials.my_label_contact'); ?>:</span><br/><?php echo e($contact_data["secondary_email"]["value"]); ?>

                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                    
                <?php else: ?>
                    <div class="col-md-6">
                        <h4><?php echo app('translator')->get('labels.general.no_data_available'); ?></h4>
                    </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <div class="d-flex float-right social-icons">
                        <a role="button" href="https://facebook.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,3c-12.15,0 -22,9.85 -22,22c0,11.03 8.125,20.137 18.712,21.728v-15.897h-5.443v-5.783h5.443v-3.848c0,-6.371 3.104,-9.168 8.399,-9.168c2.536,0 3.877,0.188 4.512,0.274v5.048h-3.612c-2.248,0 -3.033,2.131 -3.033,4.533v3.161h6.588l-0.894,5.783h-5.694v15.944c10.738,-1.457 19.022,-10.638 19.022,-21.775c0,-12.15 -9.85,-22 -22,-22z"></path></g></g>
                        </svg></a>
                        <a role="button" href="https://linkedin.com/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50" style="fill:#FFFFFF;">
                            <path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z"></path>
                        </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 copy-right-text">
                    © Copyright - Diagnosiaziendale.it - P.I. 01669970764
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH E:\FreelancerTask\Laravel\diagnosi12_05_01\resources\views/frontend/layouts/partials/contact_area.blade.php ENDPATH**/ ?>