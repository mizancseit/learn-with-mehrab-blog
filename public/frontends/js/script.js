
document.addEventListener('DOMContentLoaded', function() {
  let menuItemList = document.querySelector('.menu-item-list');
  menuItemList.addEventListener('click', function(e) {
      let menuItem = e.target;
      let menuItems = document.querySelectorAll('.menu-item');
      menuItems.forEach(item => {
          item.classList.remove('active');
      });
      menuItem.classList.add('active');
  });


  document.addEventListener('scroll', function() {
    var windowSize = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      var scrollTop = window.screenY || document.documentElement.scrollTop || document.body.scrollTop;
      
      if (windowSize > 40 && scrollTop > 40) {
        document.querySelector('.sticky-header').classList.add('is_fixed');
      } else {
        document.querySelector('.sticky-header').classList.remove('is_fixed');
      }
  })


  // AOS
  AOS.init();

  // Slider
  var animation = () => {
      let titles = document.querySelectorAll('.title');
      let descriptions = document.querySelectorAll('.description');
      titles.forEach(title => title.classList.toggle('aos-animate'));
      descriptions.forEach(description => description.classList.toggle('aos-animate'));
      setTimeout(() => {
        AOS.refresh();
      }, 500);
  }
  
  // Slider
  var sliderSwiper = new Swiper('.sliderSwiper', {
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      loop: true,
      slidesPerView: 1,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable: true
      },
      keyboard: {
        enabled: true
      },
      on: {
        init: () => {
          animation();
        },
        slideChangeTransitionEnd: () => {
          animation();
        }
      }
  });

  // About us
  var aboutUsSwiper = new Swiper('.aboutUsSwiper', {
      autoplay: {
        delay: 3500,
        disableOnInteraction: true,
        pauseOnMouseEnter: true,
      },
      slidesPerView: 1,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable: true,
        horizontalClass: 'swiper-pagination-horizontal'
      },
  })

    // Products
    var sliderSwiper = new Swiper('.productsSwiper', {
      autoplay: {
        delay: 3500,
        speed: 1000,
        disableOnInteraction: false,
      },
      loop: true,
      slidesPerView: 4,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable: false
      },
      keyboard: {
        enabled: true
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
        1365: {
          slidesPerView: 4,
        }
      }
    });

    // Teams
    var sliderSwiper = new Swiper('.teamSwiper', {
      autoplay: {
        delay: 3500,
        speed: 1000,
        disableOnInteraction: false,
      },
      loop: true,
      slidesPerView: 4,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable: false
      },
      keyboard: {
        enabled: true
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
        1365: {
          slidesPerView: 4,
        }
      }
    });


  // Message 
  let showMoreMsgBtn = document.querySelectorAll('.showMoreMsgBtn');

  if(showMoreMsgBtn) {
    showMoreMsgBtn.forEach((more) => {
      more.addEventListener('click', function(e) {
        e.preventDefault();
        this.parentElement.classList.toggle('more');
        let moreBtnText = this.parentElement.classList.contains('more') ? 'Show Less' : 'Show More';
        this.innerText = moreBtnText;
      })
    });
  }

  // Gallery

  let portfolioIsotope = document.querySelector('.portfolio-container');
  let portfolioFilterList = document.querySelectorAll('#portfolio-flters li');
  let filterActive = document.querySelector('.filter-active');

  if(filterActive) {
    setTimeout(() => {
      filterActive.click();
      console.log('clicked');
    }, 300)
  }
  let iso = new Isotope (portfolioIsotope, {
    itemSelector: '.portfolio-item'
  })
  portfolioFilterList.forEach((li) => {
    li.addEventListener('click', function() {
      let allFilters = document.querySelectorAll('#portfolio-flters li')
      allFilters.forEach((single) => {
        single.classList.remove('filter-active');
      })
      this.classList.add('filter-active');
      let filterValue = this.dataset.filter;
      iso.arrange({ filter: filterValue });
    })
  })

  const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
    autoplayVideos: true
  });


  var progressPath = document.querySelector('.progress-wrap path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  
  var updateProgress = function () {
    var scroll = window.scrollY || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - window.innerHeight;
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }

  updateProgress();
  window.addEventListener('scroll', updateProgress);

  var offset = 100;

  window.addEventListener('scroll', function () {
    if (window.scrollY > offset) {
      document.querySelector('.progress-wrap').classList.add('active-progress');
    } else {
      document.querySelector('.progress-wrap').classList.remove('active-progress');
    }
  });

  document.querySelector('.progress-wrap').addEventListener('click', function (event) {
    event.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

});




