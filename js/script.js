//For 
window.addEventListener('scroll',function(){ 
    const header = document.querySelector('header');
    header.classList.toggle("sticky",window.scrollY > 0);
});

function toggleMenu(){
    const menuToggle =document.querySelector('.menuToggle');
    const navigation =document.querySelector('.navigation');
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
};



let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navigation a');
 
window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');
 
        if(top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header .navigation a[href*=' + id + ']').classList.add('active');
            });
        };
    });
};

