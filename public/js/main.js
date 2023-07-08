(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Sidebar toggle
   */
  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function (e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }


})();

const dropZone = document.getElementById('drop-zone');
const inputElement = document.getElementById('myfile');
const buttonImage = document.getElementById('button-image');
const svgImage = document.getElementById('svg-image');
const img = document.getElementById('preview-image');
const p = document.getElementById('upload-message');
const closeButton = document.getElementById('close-button');

closeButton.addEventListener('click', e => {
  e.preventDefault();
  img.style.display = 'none';
  p.style.display = 'block';
  buttonImage.style.display = 'block';
  svgImage.style.display = 'block';
  inputElement.value = ''; // Menghapus file yang dipilih dari input file
  closeButton.style.display = 'none';
});

function showCloseButton() {
  closeButton.style.display = 'block';
}

inputElement.addEventListener('change', function (e) {
  const clickFile = this.files[0];
  if (clickFile) {
    img.style.display = 'block';
    p.style.display = 'none';
    buttonImage.style.display = 'none';
    svgImage.style.display = 'none';
    const reader = new FileReader();
    reader.readAsDataURL(clickFile);
    reader.onloadend = function () {
      const result = reader.result;
      img.src = this.result;
      img.alt = clickFile.name;
    };
    showCloseButton();
  }
});

dropZone.addEventListener('click', () => inputElement.click());

dropZone.addEventListener('dragover', e => {
  e.preventDefault();
});

dropZone.addEventListener('drop', function (e) {
  e.preventDefault();
  img.style.display = 'block';
  let file = e.dataTransfer.files[0];

  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onloadend = function () {
    e.preventDefault();
    p.style.display = 'none';
    buttonImage.style.display = 'none';
    svgImage.style.display = 'none';
    img.src = this.result;
    img.alt = file.name;
  };
  showCloseButton();

  // Simpan file yang dijatuhkan ke dalam input file
  inputElement.files = e.dataTransfer.files;
});

// Periksa apakah src memiliki nilai
if (img.src) {
  img.style.display = "block";
  p.style.display = 'none';
  buttonImage.style.display = 'none';
  svgImage.style.display = 'none';
  showCloseButton();
}