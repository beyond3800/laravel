import './bootstrap';

const orderBtn =document.querySelector('#orderBtn')

// orderBtn.addEventListener('click',()=>{
//     console.log('working!!!!')
// })
const nav = document.querySelector('nav');
const navBtn = document.querySelector('#navBtn');
const layout = document.querySelector('main');
const navUl = nav.querySelector('ul')
const flashMessage = document.querySelector('#flash_message')
navBtn.addEventListener('click',()=>{
    const navUl = nav.querySelector('ul')
    if(navUl.classList.contains('h-0')){
        navUl.classList.remove('h-0')
        navUl.classList.add('h-auto')
    }else{
        navUl.classList.add('h-0')
        navUl.classList.remove('h-auto')
    }
})

window.addEventListener('scroll',(e)=>{
  const screenHeight = window.pageYOffset
  const navHeight = nav.getBoundingClientRect().height
  screenHeight > navHeight ? nav.classList.add('fixed') : nav.classList.remove('fixed')
  screenHeight > navHeight ? nav.classList.add('shadow-2xl') : nav.classList.add('shadow-none')
  screenHeight > navHeight ? nav.classList.add('bg-white') : nav.classList.remove('bg-blue-200')
  screenHeight > navHeight&&navUl.classList.add('h-0')
//   screenHeight > navHeight ? nav.classList.add('border-b') : nav.classList.add('border-b-0')
})

if(flashMessage){
    setInterval(() => {
        flashMessage.classList.add('hidden')
    }, 1000);
}
