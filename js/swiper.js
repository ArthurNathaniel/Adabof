var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: " .prev",
    prevEl: " .next",
  },
});


var swiper = new Swiper(".mySwiper2", {
 autoplay:true,
 loop:true,
  effect: "cube",
  delay:3000,
  grabCursor: true,
  cubeEffect: {
    shadow: true,
    slideShadows: true,
    shadowOffset: 20,
    shadowScale: 0.94,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
 
});


 var swiper = new Swiper(".mySwiper3", {
   effect: "coverflow",
   grabCursor: true,
   centeredSlides: true,

   coverflowEffect: {
     rotate: 50,
     stretch: 0,
     depth: 100,
     modifier: 1,
     slideShadows: true,
   },
   slidesPerView: 1,
   spaceBetween: 10,
   loop: true,
   autoplay: {
     delay: 2500,
     disableOnInteraction: false,
   },
   pagination: {
     el: ".swiper-pagination",
     clickable: true,
   },
   navigation: {
     nextEl: " .prev",
     prevEl: " .next",
   },
   breakpoints: {
     640: {
       slidesPerView: 1,
       spaceBetween: 20,
     },
     768: {
       slidesPerView: 1,
       spaceBetween: 40,
     },
     1024: {
       slidesPerView: 3,
       spaceBetween: 50,
     },
   },
 });

  var swiper5 = new Swiper(".mySwiper5", {
  
    grabCursor: true,
    loop:true,
    effect: "creative",
    creativeEffect: {
      prev: {
        shadow: true,
        translate: ["-125%", 0, -800],
        rotate: [0, 0, -90],
      },
      next: {
        shadow: true,
        translate: ["125%", 0, -800],
        rotate: [0, 0, 90],
      },
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: " .prev",
      prevEl: " .next",
    },
  });