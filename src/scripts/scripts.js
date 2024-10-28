
window.addEventListener('resize', function() {
  const divToRemove = document.querySelector('.centerheader');
  if (window.innerWidth < 445 && divToRemove) {
    divToRemove.remove();
  }
});
