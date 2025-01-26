function buttonScrollLeft(containerId) {
    const container = document.getElementById(containerId);
    container.scrollBy({top: 0,left: -330,behavior: 'smooth'}) ;
    
}

function buttonScrollRight(containerId) {
    const container = document.getElementById(containerId);
    container.scrollBy({top: 0,left: +330,behavior: 'smooth'}) ;
}