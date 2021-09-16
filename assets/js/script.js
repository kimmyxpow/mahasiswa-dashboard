keyword.addEventListener('keyup', function () {
  // Buat object ajax
  var xhr = new XMLHttpRequest();

  // Cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
      const createModal = document.createElement('div');
      createModal.setAttribute('id', 'add-modal');
      createModal.setAttribute('class', 'modal fade text-left');
      createModal.setAttribute('tabindex', '-1');
      createModal.setAttribute('role', 'dialog');
      createModal.setAttribute('aria-labelledby', 'myModalLabel33');
      createModal.setAttribute('aria-hidden', 'myModalLabel33');
    }
  }

  // Eksekusi ajax
  xhr.open('GET', '../ajax/search.php?keyword=' + keyword.value + "&level=" + levelsaya.value, true);
  xhr.send();
});


