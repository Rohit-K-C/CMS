	const imgDiv = document.querySelector('.upload-pic');
	const img = document.querySelector('#image');
	const file = document.querySelector('#file');
	const uploadBtn = document.querySelector('#uploadBtn');

	file.addEventListener('change', function(){
		const choosedFile = this.files[0];
		if (choosedFile) {
			const reader = new FileReader();
			reader.addEventListener('load', function(){
				img.setAttribute('src', reader.result);
			});
			reader.readAsDataURL(choosedFile);
		}
	});