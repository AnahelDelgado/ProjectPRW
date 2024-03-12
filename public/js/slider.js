var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    granbCursor: 'true',
    pagination: {
        el: ".swiper.pagination",
        clickable: true,
        dynamicBullet: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
  });

  document.addEventListener("DOMContentLoaded", function() {
    var dropdowns = document.querySelectorAll(".dropdown");

    dropdowns.forEach(function(dropdown) {
        var dropdownContent = dropdown.querySelector(".dropdown-content");

        dropdown.addEventListener("mouseenter", function() {
            dropdownContent.style.display = "block";
            dropdownContent.style.opacity = 0;
            fadeIn(dropdownContent);
        });

        dropdown.addEventListener("mouseleave", function() {
            fadeOut(dropdownContent);
        });
    });

    function fadeIn(element) {
        var opacity = 0;
        var timer = setInterval(function() {
            if (opacity >= 1) {
                clearInterval(timer);
            }
            element.style.opacity = opacity;
            opacity += 0.1;
        }, 50);
    }

    function fadeOut(element) {
        var opacity = 1;
        var timer = setInterval(function() {
            if (opacity <= 0) {
                clearInterval(timer);
                element.style.display = "none";
            }
            element.style.opacity = opacity;
            opacity -= 0.1;
        }, 50);
    }
});
