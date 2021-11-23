(() => {
    const hamburgerBtn = document.querySelector(".hamburger-btn"),
        navMenu = document.querySelector(".nav-menu"),
        closeNavBtn = navMenu.querySelector(".close-nav-menu");

    hamburgerBtn.addEventListener("click", showNavMenu);
    closeNavBtn.addEventListener("click", hideNavMenu);


    function showNavMenu() {
        navMenu.classList.add("open");
    }

    function hideNavMenu() {
        navMenu.classList.remove('open');
    }


})();


/* ----------------------- about section tabs ----------------------- */

(() => {
    const aboutSection = document.querySelector(".about-section"),
        tabsContainer = document.querySelector(".about-tabs");

    tabsContainer.addEventListener('click', (event) => {
        /* if event.target contains 'tab-item' class and contains 'active' class */
        if (event.target.classList.contains("tab-item") && !event.target.classList.contains("active")) {
            const target = event.target.getAttribute("data-target");
            // desactivar active existente 'tab-item'
            tabsContainer.querySelector(".active").classList.remove("outer-shadow", "active");
            // activar nuevo 'tab-item'
            event.target.classList.add("active", "outer-shadow");
            // desactivar active existente 'tab-content'
            aboutSection.querySelector(".tab-content.active").classList.remove("active");
            // activar nuevo 'tab-content'
            aboutSection.querySelector(target).classList.add("active");
        }
    })
})();


function bodyScrollingToggle() {
    document.body.classList.toggle("stop-scrolling");
}

/* ----------------------- portafolio filter & popup ----------------------- */

(() => {

    const filterContainer = document.querySelector(".portfolio-filter"),
        portfolioItemsContainer = document.querySelector(".portfolio-items"),
        portfolioItems = document.querySelectorAll(".portfolio-item"),
        popup = document.querySelector(".portfolio-popup"),
        prevBtn = popup.querySelector(".pp-prev"),
        nextBtn = popup.querySelector(".pp-next"),
        closeBtn = popup.querySelector(".pp-close"),
        projectDetailsContainer = popup.querySelector(".pp-details"),
        projectDetailsBtn = popup.querySelector(".pp-project-details-btn");

    let itemIndex, slideIndex, screenshots;

    /* filtrer portafolio items */

    filterContainer.addEventListener("click", (event) => {
        if (event.target.classList.contains("filter-item") && !event.target.classList.contains("active")) {
            /* deactive existing active 'filter-item' */
            filterContainer.querySelector(".active").classList.remove("active", "outer-shadow");
            /* activate new 'filter item' */
            event.target.classList.add("active", "outer-shadow");
            const target = event.target.getAttribute("data-target");
            portfolioItems.forEach((item) => {
                if (target === item.getAttribute("data-category") || target === "all") {
                    item.classList.remove("hide");
                    item.classList.add("show")
                } else {
                    item.classList.remove("show");
                    item.classList.add("hide");
                }
            })
        }
    })

    portfolioItemsContainer.addEventListener("click", (event) => {
        if (event.target.closest(".portfolio-item-inner")) {
            const portfolioItem = event.target.closest(".portfolio-item-inner").parentElement;
            /* get theportfolio index  */
            itemIndex = Array.from(portfolioItem.parentElement.children).indexOf(portfolioItem);
            screenshots = portfolioItems[itemIndex].querySelector(".portfolio-item-img img").getAttribute("data-screenshots");
            /* convertir creenshots en array */

            screenshots = screenshots.split(",");
            if (screenshots.length === 1) {
                prevBtn.style.display = "none";
                nextBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'block';
                nextBtn.style.display = 'block';

            }
            slideIndex = 0;
            popupToggle();
            popupSlideshow();
            // popupdetails();
        }
    })

    closeBtn.addEventListener('click', () => {
        popupToggle();
    })

    function popupToggle() {
        popup.classList.toggle("open");
        bodyScrollingToggle();
    }

    function popupSlideshow() {
        const imgSrc = screenshots[slideIndex];
        const popupImg = popup.querySelector(".pp-img");
        // activate loader until the popupImg loaded
        popup.querySelector(".pp-loader").classList.add("active");
        popupImg.src = imgSrc;
        popupImg.onload = () => {
            // deactivate loader after the popupImg loaded
            popup.querySelector('.pp-loader').classList.remove("active");
        }
        popup.querySelector(".pp-counter").innerHTML = (slideIndex + 1) + " of " + screenshots.length;
    }
    // next slide 
    nextBtn.addEventListener("click", () => {
            if (slideIndex === screenshots.length - 1) {
                slideIndex = 0;
            } else {
                slideIndex++;
            }
            popupSlideshow();
            console.log("slideIndex: " + slideIndex);
        })
        // prev slide
    prevBtn.addEventListener("click", () => {
        if (slideIndex === 0) {
            slideIndex = screenshots.length - 1;
        } else {
            slideIndex--;
        }
        popupSlideshow();
        console.log("slideIndex: " + slideIndex);
    })

    projectDetailsBtn.addEventListener("click", () => {
        popupDetailsToggle();
    })

    function popupDetailsToggle() {
        if (projectDetailsContainer.classList.contains("active")) {
            projectDetailsContainer.classList.remove("active");
            projectDetailsContainer.style.maxHeight = 0 + "px";
        } else {
            projectDetailsContainer.classList.add("active");
            projectDetailsContainer.style.maxheight = projectDetailsContainer.scrollHeight + "px";
        }
    }

})();