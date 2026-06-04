<?php include 'header.php'; ?>


    <section class="apointment_section_hero">
        <div class="container">
            <h1 class="apointment_section_hero_title">
                BOOK YOUR <br><span>APPOINTMENT</span>
            </h1>

            <p class="apointment_section_hero_text">
                We’re here to keep your smile healthy and beautiful.
            </p>

            <div class="apointment_section_hero_features">
                <div class="apointment_section_hero_feature">
                    <i class="bi bi-calendar-check"></i> Easy<br>Booking
                </div>
                <div class="apointment_section_hero_feature">
                    <i class="bi bi-clock"></i> Quick<br>Confirmation
                </div>
                <div class="apointment_section_hero_feature">
                    <i class="bi bi-shield-check"></i> Safe &<br>Hygienic
                </div>
                <div class="apointment_section_hero_feature">
                    <i class="bi bi-emoji-smile"></i> Personalized<br>Care
                </div>
            </div>
        </div>
    </section>

    <section class="apointment_section_main">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="apointment_section_form_card">
                        <div class="apointment_section_form_heading">
                            <i class="bi bi-calendar3"></i>
                            <div>
                                <h2>BOOK AN APPOINTMENT</h2>
                                <p class="mb-0">Fill in your details and we’ll take care of the rest.</p>
                            </div>
                        </div>

                        <form>
                            <label class="apointment_section_label">Full Name <span>*</span></label>
                            <div class="apointment_section_input_group">
                                <i class="bi bi-person"></i>
                                <input type="text" class="apointment_section_input" placeholder="Enter your full name" required>
                            </div>

                            <label class="apointment_section_label">Phone Number <span>*</span></label>
                            <div class="apointment_section_input_group">
                                <i class="bi bi-telephone"></i>
                                <input type="text" class="apointment_section_input" placeholder="Enter your phone number" required>
                            </div>

                            <label class="apointment_section_label">Email Address</label>
                            <div class="apointment_section_input_group">
                                <i class="bi bi-envelope"></i>
                                <input type="email" class="apointment_section_input" placeholder="Enter your email address">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="apointment_section_label">Select Date <span>*</span></label>
                                    <div class="apointment_section_input_group">
                                        <i class="bi bi-calendar-event"></i>
                                        <input type="date" class="apointment_section_input" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="apointment_section_label">Select Time <span>*</span></label>
                                    <div class="apointment_section_input_group">
                                        <i class="bi bi-clock"></i>
                                        <input type="time" class="apointment_section_input" required>
                                    </div>
                                </div>
                            </div>

                            <label class="apointment_section_label">Select Service <span>*</span></label>
                            <div class="apointment_section_input_group">
                                <i class="bi bi-heart-pulse"></i>
                                <select class="apointment_section_select" required>
                                    <option value="">Choose a service</option>
                                    <option>General Dentistry</option>
                                    <option>Dental Implants</option>
                                    <option>Root Canal Treatment</option>
                                    <option>Teeth Whitening</option>
                                </select>
                            </div>

                            <label class="apointment_section_label">Preferred Dentist (Optional)</label>
                            <div class="apointment_section_input_group">
                                <i class="bi bi-person-badge"></i>
                                <select class="apointment_section_select">
                                    <option>Any Available</option>
                                    <option>Dr. Srinivasa Rao</option>
                                    <option>Dr. Srikanth R.</option>
                                </select>
                            </div>

                            <label class="apointment_section_label">Message (Optional)</label>
                            <div class="apointment_section_input_group">
                                <i class="bi bi-pencil"></i>
                                <textarea class="apointment_section_textarea" placeholder="Tell us about your concern"></textarea>
                            </div>

                            <button type="submit" class="apointment_section_submit">
                                <i class="bi bi-calendar-event me-2"></i> BOOK APPOINTMENT
                            </button>

                            <div class="apointment_section_secure">
                                <i class="bi bi-lock"></i> Your information is secure and confidential.
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="apointment_section_why_card">
                        <h3>WHY BOOK WITH US?</h3>

                        <div class="apointment_section_why_item">
                            <i class="bi bi-person-heart"></i> Experienced & Caring Doctors
                        </div>
                        <div class="apointment_section_why_item">
                            <i class="bi bi-lightbulb"></i> Advanced Technology
                        </div>
                        <div class="apointment_section_why_item">
                            <i class="bi bi-cup-hot"></i> Comfortable & Relaxing Environment
                        </div>
                        <div class="apointment_section_why_item">
                            <i class="bi bi-clock-history"></i> Convenient Scheduling
                        </div>
                        <div class="apointment_section_why_item mb-0">
                            <i class="bi bi-shield-check"></i> Personalized Treatment Plans
                        </div>
                    </div>

                    <div class="apointment_section_help_card">
                        <h3>NEED HELP?</h3>
                        <p>Our friendly team is here to assist you.</p>

                        <div class="apointment_section_contact_item">
                            <i class="bi bi-telephone"></i> +919290019948
                        </div>
                        <div class="apointment_section_contact_item">
                            <i class="bi bi-envelope"></i>  srinivasadentalkakinada@gmail.com
                        </div>
                        <div class="apointment_section_contact_item">
                            <i class="bi bi-clock"></i>
                            <span> Mon - Sat: 9:00 AM - 8:30 PM  <br>   Sunday: 9:00 AM - 1:00 PM  </span>
                        </div>
                    </div>

                    <div class="apointment_section_walkin_card">
                        <i class="bi bi-heart-pulse"></i>
                        <div>
                            <h4>WALK-INS WELCOME!</h4>
                            <p class="mb-0">Prefer to visit us directly? Walk in anytime during our working hours.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="apointment_section_locations">
                <div class="row g-3">
                    <div class="col-lg-3">
                        <div class="apointment_section_location_item">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <h5>OUR LOCATIONS</h5>
                                <small>Visit us at one of our convenient locations</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="apointment_section_location_item">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <h6>Srinivasa Heights</h6>
                                <p class="mb-0">Main Road, Vizag - 530001</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="apointment_section_location_item">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <h6>MVP Colony</h6>
                                <p class="mb-0">Sector 1, Vizag - 530017</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="apointment_section_location_item">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <h6>Gajuwaka</h6>
                                <p class="mb-0">NH-16, Vizag - 530026</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


<?php include 'footer.php'; ?>