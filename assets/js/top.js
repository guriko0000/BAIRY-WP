// ヘッダー背景色変化
// ________________________________________________________

function scrollFunction() {
  var mvHeight = document.querySelector("#mv").offsetHeight - 100;
  var this_y = document.documentElement.scrollTop || document.body.scrollTop || window.scrollY;

  var header = document.querySelector(".l-header--transparent");

  if (this_y > mvHeight) {
    header.classList.add("bg");
  } else {
    header.classList.remove("bg");
  }
}

document.addEventListener("DOMContentLoaded", scrollFunction);
window.addEventListener("load", scrollFunction);
scrollFunction();
window.addEventListener("scroll", scrollFunction);


// mv動画読み込みふわっと
// ________________________________________________________
window.addEventListener('load', function() {
  setTimeout(function() {
    document.querySelector('.p-mv__video').classList.add('is-visible');
  }, 1000);
});

// mvテキストアニメーション
// ________________________________________________________
window.addEventListener('DOMContentLoaded', function () {
  const tl = gsap.timeline(); 
  tl.to({}, { duration: 2 });
  const wrappers = gsap.utils.toArray('.text-wrapper');

  wrappers.forEach((wrapper, index) => {
    const text = wrapper.querySelector('.text');

    tl.to(text, {
      y: 0,
      duration: 0.8,
    }, index === 0 ? '+=0' : '-=0.6');
  });
});

// 背景画像パララックス
// ________________________________________________________
window.addEventListener('DOMContentLoaded', function() {

  gsap.fromTo('.p-bg__img',{y:60},{y:-60,scrollTrigger:{
    trigger:'.p-bg',
    start:'top bottom',
    end:'center top',
    scrub:1,
    // markers:true,
  }});


});
