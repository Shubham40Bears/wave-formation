
@include('components.preview-modal')
<x-nonauth-layout>
    <section id="" class="py-5 my-5">
        <div class="container">
            <div class="col-12 header-sec">
                <p class="heading m-0">Customise Card</p>
                <p class="subheading">These details will be printed on the card you selected</p>
                <form id="customiseForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ps" value="{{$product->cardType->slug}}" />
                    <input type="hidden" name="pud" value="{{$product->id}}" />
                    <input type="hidden" value="{{$product->card_skeleton}}" id="cardSkeleton" />
                    @if($product->cardType->slug === 'wedding-card')
                    <div id="wedding-card-form">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example3">Bride's Name</label>
                            <input type="text" id="brideName" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form6Example3">Groom's Name</label>
                            <input type="text" id="groomName" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="weddingDateTime">Wedding Date & Time</label>
                            <input type="text" id="weddingDateTime" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="weddingDateTime">Invitation Message</label>
                            <textarea class="form-control" name="invitationMessage" rows="4"></textarea>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="weddingDateTime">Venue / Location</label>
                            <input type="text" id="location" class="form-control" />
                        </div>
                    </div>
                    @endif
                    @if($product->cardType->slug === 'love-cards')
                        <div class="form-group">
                            <input type="text" id="yourName"  name="yourName" class="form-control" placeholder=" "/>
                            <label class="form-label" for="yourName">Your Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="partnerName" name="partnerName" class="form-control" placeholder=" "/>
                            <label class="form-label" for="partnerName">Partner's Name</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="shortMessage" rows="4" placeholder=" ">My love, every day with you feels like a celebration, but today I just want to remind you how deeply and endlessly you mean to me. You’re my heart, my happiness, my forever Valentine. ❤️</textarea>
                            <label class="form-label" for="shortMessage">Short Message</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="4" placeholder=" ">You are my love, my best friend. I am successful because I have you as my life partner. You are the epitome of love & I am blessed to have you in my life.</textarea>
                            <label class="form-label" for="shortMessage">Message on card</label>
                        </div>
                        <div class="custom-control custom-switch mb-4">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Secret Mode</label>
                        </div>
                        <div class="secure_code"></div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="weddingDateTime">Card Front Image</label>
                            <input type="file" name="displayPicture" id="displayPicture" class="d-none"/>
                            <button class="btn btn-tcw-move" type="button" id="displayPictureButton">Select Image</button>
                        </div>
                        <div class="imageContainerDp mb-4">
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="weddingDateTime">Gallery Images</label>
                            <p><small>Images uploaded are not accessible to TCW and any third party applications.</small></p>
                            <input type="file" name="galleryImages" id="imagesPicker" class="d-none" multiple/>
                            <button class="btn btn-tcw-move" type="button" id="imagesButton">Select Gallery Images <i class="fa-solid fa-images"></i></button>
                        </div>
                        <div class="imageContainer mb-4">
                            <div class="image-square add-more d-none">
                                <span>+ Add More</span>
                            </div>
                        </div>
                    @endif
                    @if($product->cardType->slug === 'birthday-cards')
                        <input type="hidden" class="bdy" />
                        <div class="form-group">
                            <input type="text" id="recevierName"  name="recevierName" class="form-control" placeholder=" "/>
                            <label class="form-label" for="yourName">Happy Birthday To</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="senderName" name="senderName" class="form-control" placeholder=" "/>
                            <label class="form-label" for="partnerName">From</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="4" placeholder=" ">You are my love, my best friend. I am successful because I have you as my life partner. You are the epitome of love & I am blessed to have you in my life.</textarea>
                            <label class="form-label" for="shortMessage">Message on card</label>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="weddingDateTime">Card Front Image</label>
                            <input type="file" name="displayPicture" id="displayPicture" class="d-none"/>
                            <button class="btn btn-tcw-move" type="button" id="displayPictureButton">Select Image</button>
                        </div>
                        <div class="imageContainerDp mb-4">
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="weddingDateTime">Gallery Images</label>
                            <p><small>Images uploaded are not accessible to TCW and any third party applications.</small></p>
                            <input type="file" name="galleryImages" id="imagesPicker" class="d-none" multiple/>
                            <button class="btn btn-tcw-move" type="button" id="imagesButton">Select Gallery Images <i class="fa-solid fa-images"></i></button>
                        </div>
                        <div class="imageContainer mb-4">
                            <div class="image-square add-more d-none">
                                <span>+ Add More</span>
                            </div>
                        </div>
                    @endif
                    @if($product->cardType->slug === 'event-cards')
                        <div class="form-group">
                            <input type="text" id="firstName"  name="firstName" class="form-control" placeholder=" "/>
                            <label class="form-label" for="firstName">First Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="lastName"  name="lastName" class="form-control" placeholder=" "/>
                            <label class="form-label" for="lastName">Last Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="compnayName"  name="compnayName" class="form-control" placeholder=" "/>
                            <label class="form-label" for="compnayName">Company Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="tagLine"  name="tagLine" class="form-control" placeholder=" "/>
                            <label class="form-label" for="tagLine">Tag Line</label>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email"  name="email" class="form-control" placeholder=" "/>
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="phoneNumber"  name="phoneNumber" class="form-control" placeholder=" "/>
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="weddingDateTime">Display Image</label>
                            <input type="file" name="displayPicture" id="displayPicture" class="d-none"/>
                            <button class="btn btn-tcw-move" type="button" id="displayPictureButton">Select Image</button>
                        </div>
                        <hr>

                        <h4>Social Media links</h4>
                        <div class="social-media-icons mb-4">
                            <i class="fab fa-facebook-square" data-platform="Facebook" title="Facebook"></i>
                            <i class="fab fa-twitter-square" data-platform="Twitter" title="Twitter"></i>
                            <i class="fab fa-instagram-square" data-platform="Instagram" title="Instagram"></i>
                            <i class="fab fa-linkedin" data-platform="LinkedIn" title="LinkedIn"></i>
                            <i class="fas fa-globe" data-platform="Website" title="Website"></i>
                        </div>
                        <div class="social-media-inputs mt-4">
                            <!-- Input boxes will be dynamically added here -->
                        </div>
                    @endif  
                    @if($product->cardType->slug === 'breakup-cards')
                    <input type="hidden" class="brkup" />
                    <div class="form-container">
                        <h4 class="text-center mb-4">Create Your Card</h4>

                        <!-- Progress Bar -->
                        <div class="progress mb-4">
                            <div id="progressBar" class="progress-bar bg-dark" style="width: 20%;"></div>
                        </div>

                        <!-- Multi-Step Form -->
                            <!-- Step 1: select image -->
                            <div class="form-step" id="step1">
                                <label for="to" class="form-label">Select image</label>
                                <div class="image-scroll">
                                    @foreach($product->choice_images as $choiceImage)
                                        <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/w_200,h_350,c_thumb/{{$choiceImage}}" alt="Image 1" data-name="{{$choiceImage}}">
                                    @endforeach
                                </div>
                                <input type="hidden" id="selectedImage" name="selected_image">
                                <button type="button" class="btn btn-tcw-move mt-3 next-btn">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                            </div>
                            <!-- Step 2: To -->
                            <div class="form-step" id="step1">
                                <label for="to" class="form-label">To</label>
                                <input type="text" id="recevierName" name="recevierName" class="form-control" placeholder="Enter recipient's name">
                                <div class="btn-cont">
                                    <button type="button" class="btn btn-tcw-outline mt-3 prev-btn"><i class="fa-solid fa-arrow-left-long"></i></button>
                                    <button type="button" class="btn btn-tcw-move mt-3 next-btn w-50">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                                </div>
                            </div>

                            <!-- Step 3: From -->
                            <div class="form-step" id="step2">
                                <label for="from" class="form-label">From</label>
                                <input type="text" id="senderName" name="senderName" class="form-control" placeholder="Your name">
                                <div class="btn-cont">
                                    <button type="button" class="btn btn-tcw-outline mt-3 prev-btn"><i class="fa-solid fa-arrow-left-long"></i></button>
                                    <button type="button" class="btn btn-tcw-move mt-3 next-btn w-50">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                                </div>
                            </div>

                            <!-- Step 4: Message -->
                            <div class="form-step" id="step3">
                                <label for="message" class="form-label">Message</label>
                                <textarea id="message" name="message" class="form-control" placeholder="Write your message"></textarea>
                                <div class="btn-cont">
                                    <button type="button" class="btn btn-tcw-outline mt-3 prev-btn"><i class="fa-solid fa-arrow-left-long"></i></button>
                                    <button type="button" class="btn btn-tcw-move mt-3 next-btn w-50">Next <i class="fa-solid fa-arrow-right-long"></i></button>
                                </div>
                            </div>

                            <!-- Step 5: Gallery Images -->
                            <div class="form-step active" id="step4">
                                <label for="gallery" class="form-label">Upload Images</label>
                                <input type="file" id="imagesPicker" name="galleryImages" class="form-control d-none" multiple>
                                <button class="btn btn-tcw-move mb-2" type="button" id="imagesButton">Select Gallery Images <i class="fa-solid fa-images"></i></button>
                                <div class="imageContainer mb-4">
                                    <div class="image-square add-more d-none">
                                        <span>+ Add More</span>
                                    </div>
                                </div>
                                <div class="imageContainerDp mb-4 d-none">
                                    <div class="image-square">
                                        <img id="randomProfileImage" src="https://res.cloudinary.com/shubhambhattacharya/image/upload/w_200,h_350,c_thumb/{{$product->choice_images[0]}}" />
                                    </div>
                                </div>
                                <div class="btn-cont">
                                    <button type="button" class="btn btn-tcw-outline mt-3 prev-btn"><i class="fa-solid fa-arrow-left-long"></i></button>
                                </div>
                            </div>
                    </div>
                    @endif                  
                    <!-- Submit button -->
                     <hr>
                    <button data-mdb-ripple-init type="button" class="btn btn-tcw-move btn-block mb-4" id="previewCard">Preview & Confirm Order</button>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
        if($(".social-media-icons i").length) {
            $(".social-media-icons i").on("click", function () {
                const platform = $(this).data("platform");
                const existingInput = $(`[data-platform-input="${platform}"]`);

                if (existingInput.length === 0) {
                    const inputHtml = `
                        <div class="form-group social-icons-input" data-platform-group="${platform}">
                            <input type="text" class="form-control social-input w-90" placeholder=" " data-platform-input="${platform}" />
                            <label class="form-label">${platform} URL/Handle</label>
                            <i class="fas fa-times remove-input" data-platform-remove="${platform}" title="Remove"></i>
                        </div>
                    `;
                    $(".social-media-inputs").append(inputHtml);
                }
            });
            $(".social-media-inputs").on("click", ".remove-input", function () {
                const platform = $(this).data("platform-remove");
                $(`[data-platform-group="${platform}"]`).remove();
            });

            // Validate input (basic URL or handle validation)
            $(".social-media-inputs").on("input", ".social-input", function () {
                const value = $(this).val();
                const isValid = value.match(/^(https?:\/\/)?([\w.-]+)+[\w-]+(\.[a-z]{2,})?(:\d+)?(\/\S*)?$/) || value.startsWith("@");
                $(this).css("border-color", isValid ? "green" : "red");
            });
        }
        $(document).ready(function() {
            $('#customSwitch1').on('change', function() {
                if ($(this).prop('checked')) {
                    $('.secure_code').html(`
                        <div class="form-group position-relative">
                            <input type="password" id="passwordCode" name="passwordCode" class="form-control" placeholder=" "/>
                            <label class="form-label" for="passwordCode">Set a password</label>
                            <span class="toggle-password" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                    `);
                } else {
                    $('.secure_code').empty();
                }
            });
            $(document).on('click', '.toggle-password', function() {
                let input = $('#passwordCode');
                let icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const steps = document.querySelectorAll(".form-step");
            const nextBtns = document.querySelectorAll(".next-btn");
            const prevBtns = document.querySelectorAll(".prev-btn");
            const progressBar = document.getElementById("progressBar");
            let currentStep = 0;

            function updateSteps() {
                steps.forEach((step, index) => {
                    step.classList.remove("active", "prev", "next");
                    if (index === currentStep) {
                        step.classList.add("active");
                    } else if (index < currentStep) {
                        step.classList.add("prev");
                    } else {
                        step.classList.add("next");
                    }
                });

                // Update progress bar
                const progressPercentage = ((currentStep + 1) / steps.length) * 100;
                progressBar.style.width = progressPercentage + "%";
            }

            nextBtns.forEach(btn => {
                btn.addEventListener("click", function () {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        updateSteps();
                    }
                });
            });

            prevBtns.forEach(btn => {
                btn.addEventListener("click", function () {
                    if (currentStep > 0) {
                        currentStep--;
                        updateSteps();
                    }
                });
            });

            updateSteps();
        });
        document.querySelectorAll('.image-scroll img').forEach(img => {
            img.addEventListener('click', function() {
                document.querySelectorAll('.image-scroll img').forEach(i => i.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('selectedImage').value = this.getAttribute('data-name');
                document.getElementById('cardSkeleton').value = this.getAttribute('data-name');
            });
        });
    </script>
    @endpush
</x-nonauth-layout>