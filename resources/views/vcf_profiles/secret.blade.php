<x-vcf-layout>

    <div class="container-fluid d-flex justify-content-center mt-3 mb-3">
        <div class="card p-3 py-4 mb-5">
            <div class="text-center">
                <div class="profileInputs full-section flex-column justify-content-center">
                    <p class="message mb-3">To access the gallery, please share the secret code that is shared with you.</p>
                    <div class="input-container">
                        <input type="password" placeholder="Enter Love Code" id="secretCode">
                        <button type="button" id="validateCode">Submit</button>
                    </div>
                    <p class="errorMessage text-danger mt-3"></p>
                </div>
                <a href="https://theconnectwave.com" target="_blank">
                    <img src="{{asset('tcw/images/tcw-logo.png')}}" class="img-fluid foot-logo" />
                </a>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
       $(document).on('click','#validateCode',function(){
        axios.post('{{route("unlock",["vcf_code" => $profile_code])}}',{secretCode: $('#secretCode').val()}).then((response) => {
            window.location.reload();
        }).catch((error) => {
            $('.errorMessage').text('Invalid secret code, Please try again.')
        })
       });
    </script>
    @endpush
</x-vcf-layout>
