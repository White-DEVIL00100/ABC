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
<section class="why-choose-one">
    <div class="why-choose-one__pattern">
        <img src="{{ asset('assets/images/pattern/why-choose-v1-pattern.png') }}" alt="">
    </div>
    <div class="shape1 float-bob-y"><img src="{{ asset('assets/images/shapes/why-choose-v1-shape1.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <!--Start Why Choose One Content-->
            <div class="col-xl-6">
                <div class="why-choose-one__content">
                    <div class="sec-title tg-heading-subheading animation-style2">
                        <div class="sec-title__tagline">
                            <div class="line"></div>
                            <div class="text tg-element-title">
                                <h4>{{ __('Why Choose us') }}</h4>
                            </div>
                            <div class="icon">
                                <span class="icon-plane2 float-bob-x3"></span>
                            </div>
                        </div>
                        <h2 class="sec-title__title tg-element-title">{{ __('Efficient, Safe, & Swift') }} <br>
                            {{ __('Logistics') }}
                            <span>{{ __('Solution!') }}</span>
                        </h2>
                    </div>

                    <div class="why-choose-one__content-list">
                        <ul>
                            <li>
                                <p><span class="icon-plane2"></span>
                                    {{ __('Trustworthy logistics with proven reliability') }}</p>
                            </li>
                            <li>
                                <p><span class="icon-plane2"></span>
                                    {{ __('Hard-working team dedicated to excellence') }}</p>
                            </li>
                            <li>
                                <p><span class="icon-plane2"></span> {{ __('Always on time with seamless delivery') }}
                                </p>
                            </li>
                            <li>
                                <p><span class="icon-plane2"></span>
                                    {{ __('Competitive pricing for all transport services') }}</p>
                            </li>
                            <li>
                                <p><span class="icon-plane2"></span>
                                    {{ __('Comprehensive solutions with all equipment types') }}</p>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-box">
                        <a class="thm-btn" href="/contact">{{ __('Contact Us') }}
                            <i class="icon-right-arrow21"></i>
                            <span class="hover-btn hover-bx"></span>
                            <span class="hover-btn hover-bx2"></span>
                            <span class="hover-btn hover-bx3"></span>
                            <span class="hover-btn hover-bx4"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!--End Why Choose One Content-->

            <!--Start Why Choose One Form-->
            <div class="col-xl-6">
                <!-- Display server-side messages -->
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

                <div class="why-choose-one__form-box form_to_submit">
                    <div class="title-box">
                        <h2>{{ __('Request a Quote') }}</h2>
                    </div>

                    <form id="transport-request-form" class=" why-choose-one__form"
                        action="{{ route('transport_request.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <!-- Company Name -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <input type="text" name="name" placeholder="{{ __('Company Name') }}" class="requireds"
                                        value="{{ old('name') }}">
                                    <div class="icon"><span class="icon-user"></span></div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <input type="email" name="email" placeholder="{{ __('Email') }}" class="requireds"
                                        value="{{ old('email') }}">
                                    <div class="icon"><span class="icon-email"></span></div>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <input type="text" name="phone" placeholder="{{ __('Phone') }}" class="requireds"
                                        value="{{ old('phone') }}">
                                    <div class="icon"><span class="icon-phone2"></span></div>
                                </div>
                            </div>

                            <!-- Loading Date -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <input type="date" name="date" placeholder="{{ __('Loading Date') }}" class="requireds"
                                        value="{{ old('date') }}">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                </div>
                            </div>

                            <!-- From -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <input type="text" name="from" placeholder="{{ __('From') }}" class="requireds"
                                        value="{{ old('from') }}">
                                    <div class="icon"><span class="icon-location"></span></div>
                                </div>
                            </div>

                            <!-- To -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <input type="text" name="to" placeholder="{{ __('To') }}" class="requireds"
                                        value="{{ old('to') }}">
                                    <div class="icon"><span class="icon-location"></span></div>
                                </div>
                            </div>

                            <!-- Dimensions -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="input-box">
                                    <input type="text" name="weight" placeholder="{{ __('Weight (kg)') }}"class="requireds"
                                        value="{{ old('weight') }}">
                                    <div class="icon"><span class="icon-scale"></span></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="input-box">
                                    <input type="text" name="length" placeholder="{{ __('Length (m)') }}"class="requireds"
                                        value="{{ old('length') }}">
                                    <div class="icon"><span class="icon-ruler"></span></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="input-box">
                                    <input type="text" name="width" placeholder="{{ __('Width (m)') }}"class="requireds"
                                        value="{{ old('width') }}">
                                    <div class="icon"><span class="icon-ruler"></span></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="input-box">
                                    <input type="text" name="height" placeholder="{{ __('Height (m)') }}"class="requireds"
                                        value="{{ old('height') }}">
                                    <div class="icon"><span class="icon-ruler"></span></div>
                                </div>
                            </div>

                            <!-- Freight Type -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <div class="select-box">
                                        <select class="selectmenu wide" name="freight_type" required>
                                            <option value="" disabled
                                                {{ old('freight_type') ? '' : 'selected' }}>{{ __('Select Freight Type') }}
                                            </option>
                                            <option value="Flatbed"
                                                {{ old('freight_type') == 'Flatbed' ? 'selected' : '' }}>{{ __('Flatbed') }}
                                            </option>
                                            <option value="Lowbed"
                                                {{ old('freight_type') == 'Lowbed' ? 'selected' : '' }}>{{ __('Lowbed') }}</option>
                                            <option value="Lowbed HYD"
                                                {{ old('freight_type') == 'Lowbed HYD' ? 'selected' : '' }}>{{ __('Lowbed HYD') }}
                                            </option>
                                            <option value="Special Lowbed"
                                                {{ old('freight_type') == 'Special Lowbed' ? 'selected' : '' }}>{{ __('Special Lowbed') }}
                                                </option>
                                            <option value="EX/10"
                                                {{ old('freight_type') == 'EX/10' ? 'selected' : '' }}>EX/10</option>
                                        </select>
                                        <span class="error-message text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Load Type -->
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="input-box">
                                    <div class="select-box">
                                        <select class="selectmenu wide" name="load_type" required>
                                            <option value="" disabled {{ old('load_type') ? '' : 'selected' }}>
                                                {{ __('Select Load Type') }}</option>
                                            <option value="Container"
                                                {{ old('load_type') == 'Container' ? 'selected' : '' }}>{{ __('Container') }}
                                            </option>
                                            <option value="Cargo"
                                                {{ old('load_type') == 'Cargo' ? 'selected' : '' }}>{{ __('Cargo') }}</option>
                                        </select>
                                        <span class="error-message text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-xl-12">
                                <div class="why-choose-one__form-btn">
                                    <button type="submit" class="thm-btn" id="submit-btn">
                                        {{ __('Send Request') }}
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

                    <div class="result"></div>
                </div>
            </div>
            <!--End Why Choose One Form-->
        </div>
    </div>
</section>
@push('secondary_scripts')
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
@endpush
