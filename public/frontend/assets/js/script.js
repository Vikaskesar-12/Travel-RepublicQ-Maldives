

document.getElementById('toggle-btn').addEventListener('click', function () {
    const navMenu = document.getElementById('nav-menu');
    const toggleBtnIcon = this.querySelector('i');
    
    navMenu.classList.toggle('active');
    
    // Toggle the icon between hamburger and close
    if (navMenu.classList.contains('active')) {
      toggleBtnIcon.classList.remove('fa-bars');
      toggleBtnIcon.classList.add('fa-times');
    } else {
      toggleBtnIcon.classList.remove('fa-times');
      toggleBtnIcon.classList.add('fa-bars');
    }
  });
 