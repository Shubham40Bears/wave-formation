<x-nonauth-layout>
    <section id="" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 header-sec">
                    <p class="heading m-0">Contact Us</p>
                    <p class="subheading">Raise a ticket for any queries or just drop a message to us</p>
                </div>
                <div class="col-lg-12">
                    <form role="form" method="POST" action="{{ route('contactSave') }}" id="contactForm">
                        @csrf
                        <div class=" myt-5 form-group">
                            <input type="name" class="form-control" id="name" name="name" placeholder=" " value="" required>
                            <label for="firstName">Name</label>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class=" myt-5 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder=" " value="" required>
                            <label for="firstName">Email</label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class=" myt-5 form-group">
                            <select class="form-control" name="contactReason">
                                <option selected>Reason for contact</option>
                                <option value="Bulk Order">Bulk Order</option>
                                <option value="Order Status">Order Status</option>
                                <option value="Refund Status">Refund Status</option>
                                <option value="Other">Other</option>
                            </select>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class=" myt-5 form-group">
                            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder=" " value="" required>
                            <label for="phoneNumber">Contact Number</label>
                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                        </div>
                        <div class=" myt-5 form-group">
                            <textarea type="text" class="form-control" id="message" name="message" placeholder=" " value="" required rows="6"></textarea>
                            <label for="phoneNumber">Your Message</label>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0 btn-tcw-move">Send <i class="far fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
        $(document).on('submit','#contactForm',function(e){
            e.preventDefault();
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-full-width",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
            let form = $(this);
            let submitButton = form.find("button[type='submit']");
            let inputs = form.find("input, select, textarea");

            // Disable inputs and button
            inputs.prop("disabled", true);
            submitButton.prop("disabled", true).text("Sending...");

            // Collect form data
            let formData = {
                name: form.find("input[name='name']").val(),
                email: form.find("input[name='email']").val(),
                contact_number: form.find("input[name='phoneNumber']").val(),
                message: form.find("textarea[name='message']").val(),
                reason: form.find("select[name='contactReason']").val(),
            };
            axios.post(form.attr("action"), formData)
                .then(response => {
                    toastr.success('Message sent successfully, please check your email for details', 'Yay!');
                    form[0].reset(); // Reset the form
                })
                .catch(error => {
                    toastr.error('Something went wrong, please try again later.', 'Oops!!');
                    console.error(error);
                })
                .finally(() => {
                    // Re-enable inputs and button
                    inputs.prop("disabled", false);
                    submitButton.prop("disabled", false).text("Send");
                });
        });
    </script>
    @endpush
</x-nonauth-layout>