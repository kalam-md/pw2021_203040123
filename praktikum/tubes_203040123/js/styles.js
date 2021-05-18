// mobile menu button
const btn = document.querySelector(".mobile-menu-button");
const menu = document.querySelector(".mobile-menu");
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

btn.addEventListener("click", () => {
  menu.classList.toggle("hidden");
});

// Preview Image untuk Tambah dan Ubah
function previewImage() {
  const gambar = document.querySelector('.gambar');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}

// event ketika kita menuliskan keyword
keyword.addEventListener('keyup', function () {
  // ajax
  // xmlhttprequest
  // const xhr = new XMLHttpRequest();

  // xhr.onreadystatechange = function () {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     container.innerHTML = xhr.responseText;
  //   }
  // };

  // xhr.open('get', 'ajax/ajax_search.php?keyword=' + keyword.value);
  // xhr.send();

  // fetch()

  fetch('ajax/ajax_search.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => ((container.innerHTML = response)));
});
