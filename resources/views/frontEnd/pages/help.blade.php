@extends('frontEnd.layouts.layout')

@section('content')
<section class="faq_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">
                <div class="section_title text-center mb-3">
                    <h3>
                        Frequently Asked Questions
                    </h3>
                </div>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sitoler aliquam sit nullam.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 col-lg-8 m-auto">
                <div class="accordion" id="accordionExample1">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneFaq" aria-expanded="true" aria-controls="collapseOneFaq">
                                Does this replace my Will
                            </button>
                        </h2>
                        <div id="collapseOneFaq" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>
                                    No Recorded legacy is not legally binding. It is there to provide clarity over and above what can be noted in a Will. Amendments to wills are traditionally periodic over longer timeframes as changes can be costly. Oracle billy allows for incremental updates which can be recorded at will on the go to ensure your affairs are kept up to date.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoFaq" aria-expanded="false" aria-controls="collapseTwoFaq">
                                How long are videos stored for
                            </button>
                        </h2>
                        <div id="collapseTwoFaq" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>Videos are stored for as long as payments are kept up to date, there is an option to secure a life time membership. Accounts will become dormant following non-renewal for a period of up to 5 years, post the last payment. In order to access a dormant account, the account will need to be bought back up to date in order to access the content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeFaq" aria-expanded="false" aria-controls="collapseThreeFaq">
                                What happens to the videos if I want to close my account
                            </button>
                        </h2>
                        <div id="collapseThreeFaq" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>You have the ability to delete all videos at will by logging into your account and entering the seed codes. The videos cannot be deleted by those that view the videos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourFaq" aria-expanded="false" aria-controls="collapseFourFaq">
                                Where are they stored
                            </button>
                        </h2>
                        <div id="collapseFourFaq" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>Videos are recorded on internal servers during the initial filming, once locked and under the seed code they are moved to cloud storage on Amazon cloud. This means that even if your account is hacked your videos will not be accessible.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveFaq" aria-expanded="false" aria-controls="collapseFiveFaq">
                                Can I change my Seed code
                            </button>
                        </h2>
                        <div id="collapseFiveFaq" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>Yes, only the account holder can change the seed code. This will require a traditional log in and the answer to their personal question, the answer for which is to be known by the account holder alone.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixFaq" aria-expanded="false" aria-controls="collapseSixFaq">
                                Can I access the videos via my app
                            </button>
                        </h2>
                        <div id="collapseSixFaq" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>No, the videos cannot be viewed via the app. Only recordings can made on the app to prevent face ID hacking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSevenFaq" aria-expanded="false" aria-controls="collapseSevenFaq">
                                Can I leave details in my Will
                            </button>
                        </h2>
                        <div id="collapseSevenFaq" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>How you provide notification of your account and the seed code is of your own choosing. You could leave reference to the account and provide instructions or hints for the seed code in the will, or you could provide the seed code itself.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEightFaq" aria-expanded="false" aria-controls="collapseEightFaq">
                                How many videos can I record
                            </button>
                        </h2>
                        <div id="collapseEightFaq" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                <p>Each client is provided with up to 4gb of storage space which equates to approximately 2hrs of 720p recording. Further space can be purchased if required</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
