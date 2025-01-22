<x-vcf-layout>

      <div class="container d-flex justify-content-center mt-3 mb-3">
    <div class="card p-3 py-4 mb-5">
        <div class="text-center"> 
		<img src="{{$vcfCard->photo_url}}" class="rounded-circle profile-img">
            <h3 class="mt-5">Shubham Bhattacharya</h3>
			<span class="mt-1 clearfix">Founder & CEO, The Connect Wave</span>
			<hr class="line">
			<small class="mt-4">I am an android developer working at google Inc at california,USA</small>
      <div class="profile mt-5 mb-5 flex-cont">
        <a id="profile_button" class="profile_button px-5"><i class="fas fa-save"></i> Save Contact</a>
        <button class="profile_button round-btn"><i class="fas fa-share-alt"></i></button>
      </div>
              <div class="social-buttons mt-5"> 
			   <button class="neo-button"><i class="fab fa-facebook"></i> </button> 
			   <button class="neo-button"><i class="fab fa-instagram"></i></button> 
			   <button class="neo-button"><i class="fab fa-youtube"></i> </button> 
			   <button class="neo-button"><i class="fab fa-linkedin-in"></i> </button>
			   <button class="neo-button"><i class="fab fa-github-alt"></i> </button>
			  </div>
        </div>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const vcfData = {!! json_encode($vcfData) !!}; // Pass the VCF data from Laravel
            const blob = new Blob([vcfData], { type: 'text/vcard' }); // Create a blob for the VCF
            const link = document.getElementById('profile_button');
            link.href = URL.createObjectURL(blob);
            link.download = "contact.vcf"; // File name for the download
            // link.style.display = 'none';
            // document.body.appendChild(link);
            // Trigger the download
            link.click();

            // Clean up after download without affecting other DOM elements
            // setTimeout(() => {
            //     URL.revokeObjectURL(link.href); // Release memory from Blob URL
            //     document.body.removeChild(link); // Safely remove the link
            // }, 100);
        });
    </script>
</x-vcf-layout>
