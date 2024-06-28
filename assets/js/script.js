// nav shrink
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    document.getElementById("navbar").style.backgroundColor = "rgba(33, 32, 45, 1)";
    document.getElementById("navbar").style.boxShadow = "0 4px 30px rgba(0, 0, 0, 0.5)";
  } else {
    document.getElementById("navbar").style.backgroundColor = "rgba(33, 32, 45, 0)";
    document.getElementById("navbar").style.boxShadow = "none";
  }
}

// end nav shrink
