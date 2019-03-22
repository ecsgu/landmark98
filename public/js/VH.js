// JavaScript Document
"use strict"
/* This function to close the tab with parameter is tab's id */
function closeTab(id){
	document.getElementById(id).className = document.getElementById(id).className.replace(" vh-show"," vh-hide");
}
/* This function to dropdown with parameter is dropdown's id */
function dropdown(id) {
  var x = document.getElementById(id);
  x.classList.toggle("vh-show");
}
/* This function to dropdown and change color with parameter dropdown's id and class color in vh.css file */
function dropdownAndChangeColor(id,class_color) {
  var x = document.getElementById(id);
  x.classList.toggle("vh-show");
  x.previousElementSibling.classList.toggle(class_color);
}
/* This function to open the sidebar with parameter is Sidebar's id */
function openSidebar(id_Sidebar) {
  document.getElementById(id_Sidebar).style.display = "block";
}
function openSidebar25width(id_Sidebar){
  document.getElementById(id_Sidebar).style.width = "25%";
}
/* This function to open the siderbar 100% width with parameter is Sidebar's id*/
function openSidebar100width(id_Sidebar) {
  document.getElementById(id_Sidebar).style.width = "100%";
}
function openSidebar100height(id_Sidebar){
  document.getElementById(id_Sidebar).style.height = "100%";
}
/* This function to close the sidebar with parameter is sidebar's id */
function closeSidebar(id_Sidebar) {
  document.getElementById(id_Sidebar).style.display = "none";
}
function closeSidebar0width(id_Sidebar){
  document.getElementById(id_Sidebar).style.width = "0%";
}
function closeSidebar0height(id_Sidebar){
  document.getElementById(id_Sidebar).style.height = "0%";
}
/* This function to open sidebar and slidepage to right 
   with parameter are sidebar's is, slidepage's id and button's id to open sidebar */
function openSidebarAndSlidePageToRight(id_Sidebar,id_Main,id_openNav) {
  document.getElementById(id_Main).style.marginLeft = "25%";
  document.getElementById(id_Sidebar).style.width = "25%";
  document.getElementById(id_Sidebar).style.display = 'block';
  document.getElementById(id_openNav).style.display = 'none';
}
/* This function to close sidebar and slidepage to left 
   with parameter are sidebar's id, slidepage's id and button's id to open sidebar */
function closeSidebarAndSlidePageToRight(id_Sidebar,id_Main,id_openNav) {
  document.getElementById(id_Main).style.marginLeft = "0%";
  document.getElementById(id_Sidebar).style.display = "none";
  document.getElementById(id_openNav).style.display = "inline-block";
}
/* This function to open sidebar and show the overlay
   with parameter are sidebar's id and overlay's id
   if click the outside sidebar to close sidebar */
function openSidebarAndOverlay(id_Sidebar,id_Overlay){
  openSidebar(id_Sidebar);
  document.getElementById(id_Overlay).style.display = "block";
}
function openSidebar25AndOverlay(id_Sidebar,id_Overlay){
  openSidebar25width(id_Sidebar);
  document.getElementById(id_Overlay).style.display = "block";
}
/* This function to close sidebar and hide the overlay
   with parameter are sidebar's id and overlay's id */
function closeSidebarAndOverlay(id_Sidebar,id_Overlay){
  closeSidebar(id_Sidebar);
  document.getElementById(id_Overlay).style.display = "none";
}
function closeSidebar25AndOverlay(id_Sidebar,id_Overlay){
  closeSidebar0width(id_Sidebar);
  document.getElementById(id_Overlay).style.display = "none";
}
/* This function to show the tab be selected with parameter is tab's id
   Note: to use function, you add class name "vh-tab-content" in all tabs 
   and "vh-hide" in tabs be hided, "vh-show" in 1 tab be showed */
function openTab(id_tab) { // Thêm class "tab" vào tất cả các tab và "vh-hide" vào những tab ẩn "vh-show" vào tab hiện hành
    var i;
    var x = document.getElementsByClassName("vh-tab-content");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" vh-show"," vh-hide"); 
    }
    document.getElementById(id_tab).className = document.getElementById(id_tab).className.replace(" vh-hide"," vh-show");
}
/* This function to show the tab be selected with parameter are tab's id and class color in vh.css
   Note: to use function, you add class name "vh-tab-content" in all tabs, "vh-tablink" in all link tab, class color in the current link tab
   and "vh-hide" in tabs be hided, "vh-show" in 1 tab be showed */
function openTabAndChangeColor(evt, id_tab,class_color) { // Thêm class "tab" vào tất cả các tab , "tablink" vào tất cả các link tab và "vh-show" vào những tab ẩn "vh-hide" vào tab hiện hành 
    var i, x, tablinks;
    x = document.getElementsByClassName("vh-tab-content");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" vh-show"," vh-hide");
    }
    tablinks = document.getElementsByClassName("vh-tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" "+class_color, "");
    }
    document.getElementById(id_tab).className = document.getElementById(id_tab).className.replace(" vh-hide"," vh-show");
    evt.currentTarget.className += " "+class_color;
}
/* This function to close tab be selected with parameter is tab's id and class color in vh.css */
function closeTabAndChangeColor(id_tab,class_color){
  closeTab(id_tab);
  var tablinks = document.getElementsByClassName("vh-tablink");
  for(i = 0; i < tablinks.length; i++){
    tablinks[i].className = tablinks[i].className.replace(" "+class_color,"");
  }
}
function loadBar(id_bar) {
  var elem = document.getElementById(id_bar);   
  var width = 0;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}
function loadBarHavePercent(id_bar) {
  var elem = document.getElementById(id_bar);   
  var width = 0;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}
function loadBarHavePercent(id_bar,id_percent) {
  var elem = document.getElementById(id_bar);   
  var width = 0;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      document.getElementById(id_percent).innerHTML = width * 1  + '%';
    }
  }
}
function loadHaveNotification(id_bar,id_number,number,class_color,notification) {
  var elem = document.getElementById(id_bar);   
  var width = 0;
  var id = setInterval(frame, 50);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
      document.getElementById("myP").className = class_color;
      document.getElementById("myP").innerHTML = notification;
    } else {
      width++; 
      elem.style.width = width + '%'; 
      var num = width * 1 / number;
      num = num.toFixed(0);
      document.getElementById(id_number).innerHTML = num;
    }
  }
}
/* This function to open modal with parameter is modal's id */
function openModal(id_modal){
  document.getElementById(id_modal).style.display = "block";
}
/* This function to open image modal with parameter is tag element, modal's id and img tag's id */
function openModalImg(element,id_modal_img,id_img) {
  document.getElementById(id_img).src = element.src;
  document.getElementById(id_modal_img).style.display = "block";
}
/* This function to close the modal if click button with parameter is the modal's id */
function closeModal(id_modal){
  document.getElementById(id_modal).style.display = "none";
}
/* This function close the model if click outside of the modal, with parameter are event and the modal's id
   Note: call script "window.onclick = function(){closeModal(event,'idmodal')}" */
function closeModalClickOutside(evt,id_modal) {
  var modal = document.getElementById(id_modal);
  if(evt.target == modal) {
    modal.style.display = "none";
  }
}
/* This function to fill the information if keyup with parameter in input's id and table's id
   the table use td,tr tag name  */
function Search(id_input,id_table) {
  var input, filter, table, tr, td, i;
  input = document.getElementById(id_input);
  filter = input.value.toUpperCase();
  table = document.getElementById(id_table);
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
/* This function stick the menu in top when it's scroll outside the windown 
   Note: call script "window.onscroll = function(){stickMenuInTop('id01')};*/
function stickMenuInTop(navbar, sticky) {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("vh-sticky")
  } else {
    navbar.classList.remove("vh-sticky");
  }
}
/* This function slide down bar on scroll */
function slideDownBar(id_navbar) {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById(id_navbar).style.height = "6%";
  } else {
    document.getElementById(id_navbar).style.height = "0";
  }
}
/* This function hide bar on scroll 
   Note: to use it
    var x = window.pageYOffset;
    window.onscroll = function(){ x = hideBar('navbar',x);};
*/
function hideBar(id_navbar, prevScrollpos){
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById(id_navbar).style.height = "6%";
  } else {
    document.getElementById(id_navbar).style.height = "0";
  }
  return currentScrollPos;
}
/* This function create animation menu, with parameter is bar
   Note: to use it. 
    <div class="vh-animate-bar">
      <div class="vh-line1"></div>
      <div class="vh-line2"></div>
      <div class="vh-line3"></div>
    </div>
*/
function animateMenu(menu) {
  menu.classList.toggle("vh-change");
}
/*
=== Manual Slideshow ===
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides"); // Lấy tất cả các phần tử slide
  if (n > x.length) {slideIndex = 1} // Nếu vị trí slide vượt quá phần tự slide thì gán phần tử đầu
  if (n < 1) {slideIndex = x.length} // Nếu vị trí slide nhỏ hơn 1 thì gán phần tự cuối
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  // Cho tất cả slide ẩn đi 
  }
  x[slideIndex-1].style.display = "block";  // Cho phần từ slide ở vị trí hiện tại hiện lên
}

=== Automatic Slideshow ===
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++; // Chuyển sang slide sau
    if (slideIndex > x.length) {slideIndex = 1} // Nếu là slide cuối thì chuyển sang slide đầu
    x[slideIndex-1].style.display = "block"; // Cho slide hiện tại hiện lên
    setTimeout(carousel, 2000); // Chuyển đổi sau 2 giây
}

=== Slideshow Indicators ===
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
=== Multiple Slideshows on the Same Page ===
var slideIndex = [1,1];
var slideId = ["mySlides1", "mySlides2"]
showDivs(1, 0);
showDivs(1, 1);

function plusDivs(n, no) {
  showDivs(slideIndex[no] += n, no);
}

function showDivs(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}
*/
/* Zoom Image */
function zoomImage(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /* Create lens: */
  lens = document.createElement("DIV");
  lens.setAttribute("class", "vh-img-zoom-lens");
  /* Insert lens: */
  img.parentElement.insertBefore(lens, img);
  /* Calculate the ratio between result DIV and lens: */
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /* Set background properties for the result DIV */
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /* Execute a function when someone moves the cursor over the image, or the lens: */
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /* And also for touch screens: */
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    /* Calculate the position of the lens: */
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /* Prevent the lens from being positioned outside the image: */
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /* Set the position of the lens: */
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /* Display what the lens "sees": */
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);

  /* Create magnifier glass: */
  glass = document.createElement("DIV");
  glass.setAttribute("class", "vh-img-magnifier-glass");

  /* Insert magnifier glass: */
  img.parentElement.insertBefore(glass, img);

  /* Set background properties for the magnifier glass: */
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;

  /* Execute a function when someone moves the magnifier glass over the image: */
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);

  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /* Prevent the magnifier glass from being positioned outside the image: */
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /* Set the position of the magnifier glass: */
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /* Display what the magnifier glass "sees": */
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
function initComparisons() {
  var x, i;
  /* Find all elements with an "overlay" class: */
  x = document.getElementsByClassName("vh-img-comp-overlay");
  for (i = 0; i < x.length; i++) {
    /* Once for each "overlay" element:
    pass the "overlay" element as a parameter when executing the compareImages function: */
    compareImages(x[i]);
  }
  function compareImages(img) {
    var slider, img, clicked = 0, w, h;
    /* Get the width and height of the img element */
    w = img.offsetWidth;
    h = img.offsetHeight;
    /* Set the width of the img element to 50%: */
    img.style.width = (w / 2) + "px";
    /* Create slider: */
    slider = document.createElement("DIV");
    slider.setAttribute("class", "vh-img-comp-slider");
    /* Insert slider */
    img.parentElement.insertBefore(slider, img);
    /* Position the slider in the middle: */
    slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
    slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
    /* Execute a function when the mouse button is pressed: */
    slider.addEventListener("mousedown", slideReady);
    /* And another function when the mouse button is released: */
    window.addEventListener("mouseup", slideFinish);
    /* Or touched (for touch screens: */
    slider.addEventListener("touchstart", slideReady);
     /* And released (for touch screens: */
    window.addEventListener("touchstop", slideFinish);
    function slideReady(e) {
      /* Prevent any other actions that may occur when moving over the image: */
      e.preventDefault();
      /* The slider is now clicked and ready to move: */
      clicked = 1;
      /* Execute a function when the slider is moved: */
      window.addEventListener("mousemove", slideMove);
      window.addEventListener("touchmove", slideMove);
    }
    function slideFinish() {
      /* The slider is no longer clicked: */
      clicked = 0;
    }
    function slideMove(e) {
      var pos;
      /* If the slider is no longer clicked, exit this function: */
      if (clicked == 0) return false;
      /* Get the cursor's x position: */
      pos = getCursorPos(e)
      /* Prevent the slider from being positioned outside the image: */
      if (pos < 0) pos = 0;
      if (pos > w) pos = w;
      /* Execute a function that will resize the overlay image according to the cursor: */
      slide(pos);
    }
    function getCursorPos(e) {
      var a, x = 0;
      e = e || window.event;
      /* Get the x positions of the image: */
      a = img.getBoundingClientRect();
      /* Calculate the cursor's x coordinate, relative to the image: */
      x = e.pageX - a.left;
      /* Consider any page scrolling: */
      x = x - window.pageXOffset;
      return x;
    }
    function slide(x) {
      /* Resize the image: */
      img.style.width = x + "px";
      /* Position the slider: */
      slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
    }
  }
}
function readMore(id_more,id_dots){
  var moreText = document.getElementById(id_more);
  var dots = document.getElementById(id_dots);
  if(dots.style.display === "none"){
    moreText.style.display = "none";
    dots.style.display = "inline";
  } else {
    moreText.style.display = "inline";
    dots.style.display = "none";
  }
}
/* Click to top page */
function scrollToShowButton(id_btn) {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById(id_btn).style.display = "block";
  } else {
    document.getElementById(id_btn).style.display = "none";
  }
}
function clickToTop(){
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
/* Copy Text */
function copyText(id_text){
  var text = document.getElementById(id_text);
  text.select();
  document.execCommand("copy");
}
/* Popup tooltip */
function popUp(id_popup){
  var popup = document.getElementById(id_popup);
  popup.classList.toggle("vh-show");

}