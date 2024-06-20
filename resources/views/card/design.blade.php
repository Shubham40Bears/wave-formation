<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" x-data="{ fullName: 'SHUBHAM BHATTACHARYA', bgClass: 'curved-1', 'flipped':false, designation: '', company: '', showCompany : false, showDesignation: false, isFileOpen: false}">
                    <div class="col-xl-5 mb-xl-0 mb-4 card_viewer" x-show="!flipped">
                        <div class="card bg-transparent shadow-xl">
                            <div :class="`overflow-hidden position-relative border-radius-xl ${bgClass}`">
                                <!-- <span class="mask bg-gradient-dark"></span> -->
                                <div class="card-body position-relative z-index-1 p-3">
                                    <!-- <i class="fas fa-wifi text-white p-2"></i> -->
                                    <img src="{{asset('theme_tcw/assets/img/tcw-full.png')}}" class="img-fluid brand_logo">
                                    <img src="{{asset('theme_tcw/assets/img/nfc.png')}}" class="img-fluid nfc-logo-sm">
                                    <!-- <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5> -->
                                    <div id="qrcode" class="mb-5 mt-6"></div>
                                    <div class="d-flex justify-content-center mb-2 mt-4">
                                        <div class="d-flex">
                                            <div class="card-contents">
                                                <p class="text-sm opacity-8 mb-0 name_text text-uppercase" x-text="fullName"></p>
                                                <p class="text-sm text-center mb-0"><span x-text="designation" x-show="showDesignation"></span> <span x-show="showCompany && showDesignation">|</span><span x-text="company" x-show="showCompany"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- back start -->
                    <div class="col-xl-5 mb-xl-0 mb-4 card_viewer" x-show="flipped">
                        <div class="card bg-transparent shadow-xl">
                            <div :class="`overflow-hidden position-relative border-radius-xl ${bgClass}`">
                                <!-- <span class="mask bg-gradient-dark"></span> -->
                                <div class="card-body position-relative z-index-1 p-3">
                                    <!-- <i class="fas fa-wifi text-white p-2"></i> -->
                                    <img src="{{asset('theme_tcw/assets/img/tcw-full.png')}}" class="img-fluid brand_logo">
                                    <!-- <img src="{{asset('theme_tcw/assets/img/nfc.png')}}" class="img-fluid nfc-logo-sm"> -->
                                    <!-- <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5> -->
                                    <div id="logo_back" class="mb-5 mt-6">
                                        <!-- <img src="{{asset('theme_tcw/assets/img/logos/logo.png')}}" class="img-fluid"> -->
                                    </div>
                                    <div class="d-flex justify-content-center mb-2 mt-4">
                                        <div class="d-flex">
                                            <div class="card-contents">
                                                <p class="opacity-8 mb-0 text-uppercase text-vxs text-justify text-wh">This card is a property of “The Connect Wave”  to whom it must be returned upon request or found. If found, please contact us at +91 84688 33177.</p>
                                                <p class="text-vxs opacity-8 mb-0 mt-2 bottom_text text-wh">
                                                    <span>Email: support@theconnectwave.com</span>
                                                    <span>Website: https://theconnectwave.com</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- back end -->
                    <div class="col-xl-7 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0">Customise Your Card</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn bg-gradient-dark mb-0" @click="flipped = !flipped"><i class="fas fa-sync-alt"></i> &nbsp;Flip Card</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <form role="form" method="POST" action="{{ route('login') }}" class="w-100">
                                                <label>Profile Picture</label>
                                                <div class="col-auto mb-3 profile_content d-flex align-items-center">
                                                    <div class="avatar avatar-xl position-relative">
                                                        <img src="{{asset('theme_tcw/assets/img/bruce-mars.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                                    </div>
                                                    <input type="file" class="d-none" id="fileInput" ref="fileInput">
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" onclick="openFileSelector()">Select Profile Image</button>
                                                </div>
                                                <label>Full Name<sup>*</sup></label>
                                                <div class="mb-3">
                                                    <input x-model="fullName" required type="text" class="form-control" placeholder="Full Name" aria-label="Full Name" name="full-name">
                                                </div>
                                                <label>Job Title</label>
                                                <div class="mb-3">
                                                    <input x-model="designation" required type="text" class="form-control" placeholder="Senior Tech Lead" aria-label="@theconnectwave" name="ins-handle">
                                                </div>
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" x-model="showDesignation" id="designationSwitch">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="designationSwitch">Add Designation to Card</label>
                                                </div>
                                                <hr>
                                                <label>Company Name</label>
                                                <div class="mb-3">
                                                    <input x-model="company" required type="text" class="form-control" placeholder="The Connect Wave" aria-label="@theconnectwave" name="ins-handle">
                                                </div>
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox" x-model="showCompany" id="companySwitch">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="companySwitch">Add Company to Card</label>
                                                </div>
                                                <hr>
                                                <label>WhatsApp Number</label>
                                                <div class="mb-3">
                                                    <input required type="text" class="form-control" placeholder="9876543021" aria-label="9876543021" name="wa-number">
                                                </div>
                                                <label>Instagram Handle</label>
                                                <div class="mb-3">
                                                    <input required type="text" class="form-control" placeholder="@theconnectwave" aria-label="@theconnectwave" name="ins-handle">
                                                </div>
                                                <label>Background</label>
                                                <div class="mb-3 bg_container">
                                                    <div class="bg_selector mb-2 bg1" @click="bgClass = 'curved-1'"></div>
                                                    <div class="bg_selector mb-2 bg3" @click="bgClass = 'curved-3'"></div>
                                                    <div class="bg_selector mb-2 bg4" @click="bgClass = 'curved-4'"></div>
                                                    <div class="bg_selector mb-2 bg5" @click="bgClass = 'curved-5'"></div>
                                                    <div class="bg_selector mb-2 bg6" @click="bgClass = 'curved-6'"></div>
                                                    <div class="bg_selector mb-2 bg7" @click="bgClass = 'curved-7'"></div>
                                                    <div class="bg_selector mb-2 bg6" @click="bgClass = 'curved-6'"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>