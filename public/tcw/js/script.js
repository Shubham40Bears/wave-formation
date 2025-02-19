$(document).ready(function () {
	if($('#shop .product-images').length > 0){
		$('.product-images').each(function () {
			const container = $(this); // The container with overflow hidden
			const images = container.find('.prod-img'); // Images inside the container
			let currentIndex = 0;
	
			function scrollNextImage() {
				// Calculate the scroll position for the next image
				const scrollWidth = container[0].scrollWidth / images.length; // Width of each image
				currentIndex = (currentIndex + 1) % images.length;
	
				// Scroll to the calculated position
				container.animate({ scrollLeft: currentIndex * scrollWidth }, 500); // Smooth scroll
			}
	
			// Start scrolling every 3 seconds
			setInterval(scrollNextImage, 3000);
		});
	}

	if($('#weddingDateTime').length > 0){
		$('#weddingDateTime').flatpickr({enableTime: true})
	}

      // Handle file input change
      $(document).on("change", "#imagesPicker", function (e) {
        const files = e.target.files;

        // Loop through the selected files
        Array.from(files).forEach((file) => {
          const reader = new FileReader();

          // On image load
          reader.onload = function (event) {
            // Create a new image square
            const imageSquare = `
              <div class="image-square">
                <img src="${event.target.result}" alt="Uploaded Image" />
				<button type="button" class="delete-image-prev"><i class="fas fa-trash"></i></button>
              </div>
            `;

            // Append the image square before the add-more button
            $(".add-more").before(imageSquare);
            $(".add-more").removeClass('d-none');
          };

          // Read the file
          reader.readAsDataURL(file);
        });
      });



	  $(document).on("change", "#displayPicture", function (e) {
        const dpFile = e.target.files[0];
		$('.imageContainerDp .image-square').remove()
        if (dpFile) {
			const reader = new FileReader();
  
			// On image load
			reader.onload = function (event) {
  
			  // Create a new image square
			  const imageSquare = `
				<div class="image-square">
				  <img src="${event.target.result}" alt="Uploaded Image" />
				</div>
			  `;
  
			  // Append the image square to the image container before the add-more square
			  $(".imageContainerDp").append(imageSquare);
			};
  
			// Read the file
			reader.readAsDataURL(dpFile);
		  }
      });
});
const generatePreview = function() {
	$('.previewCardImage').attr('src',`https://res.cloudinary.com/shubhambhattacharya/image/upload/${$('#cardSkeleton').val()}`);
	let imgsrc = $(".imageContainerDp .image-square img").last().attr("src");
	if (!imgsrc) {
		new Noty({
            type: "error", // success, error, warning, info
            layout: "topRight", // topLeft, topCenter, bottomRight, etc.
            text: "Please Select Image to be printed on card.",
            timeout: 3000, // Auto-dismiss in 5 seconds
            progressBar: true,
            closeWith: ["click", "button"],
            theme: "metroui" // Themes: "metroui", "sunset", "relax", etc.
        }).show();
        return;
    }
	$('#demo-dp').attr('src', imgsrc);
	$('.previewCardImage').css('background-image', 'url(' + imgsrc + ')');
	if($('.bdy').length || $('.brkup').length) {
		$('.name-demo').html(`${$('#recevierName').val()}`);
	} else {
		$('.name-demo').html(`${$('#yourName').val()} & ${$('#partnerName').val()}`);
	}
	let galleryImages = $(".imageContainer .image-square img")
	if (galleryImages.length === 0) {
		new Noty({
            type: "error", // success, error, warning, info
            layout: "topRight", // topLeft, topCenter, bottomRight, etc.
            text: "Please Select Gallery images to be displayed when card is tapped or scanned.",
            timeout: 3000, // Auto-dismiss in 5 seconds
            progressBar: true,
            closeWith: ["click", "button"],
            theme: "metroui" // Themes: "metroui", "sunset", "relax", etc.
        }).show();
        return;
    }
	$(".masonry-demo").html('')
	galleryImages.each(function() {
		const imageGallery = `<div class="item">
                                    <img src="${$(this).attr('src')}">
                                </div>`
		$(".masonry-demo").append(imageGallery)
	});
	if($('.brkup').length) {
		setTimeout(() => {
			const images = $(".masonry-demo img");
			if (images.length > 0) {
				const randomImage = images.eq(Math.floor(Math.random() * images.length));
				$('#demo-dp').attr('src', randomImage.attr("src"));
			}
		}, 100);
	}
	$('.message_data').text($('#message').val())
	$('#previewModal').show();
}
$(document).on('click','#imagesButton', function(){
	$('#imagesPicker').click()
});
$(document).on('click','.add-more', function(){
	$('#imagesPicker').click()
});
$(document).on('click','#displayPictureButton', function(){
	$('#displayPicture').click()
});
$(document).on('click','#previewCard', function(){
	generatePreview();
});
$(document).on('click','#closePreview', function(){
	$('#previewModal').hide()
});
$(document).on('click','#saveOrder', function() {
	$(this).attr('disabled', true);
	$(this).html('<i class="fas fa-sync fa-spin"></i> Confirming', true);
	$('#customiseForm').submit()
});
const cloudinaryUploadURL = 'https://api.cloudinary.com/v1_1/shubhambhattacharya/image/upload';
const cloudinaryUploadPreset = 'f44xw37r'; // Replace with your Cloudinary upload preset

const addDataToCart = (uploadedImagesResponse) => {
	const imageUrls = {};
	const item = JSON.parse(localStorage.getItem('formData'));
	uploadedImagesResponse.forEach((image) => {
	  if (image) {
		if (!Array.isArray(item[image.imagePosition])) {
			item[image.imagePosition] = []; // Initialize as an empty array if it doesn't exist
		  }
		item[image.imagePosition].push(image.uploadedImage)
	  }
	});
	localStorage.setItem('formData', JSON.stringify(item));
	$("#saveOrder").attr('disabled', false);
	$("#saveOrder").html('Confirm');
	window.location.pathname = '/checkout';
  };

const uploadFilesToCdn = (uploadPromises, imageFiles, formData) => {
	imageFiles.each(function (index, imgFile) {
	  const fileInput = this;
	  const files = fileInput.files;
  
	  // Iterate over all files selected in the input
	  Array.from(files).forEach((file) => {
		if (file) {
		  const imageFormData = new FormData();
		  imageFormData.append('file', file);
		  imageFormData.append('upload_preset', cloudinaryUploadPreset);
  
		  // Create the upload promise using axios
		  const uploadPromise = axios.post(cloudinaryUploadURL, imageFormData, {
			headers: {
			  'Content-Type': 'multipart/form-data',
			},
		  })
		  .then((response) => {
			const uploadedImage = response.data.secure_url;
			return {
				promise: uploadPromise,
				imagePosition: imgFile.name,
				uploadedImage: uploadedImage,
			};
		  })
		  .catch((error) => {
			console.error('Image upload failed:', error);
		  });
  
		  uploadPromises.push(uploadPromise);
		} else {
		  console.warn('No file selected for input:', fileInput);
		}
	  });
	});
  
	Promise.all(uploadPromises).then((results) => {
	  addDataToCart(results);
	});
  };
$(document).on('submit','#customiseForm',function (e) {
	e.preventDefault();
	const form = $(this);
    const formData = new FormData(form[0]);
	const formDataObject = {};
	formData.forEach((value, key) => {
		formDataObject[key] = value;
	});
	localStorage.setItem('formData', JSON.stringify(formDataObject));
    const imageFiles = form.find('input[type="file"]');
	const uploadPromises = [];
	uploadFilesToCdn(uploadPromises, imageFiles, formData);
});
async function fetchPostOffices() {
	const pincode = document.getElementById("pincode").value.trim();

	// Ensure the pincode has 6 digits before making the API call
	if (pincode.length !== 6) {
		document.getElementById("postOfficeSuggestions").style.display = "none";
		return;
	}

	try {
		// Fetch data from the Postman Pincode API
		const response = await fetch(`https://api.postalpincode.in/pincode/${pincode}`);
		const data = await response.json();

		const suggestionBox = document.getElementById("postOfficeSuggestions");
		suggestionBox.innerHTML = ""; // Clear previous suggestions

		if (data[0]?.Status === "Success" && data[0]?.PostOffice?.length > 0) {
			const postOffices = data[0].PostOffice;

			// Populate the suggestions
			postOffices.forEach((office) => {
				const listItem = document.createElement("li");
				listItem.className = "list-group-item list-group-item-action";
				listItem.textContent = `${office.Name} - ${office.Block}, ${office.State}`;
				listItem.onclick = () => selectPostOffice(office);
				suggestionBox.appendChild(listItem);
			});

			suggestionBox.style.display = "block"; // Show the suggestion box
		} else {
			suggestionBox.innerHTML = '<li class="list-group-item">No results for given pincode</li>';
			suggestionBox.style.display = "block";
		}
	} catch (error) {
		console.error("Error fetching post office data:", error);
	}
}

function selectPostOffice(postOfficeData) {
	const inputField = document.getElementById("pincode");
	inputField.value = postOfficeData.Pincode;
	$('#state').val(postOfficeData.State);
	$('#country').val(postOfficeData.Country);
	$('#city').val(postOfficeData.Name);
	// Hide the suggestion box
	document.getElementById("postOfficeSuggestions").style.display = "none";
}

// Close suggestions when clicking outside
// document.addEventListener("click", (e) => {
// 	const suggestionBox = document.getElementById("postOfficeSuggestions");
// 	if (!suggestionBox.contains(e.target) && e.target.id !== "pincode") {
// 		suggestionBox.style.display = "none";
// 	}
// });


$(document).on("click", ".delete-image-prev", function () {
	$(this).closest(".image-square").remove(); // Remove the parent image square
  });

$(document).on('click','.tab-pill-btn', function () {
	var targetSection = $(this).data('bs-target');
	$('.tab-pill-btn').removeClass('active');
	$(this).addClass('active');
	$('.previewPane').removeClass('show active');
	$(targetSection).addClass('show active');
});