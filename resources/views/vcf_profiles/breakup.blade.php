<x-vcf-layout :title="$vcfCard->first_name . ' ' . $vcfCard->last_name" 
    :image="$vcfCard->photo_url" 
    :description="$vcfCard->profile_description"
    :url="url()->current()">

    <div class="container-fluid d-flex justify-content-center mt-3 mb-3">
        <div class="card p-3 py-4 mb-5">
            <div class="text-center">
                <!-- <img src="{{asset($vcfCard->photo_url)}}" class="rounded-circle profile-img"> -->
                <img src="{{$vcfCard->photo_url}}" class="rounded-circle profile-img">
                <h3 class="mt-3">{{$vcfCard->first_name}}</h3>
                <small class="mt-4">{{$vcfCard->profile_description}}</small>
                <div id="lottie-animation"></div>
                <hr class="line">
                
                <!-- Gallery Section Below -->
                <div class="masonry">
                  @foreach($vcfCard->gallery as $galleryImage)
                  <div class="item">
                    <a href="{{$galleryImage['url']}}" data-lightbox="gallery">
                        <img src="{{$galleryImage['url']}}">
                    </a>
                  </div>
                  @endforeach
                </div>

                <a href="https://theconnectwave.com" target="_blank">
                    <img src="{{asset('tcw/images/tcw-logo.png')}}" class="img-fluid foot-logo" />
                </a>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
    @endpush
</x-vcf-layout>
