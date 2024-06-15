document.querySelectorAll(".slide-card")[0].classList.add("active");
document.querySelector("#previous-arrow").setAttribute("disabled", "");
document.querySelector("#previous-arrow i").style.color = "#c5c5c5";
document.querySelector("#previous-arrow").classList.replace("bg-white", "bg-disabled");
let count = document.querySelectorAll(".slide-card").length;

function nextSlide() {
    document.querySelector("#previous-arrow").removeAttribute("disabled");
    document.querySelector("#previous-arrow i").style.color = "#212529";
    document.querySelector("#previous-arrow").classList.replace("bg-disabled", "bg-white");
    const elements = document.querySelectorAll('.slide-card');
    const activeIndex = Array.from(elements).findIndex(el => el.classList.contains('active'));

    if (activeIndex !== -1) {
        elements[activeIndex].classList.remove('active');
        const nextIndex = (activeIndex + 1) % count;
        elements[nextIndex].classList.add('active');

        elements[activeIndex].classList.add('move-left');
        setTimeout(() => {
            elements[activeIndex].classList.remove('move-left');
            document.querySelector('.slider-wrap').append(elements[activeIndex]);
        }, 500);
    }
}

function previousSlide() {
    const elements = document.querySelectorAll('.slide-card');
    const activeIndex = Array.from(elements).findIndex(el => el.classList.contains('active'));

    if (activeIndex !== -1) {
        elements[activeIndex].classList.remove('active');
        const prevIndex = (activeIndex - 1 + count) % count;
        elements[prevIndex].classList.add('active');

        document.querySelector('.slider-wrap').prepend(elements[elements.length - 1]);
        elements[prevIndex].classList.add('move-right');
        setTimeout(() => {
            elements[prevIndex].classList.remove('move-right');
        }, 500);
    }
}

document.querySelector("#next-arrow").addEventListener('click', nextSlide);
document.querySelector("#previous-arrow").addEventListener('click', previousSlide);
