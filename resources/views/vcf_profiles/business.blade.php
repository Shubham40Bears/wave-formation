<x-vcf-layout :title="$vcfCard->first_name . ' ' . $vcfCard->last_name" 
    :image="$vcfCard->photo_url" 
    :description="$vcfCard->profile_description"
    :url="url()->current()">

      <div class="container d-flex justify-content-center mt-3 mb-3">
    <div class="card p-3 py-4 mb-5">
        <div class="text-center"> 
		<img src="{{asset($vcfCard->photo_url)}}" class="rounded-circle profile-img">
            <h3 class="mt-5">{{$vcfCard->first_name}} {{$vcfCard->last_name}}</h3>
			<span class="mt-1 clearfix">{{$vcfCard->designation}}, {{$vcfCard->company_name}}</span>
			<hr class="line">
			<small class="mt-4">{{$vcfCard->profile_description}}</small>
      <div class="profile mt-5 mb-5 flex-cont">
        <a id="profile_button" class="profile_button px-5"><i class="fas fa-save"></i> Save Contact</a>
        <button class="profile_button round-btn" id="share-button"><i class="fas fa-share-alt"></i></button>
      </div>
              <div class="social-buttons mt-5"> 
                @foreach($vcfCard->sns_links as $snslinks)
			        <a class="neo-button" href="{{$snslinks['link']}}" target="_blank"><i class="fab fa-{{$snslinks['medium']}}"></i> </a>
                @endforeach
			        </div>
              <a href="https://theconnectwave.com" target="_blank" >
                <img src="{{asset('tcw/images/tcw-logo.png')}}" class="img-fluid foot-logo" />
              </a>
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
            // link.click();

            // Clean up after download without affecting other DOM elements
            setTimeout(() => {
                link.click();
            }, 1000);
        });
        const shareButton = document.getElementById('share-button');

 shareButton.addEventListener('click', () => {
    if (navigator.share) {
      navigator.share({
        title: document.title,  // Use the current page title
        text: "Sharing {{$vcfCard->first_name}}'s Profile!",
        url: '{{ url()->current() }}'  // The current URL from Laravel
      }).then(() => {
        console.log('Thanks for sharing!');
      }).catch((err) => {
        console.error('Error sharing:', err);
      });
    } else {
      alert('Sharing is not supported on this device/browser.');
    }
  });
    </script>
</x-vcf-layout>
