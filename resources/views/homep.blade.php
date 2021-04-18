
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Dr. Love Match</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{--    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">--}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--      <link rel="stylesheet" href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ url('landing/css/animate.css') }}">

    <link rel="stylesheet" href="{{ url('landing/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('landing/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ url('landing/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/css/index_custom.css') }}">
    {{--    <link rel="stylesheet" href="{{ url('adminlte/css/master.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ url('adminlte/css/media.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ url('adminlte/css/bootstrap.css') }}">--}}

</head>
<body>


<div class="item-page" itemscope="" itemtype="https://schema.org/Article">
    <meta itemprop="inLanguage" content="en-GB">

    @component('components.topbar')@endcomponent

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-message col-md-4 offset-4">
            <strong>@lang('quickadmin.qa_whoops')</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<!-- Registration Modal -->
        <div class="alert-message col-md-4 offset-4"> </div>
    <div id="id02" class="modal">

        {{--    <form class="modal-content animate"  style="width: 80%"  method="POST" action="{{ url('/api/create_account') }}">--}}


        <div class="modal-content animate login_model"  style="width: 40%;">

            <span onclick="document.getElementById('id02').style.display='none'"  style="top: 2px;right: 10px;" class="close" title="Close Modal">&times;</span>
            <h1  class="modal-title">Join, Its Free <span>and find your Match today</span></h1>
            <div class="register_modal" style="height: 450px;overflow-y: scroll;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4"><label for="uname"><b>Username</b></label></div>
                                <div class="col-lg-8">
                                    <input type="text" placeholder="Enter Username" name="uname" id="uname" class="form-control" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4"><label for="uname"><b>Email</b></label></div>
                                <div class="col-lg-8">
                                    <input type="email" placeholder="Enter Email" name="email" id="email" class="form-control" required>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4"><label for="uname"><b>Confirm Email</b></label></div>
                                <div class="col-lg-8">
                                    <input type="email" placeholder="Confirm Email" name="con_email" id="con_email" class="form-control" required>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4"><label for="psw"><b>Password</b></label></div>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>Confirm Password </b></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="con_psw" id="con_psw" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>Date of Birth</b></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="date" placeholder="DD/MM/YYYY" class="form-control" name="dob" id="dob" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>I am a</b></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="gender" class="form-control" id="gender" aria-invalid="false">
                                        <option value="0">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>Looking for a</b></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="lookingfor" class="form-control " id="looking_for">
                                        <option value="0">Select Option</option>
                                        <option value="Female">Woman</option>
                                        <option value="Male">Man</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>Ethnicity</b></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="ethnicity" class="form-control " id="ethnicity">
                                        <option value="0">Select Ethnicity</option>
                                        <option value="1">Caucasian</option>
                                        <option value="2">Black</option>
                                        <option value="3">Hispanic</option>
                                        <option value="4">Indian</option>
                                        <option value="5">Middle Eastern</option>
                                        <option value="6">Asian</option>
                                        <option value="7">Mixed Race</option>
                                        <option value="8">Native American</option>
                                        <option value="9">South East Asian</option>
                                        <option value="10">Other Ethnicity</option>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>Country</b></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="country"  class="form-control " id="country"  onchange="fetch_state()">>
                                        <option value="NAN">Select Country</option>
                                        @foreach ($country as $con)
                                            <option value="{{$con['id']}}">{{$con['name']}}</option>
                                        @endforeach


                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>State</b></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="state" class="form-control " id="state" onchange="fetch_cities()">
                                        <option value="NAN">Select State</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt_10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="psw"><b>City</b></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="cities" class="form-control " id="cities">
                                        <option value="NAN">Select City</option>

                                    </select>
                                </div>

                            </div>
                        </div>



                    </div>

                </div>


                {!! csrf_field() !!}
                <div class="col-md-12 mt-3" >
                    <div class="row">
                        <div class="col-md-6 ">
                            <button type="submit" class="button2"  onclick="register_user()">Register</button>
                        </div>
                        <div class="col-md-6" style="">
                            <p><label>By clicking Register I agree to the
                                    <a  href="/privacy">Terms and Conditions and Privacy Policy</a>.</label></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{--    </form>--}}
    </div>


    <div itemprop="articleBody "  class="privacy">
        <section class="groupSection main">
            <div class="container article">
                <div class="firstPara">
                    <h2>PRIVACY POLICY</h2>
                    <p>This Privacy Policy ("Policy") explains how information about you or associated with you (“personal information”) is collected, used and disclosed by DoctorLoveMatch.com ("DoctorLoveMatch.com," "we" or "us") when you use our services through our websites linked to this Policy, as well as our products and applications (including our mobile applications, downloadable products and applications and pages operated by us on social networking sites and other platforms) (collectively, the "Services").</p>
                </div>
                <div class="paragraph-box">
                    <p>By registering, using or subscribing to the Services, you confirm that you have read and consent to:</p>
                    <ul class="bulleted-list">
                        <li>
                            <p>the collection of your personal information as described in this Policy, particularly as noted in Section 1 of this Policy (including, for example, your contact information, demographic information, age, gender and dating gender preference), including information from social networking sites;</p>
                        </li>
                        <li>
                            <p>the processing of your personal information, including your sensitive information (including, for example your dating gender preference, dating relationship experiences, ethnicity, religion and political views), as described in this Policy, particularly including those uses described in Section 2 of this Policy;</p>
                        </li>
                        <li>
                            <p>the sharing of personal information with third parties as described in Section 3 of this Policy;</p>
                        </li>
                        <li>
                            <p>the storage and processing of your personal information in the United States of America (and other countries) as described in Section 6 of this Policy;</p>
                        </li>
                        <li>
                            <p>the use of cookies and similar technologies to store and access information on devices you connect to the Services in accordance with our&nbsp;Cookie Policy;</p>
                        </li>
                        <li>
                            <p>the use of your personal information to send you emails, promotions and advertising in accordance with Section 2 and Section 4 of this Policy; and</p>
                        </li>
                        <li>
                            <p>the use of information in identifying your exact location when you have enabled features and functions of the Services that use your device’s location.</p>
                        </li>
                    </ul>
                    <p>If you have any questions relating to the content of this Policy please contact us using the contact information set out below.</p>
                </div>
                <ol class="text-heading">
                    <li>
                        <h3>INFORMATION WE COLLECT</h3>
                        <p>The categories of information we collect can include:</p>
                        <ol class="text-heading2">
                            <li>
                                <p><strong>Information You Provide.</strong> When you register, use or subscribe to any of our Services or take part in any interactive features of the Services (such as any contests, games, promotions, quizzes, surveys, research or other services or features), we may collect a variety of information, including</p>
                                <ul class="bulleted-list">
                                    <li>
                                        <p><strong> Contact Information</strong> such as your name, email address, phone number, including mobile phone number, and correspondence address (“Contact Information”); and</p>
                                    </li>
                                    <li>
                                        <p><strong> Other Information </strong> such as birth date, photographs, videos, password, billing information, credit card information, demographic information, your personal interests and background, gender, age, dating gender preference, physical characteristics, sexual life experiences, ethnicity, religion, political views and geographical location (including GPS). We may also receive information (for example, your email address) through other users, for example, if they have tried to refer DoctorLoveMatch.com to you.</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <p><strong>Information About How You Use the Services.</strong> We may collect information about your participation and actions on the Services. This may include information such as the pages and profiles you view, how you browse the Services. It can also include the various functions and features that you use, such as Chat and Messages, the connections you make, other friends or contacts you invite to the Services and profile searches you perform, or your use of our applications.</p>
                            </li>
                            <li>
                                <p><strong>Information from Content You Upload.</strong> When you upload photos or other content to the Services, we may collect information about the content, such as the time, date and place the photo or content was taken or uploaded, and how you use them, who views them or with whom you share.</p>
                            </li>
                            <li>
                                <p><strong>Information Automatically Collected.</strong> When you access our Services, we automatically record information from your device and its software, such as your IP address, browser type, Internet service provider, platform type, the site from which you came and the site to which you are going when you leave our website, date and time stamp and one or more cookies that may uniquely identify your browser or your account. When you access our Services using a mobile device, we may also receive or collect identification numbers associated with your device (such as a UDID), mobile carrier, device type and manufacturer, phone number, and, if you have enabled features and functions of the Services that use your device’s location, your geographical location data (including GPS). We also collect information about your usage of, and activity on, our Services. Also, some of the information we collect, for example an IP address, can sometimes be used to approximate a device's location.</p>
                            </li>
                            <li><strong class="text-edit">Cookies and Similar Technologies.</strong>
                                <p>We may use cookies and similar technologies, including those from third parties, to collect, analyze and store information and to provide and improve the Services. You can find out more about our use of cookies and similar technologies in our&nbsp;Cookie Policy.</p>
                            </li>
                            <li>
                                <p><strong>Your Communications with Us and Other Users.</strong> We collect communications you send to us (such as emails), comments that you post on the pages we have on a third-party service, such as our YouTube, Twitter and Facebook pages and messages that you send us directly through those services. We may also collect any comments, photos, messages or other content or communications you and other users share on the Services.</p>
                            </li>
                            <li><strong class="text-edit">Third-Party Social Networking Sites. </strong>
                                <p>When you have enabled the use of our Services through a third-party social networking or similar site or mobile or other application (a "Social Networking Site"), such as Facebook, Google+ or Twitter, you permit DoctorLoveMatch.com to access certain information about you that is made available to DoctorLoveMatch.com through or from that Social Networking Site. The information obtained by DoctorLoveMatch.com varies by Social Networking Site and may be affected by the privacy settings you establish at that Social Networking Site, but can include information such as your name, profile picture, network, gender, username, user ID, age range or birthday, language, location, country, interests, contacts list, friends lists or followers and other information. By accessing or using our Services through a Social Networking Site, you are authorizing us to collect, store, retain and use, in accordance with this Policy, any and all of your information that we have obtained from the Social Networking Site, including to create a profile page and account for you. Depending on the Social Networking Site and your privacy settings, DoctorLoveMatch.com may also post information to your Social Networking Site. Your agreement to the foregoing takes place when you "accept" or "allow" or “go to” (or other similar terms) our application on a Social Networking Site or the transfer of information to DoctorLoveMatch.com from such site. If there is information about your “friends” or people you are associated with in your Social Networking Site account, the information we obtain about those persons may also depend on the privacy settings such people have with the applicable Social Networking Site. You acknowledge and agree that DoctorLoveMatch.com is not responsible for, and has no control over, any applicable privacy settings on any Social Networking Sites (including any settings related to any messages or advertisements about DoctorLoveMatch.com that the Social Networking Site may send to you or your friends). You should always review, and if necessary, adjust your privacy settings on Social Networking Sites before getting or using applications such as ours or linking or connecting your Social Networking Site account to the Services. You may also unlink your Social Networking Site account from the Services by adjusting your settings on the Social Networking Site.</p>
                            </li>
                            <li>
                                <p><strong>Location Data.</strong> &nbsp;When you have enabled geographical location-based or GPS services on your device in relation to a DoctorLoveMatch.com mobile app or any DoctorLoveMatch.com features or services that use geographical location-based or GPS information, we will collect information about your geographical location or GPS position based on the location of the device you are using to access our Services.</p>
                            </li>
                            <li>
                                <p><strong>Information Provided by Others.</strong> We may be provided with information relating to you or your conduct on the Services by other users of the Services. We also collect information that third-party organizations may provide to us, such as contact details, demographic information, Internet navigation details, credit reference or fraud prevention information. Financial institutions or payment processors may also provide us updated payment information or payment methods related to your paid account or paid subscription.</p>
                            </li>
                            <li>
                                <p><strong>Address Book.</strong> We may also offer you the ability to import your address book contacts or manually enter email addresses so that you can (i) locate your contacts on DoctorLoveMatch.com; or (ii) invite your contacts to join you on DoctorLoveMatch.com. We will store those contacts for purposes of alerting you when your contacts join DoctorLoveMatch.com at a later time, so that you may connect with them on DoctorLoveMatch.com, and to suggest friends and connections to other members of DoctorLoveMatch.com.</p>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <h3>USE OF INFORMATION WE COLLECT</h3>
                        <p>We use your personal information for purposes described in this Policy or disclosed to you on or in connection with our Services (e.g., through “pop-up” disclosures or consent mechanisms that may appear when you access certain services, features or applications). The ways in which we may use this information include to:</p>
                        <ul class="ul-bold-bullet">
                            <li>
                                <p><strong>Provide the requested Services:</strong>to administer and maintain your DoctorLoveMatch.com account and generally provide the functions and features that are part of the Services (including providing communications as described below). We will use all categories of information described in Section 1 to do this. This includes using your information as described in this Policy and providing the functions and features of the Services to you;</p>
                            </li>
                            <li>
                                <p><strong>Analyze and develop our products and Services:</strong>to develop, deliver, measure, monitor, analyze and improve our Services and develop new products and services. We will use all categories of information described in Section 1;</p>
                            </li>
                            <li>
                                <p><strong>Communicate with you:</strong> to respond to your comments and questions and provide customer service, to provide any messaging or communications associated with the functions and features of the Services (including by email), to keep you posted on our latest product or service announcements or updates, software updates, security alerts and any technical notices, to provide you with confirmation of purchases, invoices, support and administrative messages or notice about changes to our terms, conditions or policies. We will use your Contact Information when we communicate with you. Where it is relevant to the issues we are contacting you about we may also use the other categories of information described in Section 1 above;</p>
                            </li>
                            <li><strong class="text-edit"> Protect the Services and DoctorLoveMatch.com’s property:</strong>
                                <p>&nbsp;to detect and prevent abusive, fraudulent, malicious or potentially illegal activities, and to protect the rights, safety or property of DoctorLoveMatch.com or our users. We will predominantly use information about how you use the Services and information provided by others (such as reports from other users relating to your conduct on the Services), although we may use other categories of information described in Section 1 where they are relevant for this purpose;</p>
                            </li>
                            <li><strong class="text-edit">Promotions and advertising:</strong>
                                <p>&nbsp;to communicate with you about and administer contests, promotions and rewards, upcoming events and other news about products and services offered by DoctorLoveMatch.com and our selected partners that may be relevant to you, your interests and how you use the Services, including marketing and advertising communications. We may use all categories of information described in Section 1 for this purpose. We will use your Contact Information for direct communications with you.</p>
                            </li>
                            <li>
                                <p>For information on your marketing and advertising options see the “Marketing Choices” section below.</p>
                            </li>
                            <li><strong class="text-edit">Geographical or GPS location-based services:</strong>
                                <p>to provide features of the Services that may be relevant to you and your geographical location or GPS information, such as Services provided through our mobile apps that may allow users to see more information about each other, for example, common restaurants or points of interest visited or seen; you should always check the location-based settings on both your device and on the Services to manage such services;</p>
                            </li>
                            <li>
                                <p>Perform other functions as may otherwise be described to you at the time of collection or as enabled by you in relation to our Services; and</p>
                            </li>
                            <li>
                                <p>Link or combine information about you with other information we get from third parties to help understand your needs and provide you with a better service.</p>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h3>SHARING PERSONAL INFORMATION WITH THIRD PARTIES</h3>
                        <p>Our Services allow you to share information about yourself with other individuals and other companies, including other users and potential users of the Services and third-party Social Networking Sites. Consider your own privacy and personal safety when sharing your information with anyone, including information you share through your profile, as profiles include basic information that was provided at registration, information provided through a Social Networking Site, and may include other information added by you or your friends (for example, your religion, ethnicity and physical characteristics), as well as information about your use of the Service (for example, whether you were recently logged in to DoctorLoveMatch.com).</p>
                        <p>Information on your profile is viewable by other users or visitors to our Services, and may also be viewable through public search or on third-party sites that you use. We do not control who reads the information you share or what others may do with this information, so we encourage you to use discretion and caution with respect to your personal information. Also, when sharing information about others, please consider their safety and privacy and get their consent for that sharing.</p>
                        <p>We may share information with third parties as follows:</p>
                        <ul class="bulleted-list">
                            <li>
                                <p>with third party vendors, consultants and other service providers that perform services on our behalf, in order to carry out their work for us, which may include identifying and serving advertisements, providing fraud detection services, processing payments or providing analytics services;</p>
                            </li>
                            <li>
                                <p>with our business partners who offer a service to you jointly with us, for example, when running a contest or promotion;</p>
                            </li>
                            <li>
                                <p>with your consent (for example, if you consent to our sharing your information with a third party for the third party’s own and independent direct marketing purposes subject to its separate privacy policy);</p>
                            </li>
                            <li>
                                <p>in connection with any company transaction, such as a merger, sale of assets or shares, reorganization, financing, change of control or acquisition of all or a portion of our business by another company or third party or in the event of bankruptcy, dissolution, divestiture or any related or similar proceedings; and</p>
                            </li>
                            <li>
                                <p>to, in our discretion, (i) satisfy any applicable law, regulation, subpoena/court order, legal process or other government request, (ii) enforce our Terms of Use Agreement, including the investigation of potential violations thereof, (iii) investigate and defend ourselves against any third party claims or allegations, (iv) protect against harm to the rights, property or safety of DoctorLoveMatch.com, its users or the public as required or permitted by law and (v) detect, prevent or otherwise address criminal (including fraud or stalking), security or technical issues.</p>
                            </li>
                        </ul>
                        <p>We may also share information with others that is not personal information or that is in an aggregated or anonymous form that does not reasonably identify you directly as an individual.</p>
                        <p>For further information on your marketing and advertising options see the “Marketing Choices” section below. Note that the term “third party” does not include companies in the same group of companies as DoctorLoveMatch.com, which includes our subsidiaries (that is, any organization we own or control) or our ultimate holding company (that is, any organization that owns or controls us) and any subsidiaries that our holding company owns. Unless otherwise indicated, these companies will use your personal information in the same way as we can under this Policy.</p>
                    </li>
                    <li>
                        <h3>MARKETING CHOICES</h3>
                        <ul class="bulleted-list">
                            <li>
                                <p><strong>Communications from Us.</strong> By registering for our Services, you consent to receive email messages from us. You can opt out of receiving certain messages from us by visiting the "settings" page of your account or by clicking the “unsubscribe” or “opt-out” link on these email communications from DoctorLoveMatch.com. Note that you are not permitted to unsubscribe or opt out of non-promotional messages regarding your account, such as technical notices or purchase confirmations, or our ongoing business activities in order to provide the Services to you.</p>
                            </li>
                            <li>
                                <p><strong>Advertising and Third Party Advertising Networks.</strong> We may use or share certain information with online advertising networks or similar third party vendors that display ads through our Services, or to our users or visitors to our websites on other websites or apps based on your use of, or interactions with, our sites or Services. Typically, the information we share is provided through cookies or similar technologies and is used to recognize the device you are using. We or the online advertising networks use this information to make the advertisements you see online more relevant to your interests.</p>
                                <!-- <p>
                                            If you would like to disable cookies, limit advertising that utilizes cookies or similar technologies, find out more about cookies and how to manage their use in connection with advertising, please read our Cookie Policy.</p> --></li>
                        </ul>
                    </li>
                    <li>
                        <h3>ACCESS TO YOUR INFORMATION AND ACCOUNT MANAGEMENT</h3>
                        <p>Most of the personal information we hold about you is either available directly from viewing your account and looking back over your activities, or is available from the Social Networking Sites that you have connected to the Services. You may access and change certain information by visiting the "Edit Profile" and "Settings" sections of your account. You may also contact us for assistance using the details below if you want to access or change your account information or close your account. Nonetheless, DoctorLoveMatch.com expressly reserves the right to maintain and store any information or other data where DoctorLoveMatch.com reasonably believes in its sole discretion that such action is required to comply with any legal or regulatory obligations or for the detection or prevention of criminal or other unlawful activity or where DoctorLoveMatch.com has a legitimate business reason to do so, such as collecting amounts owed, resolving disputes, enforcing our Terms of Use Agreement or for recordkeeping integrity.</p>
                        <p>Please note that if you change information in your account or otherwise opt out of receiving certain communications, this will only affect future activities or communications from us. If we have already provided your information to a third party before you have changed your preferences or updated your information, you may have to change your preferences directly with that third party.</p>
                    </li>
                    <li>
                        <h3>TRANSFER AND SECURITY OF INFORMATION</h3>
                        <p>The personal information we collect from you may be transferred to, and stored in the United States of America and other countries. The countries your personal information is transferred to may not provide the same level of protection as the country you are resident in. DoctorLoveMatch.com will take reasonable measures to help protect your information in an effort to prevent loss, misuse and unauthorized access, disclosure, alteration or destruction and to treat it in accordance with this Policy. No method of electronic transmission or storage is 100% secure, however. Therefore, we cannot guarantee its absolute security. We urge you to keep your personal information safe (including your account password). Please see the United States Federal Trade Commission’s website at&nbsp;<a href="#">http://www.ftc.gov/bcp/menus/consumer/data.shtm"</a>&nbsp; for information about how to protect yourself against identity theft.</p>
                    </li>
                    <li>
                        <h3>AGE RESTRICTIONS</h3>
                        <p>Although our website is a general audience site, we restrict the use of our Services to individuals age 18 and above. We do not intentionally collect or maintain personal information from children under the age of 13. If you become aware that personal information about a person under 13 has been provided to us, please immediately contact us using the details below.</p>
                    </li>
                    <li>
                        <h3>LINKS TO THIRD PARTY WEBSITES</h3>
                        <p>The Services may, from time to time, contain links to and from third party websites of our partner networks, advertisers, partner merchants, retailers or affiliates. If you follow a link to any of these websites, please note that these websites have their own privacy policies and that we do not accept any responsibility or liability for their policies. Please always check the privacy policies that apply to a third party site before you provide any information to the website.</p>
                    </li>
                    <li>
                        <h3>SECURITY</h3>
                        <p>You are responsible for maintaining the confidentiality of Your username and password, and You should not allow anyone to use Your password to access any Services. You are responsible for all usage or activity on the Service by users using Your password, including but not limited to use of Your password by any third party. You agree to immediately notify DoctorLoveMatch.com of any unauthorized use of Your username or password or any unauthorized access to Your account. For Your own security, it is advisable to log out when You finish each use of the Services, especially if You are using a public computer or share a computer with others. When logging into the Services using a public computer please use caution to prevent other people from learning Your username and password.</p>
                    </li>
                    <li>
                        <h3>PAID MEMBERSHIPS AND PAID FEATURES</h3>
                        <p>In addition to the free services provided on the Website, Paid Memberships (for example, the&nbsp;Doctorlovematch Membership) and Paid Features are offered that require payment. Where payment is required, the following additional terms and conditions will apply.</p>
                    </li>
                    <li>
                        <h3>BILLING AND PAYMENT</h3>
                        <p>DoctorLoveMatch.com will use the credit card information You provide to bill You for goods and services. By registering for the Paid Memberships or Paid Features and providing Your credit card details, You agree to be billed by us for Your for-fee service in advance. It is Your sole obligation to provide accurate and complete credit card information, and to timely update Your Account with any changes to such information.</p>
                    </li>
                    <li>
                        <h3>AUTOMATIC RENEWAL</h3>
                        <p>Paid Memberships are subscriptions. After Your initial subscription commitment period, Your subscription will not automatically continue for an additional or equivalent period. You can upgrade your membership again after the subscription period. Paid Memberships cannot be transferred to any other account. By subscribing to the Paid Membership, You authorize DoctorLoveMatch.com to bill the credit card You provided now for your subscription period.</p>
                    </li>
                    <li>
                        <h3>TERMINATION OF SERVICES FOR NON-PAYMENT</h3>
                        <p>Where payment is required for a Paid Membership or Paid Feature and we are unable to charge Your credit card for any reason, we may discontinue any Services to You either temporarily or permanently.</p>
                    </li>
                    <li>
                        <h3>CANCELLATION OF SERVICES</h3>
                        <p>If You cancel Your account, Your Paid Membership and/or Paid Features will be cancelled. All payments for Paid Memberships and Paid Features are non-refundable. You will not be eligible for a prorated refund of any portion of the unused paid services. Paid Memberships and/or Paid Features cannot be transferred to any other account.</p>
                    </li>
                    <li>
                        <h3>MAKING CLAIMS OF COPYRIGHT INFRINGEMENT</h3>
                        <p>If You believe that any material or content distributed by DoctorLoveMatch.com constitutes copyright infringement, please provide us with the following information: an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest; a description of the copyrighted work that You claim has been infringed; a description of where the material that You claim is infringing is located on our Website; Your address, telephone number and email address; a written statement by You that You have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; a statement by You, made under penalty of perjury, that the above information in Your notice is accurate and that You are the copyright owner or authorized to act on the copyright owner's behalf.</p>
                    </li>
                    <li>
                        <h3>INTERACTIONS WITH OTHER MEMBERS</h3>
                        <p><b> YOU ARE SOLELY RESPONSIBLE FOR YOUR INTERACTIONS WITH OTHER MEMBERS. YOU UNDERSTAND THAT DOCTORLOVEMATCH.COM CURRENTLY DOES NOT CONDUCT CRIMINAL BACKGROUND CHECKS ON ITS MEMBERS. DOCTORLOVEMATCH.COM ALSO DOES NOT INQUIRE INTO THE BACKGROUNDS OF ALL OF ITS MEMBERS OR ATTEMPT TO VERIFY THE STATEMENTS OF ITS MEMBERS. DOCTORLOVEMATCH.COM MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE CONDUCT OF MEMBERS OR THEIR COMPATIBILITY WITH ANY CURRENT OR FUTURE MEMBERS. DOCTORLOVEMATCH.COM RESERVES THE RIGHT TO CONDUCT ANY CRIMINAL BACKGROUND CHECK OR OTHER SCREENINGS (SUCH AS SEX OFFENDER REGISTER SEARCHES), AT ANY TIME AND USING AVAILABLE PUBLIC RECORDS.</b></p>
                        <p><b> IN NO EVENT SHALL DOCTORLOVEMATCH.COM BE LIABLE FOR ANY DAMAGES WHATSOEVER, WHETHER DIRECT, INDIRECT, GENERAL, SPECIAL, COMPENSATORY, CONSEQUENTIAL, AND/OR INCIDENTAL, ARISING OUT OF OR RELATING TO THE CONDUCT OF YOU OR ANYONE ELSE IN CONNECTION WITH THE USE OF THE SERVICE, INCLUDING WITHOUT LIMITATION, BODILY INJURY, EMOTIONAL DISTRESS, AND/OR ANY OTHER DAMAGES RESULTING FROM COMMUNICATIONS OR MEETINGS WITH OTHER REGISTERED USERS OF THIS SERVICE OR PERSONS YOU MEET THROUGH THIS SERVICE. YOU AGREE TO TAKE REASONABLE PRECAUTIONS IN ALL INTERACTIONS WITH OTHER MEMBERS OF THE SERVICE, PARTICULARLY IF YOU DECIDE TO MEET OFFLINE OR IN PERSON. YOU UNDERSTAND THAT DOCTORLOVEMATCH.COM MAKES NO GUARANTEES, EITHER EXPRESS OR IMPLIED, REGARDING YOUR ULTIMATE COMPATIBILITY WITH INDIVIDUALS YOU MEET THROUGH THE SERVICE. YOU SHOULD NOT PROVIDE YOUR FINANCIAL INFORMATION (FOR EXAMPLE, YOUR CREDIT CARD OR BANK ACCOUNT INFORMATION) TO OTHER MEMBERS.</b></p>
                    </li>
                    <li>
                        <h3>UPDATES TO THIS POLICY</h3>
                        <p>We reserve the right to modify this Policy from time to time. If we make changes to this Policy, we will change the "Last Revision" date below and will post the updated Policy on this page. We may also provide other methods of notice or request your consent depending on the circumstances.</p>
                    </li>
                    <li>
                        <h3>PROPERTY INFORMATION</h3>
                        <p>DoctorLoveMatch.com also go by DrLoveMatch.com and both properties own by Dr Love Match LLC.</p>
                    </li>
                    <li>
                        <h3>CONTACTING DoctorLoveMatch.com</h3>
                        <p>If you have questions about this Policy, please contact us at&nbsp;<span id="cloakb01a28e441ee8b96d459ba05512851f7"><a href="mailto:Supportteam@DoctorLoveMatch.com">Supportteam@DoctorLoveMatch.com</a></span>
                          .</p>
                    </li>
                    <li>
                        <h3>LAST REVISION DATE</h3>
                        <p>This Policy was last revised on May 12, 2016.</p>
                    </li>
                    <li>
                        <h3>LANGUAGE OF THE POLICY</h3>
                        <p>The language of this Policy is English. Where DoctorLoveMatch.com has provided a translation of the English version of this Policy, you agree that the translation is provided for your convenience only and that the English language version of this Policy will govern your relationship with DoctorLoveMatch.com. If there is any contradiction between what the English language version of this Policy says and what a translation says, then the English language version will take precedence.</p>
                    </li>
                </ol>
            </div>
        </section>	</div>


</div>


<footer class="footer " style="padding: 8px 0">
    <div class="">

        <div class="row ">
            <div class="col-md-6 col-lg-5">

                <p class="copyright" style="margin-top: 13px;
color: white; padding: 0 10px 0 10px"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Dr Love Match© 2020
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
            <div class="col-md-6 col-lg-3 socailLink clearfix " style="padding-left: 25px;" >
                <ul class="clearfix">
                    <li><p>Follow Us :</p></li>
                    <li><a target="_blank" href="https://www.facebook.com/pages/DoctorLoveMatch/413232242026448"><span><i class="fa fa-facebook"></i></span></a></li>
                    <li><a target="_blank" href="https://linkedin.com/in/dr-love-match-35957591"><span><i class="fa fa-linkedin"></i></span></a></li>
                    <li><a target="_blank" href="https://twitter.com/Dr_Love_Match"><span><i class="fa fa-twitter"></i></span></a></li>
                    <li><a target="_blank" href="https://instagram.com/p/BH0LYKqgH4r/"><span><i class="fa fa-instagram"></i></span></a></li>
                    <li><a target="_blank" href="https://www.youtube.com/user/MrDilash"><span><i class="fa fa-youtube"></i></span></a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-4 ">
                <p class=" list-unstyled" style="margin-top: 10px">

                    <a class="mr-md-3"  style="margin-top: 13px;
color: white; padding: 0 10px 0 10px" href="#">Privacy</a>

                </p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ url('landing/js/jquery.min.js') }}"></script>
<script src="{{ url('landing/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ url('landing/js/popper.min.js') }}"></script>
<script src="{{ url('landing/js/bootstrap.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ url('landing/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.stellar.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ url('landing/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('landing/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ url('landing/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('landing/js/scrollax.min.js') }}"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>--}}
{{--<script src="{{ url('landing/js/google-map.js') }}"></script>--}}
<script src="{{ url('landing/js/main.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    // Get the modal
    var modal1 = document.getElementById('id01');
    var modal2 = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
    //
    function fetch_state(){
        var country=document.getElementById('country').value;
        // alert(country);
        let form = new FormData();
        form.set('country', country);
        form.set('state', '');
        form.set('source', '1');
        axios.post('/api/states', form)
            .then(res => {
                // console.log(res.data)
                $("#state").empty();
                $("#cities").empty();
                var state = document.getElementById("state");
                var opt = document.createElement('option');
                opt.value = "NAN";
                opt.innerHTML = "Select State";
                state.appendChild(opt);

                var cities = document.getElementById("cities");
                var opt2 = document.createElement('option');
                opt2.value = "NAN";
                opt2.innerHTML = "Select City";
                cities.appendChild(opt2);

                for(var j=0;j<res.data.length;j++){
                    var opt = document.createElement('option');
                    opt.value = res.data[j]['id'];
                    opt.innerHTML = res.data[j]['name'];
                    state.appendChild(opt);
                    // option.text = res.data[j]['name'];
                    // state.add(option);
                }

            })


    }
    function fetch_cities(){
        var state=document.getElementById('state').value;
        // alert(state);
        let form = new FormData();
        form.set('state', state);
        form.set('city', '');
        form.set('source','1');
        axios.post('/api/cities', form)
            .then(res => {
                // console.log(res.data)
                $("#cities").empty();
                var cities = document.getElementById("cities");
                var opt = document.createElement('option');

                opt.value = "NAN";
                opt.innerHTML = "Select City";
                cities.appendChild(opt);

                for(var j=0;j<res.data.length;j++){
                    var opt = document.createElement('option');
                    opt.value = res.data[j]['id'];
                    opt.innerHTML = res.data[j]['name'];
                    cities.appendChild(opt);

                }

            })

    }

    function validateEmail(email){
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    function register_user(){
        var name=document.getElementById('name').value;
        var email=document.getElementById('email').value;
        var con_email=document.getElementById('con_email').value;
        var psw=document.getElementById('psw').value;
        var con_psw=document.getElementById('con_psw').value;
        var dob=document.getElementById('dob').value;
        var gender=document.getElementById('gender').value;
        var looking_for=document.getElementById('looking_for').value;
        var ethnicity=document.getElementById('ethnicity').value;
        var country=document.getElementById('country').value;
        var state=document.getElementById('state').value;
        var cities=document.getElementById('cities').value;
        // var csrf=document.getElementsByName('_token').value;

        var valid=validateEmail(email);

        if(name.length!==0 && email.length!==0 && con_email.length!==0 && psw.length!==0 && con_psw.length!==0 && dob.length!==0 ){
            if(gender!==0 && gender!=="NAN" && looking_for!==0 && looking_for!=="NAN" && ethnicity!==0 && ethnicity!=="NAN" && country!==0
                && country!=="NAN" && state!==0 && state!=="NAN" && cities!==0 && cities!=="NAN"  ){



                if(valid===true) {
                    if(email===con_email){

                        if (psw === con_psw) {

                            let form = new FormData();
                            form.set('name', name);
                            form.set('email', email);
                            form.set('password', psw);
                            form.set('dob', dob);
                            form.set('gender', gender);
                            form.set('looking_for', looking_for);
                            form.set('ethnicity', ethnicity);
                            form.set('country', country);
                            form.set('state', state);
                            form.set('cities', cities);
                            form.set('password_confirmation', con_psw);

                            axios.post('/api/create_account', form)
                                .then(res => {
                                    console.log(res.data);
                                    if(res.data=='success'){
                                        document.getElementById('id02').style.display='none';
                                        var type = 'success';
                                        var message = 'Account Created.';
                                        var alertType = 'alert-' + type
                                        var htmlAlert = '<div class="alert ' + alertType + '"><p>&#33; ' + message + '</p></div>';
                                        $(".alert-message").prepend(htmlAlert);
                                        $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () {
                                            $(this).remove();
                                        });
                                        $('#uname').val('');
                                        $('#email').val('');
                                        $('#con_email').val('');
                                        $('#psw').val('');
                                        $('#con_psw').val('');
                                        $('#dob').val('');
                                        $('#ethnicity').val(0)
                                        $('#looking_for').val(0)
                                        $('#gender').val(0)
                                        $('#country').val('NAN')
                                        $('#state').val('NAN')
                                        $('#cities').val('NAN')

                                    }
                                    else{
                                        var type = 'danger';
                                        var message = 'Email Id Already Exist.';
                                        var alertType = 'alert-' + type
                                        var htmlAlert = '<div class="alert ' + alertType + '"><p>&#33; ' + message + '</p></div>';
                                        $(".alert-message").prepend(htmlAlert);
                                        $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () {
                                            $(this).remove();
                                        });
                                    }
                                })
                                .catch(error => {
                                    alert(error);
                                })



                        } else {

                            var type = 'danger';
                            var message = 'Password and Confirm Password does not match.';
                            var alertType = 'alert-' + type
                            var htmlAlert = '<div class="alert ' + alertType + '"><p>&#33; ' + message + '</p></div>';
                            $(".alert-message").prepend(htmlAlert);
                            $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () {
                                $(this).remove();
                            });
                        }
                    }
                    else {

                        var type = 'danger';
                        var message = 'Email and Confirm Email does not match.';
                        var alertType = 'alert-'+ type
                        var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
                        $(".alert-message").prepend(htmlAlert);
                        $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });
                    }
                }
                else {

                    var type = 'danger';
                    var message = 'Please enter a valid email.';
                    var alertType = 'alert-'+ type
                    var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
                    $(".alert-message").prepend(htmlAlert);
                    $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });
                }
            }
            else{

                var type = 'danger';
                var message = 'Please Select All Dropdown Fields.';
                var alertType = 'alert-'+ type
                var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
                $(".alert-message").prepend(htmlAlert);
                $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });
            }


        }
        else{
            var type = 'danger';
            var message = 'Please Fill All Required Fields.';
            var alertType = 'alert-'+ type
            var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
            $(".alert-message").prepend(htmlAlert);
            $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });

        }

    }




</script>
<style scoped>
    .mt_10{
        margin-top: 10px !important;
    }
    .close {

        font-size: 30px !important;
    }

</style>

</body>

    </html>
