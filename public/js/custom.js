
  (function ($) {
  
  "use strict";

    // MENU
    $('.navbar-collapse a').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });
    
    // CUSTOM LINK
    $('.smoothscroll').click(function(){
      var el = $(this).attr('href');
      var elWrapped = $(el);
      var header_height = $('.navbar').height();
  
      scrollToDiv(elWrapped,header_height);
      return false;
  
      function scrollToDiv(element,navheight){
        var offset = element.offset();
        var offsetTop = offset.top;
        var totalScroll = offsetTop-navheight;
  
        $('body,html').animate({
        scrollTop: totalScroll
        }, 300);
      }
    });

    $(window).on('scroll', function(){
      function isScrollIntoView(elem, index) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(window).height()*.5;
        if(elemBottom <= docViewBottom && elemTop >= docViewTop) {
          $(elem).addClass('active');
        }
        if(!(elemBottom <= docViewBottom)) {
          $(elem).removeClass('active');
        }
        var MainTimelineContainer = $('#vertical-scrollable-timeline')[0];
        var MainTimelineContainerBottom = MainTimelineContainer.getBoundingClientRect().bottom - $(window).height()*.5;
        $(MainTimelineContainer).find('.inner').css('height',MainTimelineContainerBottom+'px');
      }
      var timeline = $('#vertical-scrollable-timeline li');
      Array.from(timeline).forEach(isScrollIntoView);
    });
  
  })(window.jQuery);

  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      center: true,
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
      ],
      responsive:{
        0:{
          items:1
        },
        600:{
          items:1
        },
        1000:{
          items:3
        }
      }
    });
  });

  // ---------------------------------------------
  const dropZone2 = document.getElementById('drop-zone-2');
  const inputElement2 = document.getElementById('myfile-2');
  const buttonImage2 = document.getElementById('button-image-2');
  const svgImage2 = document.getElementById('svg-image-2');
  const img2 = document.getElementById('preview-image-2');
  const p2 = document.getElementById('upload-message-2');
  const closeButton2 = document.getElementById('close-button-2');

  closeButton2.addEventListener('click', e => {
    e.preventDefault();
    img2.style.display = 'none';
    p2.style.display = 'block';
    buttonImage2.style.display = 'block';
    svgImage2.style.display = 'block';
    inputElement2.value = ''; // Menghapus file yang dipilih dari input file
    closeButton2.style.display = 'none';
  });

  function showCloseButton2() {
    closeButton2.style.display = 'block';
  }

  inputElement2.addEventListener('change', function (e) {
    const clickFile = this.files[0];
    if (clickFile) {
      img2.style.display = 'block';
      p2.style.display = 'none';
      buttonImage2.style.display = 'none';
      svgImage2.style.display = 'none';
      const reader = new FileReader();
      reader.readAsDataURL(clickFile);
      reader.onloadend = function () {
        const result = reader.result;
        img2.src = this.result;
        img2.alt = clickFile.name;
      };
      showCloseButton2();
    }
  });

  dropZone2.addEventListener('click', () => inputElement2.click());

  dropZone2.addEventListener('dragover', e => {
    e.preventDefault();
  });

  dropZone2.addEventListener('drop', function (e) {
    e.preventDefault();
    img2.style.display = 'block';
    let file = e.dataTransfer.files[0];

    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function () {
      e.preventDefault();
      p2.style.display = 'none';
      buttonImage2.style.display = 'none';
      svgImage2.style.display = 'none';
      img2.src = this.result;
      img2.alt = file.name;
    };
    showCloseButton2();

    // Simpan file yang dijatuhkan ke dalam input file
    inputElement2.files = e.dataTransfer.files;
  });

  // Periksa apakah src memiliki nilai
  if (img2.src) {
    img2.style.display = "block";
    p2.style.display = 'none';
    buttonImage2.style.display = 'none';
    svgImage2.style.display = 'none';
    showCloseButton2();
  }