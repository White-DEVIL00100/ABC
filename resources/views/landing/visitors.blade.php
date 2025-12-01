@extends('layouts.landing')
@section('scripts')
    <script>
        // Store the intlTelInput instance globally so it can be accessed in the form submission
        let iti;

        document.addEventListener("DOMContentLoaded", function() {
            const input = document.querySelector("#phone");
            if (input) {
                iti = window.intlTelInput(input, {
                    initialCountry: "sa", // Default to Saudi Arabia
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
                    hiddenInput: (telInputName) => ({
                        phone: "phone_full",
                        country: "country_code"
                    }),
                });
            } else {
                console.error("Phone input element not found!");
            }
        });

        $('.form_to_submit').submit(function(event) {
            var emptyFieldNames = [];
            var invalidEmailFields = [];
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const $form = $(this);
            $(this).find('input.requireds, select.requireds').each(function() {
                if ($(this).val() === '') {
                    $(this).addClass('input-error');
                    var fieldName = $(this).attr('name') || 'Unnamed field';
                    emptyFieldNames.push(fieldName);
                } else {
                    $(this).removeClass('input-error');
                }
            });

            $(this).find('input[name="email"]').each(function() {
                var emailValue = $(this).val();
                var fieldName = $(this).attr('name') || 'Email field';
                if ($(this).hasClass('requireds') && emailValue === '') {
                    $(this).addClass('input-error');
                } else if (emailValue !== '' && !emailRegex.test(emailValue)) {
                    $(this).addClass('input-error');
                    invalidEmailFields.push(fieldName);
                } else {
                    $(this).removeClass('input-error');
                }
            });

            const phoneInput = $form.find('#phone');
            if (phoneInput.length && iti) {
                const fullPhoneNumber = iti.getNumber();
                console.log('Full phone number:', fullPhoneNumber);
                phoneInput.val(fullPhoneNumber); // Set value BEFORE checking empty fields
            }

            $form.find('input.requireds, select.requireds').each(function() {
                if ($(this).val() === '') {
                    $(this).addClass('input-error');
                    emptyFieldNames.push($(this).attr('name') || 'Unnamed field');
                } else {
                    $(this).removeClass('input-error');
                }
            });

            $form.find('input[name="email"]').each(function() {
                const val = $(this).val();
                if ($(this).hasClass('requireds') && val === '') {
                    $(this).addClass('input-error');
                } else if (val !== '' && !emailRegex.test(val)) {
                    $(this).addClass('input-error');
                    invalidEmailFields.push($(this).attr('name') || 'email');
                } else {
                    $(this).removeClass('input-error');
                }
            });

            if (emptyFieldNames.length === 0 && invalidEmailFields.length === 0) {
                this.submit(); // All good, submit the form
            } else {
                // Still errors, do not submit
                if (emptyFieldNames.length > 0) {
                    console.log('Empty required fields:', emptyFieldNames);
                }
                if (invalidEmailFields.length > 0) {
                    console.log('Invalid email fields:', invalidEmailFields);
                }
            }

            var hasEmptyFields = $(this).find('input.requireds, select.requireds').filter(function() {
                return $(this).val() === '';
            }).length > 0;

            var hasInvalidEmails = invalidEmailFields.length > 0;

            if (!hasEmptyFields && !hasInvalidEmails) {
                return; // Allow form submission
            } else {
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

    <!-- CSS for intl-tel-input -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css" />

    <!-- JS for intl-tel-input -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
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
    <style>
        .nice-select.wide .list {
            left: 0 !important;
            right: 0 !important;
            max-height: 29rem;
            overflow: auto;
        }
    </style>
    <!-- Quote One -->
    <section class="quote-one">
        <div class="quote-one__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url({{ asset('assets/images/backgrounds/quote-v1-bg4.jpg') }});"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <div class="quote-tab wow fadeInUp" data-wow-delay="100ms">



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
                                                <form id="personal-info-form" action="{{ route('visitors.store') }}"
                                                    class="why-choose-one__form" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <!-- Name -->
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <div class="select-box">
                                                                    <select class="selectmenu wide" name="gender" required>
                                                                        <option value="Mr">Mr</option>
                                                                        <option value="Ms">Ms</option>
                                                                        <option value="Mrs">Mrs</option>
                                                                        <option value="Dr">Dr</option>
                                                                        <option value="Prof">Prof</option>
                                                                        <option value="Eng">Eng</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="email" name="email" placeholder="Email"
                                                                    class="requireds">
                                                                <div class="icon"><span class="icon-email"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="text" name="first_name"
                                                                    placeholder="First Name" class="requireds">
                                                                <div class="icon"><span class="icon-user"></span></div>
                                                            </div>
                                                        </div>


                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="text" name="last_name"
                                                                    placeholder="Last Name" class="requireds">
                                                                <div class="icon"><span class="icon-user"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Email -->

                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input id="phone"
                                                                    style="height: 3rem;
  width: 24.5rem;" type="tel"
                                                                    name="contact_number" placeholder="Contact Number"
                                                                    class="requireds">
                                                                <div class="icon"><span class="icon-phone2"></span></div>
                                                            </div>
                                                        </div>


                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <div class="select-box">
                                                                    <select class="selectmenu wide" id="countrySelect"
                                                                        name="country" class="requireds">
                                                                        <option selected value="Saudi Arabia">Saudi Arabia
                                                                        </option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antigua and Barbuda">Antigua and
                                                                            Barbuda</option>
                                                                        <option value="Argentina">Argentina</option>
                                                                        <option value="Armenia">Armenia</option>
                                                                        <option value="Aruba">Aruba</option>
                                                                        <option value="Australia">Australia</option>
                                                                        <option value="Austria">Austria</option>
                                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bahrain">Bahrain</option>
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        <option value="Barbados">Barbados</option>
                                                                        <option value="Belarus">Belarus</option>
                                                                        <option value="Belgium">Belgium</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermuda">Bermuda</option>
                                                                        <option value="Bhutan">Bhutan</option>
                                                                        <option value="Bolivia">Bolivia</option>
                                                                        <option value="Bosnia and Herzegovina">Bosnia and
                                                                            Herzegovina</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">
                                                                            British Indian Ocean Territory</option>
                                                                        <option value="Brunei">Brunei</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Myanmar">Myanmar</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands
                                                                        </option>
                                                                        <option value="Central African Republic">Central
                                                                            African Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Christmas Island">Christmas Island
                                                                        </option>
                                                                        <option value="Cocos (Keeling) Islands">Cocos
                                                                            (Keeling) Islands</option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo">Congo</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Croatia">Croatia</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic
                                                                        </option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican
                                                                            Republic</option>
                                                                        <option value="Timor-Leste">Timor-Leste</option>
                                                                        <option value="Tokelau">Tokelau</option>
                                                                        <option value="Turks and Caicos Islands">Turks and
                                                                            Caicos Islands</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial Guinea
                                                                        </option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Faroe Islands">Faroe Islands
                                                                        </option>
                                                                        <option value="Falkland Islands">Falkland Islands
                                                                        </option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="French Polynesia">French Polynesia
                                                                        </option>
                                                                        <option value="Gabon">Gabon</option>
                                                                        <option value="Gambia">Gambia</option>
                                                                        <option value="Georgia">Georgia</option>
                                                                        <option value="Gibraltar">Gibraltar</option>
                                                                        <option value="Germany">Germany</option>
                                                                        <option value="Ghana">Ghana</option>
                                                                        <option value="Greece">Greece</option>
                                                                        <option value="Greenland">Greenland</option>
                                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                                        <option value="Grenada">Grenada</option>
                                                                        <option value="Guernsey">Guernsey</option>
                                                                        <option value="Guatemala">Guatemala</option>
                                                                        <option value="Guam">Guam</option>
                                                                        <option value="Guinea">Guinea</option>
                                                                        <option value="Guinea-Bissau">Guinea-Bissau
                                                                        </option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Heard Island and McDonald Islands">
                                                                            Heard Island and McDonald Islands</option>
                                                                        <option value="Jordan">Jordan</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong">Hong Kong</option>
                                                                        <option value="Hungary">Hungary</option>
                                                                        <option value="Iceland">Iceland</option>
                                                                        <option value="India">India</option>
                                                                        <option value="Indonesia">Indonesia</option>
                                                                        <option value="Iran">Iran</option>
                                                                        <option value="Iraq">Iraq</option>
                                                                        <option value="Ireland">Ireland</option>
                                                                        <option value="Isle of Man">Isle of Man</option>
                                                                        <option value="Israel">Israel</option>
                                                                        <option value="Italy">Italy</option>
                                                                        <option value="Ivory Coast">Ivory Coast</option>
                                                                        <option value="Jamaica">Jamaica</option>
                                                                        <option value="Jersey">Jersey</option>
                                                                        <option value="Japan">Japan</option>
                                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                                        <option value="Kenya">Kenya</option>
                                                                        <option value="Kiribati">Kiribati</option>
                                                                        <option value="North Korea">North Korea</option>
                                                                        <option value="Kosovo">Kosovo</option>
                                                                        <option value="Kuwait">Kuwait</option>
                                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                        <option value="Laos">Laos</option>
                                                                        <option value="Latvia">Latvia</option>
                                                                        <option value="Lebanon">Lebanon</option>
                                                                        <option value="Lesotho">Lesotho</option>
                                                                        <option value="Liberia">Liberia</option>
                                                                        <option value="Libya">Libya</option>
                                                                        <option value="Liechtenstein">Liechtenstein
                                                                        </option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macedonia">Macedonia</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Marshall Islands">Marshall Islands
                                                                        </option>
                                                                        <option value="Macau">Macau</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Martinique">Martinique</option>
                                                                        <option value="Mauritania">Mauritania</option>
                                                                        <option value="Mauritius">Mauritius</option>
                                                                        <option value="Mayotte">Mayotte</option>
                                                                        <option value="Mexico">Mexico</option>
                                                                        <option value="Moldova">Moldova</option>
                                                                        <option value="Mongolia">Mongolia</option>
                                                                        <option value="Montenegro">Montenegro</option>
                                                                        <option value="Monaco">Monaco</option>
                                                                        <option value="Montserrat">Montserrat</option>
                                                                        <option value="Morocco">Morocco</option>
                                                                        <option value="Mozambique">Mozambique</option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="New Caledonia">New Caledonia
                                                                        </option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island
                                                                        </option>
                                                                        <option value="Northern Mariana Islands">Northern
                                                                            Mariana Islands</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Pitcairn">Pitcairn</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea
                                                                        </option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="South Korea">South Korea</option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russia">Russia</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Réunion">Réunion</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="Saint Kitts and Nevis">Saint Kitts
                                                                            and Nevis</option>
                                                                        <option value="Saint Pierre and Miquelon">Saint
                                                                            Pierre and Miquelon</option>
                                                                        <option value="Saint Vincent and the Grenadines">
                                                                            Saint Vincent and the Grenadines</option>

                                                                        <option value="Senegal">Senegal</option>
                                                                        <option
                                                                            value="South Georgia and the South Sandwich Islands">
                                                                            South Georgia and the South Sandwich Islands
                                                                        </option>
                                                                        <option value="Sao Tome and Principe">Sao Tome and
                                                                            Principe</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Serbia">Serbia</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Singapore">Singapore</option>
                                                                        <option value="Slovakia">Slovakia</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands
                                                                        </option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Swaziland">Swaziland</option>
                                                                        <option value="Sweden">Sweden</option>
                                                                        <option value="Switzerland">Switzerland</option>
                                                                        <option value="Syria">Syria</option>
                                                                        <option value="Taiwan">Taiwan</option>
                                                                        <option value="Tanzania">Tanzania</option>
                                                                        <option value="Thailand">Thailand</option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Tonga">Tonga</option>
                                                                        <option value="Trinidad and Tobago">Trinidad and
                                                                            Tobago</option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Emirates">United Arab
                                                                            Emirates</option>
                                                                        <option value="United Kingdom">United Kingdom
                                                                        </option>
                                                                        <option value="United States">United States
                                                                        </option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Vatican City State (Holy See)">
                                                                            Vatican City State (Holy See)</option>
                                                                        <option value="Wallis and Futuna">Wallis and Futuna
                                                                        </option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="text" name="city" placeholder="City"
                                                                    class="requireds">
                                                            </div>
                                                        </div>



                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="text" name="job_title"
                                                                    placeholder="Job Title" class="requireds">
                                                                <div class="icon"><span class="icon-book"></span></div>
                                                            </div>
                                                        </div>

                                                        <!-- Specialization -->
                                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                                            <div class="input-box">
                                                                <input type="text" name="company"
                                                                    placeholder="Company" class="requireds">
                                                                <div class="icon"><span class="icon-briefcase"></span>
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
@endsection
