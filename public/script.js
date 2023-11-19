let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-3');
let scrollTop = document.querySelector('.scroll-top');

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

window.onscroll = () =>{

    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 250){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }

    if(window.scrollY > 250){
        scrollTop.style.display = 'initial';
    }else{
        scrollTop.style.display = 'none';
    }

}

var swiper = new Swiper(".home-slider", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    loop:true,
});

let countDate = new Date('september 22,2023 00:00:00').getTime();

function countDown(){

    let now = new Date().getTime();

    gap = countDate - now;

    let second = 1000;
    let minute = second * 60;
    let hour = minute * 60;
    let day = hour * 24;

    let d = Math.floor(gap / (day));
    let h = Math.floor((gap % (day)) / (hour));
    let m = Math.floor((gap % (hour)) / (minute));
    let s = Math.floor((gap % (minute)) / (second));

    document.getElementById('day').innerText = d;
    document.getElementById('hour').innerText = h;
    document.getElementById('minute').innerText = m;
    document.getElementById('second').innerText = s;

}

setInterval(function(){
    countDown();
},1000)

// document.addEventListener('DOMContentLoaded', function() {
//     const addToCartButtons = document.querySelectorAll('.add-to-cart');

//     addToCartButtons.forEach(button => {
//         button.addEventListener('click', function(event) {
//             event.preventDefault();
//             const productId = this.getAttribute('data-product-id');

//             // Send AJAX request to add product to cart
//             // Replace this with your actual AJAX request code
//             fetch(`/add-to-cart/${productId}`, {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//                 },
//                 body: JSON.stringify({
//                     product_id: productId
//                 })
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.success) {
//                     // Update UI to reflect that the product was added to cart
//                     // You could show a message or update a cart icon, for example
//                 }
//             });
//         });
//     });
// });



  

