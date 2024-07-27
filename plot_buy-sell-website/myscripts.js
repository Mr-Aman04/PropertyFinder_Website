document.querySelectorAll('.more-btn').forEach(button => {
    button.addEventListener('click', function() {
        const carouselItem = this.closest('.carousel-item');
        carouselItem.classList.toggle('show-description');
    });
});

