<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="Amazon Optimization Specialists">
    <meta name="author" content="Lab916">

    <title>Lab916 | Amazon Optimization Specialists</title>

    <!-- Custom fonts for this theme -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,500,700,800,900' rel='stylesheet'
          type='text/css'>

    <!-- Vendor CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/lab916-yellow.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
</head>

<!--  style="overflow: hidden" -->
<body id="page-top" data-ng-app="quote">

<!-- Top Navigation -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a href="http://lab916.wpengine.com/mock10" class="navbar-brand js-scroll-trigger">
            <img class="img-fluid" src="img/lab916-logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
            Menu
        </button>


        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="http://lab916.wpengine.com/" class="nav-link js-scroll-trigger">Home</a>
                </li>

                <li class="nav-item">
                    <a href="http://lab916.wpengine.com/category/case-studies/" class="nav-link js-scroll-trigger">
                        Case Studies
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Landing Area -->
<header class="masthead" style="background-image: url('img/agency/backgrounds/bg-header.jpg');">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto text-center text-white">
                <div id="L9-masthead-title" class="masthead-title">Free Quote</div>
                <hr class="colored">
                <div class="masthead-subtitle">Animated interactive PHP questionnaire</div>
            </div>
        </div>
    </div>
    <div class="scroll-down">
        <a class="btn js-scroll-trigger" href="#L9-quote-container">
            <i class="fa fa-angle-down fa-fw"></i>
        </a>
    </div>
</header>

<!-- Get A Quote Section -->
<section id="L9-quote-container" class="page-section">
    <div class="container-fluid">
        <div class="wow flipInY text-center">

            <!---------------------------------->
            <!-- Animated Quote Questionnaire -->
            <!---------------------------------->
            <section id="lab916-quote" data-ng-controller="QuoteCtrl as quote">

                <!-- Side Nav for the animated questionnaire -->
                <div id="lab916-progress-container">
                    <!-- ng-repeat begins -->
                    <div class="L9-indicator-row L9-mt20" ng-click="changeActiveQuestion($index)"
                         ng-repeat="question in myQuestions">
                        <div class="L9-circle {{($index === activeQuestion) ? 'on' : 'off'}}"></div>
                        <div class="L9-circle-txt"><span>{{question.shortenedQuestion}}</span></div>
                    </div>

                    <div class="L9-indicator-row L9-mt20" ng-click="changeActiveQuestion(myQuestions.length)">
                        <div class="L9-circle {{(myQuestions.length === activeQuestion) ? 'on' : 'off'}}"></div>
                        <div class="L9-circle-txt"><span>Send</span></div>
                    </div>

                    <br>

                    <!-- Continue Button -->
                    <div class="feedback">
                        <div class="btn btn-sm btn-info" ng-click="selectContinue()"
                             ng-show="activeQuestion !== myQuestions.length">
                            <strong>Continue</strong>
                        </div>
                        <div class="btn btn-sm btn-warning" ng-click="makeHubspotRequest()"
                             ng-show="activeQuestion === myQuestions.length">
                            <strong>Send</strong>
                        </div>
                    </div>
                </div>

                <!-- ng-repeat Looped Questions with inner looped Answers:  -->
                <div ng-repeat="question in myQuestions" ng-hide="userHasSent" class="question
                        {{ question.questionState === 'answered' ? 'answered' : 'unanswered' }}
                        {{ $index === activeQuestion ? 'active' : 'inactive' }}">

                    <!-- The Question -->
                    <h4 class="txt">{{ question.question }}</h4>

                    <div class="row">
                        <!-- ng-repeat inner loop -->
                        <div class="col-md-3" ng-repeat="answer in question.answers">
                            <!-- Extra Short Height Cards -->
                            <div ng-if="question.height === 'extra short'">
                                <div class="card ans height-extra-short"
                                     ng-class="{'selected': myQuestions[$parent.$parent.$index].answers[$parent.$index].optionIsSelected}"
                                     ng-click="selectAnswer($parent.$parent.$index, $parent.$index)">
                                    <div class="card-body">
                                        <p><i class="fa fa-camera fa-2x"></i></p>
                                        <p class="L9-mb-0">{{ answer.text }}</p>
                                        <!-- Forms -->
                                        <textarea ng-show="answer.type === 'textarea'"></textarea>
                                        <input type="text" ng-model="contactHubObject.amazonServices[answer.id]"
                                               ng-show="answer.type === 'input text' && question.shortenedQuestion === 'Amazon Services'">
                                    </div>
                                </div>
                            </div>

                            <!-- Short Height Cards -->
                            <div ng-if="question.height === 'short'">
                                <div class="card ans height-short"
                                     ng-class="{'selected': myQuestions[$parent.$parent.$index].answers[$parent.$index].optionIsSelected}"
                                     ng-click="selectAnswer($parent.$parent.$index, $parent.$index)">
                                    <div class="card-body">
                                        <p><i class="fa fa-bus fa-2x"></i></p>
                                        <p>{{ answer.text }}</p>

                                        <!-- Forms -->
                                        <textarea placeholder="Other channels"
                                                  ng-model="contactHubObject.currentSalesChannels[4]"
                                                  ng-show="answer.type === 'textarea' && question.shortenedQuestion === 'Currently Selling'">
                                        </textarea>

                                        <input type="text" ng-show="answer.type === 'input text'">
                                    </div>
                                </div>
                            </div>

                            <!-- Medium Height Cards -->
                            <div ng-if="question.height === 'medium'">
                                <div class="card ans height-medium"
                                     ng-class="{'selected': myQuestions[$parent.$parent.$index].answers[$parent.$index].optionIsSelected}"
                                     ng-click="selectAnswer($parent.$parent.$index, $parent.$index)">
                                    <div class="card-body">
                                        <p>{{ answer.text }}</p>
                                        <!-- Forms -->
                                        <div ng-show="question.shortenedQuestion === 'Company Snapshot'">
                                            <input ng-model="contactHubObject.companySnapshot[answer.id]"
                                                   type="text" ng-show="answer.type === 'input text'"
                                                   placeholder="Amount">
                                        </div>
                                        <div ng-show="question.shortenedQuestion === 'Amazon Goals'">
                                            <textarea placeholder="Amazon Goals"
                                                      ng-model="contactHubObject.amazonGoals[answer.id]">
                                            </textarea>
                                        </div>
                                        <div ng-show="question.shortenedQuestion === 'Other Questions'">
                                            <textarea ng-show="answer.type === 'textarea'" placeholder="last questions"
                                                      ng-model="contactHubObject.otherQuestions[answer.id]"></textarea>
                                            <input type="text" ng-show="answer.type === 'input text'"
                                                   placeholder="last questions"
                                                   ng-model="contactHubObject.otherQuestions[answer.id]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3) Contact Form: -->
                <div id="contact" ng-hide="userHasSent"
                     ng-class="{'active' : (activeQuestion === myQuestions.length) }">
                    <div class="text-center">
                        <p class="text-center">Please tell us about you and we will help you.</p>
                    </div>
                    <div class="L9-form-container">
                        <form>
                            <label for="fname">Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Your Name.."
                                   ng-model="contactHubObject.name">

                            <label for="company">Company</label>
                            <input type="text" id="company" name="lastname" placeholder="Your Company.."
                                   ng-model="contactHubObject.company">

                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Email"
                                   ng-model="contactHubObject.email">

                            <label for="subject">Message</label>
                            <textarea id="subject" name="subject" placeholder="Write something.."
                                      style="height:150px" ng-model="contactHubObject.message"></textarea>
                        </form>
                    </div>
                </div>

                <br><br><br>
                <h1 ng-if="userHasSent">Thanks! Lab916 will contact you shortly ^_^</h1>
            </section>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer" style="background-image: url('img/agency/backgrounds/bg-footer.jpg')">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 footer-contact-details">
                <h4>
                    <i class="fa fa-phone"></i>
                    Smart Keywords
                </h4>
                <p>Let us figure out exactly what phrases customers use to search for your product</p>
            </div>
            <div class="col-md-4 footer-contact-details">
                <h4>
                    <i class="fa fa-map-marker"></i>
                    Smart Ads
                </h4>
                <p>We utilize the most specialized intelligent context targeting</p>
            </div>
            <div class="col-md-4 footer-contact-details">
                <h4>
                    <i class="fa fa-envelope"></i>
                    High Conversion Rates
                </h4>
                <p>
                    We've spent years getting this down to an exact science.
                </p>
            </div>
        </div>
        <div class="row footer-social">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-facebook fa-fw fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-twitter fa-fw fa-2x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-linkedin fa-fw fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="copyright">&copy; Lab916 Sacramento, California</p>
    </div>
</footer>




<!-- Vendor JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="vendor/wowjs/wow.min.js"></script>
<script src="vendor/angular/angular.min.js"></script>

<!-- This is the Actual "Get a quote" ng code for lab916 -->
<script src="js/lab916.js"></script>
<script src="app.quote.js"></script>


</body>

</html>
