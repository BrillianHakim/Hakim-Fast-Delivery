//toggle class active hamburger menu
const navbarNav = document.querySelector('.navbar-nav');
//ketika humburger menu diklik 
document.querySelector('#hamburger-menu').onclick =()=>{
    navbarNav.classList.toggle('active');
}

const searchForm = document.querySelector('.search-form');
const searchBox =document.querySelector('#search-box');
// toggle class active search form
document.querySelector('#search-button').onclick=(e)=>{
    searchForm.classList.toggle('active');
    searchBox.focus();
    e.preventDefault();
};

//klik diluar sidebar menghilangkan navbar
const hm = document.querySelector('#hamburger-menu');
const sb = document.querySelector('#search-button');

document.addEventListener('click',function(e){
    if(!hm.contains(e.target)&&!navbarNav.contains(e.target)){
        navbarNav.classList.remove('active');
    }
    if(!sb.contains(e.target)&&!searchForm.contains(e.target)){
        searchForm.classList.remove('active');
    }
});
