<!-- start preview modal -->
<div class="modal" tabindex="-1" role="dialog" id="previewModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview <br/><small style="
    font-size: 0.8rem;
">When you tap the card, you will see this content</small></h5>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-3 prevTabs" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active btn-tcw tab-pill-btn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Card</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-tcw tab-pill-btn" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Page</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane previewPane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div>
                            <img src=""  class="previewCardImage"/>
                        </div>
                    </div>
                    <div class="tab-pane previewPane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <x-vcf-layout title="Customise card" 
                            image="" 
                            description="Customise card"
                            :url="url()->current()">

                                        <div class="container d-flex justify-content-center mt-3 mb-3">
                                            <div class="card p-3 py-4 mb-5">
                                                <div class="text-center">
                                                    <img src="" class="rounded-circle profile-img" id="demo-dp">
                                                    <h3 class="mt-3 name-demo">Your Name & Partner's Name</h3>
                                                    <small class="mt-4">My love, every day with you feels like a celebration, but today I just want to remind you how deeply and endlessly you mean to me. You’re my heart, my happiness, my forever Valentine. ❤️</small>
                                                    <div id="lottie-animation"></div>
                                                    <hr class="line">
                                                    
                                                    <div class="masonry masonry-demo">
                                                    </div>

                                                    <a href="https://theconnectwave.com" target="_blank">
                                                        <img src="{{asset('tcw/images/tcw-logo.png')}}" class="img-fluid foot-logo" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                        </x-vcf-layout>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-tcw-move w-45" id="closePreview">Continue Editing</button>
                <button type="button" class="btn btn-tcw-move w-45" id="saveOrder">Confirm</button>
            </div>
            </div>
        </div>
    </div>
    <!-- end preview modal -->