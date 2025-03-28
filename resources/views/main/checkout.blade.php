@extends("main.include.layout")
@section("content")

<div>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">Checkout</h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Checkout</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="checkout-section section-padding-2">
        <div class="container-fluid custom-container">
            <!-- Checkout Start -->
            <div class="checkout-wrapper">
                <div class="row gy-3">
                    <div class="col-lg-6">
                        <!-- Checkout Info Start -->
                        <div class="checkout-info">
                            <div class="checkout-info__title">
                                {{-- <img src="assets/images/icon/coupon.svg" alt="Coupon" /> --}}
                                Have a coupon?
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#coupon">
                                    Click here to enter your code
                                </button>
                            </div>
                            <div class="collapse" id="coupon">
                                <div class="checkout-info__body">
                                    <p>
                                        If you have a coupon code,
                                        please apply it below.
                                    </p>
                                    <form action="#">
                                        <div class="checkout-coupon-form single-form">
                                            <input class="single-form__input" type="text" placeholder="Coupon code" />
                                            <button class="single-form__btn btn" class="single">
                                                Apply coupon
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Info End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Checkout Info Start -->
                        <div class="checkout-info">
                            <div class="checkout-info__title">
                                {{-- <i class="lastudioicon-single-01-2"></i> --}}
                                Returning customer?
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#login">
                                    Click here to login
                                </button>
                            </div>
                            <div class="collapse" id="login">
                                <div class="checkout-info__body">
                                    <p>
                                        If you have shopped with us
                                        before, please enter your
                                        details below. If you are a new
                                        customer, please proceed to the
                                        Billing section.
                                    </p>
                                    <form action="#">
                                        <!-- Login Form End -->
                                        <div class="checkout-login-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-form">
                                                        <label class="single-form__label">Username or
                                                            email
                                                            *</label>
                                                        <input class="single-form__input" type="text" placeholder="Coupon code" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form">
                                                        <label class="single-form__label">Password
                                                            *</label>
                                                        <input class="single-form__input" type="text" placeholder="Coupon code" />
                                                    </div>
                                                </div>
                                            </div>

                                            <p>
                                                Login with your Social
                                                ID
                                            </p>
                                            <ul class="login-register__social">
                                                <li>
                                                    <a class="social-facebook" href="#">
                                                        <span
                                                                class="social-icon"
                                                            >
                                                                <img
                                                                    src="assets/images/facebook.svg"
                                                                    alt="Facebook"
                                                                />
                                                            </span>
                                                        <span
                                                                class="social-text"
                                                            >
                                                                Login with
                                                                Facebook
                                                            </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="social-google" href="#">
                                                        <span
                                                                class="social-icon"
                                                            >
                                                                <img
                                                                    src="assets/images/google.svg"
                                                                    alt="Facebook"
                                                                />
                                                            </span>
                                                        <span
                                                                class="social-text"
                                                            >
                                                                Login with
                                                                Google
                                                            </span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input class="single-form__input" type="checkbox" id="remember" />
                                                <label for="remember" class="single-form__label checkbox-label"><span></span>
                                                    Remember me</label>
                                            </div>
                                            <!-- Single Form Start -->
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <button class="single-form__btn btn">
                                                    Log In
                                                </button>
                                            </div>
                                            <!-- Single Form Start -->
                                        </div>
                                        <!-- Login Form End -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Info End -->
                    </div>
                </div>

                <div class="checkout-row">
                    <div class="checkout-col-1">
                        <!-- Checkout Details Start -->
                        <div class="checkout-details">
                            <h3 class="checkout-details__title">
                                Billing details
                            </h3>

                            <!-- Checkout Details Billing Start -->
                            <div class="checkout-details__billing">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">First name *</label>
                                            <input class="single-form__input" type="text" />
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Last name *</label>
                                            <input class="single-form__input" type="text" />
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                </div>
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">Company name (optional)</label>
                                    <input class="single-form__input" type="text" />
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">Country / Region *</label>
                                    <select class="single-form__select select2">
                                        <option value="">
                                            Select a country / region…
                                        </option>
                                        <option value="AF">
                                            Afghanistan
                                        </option>
                                        <option value="AX">
                                            Åland Islands
                                        </option>
                                        <option value="AL">
                                            Albania
                                        </option>
                                        <option value="DZ">
                                            Algeria
                                        </option>
                                        <option value="AS">
                                            American Samoa
                                        </option>
                                        <option value="AD">
                                            Andorra
                                        </option>
                                        <option value="AO">
                                            Angola
                                        </option>
                                        <option value="AI">
                                            Anguilla
                                        </option>
                                        <option value="AQ">
                                            Antarctica
                                        </option>
                                        <option value="AG">
                                            Antigua and Barbuda
                                        </option>
                                        <option value="AR">
                                            Argentina
                                        </option>
                                        <option value="AM">
                                            Armenia
                                        </option>
                                        <option value="AW">
                                            Aruba
                                        </option>
                                        <option value="AU">
                                            Australia
                                        </option>
                                        <option value="AT">
                                            Austria
                                        </option>
                                        <option value="AZ">
                                            Azerbaijan
                                        </option>
                                        <option value="BS">
                                            Bahamas
                                        </option>
                                        <option value="BH">
                                            Bahrain
                                        </option>
                                        <option value="BD">
                                            Bangladesh
                                        </option>
                                        <option value="BB">
                                            Barbados
                                        </option>
                                        <option value="BY">
                                            Belarus
                                        </option>
                                        <option value="PW">
                                            Belau
                                        </option>
                                        <option value="BE">
                                            Belgium
                                        </option>
                                        <option value="BZ">
                                            Belize
                                        </option>
                                        <option value="BJ">
                                            Benin
                                        </option>
                                        <option value="BM">
                                            Bermuda
                                        </option>
                                        <option value="BT">
                                            Bhutan
                                        </option>
                                        <option value="BO">
                                            Bolivia
                                        </option>
                                        <option value="BQ">
                                            Bonaire, Saint Eustatius and
                                            Saba
                                        </option>
                                        <option value="BA">
                                            Bosnia and Herzegovina
                                        </option>
                                        <option value="BW">
                                            Botswana
                                        </option>
                                        <option value="BV">
                                            Bouvet Island
                                        </option>
                                        <option value="BR">
                                            Brazil
                                        </option>
                                        <option value="IO">
                                            British Indian Ocean
                                            Territory
                                        </option>
                                        <option value="BN">
                                            Brunei
                                        </option>
                                        <option value="BG">
                                            Bulgaria
                                        </option>
                                        <option value="BF">
                                            Burkina Faso
                                        </option>
                                        <option value="BI">
                                            Burundi
                                        </option>
                                        <option value="KH">
                                            Cambodia
                                        </option>
                                        <option value="CM">
                                            Cameroon
                                        </option>
                                        <option value="CA">
                                            Canada
                                        </option>
                                        <option value="CV">
                                            Cape Verde
                                        </option>
                                        <option value="KY">
                                            Cayman Islands
                                        </option>
                                        <option value="CF">
                                            Central African Republic
                                        </option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">
                                            Chile
                                        </option>
                                        <option value="CN">
                                            China
                                        </option>
                                        <option value="CX">
                                            Christmas Island
                                        </option>
                                        <option value="CC">
                                            Cocos (Keeling) Islands
                                        </option>
                                        <option value="CO">
                                            Colombia
                                        </option>
                                        <option value="KM">
                                            Comoros
                                        </option>
                                        <option value="CG">
                                            Congo (Brazzaville)
                                        </option>
                                        <option value="CD">
                                            Congo (Kinshasa)
                                        </option>
                                        <option value="CK">
                                            Cook Islands
                                        </option>
                                        <option value="CR">
                                            Costa Rica
                                        </option>
                                        <option value="HR">
                                            Croatia
                                        </option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">
                                            Curaçao
                                        </option>
                                        <option value="CY">
                                            Cyprus
                                        </option>
                                        <option value="CZ">
                                            Czech Republic
                                        </option>
                                        <option value="DK">
                                            Denmark
                                        </option>
                                        <option value="DJ">
                                            Djibouti
                                        </option>
                                        <option value="DM">
                                            Dominica
                                        </option>
                                        <option value="DO">
                                            Dominican Republic
                                        </option>
                                        <option value="EC">
                                            Ecuador
                                        </option>
                                        <option value="EG">
                                            Egypt
                                        </option>
                                        <option value="SV">
                                            El Salvador
                                        </option>
                                        <option value="GQ">
                                            Equatorial Guinea
                                        </option>
                                        <option value="ER">
                                            Eritrea
                                        </option>
                                        <option value="EE">
                                            Estonia
                                        </option>
                                        <option value="SZ">
                                            Eswatini
                                        </option>
                                        <option value="ET">
                                            Ethiopia
                                        </option>
                                        <option value="FK">
                                            Falkland Islands
                                        </option>
                                        <option value="FO">
                                            Faroe Islands
                                        </option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">
                                            Finland
                                        </option>
                                        <option value="FR">
                                            France
                                        </option>
                                        <option value="GF">
                                            French Guiana
                                        </option>
                                        <option value="PF">
                                            French Polynesia
                                        </option>
                                        <option value="TF">
                                            French Southern Territories
                                        </option>
                                        <option value="GA">
                                            Gabon
                                        </option>
                                        <option value="GM">
                                            Gambia
                                        </option>
                                        <option value="GE">
                                            Georgia
                                        </option>
                                        <option value="DE">
                                            Germany
                                        </option>
                                        <option value="GH">
                                            Ghana
                                        </option>
                                        <option value="GI">
                                            Gibraltar
                                        </option>
                                        <option value="GR">
                                            Greece
                                        </option>
                                        <option value="GL">
                                            Greenland
                                        </option>
                                        <option value="GD">
                                            Grenada
                                        </option>
                                        <option value="GP">
                                            Guadeloupe
                                        </option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">
                                            Guatemala
                                        </option>
                                        <option value="GG">
                                            Guernsey
                                        </option>
                                        <option value="GN">
                                            Guinea
                                        </option>
                                        <option value="GW">
                                            Guinea-Bissau
                                        </option>
                                        <option value="GY">
                                            Guyana
                                        </option>
                                        <option value="HT">
                                            Haiti
                                        </option>
                                        <option value="HM">
                                            Heard Island and McDonald
                                            Islands
                                        </option>
                                        <option value="HN">
                                            Honduras
                                        </option>
                                        <option value="HK">
                                            Hong Kong
                                        </option>
                                        <option value="HU">
                                            Hungary
                                        </option>
                                        <option value="IS">
                                            Iceland
                                        </option>
                                        <option value="IN">
                                            India
                                        </option>
                                        <option value="ID">
                                            Indonesia
                                        </option>
                                        <option value="IR">Iran</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">
                                            Ireland
                                        </option>
                                        <option value="IM">
                                            Isle of Man
                                        </option>
                                        <option value="IL">
                                            Israel
                                        </option>
                                        <option value="IT">
                                            Italy
                                        </option>
                                        <option value="CI">
                                            Ivory Coast
                                        </option>
                                        <option value="JM">
                                            Jamaica
                                        </option>
                                        <option value="JP">
                                            Japan
                                        </option>
                                        <option value="JE">
                                            Jersey
                                        </option>
                                        <option value="JO">
                                            Jordan
                                        </option>
                                        <option value="KZ">
                                            Kazakhstan
                                        </option>
                                        <option value="KE">
                                            Kenya
                                        </option>
                                        <option value="KI">
                                            Kiribati
                                        </option>
                                        <option value="KW">
                                            Kuwait
                                        </option>
                                        <option value="KG">
                                            Kyrgyzstan
                                        </option>
                                        <option value="LA">Laos</option>
                                        <option value="LV">
                                            Latvia
                                        </option>
                                        <option value="LB">
                                            Lebanon
                                        </option>
                                        <option value="LS">
                                            Lesotho
                                        </option>
                                        <option value="LR">
                                            Liberia
                                        </option>
                                        <option value="LY">
                                            Libya
                                        </option>
                                        <option value="LI">
                                            Liechtenstein
                                        </option>
                                        <option value="LT">
                                            Lithuania
                                        </option>
                                        <option value="LU">
                                            Luxembourg
                                        </option>
                                        <option value="MO">
                                            Macao
                                        </option>
                                        <option value="MG">
                                            Madagascar
                                        </option>
                                        <option value="MW">
                                            Malawi
                                        </option>
                                        <option value="MY">
                                            Malaysia
                                        </option>
                                        <option value="MV">
                                            Maldives
                                        </option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">
                                            Malta
                                        </option>
                                        <option value="MH">
                                            Marshall Islands
                                        </option>
                                        <option value="MQ">
                                            Martinique
                                        </option>
                                        <option value="MR">
                                            Mauritania
                                        </option>
                                        <option value="MU">
                                            Mauritius
                                        </option>
                                        <option value="YT">
                                            Mayotte
                                        </option>
                                        <option value="MX">
                                            Mexico
                                        </option>
                                        <option value="FM">
                                            Micronesia
                                        </option>
                                        <option value="MD">
                                            Moldova
                                        </option>
                                        <option value="MC">
                                            Monaco
                                        </option>
                                        <option value="MN">
                                            Mongolia
                                        </option>
                                        <option value="ME">
                                            Montenegro
                                        </option>
                                        <option value="MS">
                                            Montserrat
                                        </option>
                                        <option value="MA">
                                            Morocco
                                        </option>
                                        <option value="MZ">
                                            Mozambique
                                        </option>
                                        <option value="MM">
                                            Myanmar
                                        </option>
                                        <option value="NA">
                                            Namibia
                                        </option>
                                        <option value="NR">
                                            Nauru
                                        </option>
                                        <option value="NP">
                                            Nepal
                                        </option>
                                        <option value="NL">
                                            Netherlands
                                        </option>
                                        <option value="NC">
                                            New Caledonia
                                        </option>
                                        <option value="NZ">
                                            New Zealand
                                        </option>
                                        <option value="NI">
                                            Nicaragua
                                        </option>
                                        <option value="NE">
                                            Niger
                                        </option>
                                        <option value="NG">
                                            Nigeria
                                        </option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">
                                            Norfolk Island
                                        </option>
                                        <option value="KP">
                                            North Korea
                                        </option>
                                        <option value="MK">
                                            North Macedonia
                                        </option>
                                        <option value="MP">
                                            Northern Mariana Islands
                                        </option>
                                        <option value="NO">
                                            Norway
                                        </option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">
                                            Pakistan
                                        </option>
                                        <option value="PS">
                                            Palestinian Territory
                                        </option>
                                        <option value="PA">
                                            Panama
                                        </option>
                                        <option value="PG">
                                            Papua New Guinea
                                        </option>
                                        <option value="PY">
                                            Paraguay
                                        </option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">
                                            Philippines
                                        </option>
                                        <option value="PN">
                                            Pitcairn
                                        </option>
                                        <option value="PL">
                                            Poland
                                        </option>
                                        <option value="PT">
                                            Portugal
                                        </option>
                                        <option value="PR">
                                            Puerto Rico
                                        </option>
                                        <option value="QA">
                                            Qatar
                                        </option>
                                        <option value="RE">
                                            Reunion
                                        </option>
                                        <option value="RO">
                                            Romania
                                        </option>
                                        <option value="RU">
                                            Russia
                                        </option>
                                        <option value="RW">
                                            Rwanda
                                        </option>
                                        <option value="ST">
                                            São Tomé and Príncipe
                                        </option>
                                        <option value="BL">
                                            Saint Barthélemy
                                        </option>
                                        <option value="SH">
                                            Saint Helena
                                        </option>
                                        <option value="KN">
                                            Saint Kitts and Nevis
                                        </option>
                                        <option value="LC">
                                            Saint Lucia
                                        </option>
                                        <option value="SX">
                                            Saint Martin (Dutch part)
                                        </option>
                                        <option value="MF">
                                            Saint Martin (French part)
                                        </option>
                                        <option value="PM">
                                            Saint Pierre and Miquelon
                                        </option>
                                        <option value="VC">
                                            Saint Vincent and the
                                            Grenadines
                                        </option>
                                        <option value="WS">
                                            Samoa
                                        </option>
                                        <option value="SM">
                                            San Marino
                                        </option>
                                        <option value="SA">
                                            Saudi Arabia
                                        </option>
                                        <option value="SN">
                                            Senegal
                                        </option>
                                        <option value="RS">
                                            Serbia
                                        </option>
                                        <option value="SC">
                                            Seychelles
                                        </option>
                                        <option value="SL">
                                            Sierra Leone
                                        </option>
                                        <option value="SG">
                                            Singapore
                                        </option>
                                        <option value="SK">
                                            Slovakia
                                        </option>
                                        <option value="SI">
                                            Slovenia
                                        </option>
                                        <option value="SB">
                                            Solomon Islands
                                        </option>
                                        <option value="SO">
                                            Somalia
                                        </option>
                                        <option value="ZA">
                                            South Africa
                                        </option>
                                        <option value="GS">
                                            South Georgia/Sandwich
                                            Islands
                                        </option>
                                        <option value="KR">
                                            South Korea
                                        </option>
                                        <option value="SS">
                                            South Sudan
                                        </option>
                                        <option value="ES">
                                            Spain
                                        </option>
                                        <option value="LK">
                                            Sri Lanka
                                        </option>
                                        <option value="SD">
                                            Sudan
                                        </option>
                                        <option value="SR">
                                            Suriname
                                        </option>
                                        <option value="SJ">
                                            Svalbard and Jan Mayen
                                        </option>
                                        <option value="SE">
                                            Sweden
                                        </option>
                                        <option value="CH">
                                            Switzerland
                                        </option>
                                        <option value="SY">
                                            Syria
                                        </option>
                                        <option value="TW">
                                            Taiwan
                                        </option>
                                        <option value="TJ">
                                            Tajikistan
                                        </option>
                                        <option value="TZ">
                                            Tanzania
                                        </option>
                                        <option value="TH">
                                            Thailand
                                        </option>
                                        <option value="TL">
                                            Timor-Leste
                                        </option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">
                                            Tokelau
                                        </option>
                                        <option value="TO">
                                            Tonga
                                        </option>
                                        <option value="TT">
                                            Trinidad and Tobago
                                        </option>
                                        <option value="TN">
                                            Tunisia
                                        </option>
                                        <option value="TR">
                                            Turkey
                                        </option>
                                        <option value="TM">
                                            Turkmenistan
                                        </option>
                                        <option value="TC">
                                            Turks and Caicos Islands
                                        </option>
                                        <option value="TV">
                                            Tuvalu
                                        </option>
                                        <option value="UG">
                                            Uganda
                                        </option>
                                        <option value="UA">
                                            Ukraine
                                        </option>
                                        <option value="AE">
                                            United Arab Emirates
                                        </option>
                                        <option value="GB">
                                            United Kingdom (UK)
                                        </option>
                                        <option value="US" selected="selected">
                                            United States (US)
                                        </option>
                                        <option value="UM">
                                            United States (US) Minor
                                            Outlying Islands
                                        </option>
                                        <option value="UY">
                                            Uruguay
                                        </option>
                                        <option value="UZ">
                                            Uzbekistan
                                        </option>
                                        <option value="VU">
                                            Vanuatu
                                        </option>
                                        <option value="VA">
                                            Vatican
                                        </option>
                                        <option value="VE">
                                            Venezuela
                                        </option>
                                        <option value="VN">
                                            Vietnam
                                        </option>
                                        <option value="VG">
                                            Virgin Islands (British)
                                        </option>
                                        <option value="VI">
                                            Virgin Islands (US)
                                        </option>
                                        <option value="WF">
                                            Wallis and Futuna
                                        </option>
                                        <option value="EH">
                                            Western Sahara
                                        </option>
                                        <option value="YE">
                                            Yemen
                                        </option>
                                        <option value="ZM">
                                            Zambia
                                        </option>
                                        <option value="ZW">
                                            Zimbabwe
                                        </option>
                                    </select>
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">Street address *</label>
                                    <input class="single-form__input" type="text" placeholder="House number and street name" />
                                    <input class="single-form__input" type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">Suburb *</label>
                                    <input class="single-form__input" type="text" />
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">State *</label>
                                    <select class="single-form__select select2">
                                        <option value="">
                                            Select an option…
                                        </option>
                                        <option value="ACT">
                                            Australian Capital Territory
                                        </option>
                                        <option value="NSW">
                                            New South Wales
                                        </option>
                                        <option value="NT">
                                            Northern Territory
                                        </option>
                                        <option value="QLD">
                                            Queensland
                                        </option>
                                        <option value="SA">
                                            South Australia
                                        </option>
                                        <option value="TAS">
                                            Tasmania
                                        </option>
                                        <option value="VIC">
                                            Victoria
                                        </option>
                                        <option value="WA">
                                            Western Australia
                                        </option>
                                    </select>
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">Postcode *</label>
                                    <input class="single-form__input" type="text" />
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">Phone *</label>
                                    <input class="single-form__input" type="text" />
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <label class="single-form__label">Email address *</label>
                                    <input class="single-form__input" type="email" />
                                </div>
                                <!-- Single Form End -->
                            </div>
                            <!-- Checkout Details Billing End -->

                            <!-- Checkout Details Account Start -->
                            <div class="checkout-details__account">
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input type="checkbox" id="account" class="account" />

                                    <label for="account" class="single-form__label checkbox-label"><span></span> Create an
                                        account?</label>
                                </div>
                                <!-- Single Form End -->

                                <div class="checkout-account">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Create account password
                                            *</label>
                                        <input class="single-form__input" type="password" placeholder="Password" />
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                            </div>
                            <!-- Checkout Details Account End -->

                            <!-- Checkout Details Shipping Start -->
                            <div class="checkout-details__shipping">
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input type="checkbox" id="shipping" class="shipping" />

                                    <label for="shipping" class="single-form__label checkbox-label"><span></span> Ship to a
                                        different address?</label>
                                </div>
                                <!-- Single Form End -->

                                <div class="checkout-shipping">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">First name *</label>
                                                <input class="single-form__input" type="text" />
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">Last name *</label>
                                                <input class="single-form__input" type="text" />
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                    </div>
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Company name
                                            (optional)</label>
                                        <input class="single-form__input" type="text" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Country / Region *</label>
                                        <select class="single-form__select select2">
                                            <option value="">
                                                Select a country /
                                                region…
                                            </option>
                                            <option value="AF">
                                                Afghanistan
                                            </option>
                                            <option value="AX">
                                                Åland Islands
                                            </option>
                                            <option value="AL">
                                                Albania
                                            </option>
                                            <option value="DZ">
                                                Algeria
                                            </option>
                                            <option value="AS">
                                                American Samoa
                                            </option>
                                            <option value="AD">
                                                Andorra
                                            </option>
                                            <option value="AO">
                                                Angola
                                            </option>
                                            <option value="AI">
                                                Anguilla
                                            </option>
                                            <option value="AQ">
                                                Antarctica
                                            </option>
                                            <option value="AG">
                                                Antigua and Barbuda
                                            </option>
                                            <option value="AR">
                                                Argentina
                                            </option>
                                            <option value="AM">
                                                Armenia
                                            </option>
                                            <option value="AW">
                                                Aruba
                                            </option>
                                            <option value="AU">
                                                Australia
                                            </option>
                                            <option value="AT">
                                                Austria
                                            </option>
                                            <option value="AZ">
                                                Azerbaijan
                                            </option>
                                            <option value="BS">
                                                Bahamas
                                            </option>
                                            <option value="BH">
                                                Bahrain
                                            </option>
                                            <option value="BD">
                                                Bangladesh
                                            </option>
                                            <option value="BB">
                                                Barbados
                                            </option>
                                            <option value="BY">
                                                Belarus
                                            </option>
                                            <option value="PW">
                                                Belau
                                            </option>
                                            <option value="BE">
                                                Belgium
                                            </option>
                                            <option value="BZ">
                                                Belize
                                            </option>
                                            <option value="BJ">
                                                Benin
                                            </option>
                                            <option value="BM">
                                                Bermuda
                                            </option>
                                            <option value="BT">
                                                Bhutan
                                            </option>
                                            <option value="BO">
                                                Bolivia
                                            </option>
                                            <option value="BQ">
                                                Bonaire, Saint Eustatius
                                                and Saba
                                            </option>
                                            <option value="BA">
                                                Bosnia and Herzegovina
                                            </option>
                                            <option value="BW">
                                                Botswana
                                            </option>
                                            <option value="BV">
                                                Bouvet Island
                                            </option>
                                            <option value="BR">
                                                Brazil
                                            </option>
                                            <option value="IO">
                                                British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="BN">
                                                Brunei
                                            </option>
                                            <option value="BG">
                                                Bulgaria
                                            </option>
                                            <option value="BF">
                                                Burkina Faso
                                            </option>
                                            <option value="BI">
                                                Burundi
                                            </option>
                                            <option value="KH">
                                                Cambodia
                                            </option>
                                            <option value="CM">
                                                Cameroon
                                            </option>
                                            <option value="CA">
                                                Canada
                                            </option>
                                            <option value="CV">
                                                Cape Verde
                                            </option>
                                            <option value="KY">
                                                Cayman Islands
                                            </option>
                                            <option value="CF">
                                                Central African Republic
                                            </option>
                                            <option value="TD">
                                                Chad
                                            </option>
                                            <option value="CL">
                                                Chile
                                            </option>
                                            <option value="CN">
                                                China
                                            </option>
                                            <option value="CX">
                                                Christmas Island
                                            </option>
                                            <option value="CC">
                                                Cocos (Keeling) Islands
                                            </option>
                                            <option value="CO">
                                                Colombia
                                            </option>
                                            <option value="KM">
                                                Comoros
                                            </option>
                                            <option value="CG">
                                                Congo (Brazzaville)
                                            </option>
                                            <option value="CD">
                                                Congo (Kinshasa)
                                            </option>
                                            <option value="CK">
                                                Cook Islands
                                            </option>
                                            <option value="CR">
                                                Costa Rica
                                            </option>
                                            <option value="HR">
                                                Croatia
                                            </option>
                                            <option value="CU">
                                                Cuba
                                            </option>
                                            <option value="CW">
                                                Curaçao
                                            </option>
                                            <option value="CY">
                                                Cyprus
                                            </option>
                                            <option value="CZ">
                                                Czech Republic
                                            </option>
                                            <option value="DK">
                                                Denmark
                                            </option>
                                            <option value="DJ">
                                                Djibouti
                                            </option>
                                            <option value="DM">
                                                Dominica
                                            </option>
                                            <option value="DO">
                                                Dominican Republic
                                            </option>
                                            <option value="EC">
                                                Ecuador
                                            </option>
                                            <option value="EG">
                                                Egypt
                                            </option>
                                            <option value="SV">
                                                El Salvador
                                            </option>
                                            <option value="GQ">
                                                Equatorial Guinea
                                            </option>
                                            <option value="ER">
                                                Eritrea
                                            </option>
                                            <option value="EE">
                                                Estonia
                                            </option>
                                            <option value="SZ">
                                                Eswatini
                                            </option>
                                            <option value="ET">
                                                Ethiopia
                                            </option>
                                            <option value="FK">
                                                Falkland Islands
                                            </option>
                                            <option value="FO">
                                                Faroe Islands
                                            </option>
                                            <option value="FJ">
                                                Fiji
                                            </option>
                                            <option value="FI">
                                                Finland
                                            </option>
                                            <option value="FR">
                                                France
                                            </option>
                                            <option value="GF">
                                                French Guiana
                                            </option>
                                            <option value="PF">
                                                French Polynesia
                                            </option>
                                            <option value="TF">
                                                French Southern
                                                Territories
                                            </option>
                                            <option value="GA">
                                                Gabon
                                            </option>
                                            <option value="GM">
                                                Gambia
                                            </option>
                                            <option value="GE">
                                                Georgia
                                            </option>
                                            <option value="DE">
                                                Germany
                                            </option>
                                            <option value="GH">
                                                Ghana
                                            </option>
                                            <option value="GI">
                                                Gibraltar
                                            </option>
                                            <option value="GR">
                                                Greece
                                            </option>
                                            <option value="GL">
                                                Greenland
                                            </option>
                                            <option value="GD">
                                                Grenada
                                            </option>
                                            <option value="GP">
                                                Guadeloupe
                                            </option>
                                            <option value="GU">
                                                Guam
                                            </option>
                                            <option value="GT">
                                                Guatemala
                                            </option>
                                            <option value="GG">
                                                Guernsey
                                            </option>
                                            <option value="GN">
                                                Guinea
                                            </option>
                                            <option value="GW">
                                                Guinea-Bissau
                                            </option>
                                            <option value="GY">
                                                Guyana
                                            </option>
                                            <option value="HT">
                                                Haiti
                                            </option>
                                            <option value="HM">
                                                Heard Island and
                                                McDonald Islands
                                            </option>
                                            <option value="HN">
                                                Honduras
                                            </option>
                                            <option value="HK">
                                                Hong Kong
                                            </option>
                                            <option value="HU">
                                                Hungary
                                            </option>
                                            <option value="IS">
                                                Iceland
                                            </option>
                                            <option value="IN">
                                                India
                                            </option>
                                            <option value="ID">
                                                Indonesia
                                            </option>
                                            <option value="IR">
                                                Iran
                                            </option>
                                            <option value="IQ">
                                                Iraq
                                            </option>
                                            <option value="IE">
                                                Ireland
                                            </option>
                                            <option value="IM">
                                                Isle of Man
                                            </option>
                                            <option value="IL">
                                                Israel
                                            </option>
                                            <option value="IT">
                                                Italy
                                            </option>
                                            <option value="CI">
                                                Ivory Coast
                                            </option>
                                            <option value="JM">
                                                Jamaica
                                            </option>
                                            <option value="JP">
                                                Japan
                                            </option>
                                            <option value="JE">
                                                Jersey
                                            </option>
                                            <option value="JO">
                                                Jordan
                                            </option>
                                            <option value="KZ">
                                                Kazakhstan
                                            </option>
                                            <option value="KE">
                                                Kenya
                                            </option>
                                            <option value="KI">
                                                Kiribati
                                            </option>
                                            <option value="KW">
                                                Kuwait
                                            </option>
                                            <option value="KG">
                                                Kyrgyzstan
                                            </option>
                                            <option value="LA">
                                                Laos
                                            </option>
                                            <option value="LV">
                                                Latvia
                                            </option>
                                            <option value="LB">
                                                Lebanon
                                            </option>
                                            <option value="LS">
                                                Lesotho
                                            </option>
                                            <option value="LR">
                                                Liberia
                                            </option>
                                            <option value="LY">
                                                Libya
                                            </option>
                                            <option value="LI">
                                                Liechtenstein
                                            </option>
                                            <option value="LT">
                                                Lithuania
                                            </option>
                                            <option value="LU">
                                                Luxembourg
                                            </option>
                                            <option value="MO">
                                                Macao
                                            </option>
                                            <option value="MG">
                                                Madagascar
                                            </option>
                                            <option value="MW">
                                                Malawi
                                            </option>
                                            <option value="MY">
                                                Malaysia
                                            </option>
                                            <option value="MV">
                                                Maldives
                                            </option>
                                            <option value="ML">
                                                Mali
                                            </option>
                                            <option value="MT">
                                                Malta
                                            </option>
                                            <option value="MH">
                                                Marshall Islands
                                            </option>
                                            <option value="MQ">
                                                Martinique
                                            </option>
                                            <option value="MR">
                                                Mauritania
                                            </option>
                                            <option value="MU">
                                                Mauritius
                                            </option>
                                            <option value="YT">
                                                Mayotte
                                            </option>
                                            <option value="MX">
                                                Mexico
                                            </option>
                                            <option value="FM">
                                                Micronesia
                                            </option>
                                            <option value="MD">
                                                Moldova
                                            </option>
                                            <option value="MC">
                                                Monaco
                                            </option>
                                            <option value="MN">
                                                Mongolia
                                            </option>
                                            <option value="ME">
                                                Montenegro
                                            </option>
                                            <option value="MS">
                                                Montserrat
                                            </option>
                                            <option value="MA">
                                                Morocco
                                            </option>
                                            <option value="MZ">
                                                Mozambique
                                            </option>
                                            <option value="MM">
                                                Myanmar
                                            </option>
                                            <option value="NA">
                                                Namibia
                                            </option>
                                            <option value="NR">
                                                Nauru
                                            </option>
                                            <option value="NP">
                                                Nepal
                                            </option>
                                            <option value="NL">
                                                Netherlands
                                            </option>
                                            <option value="NC">
                                                New Caledonia
                                            </option>
                                            <option value="NZ">
                                                New Zealand
                                            </option>
                                            <option value="NI">
                                                Nicaragua
                                            </option>
                                            <option value="NE">
                                                Niger
                                            </option>
                                            <option value="NG">
                                                Nigeria
                                            </option>
                                            <option value="NU">
                                                Niue
                                            </option>
                                            <option value="NF">
                                                Norfolk Island
                                            </option>
                                            <option value="KP">
                                                North Korea
                                            </option>
                                            <option value="MK">
                                                North Macedonia
                                            </option>
                                            <option value="MP">
                                                Northern Mariana Islands
                                            </option>
                                            <option value="NO">
                                                Norway
                                            </option>
                                            <option value="OM">
                                                Oman
                                            </option>
                                            <option value="PK">
                                                Pakistan
                                            </option>
                                            <option value="PS">
                                                Palestinian Territory
                                            </option>
                                            <option value="PA">
                                                Panama
                                            </option>
                                            <option value="PG">
                                                Papua New Guinea
                                            </option>
                                            <option value="PY">
                                                Paraguay
                                            </option>
                                            <option value="PE">
                                                Peru
                                            </option>
                                            <option value="PH">
                                                Philippines
                                            </option>
                                            <option value="PN">
                                                Pitcairn
                                            </option>
                                            <option value="PL">
                                                Poland
                                            </option>
                                            <option value="PT">
                                                Portugal
                                            </option>
                                            <option value="PR">
                                                Puerto Rico
                                            </option>
                                            <option value="QA">
                                                Qatar
                                            </option>
                                            <option value="RE">
                                                Reunion
                                            </option>
                                            <option value="RO">
                                                Romania
                                            </option>
                                            <option value="RU">
                                                Russia
                                            </option>
                                            <option value="RW">
                                                Rwanda
                                            </option>
                                            <option value="ST">
                                                São Tomé and Príncipe
                                            </option>
                                            <option value="BL">
                                                Saint Barthélemy
                                            </option>
                                            <option value="SH">
                                                Saint Helena
                                            </option>
                                            <option value="KN">
                                                Saint Kitts and Nevis
                                            </option>
                                            <option value="LC">
                                                Saint Lucia
                                            </option>
                                            <option value="SX">
                                                Saint Martin (Dutch
                                                part)
                                            </option>
                                            <option value="MF">
                                                Saint Martin (French
                                                part)
                                            </option>
                                            <option value="PM">
                                                Saint Pierre and
                                                Miquelon
                                            </option>
                                            <option value="VC">
                                                Saint Vincent and the
                                                Grenadines
                                            </option>
                                            <option value="WS">
                                                Samoa
                                            </option>
                                            <option value="SM">
                                                San Marino
                                            </option>
                                            <option value="SA">
                                                Saudi Arabia
                                            </option>
                                            <option value="SN">
                                                Senegal
                                            </option>
                                            <option value="RS">
                                                Serbia
                                            </option>
                                            <option value="SC">
                                                Seychelles
                                            </option>
                                            <option value="SL">
                                                Sierra Leone
                                            </option>
                                            <option value="SG">
                                                Singapore
                                            </option>
                                            <option value="SK">
                                                Slovakia
                                            </option>
                                            <option value="SI">
                                                Slovenia
                                            </option>
                                            <option value="SB">
                                                Solomon Islands
                                            </option>
                                            <option value="SO">
                                                Somalia
                                            </option>
                                            <option value="ZA">
                                                South Africa
                                            </option>
                                            <option value="GS">
                                                South Georgia/Sandwich
                                                Islands
                                            </option>
                                            <option value="KR">
                                                South Korea
                                            </option>
                                            <option value="SS">
                                                South Sudan
                                            </option>
                                            <option value="ES">
                                                Spain
                                            </option>
                                            <option value="LK">
                                                Sri Lanka
                                            </option>
                                            <option value="SD">
                                                Sudan
                                            </option>
                                            <option value="SR">
                                                Suriname
                                            </option>
                                            <option value="SJ">
                                                Svalbard and Jan Mayen
                                            </option>
                                            <option value="SE">
                                                Sweden
                                            </option>
                                            <option value="CH">
                                                Switzerland
                                            </option>
                                            <option value="SY">
                                                Syria
                                            </option>
                                            <option value="TW">
                                                Taiwan
                                            </option>
                                            <option value="TJ">
                                                Tajikistan
                                            </option>
                                            <option value="TZ">
                                                Tanzania
                                            </option>
                                            <option value="TH">
                                                Thailand
                                            </option>
                                            <option value="TL">
                                                Timor-Leste
                                            </option>
                                            <option value="TG">
                                                Togo
                                            </option>
                                            <option value="TK">
                                                Tokelau
                                            </option>
                                            <option value="TO">
                                                Tonga
                                            </option>
                                            <option value="TT">
                                                Trinidad and Tobago
                                            </option>
                                            <option value="TN">
                                                Tunisia
                                            </option>
                                            <option value="TR">
                                                Turkey
                                            </option>
                                            <option value="TM">
                                                Turkmenistan
                                            </option>
                                            <option value="TC">
                                                Turks and Caicos Islands
                                            </option>
                                            <option value="TV">
                                                Tuvalu
                                            </option>
                                            <option value="UG">
                                                Uganda
                                            </option>
                                            <option value="UA">
                                                Ukraine
                                            </option>
                                            <option value="AE">
                                                United Arab Emirates
                                            </option>
                                            <option value="GB">
                                                United Kingdom (UK)
                                            </option>
                                            <option value="US" selected="selected">
                                                United States (US)
                                            </option>
                                            <option value="UM">
                                                United States (US) Minor
                                                Outlying Islands
                                            </option>
                                            <option value="UY">
                                                Uruguay
                                            </option>
                                            <option value="UZ">
                                                Uzbekistan
                                            </option>
                                            <option value="VU">
                                                Vanuatu
                                            </option>
                                            <option value="VA">
                                                Vatican
                                            </option>
                                            <option value="VE">
                                                Venezuela
                                            </option>
                                            <option value="VN">
                                                Vietnam
                                            </option>
                                            <option value="VG">
                                                Virgin Islands (British)
                                            </option>
                                            <option value="VI">
                                                Virgin Islands (US)
                                            </option>
                                            <option value="WF">
                                                Wallis and Futuna
                                            </option>
                                            <option value="EH">
                                                Western Sahara
                                            </option>
                                            <option value="YE">
                                                Yemen
                                            </option>
                                            <option value="ZM">
                                                Zambia
                                            </option>
                                            <option value="ZW">
                                                Zimbabwe
                                            </option>
                                        </select>
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Street address *</label>
                                        <input class="single-form__input" type="text" placeholder="House number and street name" />
                                        <input class="single-form__input" type="text" placeholder="Apartment, suite, unit, etc. (optional)" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Suburb *</label>
                                        <input class="single-form__input" type="text" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">State *</label>
                                        <select class="single-form__select select2">
                                            <option value="">
                                                Select an option…
                                            </option>
                                            <option value="ACT">
                                                Australian Capital
                                                Territory
                                            </option>
                                            <option value="NSW">
                                                New South Wales
                                            </option>
                                            <option value="NT">
                                                Northern Territory
                                            </option>
                                            <option value="QLD">
                                                Queensland
                                            </option>
                                            <option value="SA">
                                                South Australia
                                            </option>
                                            <option value="TAS">
                                                Tasmania
                                            </option>
                                            <option value="VIC">
                                                Victoria
                                            </option>
                                            <option value="WA">
                                                Western Australia
                                            </option>
                                        </select>
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Postcode *</label>
                                        <input class="single-form__input" type="text" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Phone *</label>
                                        <input class="single-form__input" type="text" />
                                    </div>
                                    <!-- Single Form End -->
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Email address *</label>
                                        <input class="single-form__input" type="email" />
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                            </div>
                            <!-- Checkout Details Shipping End -->

                            <!-- Single Form Start -->
                            <div class="single-form">
                                <label class="single-form__label">Order notes (optional)</label>
                                <textarea class="single-form__input" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                            <!-- Single Form End -->
                        </div>
                        <!-- Checkout Details End -->
                    </div>
                    <div class="checkout-col-2">
                        <!-- Checkout Details Start -->
                        <div class="checkout-details">
                            <h3 class="checkout-details__title">
                                Your order
                            </h3>

                            <div class="checkout-details__order-review">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">
                                                Product
                                            </th>
                                            <th class="product-total">
                                                Subtotal
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart-item">
                                            <td class="product-name">
                                                Bomber jacket&nbsp;
                                                <strong
                                                        >×&nbsp;1</strong>
                                            </td>
                                            <td class="product-total">
                                                <span> $69.99 </span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Textured overshirt&nbsp;
                                                <strong
                                                        >×&nbsp;1</strong>
                                            </td>
                                            <td class="product-total">
                                                <span> $89.99 </span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Oversize linen
                                                blazer&nbsp;
                                                <strong
                                                        >×&nbsp;1</strong>
                                            </td>
                                            <td class="product-total">
                                                <span> $36.99 </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td>
                                                <span> $196.97 </span>
                                            </td>
                                        </tr>

                                        <tr class="cart-shipping">
                                            <th>Shipping</th>
                                            <td data-title="Shipping">
                                                <form action="#">
                                                    <ul class="shipping-methods">
                                                        <li class="single-form">
                                                            <input type="radio" name="shippingMethod" id="flat-rate" />
                                                            <label for="flat-rate" class="single-form__label radio-label">
                                                                <span></span>
                                                                Flat
                                                                rate:
                                                                <strong
                                                                        class="price"
                                                                    >
                                                                        $20.00
                                                                    </strong>
                                                            </label>
                                                        </li>
                                                        <li class="single-form">
                                                            <input type="radio" name="shippingMethod" id="local-pickup" />
                                                            <label for="local-pickup" class="single-form__label radio-label">
                                                                <span></span>
                                                                Local
                                                                pickup
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong>
                                                        <span>
                                                            $196.97
                                                        </span>
                                                    </strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="checkout-details__payment-method">
                                    <div class="accordion" id="payment-method">
                                        <form action="#">
                                            <div class="accordion-item">
                                                <div class="single-form" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                                    <input type="radio" name="payment-method" id="bank-transfer" />
                                                    <label for="bank-transfer" class="single-form__label radio-label">
                                                        <span></span>
                                                        Direct bank
                                                        transfer
                                                    </label>
                                                </div>
                                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#payment-method">
                                                    <div class="payment-method-body">
                                                        <p>
                                                            Make your
                                                            payment
                                                            directly
                                                            into our
                                                            bank
                                                            account.
                                                            Please use
                                                            your Order
                                                            ID as the
                                                            payment
                                                            reference.
                                                            Your order
                                                            will not be
                                                            shipped
                                                            until the
                                                            funds have
                                                            cleared in
                                                            our account.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <div class="single-form collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                                    <input type="radio" name="payment-method" id="check-payment" />
                                                    <label for="check-payment" class="single-form__label radio-label">
                                                        <span></span>
                                                        Check payments
                                                    </label>
                                                </div>
                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#payment-method">
                                                    <div class="payment-method-body">
                                                        <p>
                                                            Make your
                                                            payment
                                                            directly
                                                            into our
                                                            bank
                                                            account.
                                                            Please use
                                                            your Order
                                                            ID as the
                                                            payment
                                                            reference.
                                                            Your order
                                                            will not be
                                                            shipped
                                                            until the
                                                            funds have
                                                            cleared in
                                                            our account.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <div class="single-form collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                                    <input type="radio" name="payment-method" id="cash-on-delivery" />
                                                    <label for="cash-on-delivery" class="single-form__label radio-label">
                                                        <span></span>
                                                        Cash On Delivery
                                                    </label>
                                                </div>
                                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#payment-method">
                                                    <div class="payment-method-body">
                                                        <p>
                                                            Make your
                                                            payment
                                                            directly
                                                            into our
                                                            bank
                                                            account.
                                                            Please use
                                                            your Order
                                                            ID as the
                                                            payment
                                                            reference.
                                                            Your order
                                                            will not be
                                                            shipped
                                                            until the
                                                            funds have
                                                            cleared in
                                                            our account.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="checkout-details__privacy-policy">
                                    <p>
                                        Your personal data will be used
                                        to process your order, support
                                        your experience throughout this
                                        website, and for other purposes
                                        described in our privacy policy.
                                    </p>
                                </div>

                                <div class="checkout-details__btn">
                                    <button class="btn">
                                        Place Order
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Details End -->
                    </div>
                </div>
            </div>
            <!-- Checkout End -->
        </div>
    </div>
    <!-- Checkout End -->

    <!-- Newsletter Start -->
    <!-- Newsletter Start -->
    <div class="newsletter-section">
        <div class="newsletter-left" style="background-image: url(assets/images/newsletter-bg-1.jpg)">
            <!-- Newsletter Wrapper Start -->
            <div class="newsletter-wrapper text-center">
                <h4 class="newsletter-wrapper__title">Follow us on</h4>
                <p>
                    Proin volutpat vitae libero at tincidunt. Maecenas sapien
                    lectus, vehicula vel euismod sed, vulputate
                </p>

                <div class="newsletter-social">
                    <ul class="newsletter-social__list">
                        <li>
                            <a href="#" aria-label="facebook">
                                <i class="lastudioicon-b-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="twitter">
                                <i class="lastudioicon-b-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="instagram">
                                <i class="lastudioicon-b-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="vimeo">
                                <i class="lastudioicon-b-vimeo"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-label="envato">
                                <i class="lastudioicon-envato"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Newsletter Wrapper End -->
        </div>
        <div class="newsletter-right" style="background-image: url(assets/images/newsletter-bg-2.jpg)">
            <!-- Newsletter Wrapper Start -->
            <div class="newsletter-wrapper text-center">
                <h4 class="newsletter-wrapper__title">10% off when you sign up</h4>
                <p>
                    Proin volutpat vitae libero at tincidunt. Maecenas sapien
                    lectus, vehicula vel euismod sed, vulputate
                </p>
                <form action="#">
                    <div class="newsletter-form-style-1">
                        <input type="text" placeholder="Enter your email address..." />
                        <button>Subscribe</button>
                    </div>
                </form>
            </div>
            <!-- Newsletter Wrapper End -->
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Newsletter End -->
</div>

@endsection
