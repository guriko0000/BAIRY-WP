jQuery(function ($) {

// ハンバーガーメニュー
// ________________________________________________________
const header = document.querySelector('.js-header');
const headerBtn = document.querySelector('.js-header-btn');
const subNav = document.querySelector('.p-sub-nav'); // ハンバーガーメニュー内ナビを選択

headerBtn.addEventListener('click', () => {
  const isOpen = header.classList.toggle('active'); // activeクラスの追加/削除をトグルし、状態を取得
  headerBtn.setAttribute('aria-expanded', isOpen); // aria-expanded属性を更新
  subNav.setAttribute('aria-hidden', !isOpen); // aria-hidden属性を更新
});


// ヘッダーサブナビクラス名追加
$('.js-header-btn').on('click', function () {
  $('.p-sub-nav').toggleClass('visible');
}); 

// ページ内リンク飛ぶ用の追記
$('.js-header-nav a[href]').on('click', function(event) {
  $('.js-header-btn').trigger('click');
});



// ナビのカレント表示
// ________________________________________________________
$(function () {
  $('.js-tab01').each(function () {
    if (this.href == location.href) {
      $(this).parents('li').addClass('current');
    }
  });
});



// page-topスムーススクロール
// ________________________________________________________
$(function() {
  $('.js-page-top').hide();
  $(window).scroll(function() {
    if($(this).scrollTop() > 250) {
        $('.js-page-top').fadeIn(250);
      } else {
        $('.js-page-top').fadeOut(250);
        }
    });
    $('.js-page-top').click(function(){
    $('html, body').animate({scrollTop: 0}, 250);
  });
});


// アコーディオン
// ________________________________________________________
$(function() {
  $(".js-accordion-btn").on("click", function() {
    const content = $(this).parent(".c-accordion__title").next(".c-accordion__body"); // アコーディオンの内容部分
    const isExpanded = $(this).attr("aria-expanded") === "true"; // 現在の状態を取得
    
    // aria-expandedを切り替える
    $(this).attr("aria-expanded", !isExpanded);
    
    // aria-hiddenを切り替える
    content.attr("aria-hidden", isExpanded);
    
    $(this).toggleClass("is-open"); // クラスを切り替える
    content.slideToggle(300);
  });
});


// header高さ引いてスムーススクロール
// ________________________________________________________
// 固定ヘッダー分リンク飛ばした時調整
  if(window.matchMedia("(max-width: 767px)").matches){
    $(function () {
      var headerHight = 85;
      $('a[href^="#"]').click(function () {
      var href = $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top - headerHight;
      $("html, body").animate({ scrollTop: position }, 200, "linear");
      return false;
      });
      });
  }else{ 
    $(function () {
      var headerHight = 85;
      $('a[href^="#"]').click(function () {
      var href = $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top - headerHight;
      $("html, body").animate({ scrollTop: position }, 250, "linear");
      return false;
      });
      });
  }



  
});




document.getElementById("current-year").innerText = new Date().getFullYear();


// 350px以下スケーリング
// ________________________________________________________
!(function () {
  const viewport = document.querySelector('meta[name="viewport"]');
  function switchViewport() {
    const value = window.outerWidth > 350 ? 'width=device-width,initial-scale=1' : 'width=390';
    if (viewport && viewport.getAttribute('content') !== value) {
      viewport.setAttribute('content', value);
    }
  }
  window.addEventListener('resize', switchViewport);
  switchViewport();
})();


// gsap
// ________________________________________________________
window.addEventListener('DOMContentLoaded', function() {

  // 読込むとふわっと出現
  document.querySelectorAll(".js-fade").forEach((el) => {
    el.classList.add("show");
  });

  // スクロールしたらふわっと出現
  document.querySelectorAll(".js-fadeUp-inView").forEach((el) => {
    ScrollTrigger.create({
    trigger: el,
    start: 'top 75%',
    onEnter: () => {
      setTimeout(() => {
        el.classList.add('show');
      }, 300);
    },
    // markers: true,
  });
});

  // スクロールしたらふわっと出現2
  document.querySelectorAll(".js-fadeUp-inView2").forEach((el) => {
    ScrollTrigger.create({
    trigger: el,
    start: 'top 60%',
    onEnter: () => {
      setTimeout(() => {
        el.classList.add('show');
      }, 500);
    },
    // markers: true,
  });
});

  // スクロールしたら右から出現
  document.querySelectorAll(".js-fadeRight").forEach((el) => {
    ScrollTrigger.create({
    trigger: el,
    start: 'top 75%',
    onEnter: () => el.classList.add('show'),
    // markers: true,
  });
});

});


// テキスト表示
window.addEventListener('DOMContentLoaded', function () {
  let texts = document.querySelectorAll('.js-wipeAnimation');

  texts.forEach(function (text) {
    gsap.to(text, {
      clipPath: 'inset(0 0% 0 0)',
      delay:0,
      duration: 1,
      ease: 'power2.out',
      scrollTrigger: {
        trigger: text,
        start: 'top 80%',
        toggleActions: 'play none none none',
        // markers: true,
      }
    });
  });
});



// スライダー
(function(){
  const splideEl = document.querySelector('.splide');
  if (!splideEl) return; // スライダーが無ければ処理しない

  var splide = new Splide(splideEl, {
    type: 'loop',
    perPage: 3,
    perMove: 1,
    gap: '30px',
    pagination: false,
    arrows: true,
    arrowPath: 'M16.5511 13.4585L17.8926 12.1792L25.1994 19.1514C25.3172 19.2632 25.4106 19.396 25.4744 19.5423C25.5382 19.6887 25.571 19.8456 25.571 20.0041C25.571 20.1626 25.5382 20.3195 25.4744 20.4659C25.4106 20.6122 25.3172 20.7451 25.1994 20.8568L17.8926 27.8326L16.5524 26.5533L23.4103 20.0059L16.5511 13.4585Z',
    breakpoints: {
      1400: { gap: '20px' },
      767:  { perPage: 2 },
    }
  });

  var bar = splideEl.querySelector('.my-carousel-progress-bar');

  splide.on('mounted move', function () {
    if (!bar) return;
    var end  = splide.Components.Controller.getEnd() + 1;
    var rate = Math.min((splide.index + 1) / end, 1);
    bar.style.width = String(100 * rate) + '%';
  });

  splide.mount();
})();





// お知らせ絞込み
const filterButtons = document.querySelectorAll('[data-filter]');
const cards = document.querySelectorAll('[data-category]');

const tokens = (s) => (s || '')
  .replace(/\u00A0/g,' ').replace(/\u3000/g,' ')
  .trim().split(/\s+/).filter(Boolean);

const show = (el) => { el.classList.add('is-show'); el.removeAttribute('aria-hidden'); el.inert = false; };
const hide = (el) => { el.classList.remove('is-show'); el.setAttribute('aria-hidden','true'); el.inert = true; };

filterButtons.forEach(btn => {
  // 可能なら <button> にする。liの場合は↓を併用
  btn.setAttribute('role','button'); btn.setAttribute('tabindex','0');
  const handle = () => {
    filterButtons.forEach(b => b.classList.remove('is-active'));
    btn.classList.add('is-active');
    const f = btn.dataset.filter;
    let shown = 0;
    cards.forEach(el => hide(el));
    for (const el of cards) {
      if (shown >= 4) break;
      const list = tokens(el.dataset.category);
      if (f === 'all' || list.includes(f)) {
        show(el);
        el.animate([{opacity:0},{opacity:1}], {duration:400, fill:'both'});
        shown++;
      }
    }
  };
  btn.addEventListener('click', handle);
  btn.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); handle(); }
  });
});

window.addEventListener('DOMContentLoaded', () => {
  cards.forEach(el => hide(el));
  document.querySelector('[data-filter="all"]')?.click();
});











// Googleカスタム検索プレスフォルダーテキスト変更
window.addEventListener('load', function () {
  const ids = ['gsc-i-id1', 'gsc-i-id2']; // 対象のIDを追加
  ids.forEach(function(id) {
    const input = document.getElementById(id);
    if (input) {
      input.placeholder = 'サイト内検索';
    }
  });
});



// ナビカレント
// ________________________________________________________
document.addEventListener('DOMContentLoaded', () => {
  const normalize = (path) =>
    path
      .replace(/[#?].*$/, '')          // ハッシュ・クエリ除去（CSE対策）
      .replace(/\/index\.html?$/i, '/') // index.html をフォルダ表現へ
      .replace(/\/+$/, '') || '/';      // 末尾スラッシュ揃え（ルートは'/'に）

  const current = normalize(window.location.pathname + window.location.search + window.location.hash);

  document.querySelectorAll('.js-page-nav').forEach(link => {
    const linkPath = normalize(new URL(link.href).pathname);
    link.classList.toggle('c-page-nav__btn--active', current === linkPath);
  });
});


// スクロールヒント
// ________________________________________________________
document.addEventListener("DOMContentLoaded", function () {
  const element1 = document.querySelector(".js-scroll-1");
  const element2 = document.querySelector(".js-scroll-2");

  // .js-scroll-1 が存在する場合のみ ScrollHint を初期化
  if (element1) {
    const scrollHint1 = new ScrollHint(".js-scroll-1", {
      i18n: {
        scrollable: "スクロールできます",
      },
      remainingTime: 5000,
      suggestiveShadow: true,
      // scrollHintIconAppendClass: "scroll-hint-icon-white",
    });
  }

  // .js-scroll-2 が存在する場合のみ ScrollHint を初期化
  if (element2) {
    const scrollHint2 = new ScrollHint(".js-scroll-2", {
      i18n: {
        scrollable: "スクロールできます",
      },
      remainingTime: 1000,
      suggestiveShadow: true,
    });
  }
});
