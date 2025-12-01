@extends('layouts.landing')
@section('scripts')
    <!-- In new-jobs.blade.php -->
    <script>
        $('.form_to_submit').submit(function(event) {
            var emptyFieldNames = []; // Array to store names of empty required fields
            var invalidEmailFields = []; // Array to store names of invalid email fields

            // Regular expression for email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            $(this).find('input.requireds, select.requireds').each(function() {
                if ($(this).val() === '') {
                    $(this).addClass('input-error');
                    var fieldName = $(this).attr('name') || 'Unnamed field';
                    emptyFieldNames.push(fieldName);
                } else {
                    $(this).removeClass('input-error');
                }
            });

            // Validate email field specifically
            $(this).find('input[name="email"]').each(function() {
                var emailValue = $(this).val();
                var fieldName = $(this).attr('name') || 'Email field';

                // Check if email is empty (if required) or invalid
                if ($(this).hasClass('requireds') && emailValue === '') {
                    // Already handled in the previous loop, no need to add again
                    $(this).addClass('input-error');
                } else if (emailValue !== '' && !emailRegex.test(emailValue)) {
                    $(this).addClass('input-error');
                    invalidEmailFields.push(fieldName);
                } else {
                    $(this).removeClass('input-error');
                }
            });

            // Check for empty required fields
            var hasEmptyFields = $(this).find('input.requireds, select.requireds').filter(function() {
                return $(this).val() === '';
            }).length > 0;

            // Check for invalid emails
            var hasInvalidEmails = invalidEmailFields.length > 0;

            if (!hasEmptyFields && !hasInvalidEmails) {
                return; // Allow form submission to proceed
            } else {
                // Prevent form submission and log issues
                event.preventDefault();
                if (emptyFieldNames.length > 0) {
                    console.log('Please fill in all required fields. Empty fields:', emptyFieldNames);
                }
                if (invalidEmailFields.length > 0) {
                    console.log('Please provide valid email addresses. Invalid fields:', invalidEmailFields);
                }
            }
        });
    </script>
@endsection
@section('content')
    <style>
        input[type=number] {
            -moz-appearance: textfield;
        }

        .input-error {
            border: 1px solid red !important;
        }

        .select-error {
            border: 1px solid red !important;
        }

        .form_to_submit .select2.input-error+.select2-container .select2-selection {
            border: 1px solid red !important;
            /* Use !important to override existing styles */
        }

        .alert {
            z-index: 99;
        }
    </style>
    <!-- Quote One -->
    <section class="quote-one">
        <div class="quote-one__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url({{ asset('assets/images/backgrounds/quote-v1-bg4.jpg') }});"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title center text-center tg-heading-subheading animation-style2">
                        <div class="sec-title__tagline">
                            <div class="line"></div>
                            <div class="text tg-element-title">
                                <h4>Jobs</h4>
                            </div>
                            <div class="icon">
                                <span class="icon-plane2 float-bob-x3"></span>
                            </div>
                        </div>
                        <h2 class="sec-title__title tg-element-title">Request For A <span>Jobs</span></h2>
                    </div>

                    <div class="quote-tab wow fadeInUp" data-wow-delay="100ms">

                        <div class="quote-tab__button">
                            <ul class="tabs-button-box clearfix">
                                <li data-tab="#tab-btn1" class="tab-btn-item active-btn-item">
                                    <div class="quote-tab__button-inner">
                                        <h3>Request A Jobs</h3>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!--Start Tabs Content Box-->
                        <div class="tabs-content-box">
                            <!--Start Tab-->
                            <div class="tab-content-box-item tab-content-box-item-active" id="tab-btn1">
                                <div class="quote-tab-content-box-item">
                                    <div class="tab-content-box-item-img"
                                        style="background-image: url({{ asset('assets/images/backgrounds/quote-v1-bg2.jpg') }});">
                                    </div>
                                    <div class="quotes-wrapper">
                                        <div class="quotes-wrapper-inner">
                                            @if (session('success'))
                                                <div id="form-message" class="mb-3 text-center alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @elseif (session('error'))
                                                <div id="form-message" class="mb-3 text-center alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @elseif ($errors->any())
                                                <div id="form-message" class="mb-3 text-center alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @else
                                                <div id="form-message" class="mb-3 text-center"></div>
                                            @endif

                                            <div class="quotes-weight form_to_submit">
                                                <form action="{{ route('job.store') }}" class=" why-choose-one__form"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <!-- Name -->
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="text" name="name" placeholder="Name"
                                                                    class="requireds">
                                                                <div class="icon"><span class="icon-user"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="email" name="email" placeholder="Email"
                                                                    class="requireds">
                                                                <div class="icon"><span class="icon-email"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Contact Number -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="contact_number"
                                                                    placeholder="Contact Number" class="requireds">
                                                                <div class="icon"><span class="icon-phone2"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Birth Date -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="date" name="birth_date"
                                                                    placeholder="Birth Date" class="requireds">
                                                                <div class="icon"><span class="icon-calendar"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Nationality -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="nationality"
                                                                    placeholder="Nationality" class="requireds">
                                                                <div class="icon"><span class="icon-flag"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Identity Number -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="number" name="identity_number"
                                                                    placeholder="Identity Number" class="requireds">
                                                                <div class="icon"><span class="icon-id-card"></span></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <div class="select-box">
                                                                    <select class="selectmenu wide" name="gender"
                                                                        class="requireds">
                                                                        <option value="" disabled selected>Select
                                                                            Gender</option>
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Marital Status -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <div class="select-box">
                                                                    <select class="selectmenu wide" name="marital_status"
                                                                        class="requireds">
                                                                        <option value="" disabled selected>Select
                                                                            Marital Status</option>
                                                                        <option value="single">Single</option>
                                                                        <option value="married">Married</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Educational Level -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="educational_level"
                                                                    placeholder="Educational Level" class="requireds">
                                                                <div class="icon"><span class="icon-book"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Specialization -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="specialization"
                                                                    placeholder="Specialization" class="requireds">
                                                                <div class="icon"><span class="icon-briefcase"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Field -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="field" placeholder="Field"
                                                                    class="requireds">
                                                                <div class="icon"><span class="icon-briefcase"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Department -->
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <div class="select-box">
                                                                    <select
                                                                        class="selectmenu wide @error('section_id') is-invalid @enderror"
                                                                        name="section_id" class="requireds">
                                                                        <option value="" disabled selected>Select
                                                                            Department</option>
                                                                        <option value="hr">HR</option>
                                                                        <option value="operation">Operation</option>
                                                                        <option value="workshop">Workshop</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Image -->
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="file" name="cv" placeholder="Image"
                                                                    class="requireds">
                                                                <div class="icon"><span class="icon-image"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Address Section -->
                                                        <div class="col-xl-12">
                                                            <h4>Address</h4>
                                                        </div>

                                                        <!-- Building Number -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="number" name="building_number"
                                                                    placeholder="Building Number">
                                                                <div class="icon"><span class="icon-home"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Additional Number -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="number" name="additional_number"
                                                                    placeholder="Additional Number">
                                                                <div class="icon"><span class="icon-home"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Street -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="street"
                                                                    placeholder="Street">
                                                                <div class="icon"><span class="icon-location"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- City -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="city" placeholder="City">
                                                                <div class="icon"><span class="icon-location"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- District -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="text" name="district"
                                                                    placeholder="District">
                                                                <div class="icon"><span class="icon-location"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Postal Code -->
                                                        <div class="col-xl-4 col-lg-4 col-md-4">
                                                            <div class="input-box">
                                                                <input type="number" name="postal_code"
                                                                    placeholder="Postal Code">
                                                                <div class="icon"><span class="icon-location"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Skills Section -->
                                                        <div class="col-xl-12">
                                                            <h4>Skills</h4>
                                                        </div>

                                                        <!-- Skills Textarea -->
                                                        <div class="col-xl-12">
                                                            <div class="input-box">
                                                                <textarea name="skills" id="editor1" placeholder="Skills"></textarea>
                                                                <div class="icon"><span class="icon-file-text"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <div class="col-xl-12">
                                                            <div id="form-message" class="mb-3 text-center"></div>
                                                            <div class="why-choose-one__form-btn">
                                                                <button type="submit" class="thm-btn">
                                                                    Submit
                                                                    <i class="icon-right-arrow21"></i>
                                                                    <span class="hover-btn hover-bx"></span>
                                                                    <span class="hover-btn hover-bx2"></span>
                                                                    <span class="hover-btn hover-bx3"></span>
                                                                    <span class="hover-btn hover-bx4"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Tab-->

                        </div>
                        <!--End Tabs Content Box-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="working-process-one">
        <div class="working-process-one__pattern"
            style="background-image: url({{ asset('assets/images/pattern/working-process-v1-pattern.jpg') }});"></div>
        <div class="container">
            <div class="shape1"><img src="{{ asset('assets/images/shapes/working-process-v1-shape1.png') }}"
                    alt=""></div>
            <div class="sec-title center text-center tg-heading-subheading animation-style2">
                <div class="sec-title__tagline">
                    <div class="line"></div>
                    <div class="text tg-element-title">
                        <h4>Recruiting Process</h4>
                    </div>
                    <div class="icon">
                        <span class="icon-plane2 float-bob-x3"></span>
                    </div>
                </div>
                <h2 class="sec-title__title tg-element-title">How We Find <br>
                    Your <span>Talent</span></h2>
            </div>

            <div class="row">
                <!--Start Recruiting Process One Single-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="working-process-one__single">
                        <div class="icon">
                            <div class="count-box">01</div>
                            <span class="icon-quote"></span>
                        </div>

                        <div class="content-box">
                            <h2><a href="#">Sending Request</a></h2>
                            <p>Submit your application to <br>
                                start the recruitment process</p>
                        </div>
                        <div class="plane-icon">
                            <span class="icon-plane"></span>
                        </div>
                    </div>
                </div>
                <!--End Recruiting Process One Single-->

                <!--Start Recruiting Process One Single-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="working-process-one__single">
                        <div class="icon">
                            <div class="count-box">02</div>
                            <span class="icon-protection"></span>
                        </div>

                        <div class盤content-box">
                            <h2><a href="#">Virtual Interview</a></h2>
                            <p>Join an online interview to <br>
                                discuss your qualifications</p>
                        </div>
                        <div class="plane-icon">
                            <span class="icon-plane"></span>
                        </div>
                    </div>
                </div>
                <!--End Recruiting Process One Single-->

                <!--Start Recruiting Process One Single-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="working-process-one__single">
                        <div class="icon">
                            <div class="count-box">03</div>
                            <span class="icon-service"></span>
                        </div>

                        <div class="content-box">
                            <h2><a href="#">In-Person Interview</a></h2>
                            <p>Meet our team for a detailed <br>
                                in-person evaluation</p>
                        </div>
                        <div class="plane-icon">
                            <span class="icon-plane"></span>
                        </div>
                    </div>
                </div>
                <!--End Recruiting Process One Single-->

                <!--Start Recruiting Process One Single-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="working-process-one__single">
                        <div class="icon">
                            <div class="count-box">04</div>
                            <span class="icon-new-product"></span>
                        </div>

                        <div class="content-box">
                            <h2><a href="#">Hiring Decision</a></h2>
                            <p>Receive our final decision and <br>
                                join our talented team</p>
                        </div>
                    </div>
                </div>
                <!--End Recruiting Process One Single-->
            </div>
        </div>
    </section>
    <!--End Working Process One-->
@endsection
